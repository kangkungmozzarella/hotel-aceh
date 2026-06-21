@extends('layouts.app')

@section('title', 'Tambah Hotel')
@section('page-title', 'Tambah Hotel')

@section('content')

<div class="row g-4">
    {{-- Form --}}
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm" style="border-radius:16px;">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4" style="color:#0a2463;">
                    <i class="ti ti-building-plus me-2"></i>Informasi Hotel
                </h5>

                <form action="{{ route('hotels.store') }}" method="POST">
                    @csrf

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Hotel <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" placeholder="Contoh: Hermes Palace Hotel">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="row g-3 mb-3">
                        <div class="col-6">
                            <label class="form-label fw-semibold">Harga/Malam (Rp) <span class="text-danger">*</span></label>
                            <input type="number" name="price_per_night" class="form-control @error('price_per_night') is-invalid @enderror"
                                value="{{ old('price_per_night') }}" placeholder="500000">
                            @error('price_per_night')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold">Bintang <span class="text-danger">*</span></label>
                            <select name="star" class="form-select @error('star') is-invalid @enderror">
                                <option value="">Pilih bintang</option>
                                @for($s = 1; $s <= 5; $s++)
                                    <option value="{{ $s }}" {{ old('star') == $s ? 'selected' : '' }}>{{ $s }} Bintang</option>
                                @endfor
                            </select>
                            @error('star')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Rating (0-10) <span class="text-danger">*</span></label>
                        <input type="number" name="rating" step="0.1" min="0" max="10"
                            class="form-control @error('rating') is-invalid @enderror"
                            value="{{ old('rating') }}" placeholder="8.5">
                        @error('rating')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Fasilitas <span class="text-danger">*</span></label>
                        <input type="text" name="facilities" class="form-control @error('facilities') is-invalid @enderror"
                            value="{{ old('facilities') }}" placeholder="AC, Restoran, WiFi, Parkir, ...">
                        <div class="form-text">Pisahkan dengan koma</div>
                        @error('facilities')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Alamat</label>
                        <input type="text" name="address" class="form-control"
                            value="{{ old('address') }}" placeholder="Jl. ...">
                    </div>

                    {{-- Longlat dari klik peta --}}
                    <div class="row g-3 mb-4">
                        <div class="col-6">
                            <label class="form-label fw-semibold">Latitude</label>
                            <input type="text" name="latitude" id="latitude" class="form-control"
                                value="{{ old('latitude') }}" placeholder="Klik peta →" readonly
                                style="background:#f8fafc;">
                        </div>
                        <div class="col-6">
                            <label class="form-label fw-semibold">Longitude</label>
                            <input type="text" name="longitude" id="longitude" class="form-control"
                                value="{{ old('longitude') }}" placeholder="Klik peta →" readonly
                                style="background:#f8fafc;">
                        </div>
                        <div class="col-12">
                            <div class="alert alert-info py-2 px-3 mb-0" style="border-radius:10px;font-size:0.85rem;">
                                <i class="ti ti-info-circle me-1"></i>
                                Klik lokasi hotel di peta sebelah kanan untuk mengisi latitude & longitude secara otomatis.
                            </div>
                        </div>
                    </div>

                    {{-- Nilai Kriteria --}}
                    @if($criterias->count() > 0)
                    <div class="mb-4">
                        <h6 class="fw-bold mb-3" style="color:#0a2463;">
                            <i class="ti ti-list-check me-2"></i>Nilai Kriteria
                        </h6>
                        <div class="row g-3">
                            @foreach($criterias as $criteria)
                            <div class="col-6">
                                <label class="form-label fw-semibold" style="font-size:0.85rem;">
                                    {{ $criteria->name }}
                                    <span class="badge ms-1 {{ $criteria->type == 'benefit' ? 'bg-green-lt text-green' : 'bg-red-lt text-red' }}"
                                        style="font-size:0.7rem;">{{ $criteria->type }}</span>
                                </label>
                                <input type="number" step="0.01" name="criteria_{{ $criteria->id }}"
                                    class="form-control" placeholder="0" value="{{ old('criteria_'.$criteria->id) }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn fw-bold px-4"
                            style="background:linear-gradient(135deg,#0a2463,#1565c0);color:#fff;border-radius:10px;">
                            <i class="ti ti-device-floppy me-1"></i> Simpan
                        </button>
                        <a href="{{ route('hotels.index') }}" class="btn btn-light fw-semibold px-4"
                            style="border-radius:10px;">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Map Picker --}}
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm" style="border-radius:16px;">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-2" style="color:#0a2463;">
                    <i class="ti ti-map-pin me-2"></i>Pilih Lokasi di Peta
                </h5>
                <p class="text-muted mb-3" style="font-size:0.85rem;">Klik pada peta untuk menandai lokasi hotel</p>

                {{-- Search box --}}
                <div class="input-group mb-3">
                    <input type="text" id="search-input" class="form-control" placeholder="Cari lokasi...">
                    <button class="btn btn-primary" type="button" id="search-btn">
                        <i class="ti ti-search"></i>
                    </button>
                </div>

                <div id="map-picker" style="height:450px;border-radius:12px;overflow:hidden;"></div>

                <div id="selected-location" class="mt-3 d-none">
                    <div class="alert alert-success py-2 px-3 mb-0" style="border-radius:10px;font-size:0.85rem;">
                        <i class="ti ti-map-pin me-1"></i>
                        Lokasi dipilih: <strong id="selected-coords"></strong>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"/>
<style>
    .form-control, .form-select {
        border: 2px solid #e5e7eb;
        border-radius: 10px;
        padding: 10px 14px;
        transition: border-color 0.2s;
    }
    .form-control:focus, .form-select:focus {
        border-color: #1565c0;
        box-shadow: 0 0 0 3px rgba(21,101,192,0.1);
    }
</style>
@endpush

@push('scripts')
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script>
    // Init map di Banda Aceh
    const map = L.map('map-picker').setView([5.5483, 95.3238], 14);

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    let marker = null;

    // Klik peta → set longlat
    map.on('click', function(e) {
        const lat = e.latlng.lat.toFixed(7);
        const lng = e.latlng.lng.toFixed(7);

        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;

        document.getElementById('selected-location').classList.remove('d-none');
        document.getElementById('selected-coords').textContent = lat + ', ' + lng;

        if (marker) {
            marker.setLatLng(e.latlng);
        } else {
            marker = L.marker(e.latlng, { draggable: true }).addTo(map);

            // Drag marker → update longlat
            marker.on('dragend', function(ev) {
                const pos = ev.target.getLatLng();
                const la = pos.lat.toFixed(7);
                const lo = pos.lng.toFixed(7);
                document.getElementById('latitude').value = la;
                document.getElementById('longitude').value = lo;
                document.getElementById('selected-coords').textContent = la + ', ' + lo;
            });
        }
    });

    // Search lokasi via Nominatim OSM
    document.getElementById('search-btn').addEventListener('click', function() {
        const query = document.getElementById('search-input').value;
        if (!query) return;

        fetch(`https://nominatim.openstreetmap.org/search?format=json&q=${encodeURIComponent(query)}&limit=1`)
            .then(res => res.json())
            .then(data => {
                if (data.length > 0) {
                    const lat = parseFloat(data[0].lat);
                    const lng = parseFloat(data[0].lon);
                    map.setView([lat, lng], 17);
                } else {
                    alert('Lokasi tidak ditemukan.');
                }
            });
    });

    // Enter untuk search
    document.getElementById('search-input').addEventListener('keypress', function(e) {
        if (e.key === 'Enter') document.getElementById('search-btn').click();
    });
</script>
@endpush