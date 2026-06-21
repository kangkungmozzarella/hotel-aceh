@extends('layouts.app')

@section('title', 'Matriks Keputusan')
@section('page-title', 'Matriks Keputusan')

@section('content')

{{-- Matriks Keputusan --}}
<div class="card border-0 shadow-sm mb-4" style="border-radius:16px;">
    <div class="card-body p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h5 class="fw-bold mb-1" style="color:#0a2463;">
                    <i class="ti ti-layout-grid me-2"></i>Matriks Keputusan
                </h5>
                <p class="text-muted mb-0" style="font-size:0.85rem;">Tabel nilai setiap alternatif (hotel) berdasarkan kriteria penilaian</p>
            </div>
            <button id="btn-normalisasi" class="btn fw-bold"
                style="background:linear-gradient(135deg,#2e7d32,#66bb6a);color:#fff;border-radius:10px;padding:10px 20px;">
                <i class="ti ti-calculator me-1"></i> Normalisasi Matriks
            </button>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-bordered align-middle text-center" style="font-size:0.9rem;">
                <thead>
                    <tr style="background:#0a2463;">
                        <th class="text-white text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;vertical-align:middle;">No</th>
                        <th class="text-white text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;vertical-align:middle;">Alternatif (Hotel)</th>
                        @foreach($criterias as $criteria)
                        <th class="text-white text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;vertical-align:middle;">
                            {{ $criteria->name }}<br>
                            <span style="font-size:0.7rem;color:{{ $criteria->type == 'benefit' ? '#64ffda' : '#ff8a80' }};">
                                ({{ $criteria->type }}, w={{ $criteria->weight }})
                            </span>
                        </th>
                        @endforeach
                    </tr>
                </thead>
                <tbody>
                    @forelse($hotels as $i => $hotel)
                    @php $hotelAlts = $alternatives->get($hotel->id, collect()); @endphp
                    <tr>
                        <td class="text-muted fw-semibold">A{{ $i + 1 }}</td>
                        <td class="text-start fw-semibold" style="color:#0a2463;">{{ $hotel->name }}</td>
                        @foreach($criterias as $criteria)
                        @php $alt = $hotelAlts->firstWhere('criteria_id', $criteria->id); @endphp
                        <td>
                            @if($alt)
                                @if($criteria->name == 'Harga')
                                    Rp {{ number_format($alt->value, 0, ',', '.') }}
                                @else
                                    {{ $alt->value }}
                                @endif
                            @else
                                <span class="text-danger">-</span>
                            @endif
                        </td>
                        @endforeach
                    </tr>
                    @empty
                    <tr>
                        <td colspan="{{ $criterias->count() + 2 }}" class="text-center py-5">
                            <i class="ti ti-table-off" style="font-size:3rem;color:#cbd5e1;"></i>
                            <p class="text-muted mt-2 mb-0">Belum ada data</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
                <tfoot>
                    <tr style="background:#f8fafc;">
                        <td colspan="2" class="fw-bold text-center" style="color:#0a2463;">Bobot (W)</td>
                        @foreach($criterias as $criteria)
                        <td class="fw-bold" style="color:#0a2463;">{{ $criteria->weight }}</td>
                        @endforeach
                    </tr>
                </tfoot>
            </table>
        </div>
    </div>
</div>

{{-- Hasil Normalisasi --}}
<div id="normalisasi-section" class="d-none">
    <div class="card border-0 shadow-sm" style="border-radius:16px;">
        <div class="card-body p-4">
            <div class="mb-4">
                <h5 class="fw-bold mb-1" style="color:#0a2463;">
                    <i class="ti ti-math-function me-2"></i>Normalisasi Matriks Keputusan
                </h5>
                <p class="text-muted mb-0" style="font-size:0.85rem;">
                    Rumus: U(x) = (x - x<sub>min</sub>) / (x<sub>max</sub> - x<sub>min</sub>) untuk benefit &nbsp;|&nbsp;
                    U(x) = (x<sub>max</sub> - x) / (x<sub>max</sub> - x<sub>min</sub>) untuk cost
                </p>
            </div>

            <div id="loading-normalisasi" class="text-center py-4">
                <div class="spinner-border text-primary" role="status"></div>
                <p class="text-muted mt-2">Menghitung normalisasi...</p>
            </div>

            <div id="tabel-normalisasi" class="table-responsive d-none"></div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
document.getElementById('btn-normalisasi').addEventListener('click', function() {
    const section = document.getElementById('normalisasi-section');
    const loading = document.getElementById('loading-normalisasi');
    const tabel = document.getElementById('tabel-normalisasi');

    section.classList.remove('d-none');
    loading.classList.remove('d-none');
    tabel.classList.add('d-none');

    // Scroll ke section normalisasi
    section.scrollIntoView({ behavior: 'smooth', block: 'start' });

    fetch('{{ route("matriks.normalisasi") }}')
        .then(res => res.json())
        .then(data => {
            loading.classList.add('d-none');
            tabel.classList.remove('d-none');

            let html = `
                <table class="table table-hover table-bordered align-middle text-center" style="font-size:0.9rem;">
                    <thead>
                        <tr style="background:#0a2463;">
                            <th class="text-white text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;vertical-align:middle;">No</th>
                            <th class="text-white text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;vertical-align:middle;">Alternatif (Hotel)</th>
            `;

            data.criterias.forEach(c => {
                html += `<th class="text-white text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;vertical-align:middle;">
                    ${c.name}<br>
                    <span style="font-size:0.7rem;color:${c.type == 'benefit' ? '#64ffda' : '#ff8a80'};">(${c.type})</span>
                </th>`;
            });

            html += `</tr></thead><tbody>`;

            data.hotels.forEach((hotel, i) => {
                html += `<tr>
                    <td class="text-muted fw-semibold">A${i + 1}</td>
                    <td class="text-start fw-semibold" style="color:#0a2463;">${hotel.name}</td>
                `;
                data.criterias.forEach(c => {
                    const val = data.normalisasi[hotel.id] && data.normalisasi[hotel.id][c.id] !== undefined
                        ? data.normalisasi[hotel.id][c.id]
                        : '-';
                    html += `<td>
                        <span class="badge px-3 py-2 fw-bold" style="background:#e8f5e9;color:#2e7d32;border-radius:8px;">
                            ${parseFloat(val).toFixed(4)}
                        </span>
                    </td>`;
                });
                html += `</tr>`;
            });

            html += `</tbody></table>`;
            tabel.innerHTML = html;
        })
        .catch(err => {
            loading.classList.add('d-none');
            tabel.classList.remove('d-none');
            tabel.innerHTML = '<div class="alert alert-danger">Gagal memuat data normalisasi.</div>';
        });
});
</script>
@endpush