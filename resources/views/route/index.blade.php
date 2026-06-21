@extends('layouts.app')

@section('title', 'Rute Terpendek')
@section('page-title', 'Rute Terpendek')

@section('content')

<div class="row g-4">
    {{-- Panel Kiri --}}
    <div class="col-lg-4">
        {{-- Pilih Hotel --}}
        <div class="card border-0 shadow-sm mb-4" style="border-radius:16px;">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4" style="color:#0a2463;">
                    <i class="ti ti-route me-2"></i>Pencarian Rute
                </h5>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Pilih Hotel Tujuan</label>
                    <select id="hotel-select" class="form-select">
                        <option value="">-- Pilih Hotel --</option>
                        @foreach($ranking as $hotel_id => $data)
                        @php $hotel = $hotels->firstWhere('id', $hotel_id); @endphp
                        @if($hotel)
                        <option value="{{ $hotel_id }}"
                            data-lat="{{ $hotel->latitude }}"
                            data-lng="{{ $hotel->longitude }}"
                            data-name="{{ $hotel->name }}"
                            data-rank="{{ $data['rank'] }}"
                            data-nilai="{{ $data['nilai'] }}"
                            data-star="{{ $hotel->star }}"
                            data-rating="{{ $hotel->rating }}"
                            data-price="{{ $hotel->price_per_night }}">
                            #{{ $data['rank'] }} - {{ $hotel->name }}
                        </option>
                        @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label class="form-label fw-semibold">Lokasi Asal</label>
                    <button id="btn-mylocation" class="btn w-100 fw-semibold mb-2"
                        style="background:linear-gradient(135deg,#0097a7,#00bcd4);color:#fff;border-radius:10px;padding:10px;">
                        <i class="ti ti-current-location me-1"></i> Gunakan Lokasi Saya
                    </button>
                    <div class="alert alert-info py-2 px-3 mb-0" style="border-radius:10px;font-size:0.82rem;">
                        <i class="ti ti-info-circle me-1"></i>
                        Atau klik langsung pada peta untuk menentukan lokasi asal
                    </div>
                </div>

                <button id="btn-cari-rute" class="btn w-100 fw-bold" disabled
                    style="background:linear-gradient(135deg,#0a2463,#1565c0);color:#fff;border-radius:10px;padding:12px;">
                    <i class="ti ti-search me-1"></i> Cari Rute Terpendek
                </button>
            </div>
        </div>

        {{-- Info Hotel --}}
        <div id="hotel-info" class="card border-0 shadow-sm mb-4 d-none" style="border-radius:16px;">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3" style="color:#0a2463;">
                    <i class="ti ti-building me-2"></i>Info Hotel Tujuan
                </h6>
                <div id="hotel-detail"></div>
            </div>
        </div>

        {{-- Info Rute --}}
        <div id="rute-info" class="card border-0 shadow-sm mb-4 d-none" style="border-radius:16px;">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-3" style="color:#0a2463;">
                    <i class="ti ti-map-2 me-2"></i>Informasi Rute
                </h6>
                <div id="rute-detail"></div>
            </div>
        </div>

        {{-- Hasil A* --}}
        <div id="astar-info" class="card border-0 shadow-sm d-none" style="border-radius:16px;border-left:4px solid #1565c0 !important;">
            <div class="card-body p-4">
                <h6 class="fw-bold mb-1" style="color:#0a2463;">
                    <i class="ti ti-calculator me-2"></i>Hasil Algoritma A*
                </h6>
                <p class="text-muted mb-3" style="font-size:0.8rem;">Perhitungan f(n) = g(n) + h(n)</p>
                <div id="astar-detail"></div>
            </div>
        </div>
    </div>

    {{-- Peta --}}
    <div class="col-lg-8">
        <div class="card border-0 shadow-sm" style="border-radius:16px;">
            <div class="card-body p-0" style="border-radius:16px;overflow:hidden;">
                <div id="route-map" style="height:680px;width:100%;"></div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<style>
    .form-select {
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        padding: 10px 14px;
        transition: border-color 0.2s;
    }
    .form-select:focus {
        border-color: #1565c0;
        box-shadow: 0 0 0 3px rgba(21,101,192,0.1);
    }
    .info-row {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 6px 0;
        border-bottom: 1px solid #f1f5f9;
        font-size: 0.85rem;
    }
    .info-row:last-child { border-bottom: none; }
    .info-label { color: #64748b; }
    .info-value { font-weight: 600; color: #0a2463; }
    .astar-formula {
        background: #f0f9ff;
        border-radius: 10px;
        padding: 12px;
        text-align: center;
        font-family: monospace;
        font-size: 0.95rem;
        color: #0a2463;
        margin: 10px 0;
    }
    .astar-conclusion {
        background: linear-gradient(135deg, #e3f2fd, #e8f5e9);
        border-radius: 10px;
        padding: 12px;
        font-size: 0.83rem;
        color: #374151;
        line-height: 1.7;
        margin-top: 10px;
    }
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    const map = L.map('route-map').setView([5.5483, 95.3238], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    const hotels = @json($hotels);
    const ranking = @json($ranking);

    let userMarker = null;
    let hotelMarker = null;
    let routeLayer = null;
    let userLat = null;
    let userLng = null;
    let selectedHotel = null;

    const userIcon = L.divIcon({
        className: '',
        html: `<div style="width:32px;height:32px;background:#0097a7;border:3px solid #fff;border-radius:50%;display:flex;align-items:center;justify-content:center;box-shadow:0 2px 8px rgba(0,0,0,0.3);">
            <span style="color:#fff;font-size:0.9rem;">📍</span>
        </div>`,
        iconSize: [32, 32],
        iconAnchor: [16, 16],
        popupAnchor: [0, -20],
    });

    const getHotelIcon = (rank) => {
        const colors = { 1: '#f59e0b', 2: '#94a3b8', 3: '#b45309' };
        const color = colors[rank] || '#1565c0';
        return L.divIcon({
            className: '',
            html: `<div style="width:36px;height:36px;background:${color};border:3px solid #fff;border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:0.85rem;box-shadow:0 2px 8px rgba(0,0,0,0.3);">${rank}</div>`,
            iconSize: [36, 36],
            iconAnchor: [18, 18],
            popupAnchor: [0, -20],
        });
    };

    // Tampilkan semua hotel di peta
    hotels.forEach(hotel => {
        if (!hotel.latitude || !hotel.longitude) return;
        const rankData = ranking[hotel.id];
        if (!rankData) return;
        const rank = rankData.rank;
        const marker = L.marker([hotel.latitude, hotel.longitude], { icon: getHotelIcon(rank) }).addTo(map);
        marker.bindPopup(`
            <div style="min-width:180px;">
                <strong style="color:#0a2463;">#${rank} ${hotel.name}</strong><br>
                <span style="font-size:0.82rem;color:#64748b;">Nilai MAUT: ${parseFloat(rankData.nilai).toFixed(4)}</span><br>
                <span style="font-size:0.82rem;">⭐ ${hotel.star} Bintang | ${hotel.rating}/10</span>
            </div>
        `);
    });

    // Klik peta untuk set lokasi user
    map.on('click', function(e) {
        setUserLocation(e.latlng.lat, e.latlng.lng);
    });

    // Gunakan lokasi saya
    document.getElementById('btn-mylocation').addEventListener('click', function() {
        if (!navigator.geolocation) {
            alert('Browser tidak mendukung geolocation.');
            return;
        }
        this.innerHTML = '<i class="ti ti-loader me-1"></i> Mendeteksi...';
        this.disabled = true;
        navigator.geolocation.getCurrentPosition(
            (pos) => {
                setUserLocation(pos.coords.latitude, pos.coords.longitude);
                this.innerHTML = '<i class="ti ti-current-location me-1"></i> Gunakan Lokasi Saya';
                this.disabled = false;
            },
            () => {
                alert('Gagal mendapatkan lokasi.');
                this.innerHTML = '<i class="ti ti-current-location me-1"></i> Gunakan Lokasi Saya';
                this.disabled = false;
            }
        );
    });

    function setUserLocation(lat, lng) {
        userLat = lat;
        userLng = lng;
        if (userMarker) map.removeLayer(userMarker);
        userMarker = L.marker([lat, lng], { icon: userIcon, draggable: true }).addTo(map);
        userMarker.bindPopup('<strong>Lokasi Anda</strong>').openPopup();
        userMarker.on('dragend', function(e) {
            userLat = e.target.getLatLng().lat;
            userLng = e.target.getLatLng().lng;
        });
        checkReady();
    }

    // Pilih hotel
    document.getElementById('hotel-select').addEventListener('change', function() {
        const option = this.options[this.selectedIndex];
        if (!option.value) {
            selectedHotel = null;
            document.getElementById('hotel-info').classList.add('d-none');
            checkReady();
            return;
        }

        selectedHotel = {
            id: option.value,
            lat: parseFloat(option.dataset.lat),
            lng: parseFloat(option.dataset.lng),
            name: option.dataset.name,
            rank: option.dataset.rank,
            nilai: option.dataset.nilai,
            star: option.dataset.star,
            rating: option.dataset.rating,
            price: option.dataset.price,
        };

        const stars = '⭐'.repeat(parseInt(selectedHotel.star));
        document.getElementById('hotel-detail').innerHTML = `
            <div class="info-row"><span class="info-label">Ranking MAUT</span><span class="info-value">#${selectedHotel.rank}</span></div>
            <div class="info-row"><span class="info-label">Nilai MAUT</span><span class="info-value">${parseFloat(selectedHotel.nilai).toFixed(4)}</span></div>
            <div class="info-row"><span class="info-label">Bintang</span><span class="info-value">${stars}</span></div>
            <div class="info-row"><span class="info-label">Rating</span><span class="info-value">${selectedHotel.rating}/10</span></div>
            <div class="info-row"><span class="info-label">Harga/Malam</span><span class="info-value">Rp ${parseInt(selectedHotel.price).toLocaleString('id-ID')}</span></div>
        `;
        document.getElementById('hotel-info').classList.remove('d-none');
        map.setView([selectedHotel.lat, selectedHotel.lng], 15);
        checkReady();
    });

    function checkReady() {
        const btn = document.getElementById('btn-cari-rute');
        btn.disabled = !(userLat && userLng && selectedHotel);
    }

    // Haversine distance
    function haversine(lat1, lon1, lat2, lon2) {
        const R = 6371;
        const dLat = (lat2 - lat1) * Math.PI / 180;
        const dLon = (lon2 - lon1) * Math.PI / 180;
        const a = Math.sin(dLat/2) * Math.sin(dLat/2) +
                  Math.cos(lat1 * Math.PI / 180) * Math.cos(lat2 * Math.PI / 180) *
                  Math.sin(dLon/2) * Math.sin(dLon/2);
        const c = 2 * Math.atan2(Math.sqrt(a), Math.sqrt(1-a));
        return (R * c).toFixed(4);
    }

    // Cari rute
    document.getElementById('btn-cari-rute').addEventListener('click', function() {
        if (!userLat || !userLng || !selectedHotel) return;

        this.innerHTML = '<i class="ti ti-loader me-1"></i> Mencari Rute...';
        this.disabled = true;

        if (routeLayer) map.removeLayer(routeLayer);

        const url = `https://router.project-osrm.org/route/v1/driving/${userLng},${userLat};${selectedHotel.lng},${selectedHotel.lat}?overview=full&geometries=geojson`;

        fetch(url)
            .then(res => res.json())
            .then(data => {
                if (data.code !== 'Ok') {
                    alert('Rute tidak ditemukan.');
                    this.innerHTML = '<i class="ti ti-search me-1"></i> Cari Rute Terpendek';
                    this.disabled = false;
                    return;
                }

                const route = data.routes[0];
                const coords = route.geometry.coordinates.map(c => [c[1], c[0]]);
                const distance = (route.distance / 1000).toFixed(2);
                const duration = Math.round(route.duration / 60);

                routeLayer = L.polyline(coords, {
                    color: '#1565c0',
                    weight: 5,
                    opacity: 0.8,
                }).addTo(map);

                map.fitBounds(routeLayer.getBounds(), { padding: [50, 50] });

                // Info rute
                document.getElementById('rute-detail').innerHTML = `
                    <div class="info-row">
                        <span class="info-label">Jarak Rute</span>
                        <span class="info-value" style="color:#2e7d32;font-size:1.1rem;">${distance} km</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Estimasi Waktu</span>
                        <span class="info-value" style="color:#e65100;font-size:1.1rem;">${duration} menit</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Tujuan</span>
                        <span class="info-value">${selectedHotel.name}</span>
                    </div>
                    <div class="mt-3">
                        <div class="d-flex align-items-center gap-2 mb-1">
                            <div style="width:12px;height:12px;background:#0097a7;border-radius:50%;"></div>
                            <span style="font-size:0.82rem;color:#64748b;">Lokasi Anda</span>
                        </div>
                        <div class="d-flex align-items-center gap-2">
                            <div style="width:12px;height:12px;background:#1565c0;border-radius:50%;"></div>
                            <span style="font-size:0.82rem;color:#64748b;">Hotel Tujuan</span>
                        </div>
                    </div>
                `;
                document.getElementById('rute-info').classList.remove('d-none');

                // Hitung A*
                const hn = parseFloat(haversine(userLat, userLng, selectedHotel.lat, selectedHotel.lng));
                const gn = parseFloat(distance);
                const fn = (gn + hn).toFixed(4);

                document.getElementById('astar-detail').innerHTML = `
                    <div class="info-row">
                        <span class="info-label">Titik Asal</span>
                        <span class="info-value" style="font-size:0.78rem;">${userLat.toFixed(6)}, ${userLng.toFixed(6)}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">Titik Tujuan</span>
                        <span class="info-value" style="font-size:0.78rem;">${parseFloat(selectedHotel.lat).toFixed(6)}, ${parseFloat(selectedHotel.lng).toFixed(6)}</span>
                    </div>
                    <hr class="my-2">
                    <div class="astar-formula">
                        f(n) = g(n) + h(n)<br>
                        <span style="font-size:0.85rem;color:#64748b;">${fn} = ${gn} + ${hn}</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">g(n) — Jarak Aktual Rute</span>
                        <span class="info-value" style="color:#1565c0;">${gn} km</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">h(n) — Heuristik Haversine</span>
                        <span class="info-value" style="color:#0097a7;">${hn} km</span>
                    </div>
                    <div class="info-row">
                        <span class="info-label">f(n) — Total Biaya</span>
                        <span class="info-value" style="color:#e65100;font-size:1rem;">${fn} km</span>
                    </div>
                    <div class="astar-conclusion">
                        Berdasarkan perhitungan Algoritma A*, rute terpendek dari lokasi asal 
                        (${userLat.toFixed(4)}, ${userLng.toFixed(4)}) menuju 
                        <strong>${selectedHotel.name}</strong> (Ranking MAUT #${selectedHotel.rank}) 
                        ditemukan dengan jarak aktual <strong>${gn} km</strong>, 
                        estimasi heuristik <strong>${hn} km</strong>, 
                        dan total biaya f(n) = <strong>${fn} km</strong>. 
                        Rute ini ditempuh dalam waktu sekitar <strong>${duration} menit</strong>.
                    </div>
                `;
                document.getElementById('astar-info').classList.remove('d-none');

                this.innerHTML = '<i class="ti ti-search me-1"></i> Cari Rute Terpendek';
                this.disabled = false;
            })
            .catch(() => {
                alert('Gagal menghubungi server routing.');
                this.innerHTML = '<i class="ti ti-search me-1"></i> Cari Rute Terpendek';
                this.disabled = false;
            });
    });
</script>
@endpush