@extends('layouts.app')

@section('title', 'Data Hotel')
@section('page-title', 'Data Hotel')

@section('content')

{{-- Map Overview --}}
<div class="card border-0 shadow-sm mb-4" style="border-radius:16px;">
    <div class="card-body p-0" style="border-radius:16px;overflow:hidden;">
        <div id="map-overview" style="height:350px;width:100%;"></div>
    </div>
</div>

{{-- Table --}}
<div class="card border-0 shadow-sm" style="border-radius:16px;">
    <div class="card-body p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h5 class="fw-bold mb-1" style="color:#0a2463;">
                    <i class="ti ti-building me-2"></i>Daftar Hotel
                </h5>
                <p class="text-muted mb-0" style="font-size:0.85rem;">Total {{ $hotels->count() }} hotel terdaftar</p>
            </div>
            <div class="d-flex gap-2">
                <button type="button" class="btn fw-bold" data-bs-toggle="modal" data-bs-target="#uploadModal"
                    style="background:linear-gradient(135deg,#2e7d32,#66bb6a);color:#fff;border-radius:10px;padding:10px 20px;">
                    <i class="ti ti-upload me-1"></i> Upload Excel
                </button>
                <a href="{{ route('hotels.create') }}" class="btn fw-bold"
                    style="background:linear-gradient(135deg,#0a2463,#1565c0);color:#fff;border-radius:10px;padding:10px 20px;">
                    <i class="ti ti-plus me-1"></i> Tambah Hotel
                </a>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle text-center" style="font-size:0.9rem;">
                <thead>
                    <tr style="background:#f8fafc;">
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">No</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Nama Hotel</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Harga/Malam</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Bintang</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Rating</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Lokasi</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($hotels as $i => $hotel)
                    <tr>
                        <td class="text-muted">{{ $i + 1 }}</td>
                        <td class="text-start">
                            <div class="fw-semibold" style="color:#0a2463;">{{ $hotel->name }}</div>
                            <div class="text-muted" style="font-size:0.8rem;">{{ Str::limit($hotel->facilities, 40) }}</div>
                        </td>
                        <td>
                            <span class="fw-semibold">Rp {{ number_format($hotel->price_per_night, 0, ',', '.') }}</span>
                        </td>
                        <td>
                            <div class="text-warning d-flex justify-content-center">
                                @for($s = 1; $s <= 5; $s++)
                                    <i class="ti ti-star{{ $s <= $hotel->star ? '-filled' : '' }}" style="font-size:0.9rem;"></i>
                                @endfor
                            </div>
                        </td>
                        <td>
                            <span class="badge px-3 py-2 fw-bold"
                                style="background:#e8f5e9;color:#2e7d32;border-radius:8px;">
                                {{ $hotel->rating }}/10
                            </span>
                        </td>
                        <td>
                            @if($hotel->latitude && $hotel->longitude)
                                <span class="badge px-2 py-1" style="background:#e3f2fd;color:#1565c0;border-radius:6px;font-size:0.75rem;">
                                    <i class="ti ti-map-pin me-1"></i>{{ number_format($hotel->latitude, 4) }}, {{ number_format($hotel->longitude, 4) }}
                                </span>
                            @else
                                <span class="text-muted" style="font-size:0.8rem;">Belum diset</span>
                            @endif
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('hotels.edit', $hotel) }}"
                                    class="btn btn-sm"
                                    style="background:#e3f2fd;color:#1565c0;border-radius:8px;padding:6px 12px;">
                                    <i class="ti ti-edit"></i>
                                </a>
                                <form action="{{ route('hotels.destroy', $hotel) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus hotel ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm"
                                        style="background:#ffebee;color:#c62828;border-radius:8px;padding:6px 12px;">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="7" class="text-center py-5">
                            <i class="ti ti-building-off" style="font-size:3rem;color:#cbd5e1;"></i>
                            <p class="text-muted mt-2 mb-0">Belum ada data hotel</p>
                            <a href="{{ route('hotels.create') }}" class="btn btn-sm btn-primary mt-2">Tambah Sekarang</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

{{-- Modal Upload --}}
<div class="modal fade" id="uploadModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content" style="border-radius:16px;border:none;">
            <div class="modal-header border-0 pb-0">
                <h5 class="modal-title fw-bold" style="color:#0a2463;">
                    <i class="ti ti-upload me-2"></i>Upload Data Hotel
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('hotels.import') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label fw-semibold">Pilih File Excel/CSV</label>
                        <input type="file" name="file" class="form-control" accept=".xlsx,.xls,.csv" required>
                        <div class="form-text">Format yang didukung: .xlsx, .xls, .csv</div>
                    </div>
                    <div class="alert alert-info py-2 px-3" style="border-radius:10px;font-size:0.85rem;">
                        <i class="ti ti-info-circle me-1"></i>
                        Pastikan kolom file sesuai: <strong>Nama, Harga, Bintang, Rating, Fasilitas, Alamat, Latitude, Longitude</strong>
                    </div>
                    <div class="d-flex gap-2 justify-content-end">
                        <button type="button" class="btn btn-light fw-semibold" data-bs-dismiss="modal" style="border-radius:10px;">
                            Batal
                        </button>
                        <button type="submit" class="btn fw-bold"
                            style="background:linear-gradient(135deg,#2e7d32,#66bb6a);color:#fff;border-radius:10px;">
                            <i class="ti ti-upload me-1"></i> Upload
                        </button>
                    </div>
                </form>
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
    const map = L.map('map-overview').setView([5.5483, 95.3238], 13);

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
                    <span style="color:#666;font-size:0.85rem;">⭐ ${hotel.star} Bintang &nbsp;|&nbsp; ${hotel.rating}/10</span><br>
                    <span style="color:#1565c0;font-size:0.85rem;">Rp ${parseInt(hotel.price_per_night).toLocaleString('id-ID')}/malam</span>
                </div>
            `);
        }
    });
</script>
@endpush