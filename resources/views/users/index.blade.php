@extends('layouts.app')

@section('title', 'Manajemen User')
@section('page-title', 'Manajemen User')

@section('content')

<div class="card border-0 shadow-sm" style="border-radius:16px;">
    <div class="card-body p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <h5 class="fw-bold mb-1" style="color:#0a2463;">
                    <i class="ti ti-users me-2"></i>Daftar User
                </h5>
                <p class="text-muted mb-0" style="font-size:0.85rem;">Total {{ $users->count() }} user terdaftar</p>
            </div>
            <a href="{{ route('users.create') }}" class="btn fw-bold"
                style="background:linear-gradient(135deg,#0a2463,#1565c0);color:#fff;border-radius:10px;padding:10px 20px;">
                <i class="ti ti-plus me-1"></i> Tambah User
            </a>
        </div>

        <div class="table-responsive">
            <table class="table table-hover align-middle text-center" style="font-size:0.9rem;">
                <thead>
                    <tr style="background:#f8fafc;">
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">No</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Nama</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Email</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Terdaftar</th>
                        <th class="fw-bold text-muted text-center" style="font-size:0.8rem;text-transform:uppercase;letter-spacing:0.5px;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $i => $user)
                    <tr>
                        <td class="text-muted">{{ $i + 1 }}</td>
                        <td>
                            <div class="d-flex align-items-center justify-content-center gap-3">
                                <div style="width:36px;height:36px;background:linear-gradient(135deg,#0a2463,#1565c0);border-radius:50%;display:flex;align-items:center;justify-content:center;color:#fff;font-weight:800;font-size:0.9rem;flex-shrink:0;">
                                    {{ substr($user->name, 0, 1) }}
                                </div>
                                <span class="fw-semibold" style="color:#0a2463;">{{ $user->name }}</span>
                            </div>
                        </td>
                        <td class="text-muted">{{ $user->email }}</td>
                        <td>
                            <span class="badge px-3 py-2" style="background:#e3f2fd;color:#1565c0;border-radius:8px;font-size:0.8rem;">
                                {{ $user->created_at->format('d M Y') }}
                            </span>
                        </td>
                        <td>
                            <div class="d-flex gap-2 justify-content-center">
                                <a href="{{ route('users.edit', $user) }}"
                                    class="btn btn-sm"
                                    style="background:#e3f2fd;color:#1565c0;border-radius:8px;padding:6px 12px;">
                                    <i class="ti ti-edit"></i>
                                </a>
                                @if($user->id !== auth()->id())
                                <form action="{{ route('users.destroy', $user) }}" method="POST"
                                    onsubmit="return confirm('Yakin hapus user ini?')">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="btn btn-sm"
                                        style="background:#ffebee;color:#c62828;border-radius:8px;padding:6px 12px;">
                                        <i class="ti ti-trash"></i>
                                    </button>
                                </form>
                                @else
                                <span class="badge px-3 py-2" style="background:#fff3e0;color:#e65100;border-radius:8px;font-size:0.75rem;">
                                    Anda
                                </span>
                                @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center py-5">
                            <i class="ti ti-users-off" style="font-size:3rem;color:#cbd5e1;"></i>
                            <p class="text-muted mt-2 mb-0">Belum ada user</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection