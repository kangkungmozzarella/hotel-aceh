@extends('layouts.app')

@section('title', 'Perhitungan MAUT')
@section('page-title', 'Perhitungan MAUT')

@section('content')

{{-- Map Rekomendasi --}}
<div class="card border-0 shadow-sm mb-4" style="border-radius:16px;">
    <div class="card-body p-4 pb-0">
        <div class="mb-3">
            <h5 class="fw-bold mb-1" style="color:#0a2463;">
                <i class="ti ti-map-pin me-2"></i>Peta Rekomendasi Hotel
            </h5>
            <p class="text-muted mb-0" style="font-size:0.85rem;">Lokasi hotel berdasarkan hasil perangkingan MAUT</p>
        </div>
    </div>
    <div class="card-body p-0" style="border-radius:0 0 16px 16px;overflow:hidden;">
        <div id="maut-map" style="height:400px;width:100%;"></div>
    </div>
</div>

{{-- Nilai Utilitas --}}
<div class="card border-0 shadow-sm mb-4" style="border-radius:16px;">
    <div class="card-body p-4">
        <div class="mb-4">
            <h5 class="fw-bold mb-1" style="color:#0a2463;">
                <i class="ti ti-math-function me-2"></i>Nilai Utilitas
            </h5>
            <p class="text-muted mb-0" style="font-size:0.85rem;">
                Hasil perkalian nilai normalisasi dengan bobot kriteria: V(x) = Σ Wi × Ui(x)
            </p>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-center" style="font-size:0.9rem;">
                <thead>
                    <tr style="background:#0a2463;">
                        <th class="text-white text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;vertical-align:middle;">No</th>
                        <th class="text-white text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;vertical-align:middle;">Alternatif</th>
                        @foreach($criterias as $criteria)
                        <th class="text-white text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;vertical-align:middle;">
                            {{ $criteria->name }}<br>
                            <span style="font-size:0.7rem;color:#64ffda;">w={{ $criteria->weight }}</span>
                        </th>
                        @endforeach
                        <th class="text-white text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;vertical-align:middle;">
                            V(x)<br>
                            <span style="font-size:0.7rem;color:#64ffda;">Total</span>
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($hotels as $i => $hotel)
                    <tr>
                        <td class="text-muted fw-semibold">A{{ $i + 1 }}</td>
                        <td class="text-start fw-semibold" style="color:#0a2463;">{{ $hotel->name }}</td>
                        @foreach($criterias as $criteria)
                        @php
                            $norm = $normalisasi[$hotel->id][$criteria->id] ?? 0;
                            $util = round($norm * $criteria->weight, 4);
                        @endphp
                        <td>
                            <span class="badge px-2 py-1" style="background:#e3f2fd;color:#1565c0;border-radius:6px;font-size:0.8rem;">
                                {{ number_format($norm, 4) }}
                            </span>
                            <span class="text-muted" style="font-size:0.75rem;">× {{ $criteria->weight }}</span>
                            <br>
                            <span class="fw-semibold" style="color:#0a2463;font-size:0.85rem;">= {{ number_format($util, 4) }}</span>
                        </td>
                        @endforeach
                        <td>
                            <span class="badge px-3 py-2 fw-bold"
                                style="background:linear-gradient(135deg,#0a2463,#1565c0);color:#fff;border-radius:8px;font-size:0.9rem;">
                                {{ number_format($maut[$hotel->id], 4) }}
                            </span>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Hasil Ranking --}}
<div class="card border-0 shadow-sm" style="border-radius:16px;">
    <div class="card-body p-4">
        <div class="mb-4">
            <h5 class="fw-bold mb-1" style="color:#0a2463;">
                <i class="ti ti-trophy me-2"></i>Hasil Rekomendasi & Perangkingan
            </h5>
            <p class="text-muted mb-0" style="font-size:0.85rem;">Hotel diurutkan berdasarkan nilai MAUT tertinggi</p>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle text-center" style="font-size:0.9rem;">
                <thead>
                    <tr style="background:#f8fafc;">
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Ranking</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Nama Hotel</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Nilai MAUT</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Rekomendasi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($ranking as $hotel_id => $data)
                    @php $hotel = $hotels->firstWhere('id', $hotel_id); @endphp
                    <tr style="{{ $data['rank'] == 1 ? 'background:#f0fdf4;' : '' }}">
                        <td>
                            @if($data['rank'] == 1)
                                <div style="width:36px;height:36px;background:linear-gradient(135deg,#f59e0b,#fbbf24);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto;">
                                    <i class="ti ti-trophy" style="color:#fff;font-size:1rem;"></i>
                                </div>
                            @elseif($data['rank'] == 2)
                                <div style="width:36px;height:36px;background:linear-gradient(135deg,#94a3b8,#cbd5e1);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto;">
                                    <span class="fw-bold text-white">2</span>
                                </div>
                            @elseif($data['rank'] == 3)
                                <div style="width:36px;height:36px;background:linear-gradient(135deg,#b45309,#d97706);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto;">
                                    <span class="fw-bold text-white">3</span>
                                </div>
                            @else
                                <span class="fw-semibold text-muted">{{ $data['rank'] }}</span>
                            @endif
                        </td>
                        <td class="text-start">
                            <div class="fw-semibold" style="color:#0a2463;">{{ $hotel->name }}</div>
                            <div class="text-muted" style="font-size:0.8rem;">{{ $hotel->star }} Bintang | Rating {{ $hotel->rating }}/10</div>
                        </td>
                        <td>
                            <span class="badge px-3 py-2 fw-bold"
                                style="background:{{ $data['rank'] == 1 ? 'linear-gradient(135deg,#f59e0b,#fbbf24)' : '#e3f2fd' }};color:{{ $data['rank'] == 1 ? '#fff' : '#1565c0' }};border-radius:8px;font-size:0.9rem;">
                                {{ number_format($data['nilai'], 4) }}
                            </span>
                        </td>
                        <td>
                            @if($data['rank'] == 1)
                                <span class="badge px-3 py-2 fw-bold" style="background:#dcfce7;color:#166534;border-radius:8px;">
                                    <i class="ti ti-star-filled me-1"></i> Sangat Direkomendasikan
                                </span>
                            @elseif($data['rank'] <= 3)
                                <span class="badge px-3 py-2 fw-bold" style="background:#dbeafe;color:#1e40af;border-radius:8px;">
                                    <i class="ti ti-thumb-up me-1"></i> Direkomendasikan
                                </span>
                            @else
                                <span class="badge px-3 py-2" style="background:#f1f5f9;color:#64748b;border-radius:8px;">
                                    Cukup
                                </span>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    const map = L.map('maut-map').setView([5.5483, 95.3238], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    const ranking = @json($ranking);
    const hotels = @json($hotels);
    const maut = @json($maut);

    const getRankColor = (rank) => {
        if (rank == 1) return '#f59e0b';
        if (rank == 2) return '#94a3b8';
        if (rank == 3) return '#b45309';
        return '#1565c0';
    };

    const getRekomendasi = (rank) => {
        if (rank == 1) return '<span style="color:#166534;font-weight:700;">⭐ Sangat Direkomendasikan</span>';
        if (rank <= 3) return '<span style="color:#1e40af;font-weight:700;">👍 Direkomendasikan</span>';
        return '<span style="color:#64748b;">Cukup</span>';
    };

    hotels.forEach((hotel) => {
        if (!hotel.latitude || !hotel.longitude) return;

        const rankData = ranking[hotel.id];
        if (!rankData) return;

        const rank = rankData.rank;
        const nilai = rankData.nilai;
        const color = getRankColor(rank);

        const markerIcon = L.divIcon({
            className: '',
            html: `<div style="
                width:36px;height:36px;
                background:${color};
                border:3px solid #fff;
                border-radius:50%;
                display:flex;align-items:center;justify-content:center;
                color:#fff;font-weight:800;font-size:0.85rem;
                box-shadow:0 2px 8px rgba(0,0,0,0.3);
                cursor:pointer;
            ">${rank}</div>`,
            iconSize: [36, 36],
            iconAnchor: [18, 18],
            popupAnchor: [0, -20],
        });

        const marker = L.marker([hotel.latitude, hotel.longitude], { icon: markerIcon }).addTo(map);

        const stars = '⭐'.repeat(hotel.star);

        marker.bindPopup(`
            <div style="min-width:220px;font-family:sans-serif;">
                <div style="background:${color};color:#fff;padding:10px 14px;margin:-13px -20px 10px;border-radius:4px 4px 0 0;">
                    <div style="font-weight:800;font-size:0.95rem;">🏆 Ranking #${rank}</div>
                    <div style="font-size:0.8rem;opacity:0.9;">${hotel.name}</div>
                </div>
                <table style="width:100%;font-size:0.82rem;border-collapse:collapse;">
                    <tr>
                        <td style="color:#64748b;padding:3px 0;">Nilai MAUT</td>
                        <td style="font-weight:700;color:#0a2463;text-align:right;">${parseFloat(nilai).toFixed(4)}</td>
                    </tr>
                    <tr>
                        <td style="color:#64748b;padding:3px 0;">Bintang</td>
                        <td style="text-align:right;">${stars}</td>
                    </tr>
                    <tr>
                        <td style="color:#64748b;padding:3px 0;">Rating</td>
                        <td style="font-weight:600;text-align:right;">${hotel.rating}/10</td>
                    </tr>
                    <tr>
                        <td style="color:#64748b;padding:3px 0;">Harga/Malam</td>
                        <td style="font-weight:600;color:#1565c0;text-align:right;">Rp ${parseInt(hotel.price_per_night).toLocaleString('id-ID')}</td>
                    </tr>
                    <tr>
                        <td style="color:#64748b;padding:3px 0;">Rekomendasi</td>
                        <td style="text-align:right;">${getRekomendasi(rank)}</td>
                    </tr>
                </table>
            </div>
        `, { maxWidth: 280 });
    });
</script>
@endpush