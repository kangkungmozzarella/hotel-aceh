@extends('layouts.app')

@section('title', 'Data Alternatif')
@section('page-title', 'Data Alternatif')

@section('content')

    <div class="card border-0 shadow-sm" style="border-radius:16px;">
        <div class="card-body p-4">
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div>
                    <h5 class="fw-bold mb-1" style="color:#0a2463;">
                        <i class="ti ti-table me-2"></i>Data Alternatif
                    </h5>
                    <p class="text-muted mb-0" style="font-size:0.85rem;">Nilai setiap hotel berdasarkan kriteria</p>
                </div>
                <a href="{{ route('alternatives.create') }}" class="btn fw-bold"
                    style="background:linear-gradient(135deg,#0a2463,#1565c0);color:#fff;border-radius:10px;padding:10px 20px;">
                    <i class="ti ti-plus me-1"></i> Tambah Alternatif
                </a>
            </div>

            <div class="table-responsive">
                <table class="table table-hover align-middle text-center" style="font-size:0.9rem;">
                    <thead>
                        <tr style="background:#f8fafc;">
                            <th class="fw-bold text-muted text-center"
                                style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">No</th>
                            <th class="fw-bold text-muted text-center"
                                style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Nama Hotel</th>
                            @foreach ($criterias as $criteria)
                                <th class="fw-bold text-muted text-center"
                                    style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">
                                    {{ $criteria->name }}
                                    <span class="d-block"
                                        style="font-size:0.7rem;color:{{ $criteria->type == 'benefit' ? '#2e7d32' : '#c62828' }};">
                                        ({{ $criteria->type }})
                                    </span>
                                </th>
                            @endforeach
                            <th class="fw-bold text-muted text-center"
                                style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($hotels as $i => $hotel)
                            @php $hotelAlts = $alternatives->get($hotel->id, collect()); @endphp
                            <tr>
                                <td class="text-muted">{{ $i + 1 }}</td>
                                <td class="fw-semibold text-start" style="color:#0a2463;">{{ $hotel->name }}</td>
                                @foreach ($criterias as $criteria)
                                    @php $alt = $hotelAlts->firstWhere('criteria_id', $criteria->id); @endphp
                                    <td>
                                        @if ($alt)
                                            <span class="badge px-3 py-2 fw-bold"
                                                style="background:#e3f2fd;color:#1565c0;border-radius:8px;">
                                                @if ($criteria->name == 'Harga')
                                                    Rp {{ number_format($alt->value, 0, ',', '.') }}
                                                @else
                                                    {{ $alt->value }}
                                                @endif
                                            </span>
                                        @else
                                            <span class="text-muted" style="font-size:0.8rem;">-</span>
                                        @endif
                                    </td>
                                @endforeach
                                <td>
                                    <div class="d-flex gap-2 justify-content-center">
                                        <a href="{{ route('alternatives.edit', $hotel->id) }}" class="btn btn-sm"
                                            style="background:#e3f2fd;color:#1565c0;border-radius:8px;padding:6px 12px;">
                                            <i class="ti ti-edit"></i>
                                        </a>
                                        <form action="{{ route('alternatives.destroy', $hotel->id) }}" method="POST"
                                            onsubmit="return confirm('Yakin hapus data alternatif hotel ini?')">
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
                                <td colspan="{{ $criterias->count() + 3 }}" class="text-center py-5">
                                    <i class="ti ti-table-off" style="font-size:3rem;color:#cbd5e1;"></i>
                                    <p class="text-muted mt-2 mb-0">Belum ada data alternatif</p>
                                    <a href="{{ route('alternatives.create') }}" class="btn btn-sm btn-primary mt-2">Tambah
                                        Sekarang</a>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
