@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- Stat Cards --}}
<div class="row g-3 mb-4">
    <div class="col-sm-6 col-lg-3">
        <div class="card border-0 shadow-sm" style="border-radius:16px;">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div style="width:48px;height:48px;background:linear-gradient(135deg,#0a2463,#1565c0);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                        <i class="ti ti-building text-white" style="font-size:1.4rem;"></i>
                    </div>
                    <span class="badge bg-blue-lt text-blue fw-bold">Hotel</span>
                </div>
                <div class="h2 fw-black mb-0" style="color:#0a2463;">{{ $totalHotels }}</div>
                <div class="text-muted mt-1" style="font-size:0.85rem;">Total Hotel Terdaftar</div>
                <a href="{{ route('hotels.index') }}" class="btn btn-sm mt-3 w-100"
                    style="background:linear-gradient(135deg,#0a2463,#1565c0);color:#fff;border-radius:8px;">
                    Lihat Data <i class="ti ti-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card border-0 shadow-sm" style="border-radius:16px;">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div style="width:48px;height:48px;background:linear-gradient(135deg,#0097a7,#00bcd4);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                        <i class="ti ti-list-check text-white" style="font-size:1.4rem;"></i>
                    </div>
                    <span class="badge bg-cyan-lt text-cyan fw-bold">Kriteria</span>
                </div>
                <div class="h2 fw-black mb-0" style="color:#0a2463;">{{ $totalCriterias }}</div>
                <div class="text-muted mt-1" style="font-size:0.85rem;">Total Kriteria Aktif</div>
                <a href="{{ route('criterias.index') }}" class="btn btn-sm mt-3 w-100"
                    style="background:linear-gradient(135deg,#0097a7,#00bcd4);color:#fff;border-radius:8px;">
                    Lihat Data <i class="ti ti-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card border-0 shadow-sm" style="border-radius:16px;">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div style="width:48px;height:48px;background:linear-gradient(135deg,#2e7d32,#66bb6a);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                        <i class="ti ti-calculator text-white" style="font-size:1.4rem;"></i>
                    </div>
                    <span class="badge bg-green-lt text-green fw-bold">MAUT</span>
                </div>
                <div class="h2 fw-black mb-0" style="color:#0a2463;">MAUT</div>
                <div class="text-muted mt-1" style="font-size:0.85rem;">Metode Rekomendasi</div>
                <a href="{{ route('maut.index') }}" class="btn btn-sm mt-3 w-100"
                    style="background:linear-gradient(135deg,#2e7d32,#66bb6a);color:#fff;border-radius:8px;">
                    Hitung <i class="ti ti-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-lg-3">
        <div class="card border-0 shadow-sm" style="border-radius:16px;">
            <div class="card-body p-4">
                <div class="d-flex align-items-center justify-content-between mb-3">
                    <div style="width:48px;height:48px;background:linear-gradient(135deg,#e65100,#ffa726);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                        <i class="ti ti-map-2 text-white" style="font-size:1.4rem;"></i>
                    </div>
                    <span class="badge bg-orange-lt text-orange fw-bold">Rute</span>
                </div>
                <div class="h2 fw-black mb-0" style="color:#0a2463;">A*</div>
                <div class="text-muted mt-1" style="font-size:0.85rem;">Algoritma Rute Terpendek</div>
                <a href="{{ route('route.index') }}" class="btn btn-sm mt-3 w-100"
                    style="background:linear-gradient(135deg,#e65100,#ffa726);color:#fff;border-radius:8px;">
                    Lihat Peta <i class="ti ti-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>
</div>

{{-- Map --}}
<div class="card border-0 shadow-sm mb-4" style="border-radius:16px;">
    <div class="card-body p-4">
        <div class="d-flex align-items-center justify-content-between mb-3">
            <div>
                <h5 class="fw-bold mb-1" style="color:#0a2463;">
                    <i class="ti ti-map me-2"></i>Peta Sebaran Hotel
                </h5>
                <p class="text-muted mb-0" style="font-size:0.85rem;">Lokasi penginapan terdaftar di Banda Aceh</p>
            </div>
            <a href="{{ route('hotels.index') }}" class="btn btn-sm fw-semibold"
                style="background:#e3f2fd;color:#1565c0;border-radius:10px;padding:8px 16px;">
                <i class="ti ti-external-link me-1"></i> Lihat Semua
            </a>
        </div>
        <div id="dashboard-map" style="height:350px;border-radius:12px;overflow:hidden;"></div>
    </div>
</div>

{{-- Info Cards --}}
<div class="row g-3">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100" style="border-radius:16px;">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-1" style="color:#0a2463;">
                    <i class="ti ti-info-circle me-2 text-primary"></i>Tentang Sistem
                </h5>
                <hr class="my-3">
                <p class="text-muted" style="line-height:1.7;">
                    Sistem Informasi Geografis ini dirancang untuk membantu wisatawan menemukan penginapan terbaik di Banda Aceh menggunakan metode <strong>Multi Attribute Utility Theory (MAUT)</strong> dan menentukan rute terpendek menggunakan <strong>Algoritma A*</strong>.
                </p>
                <div class="d-flex flex-wrap gap-2 mt-3">
                    <span class="badge px-3 py-2" style="background:#e3f2fd;color:#1565c0;border-radius:8px;font-size:0.8rem;">
                        <i class="ti ti-trophy me-1"></i> Metode MAUT
                    </span>
                    <span class="badge px-3 py-2" style="background:#e8f5e9;color:#2e7d32;border-radius:8px;font-size:0.8rem;">
                        <i class="ti ti-route me-1"></i> Algoritma A*
                    </span>
                    <span class="badge px-3 py-2" style="background:#fff3e0;color:#e65100;border-radius:8px;font-size:0.8rem;">
                        <i class="ti ti-map-pin me-1"></i> Leaflet.js + OSM
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100" style="border-radius:16px;">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-1" style="color:#0a2463;">
                    <i class="ti ti-checklist me-2 text-primary"></i>Panduan Penggunaan
                </h5>
                <hr class="my-3">
                <div class="d-flex flex-column gap-3">
                    <div class="d-flex align-items-start gap-3">
                        <div style="width:32px;height:32px;background:linear-gradient(135deg,#0a2463,#1565c0);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <span class="text-white fw-bold" style="font-size:0.8rem;">1</span>
                        </div>
                        <div>
                            <div class="fw-semibold" style="font-size:0.9rem;">Input Data Hotel</div>
                            <div class="text-muted" style="font-size:0.82rem;">Tambahkan data penginapan beserta koordinat lokasi</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3">
                        <div style="width:32px;height:32px;background:linear-gradient(135deg,#0097a7,#00bcd4);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <span class="text-white fw-bold" style="font-size:0.8rem;">2</span>
                        </div>
                        <div>
                            <div class="fw-semibold" style="font-size:0.9rem;">Atur Kriteria & Bobot</div>
                            <div class="text-muted" style="font-size:0.82rem;">Tentukan kriteria penilaian dan bobotnya</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3">
                        <div style="width:32px;height:32px;background:linear-gradient(135deg,#2e7d32,#66bb6a);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <span class="text-white fw-bold" style="font-size:0.8rem;">3</span>
                        </div>
                        <div>
                            <div class="fw-semibold" style="font-size:0.9rem;">Hitung MAUT</div>
                            <div class="text-muted" style="font-size:0.82rem;">Jalankan perhitungan dan lihat hasil rekomendasi</div>
                        </div>
                    </div>
                    <div class="d-flex align-items-start gap-3">
                        <div style="width:32px;height:32px;background:linear-gradient(135deg,#e65100,#ffa726);border-radius:8px;display:flex;align-items:center;justify-content:center;flex-shrink:0;">
                            <span class="text-white fw-bold" style="font-size:0.8rem;">4</span>
                        </div>
                        <div>
                            <div class="fw-semibold" style="font-size:0.9rem;">Lihat Rute di Peta</div>
                            <div class="text-muted" style="font-size:0.82rem;">Tampilkan rute terpendek A* menuju hotel terpilih</div>
                        </div>
                    </div>
                </div>
            </div>
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
    const map = L.map('dashboard-map').setView([5.5483, 95.3238], 13);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    const hotels = @json($hotels);

    hotels.forEach(hotel => {
        if (hotel.latitude && hotel.longitude) {
            const marker = L.marker([hotel.latitude, hotel.longitude]).addTo(map);
            marker.bindPopup(`
                <div style="min-width:180px;">
                    <strong style="color:#0a2463;">${hotel.name}</strong><br>
                    <span style="color:#666;font-size:0.85rem;">⭐ ${hotel.star} Bintang | ${hotel.rating}/10</span><br>
                    <span style="color:#1565c0;font-size:0.85rem;">Rp ${parseInt(hotel.price_per_night).toLocaleString('id-ID')}/malam</span>
                </div>
            `);
        }
    });
</script>
@endpush