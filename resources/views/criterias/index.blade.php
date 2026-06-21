@extends('layouts.app')

@section('title', 'Data Kriteria')
@section('page-title', 'Data Kriteria')

@section('content')

<div class="card border-0 shadow-sm" style="border-radius:16px;">
    <div class="card-body p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h5 class="fw-bold mb-1" style="color:#0a2463;">
                    <i class="ti ti-list-check me-2"></i>Daftar Kriteria
                </h5>
                <p class="text-muted mb-0" style="font-size:0.85rem;">Total {{ $criterias->count() }} kriteria terdaftar</p>
            </div>
            <a href="{{ route('criterias.create') }}" class="btn fw-bold"
                style="background:linear-gradient(135deg,#0a2463,#1565c0);color:#fff;border-radius:10px;padding:10px 20px;">
                <i class="ti ti-plus me-1"></i> Tambah Kriteria
            </a>
        </div>

        {{-- Info total bobot --}}
        @php $totalBobot = $criterias->sum('weight'); @endphp
        <div class="alert py-2 px-3 mb-4 {{ abs($totalBobot - 1) < 0.001 ? 'alert-success' : 'alert-warning' }}" style="border-radius:10px;font-size:0.85rem;">
            <i class="ti ti-{{ abs($totalBobot - 1) < 0.001 ? 'circle-check' : 'alert-triangle' }} me-1"></i>
            Total bobot saat ini: <strong>{{ number_format($totalBobot, 2) }}</strong>
            {{ abs($totalBobot - 1) < 0.001 ? '✓ Sudah valid (total = 1)' : '⚠ Total bobot harus = 1' }}
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle text-center" style="font-size:0.9rem;">
                <thead>
                    <tr style="background:#f8fafc;">
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">No</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Nama Kriteria</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Tipe</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Bobot</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($criterias as $i => $criteria)
                    <tr>
                        <td class="text-muted">{{ $i + 1 }}</td>
                        <td class="fw-semibold" style="color:#0a2463;">{{ $criteria->name }}</td>
                        <td>
                            <span class="badge px-3 py-2 fw-bold"
                                style="background:{{ $criteria->type == 'benefit' ? '#e8f5e9' : '#ffebee' }};color:{{ $criteria->type == 'benefit' ? '#2e7d32' : '#c62828' }};border-radius:8px;">
                                {{ ucfirst($criteria->type) }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center gap-2">
                                <div style="width:80px;height:8px;background:#e5e7eb;border-radius:50px;overflow:hidden;">
                                    <div style="width:{{ $criteria->weight * 100 }}%;height:100%;background:linear-gradient(135deg,#0a2463,#1565c0);border-radius:50px;"></div>
                                </div>
                                <span class="fw-semibold" style="color:#0a2463;">{{ number_format($criteria->weight, 2) }}</span>
                            </div>
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('criterias.edit', $criteria) }}"
                                    class="btn btn-sm"
                                    style="background:#e3f2fd;color:#1565c0;border-radius:8px;padding:6px 12px;">
                                    <i class="ti ti-edit"></i>
                                </a>
                                <form action="{{ route('criterias.destroy', $criteria) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus kriteria ini?')">
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
                        <td colspan="5" class="text-center py-5">
                            <i class="ti ti-list-off" style="font-size:3rem;color:#cbd5e1;"></i>
                            <p class="text-muted mt-2 mb-0">Belum ada data kriteria</p>
                            <a href="{{ route('criterias.create') }}" class="btn btn-sm btn-primary mt-2">Tambah Sekarang</a>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection