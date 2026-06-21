@extends('layouts.app')

@section('title', 'Tentang')
@section('page-title', 'Tentang Sistem')

@section('content')

{{-- Hero Card --}}
<div class="card border-0 shadow-sm mb-4" style="border-radius:16px;background:linear-gradient(135deg,#0a2463,#1565c0,#0097a7);overflow:hidden;">
    <div class="card-body p-5 text-white">
        <div class="row align-items-center">
            <div class="col-lg-8">
                <div class="badge mb-3 px-3 py-2" style="background:rgba(255,255,255,0.15);color:#64ffda;border-radius:50px;font-size:0.8rem;letter-spacing:1px;">
                    SISTEM INFORMASI GEOGRAFIS
                </div>
                <h2 class="fw-black mb-3" style="font-size:1.8rem;line-height:1.3;">
                    Rekomendasi dan Penentuan Rute Terpendek Penginapan di Banda Aceh
                </h2>
                <p style="color:rgba(255,255,255,0.8);line-height:1.8;">
                    Sistem ini dirancang untuk membantu wisatawan dalam menemukan penginapan terbaik di Banda Aceh 
                    menggunakan metode <strong style="color:#64ffda;">Multi Attribute Utility Theory (MAUT)</strong> 
                    dan menentukan rute terpendek menggunakan <strong style="color:#64ffda;">Algoritma A*</strong> 
                    berbasis Sistem Informasi Geografis.
                </p>
            </div>
            <div class="col-lg-4 d-none d-lg-flex justify-content-center">
                <i class="ti ti-map-2" style="font-size:8rem;color:rgba(100,255,218,0.3);"></i>
            </div>
        </div>
    </div>
</div>

<div class="row g-4 mb-4">
    {{-- Metode MAUT --}}
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100" style="border-radius:16px;">
            <div class="card-body p-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div style="width:48px;height:48px;background:linear-gradient(135deg,#0a2463,#1565c0);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                        <i class="ti ti-trophy text-white" style="font-size:1.4rem;"></i>
                    </div>
                    <h5 class="fw-bold mb-0" style="color:#0a2463;">Metode MAUT</h5>
                </div>
                <p class="text-muted" style="line-height:1.8;font-size:0.9rem;">
                    <strong>Multi Attribute Utility Theory (MAUT)</strong> adalah metode pengambilan keputusan 
                    multi-kriteria yang mengubah berbagai kepentingan ke dalam nilai numerik dengan skala 0-1. 
                    Metode ini memungkinkan perbandingan langsung dari berbagai ukuran yang beragam.
                </p>
                <div class="mt-3">
                    <div class="fw-semibold mb-2" style="color:#0a2463;font-size:0.85rem;">Kriteria Penilaian:</div>
                    <div class="d-flex flex-wrap gap-2">
                        <span class="badge px-3 py-2" style="background:#e3f2fd;color:#1565c0;border-radius:8px;font-size:0.8rem;">Harga</span>
                        <span class="badge px-3 py-2" style="background:#e3f2fd;color:#1565c0;border-radius:8px;font-size:0.8rem;">Fasilitas</span>
                        <span class="badge px-3 py-2" style="background:#e3f2fd;color:#1565c0;border-radius:8px;font-size:0.8rem;">Rating</span>
                        <span class="badge px-3 py-2" style="background:#e3f2fd;color:#1565c0;border-radius:8px;font-size:0.8rem;">Bintang</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Algoritma A* --}}
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm h-100" style="border-radius:16px;">
            <div class="card-body p-4">
                <div class="d-flex align-items-center gap-3 mb-3">
                    <div style="width:48px;height:48px;background:linear-gradient(135deg,#0097a7,#00bcd4);border-radius:12px;display:flex;align-items:center;justify-content:center;">
                        <i class="ti ti-route text-white" style="font-size:1.4rem;"></i>
                    </div>
                    <h5 class="fw-bold mb-0" style="color:#0a2463;">Algoritma A*</h5>
                </div>
                <p class="text-muted" style="line-height:1.8;font-size:0.9rem;">
                    <strong>Algoritma A* (A-Star)</strong> adalah algoritma pencarian jalur yang dikembangkan 
                    pada tahun 1968. Algoritma ini menemukan jalur terpendek dari titik awal ke tujuan 
                    dengan menggabungkan keunggulan Uniform-Cost Search dan Greedy Best-First Search 
                    menggunakan fungsi heuristik.
                </p>
                <div class="mt-3">
                    <div class="fw-semibold mb-2" style="color:#0a2463;font-size:0.85rem;">Fungsi Evaluasi:</div>
                    <div class="p-3" style="background:#f0f9ff;border-radius:10px;font-family:monospace;font-size:0.9rem;color:#0097a7;">
                        f(n) = g(n) + h(n)
                    </div>
                    <div class="mt-2 text-muted" style="font-size:0.8rem;">
                        g(n) = biaya dari node awal ke node n &nbsp;|&nbsp; h(n) = estimasi biaya ke tujuan
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Cara Kerja --}}
<div class="card border-0 shadow-sm mb-4" style="border-radius:16px;">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4" style="color:#0a2463;">
            <i class="ti ti-settings me-2"></i>Cara Kerja Sistem
        </h5>
        <div class="row g-3">
            <div class="col-md-3">
                <div class="text-center p-3" style="background:#f8fafc;border-radius:12px;">
                    <div style="width:48px;height:48px;background:linear-gradient(135deg,#0a2463,#1565c0);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;color:#fff;font-weight:800;">1</div>
                    <h6 class="fw-bold" style="color:#0a2463;">Input Data</h6>
                    <p class="text-muted mb-0" style="font-size:0.82rem;">Admin input data hotel dan kriteria penilaian</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center p-3" style="background:#f8fafc;border-radius:12px;">
                    <div style="width:48px;height:48px;background:linear-gradient(135deg,#0097a7,#00bcd4);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;color:#fff;font-weight:800;">2</div>
                    <h6 class="fw-bold" style="color:#0a2463;">Bobot Kriteria</h6>
                    <p class="text-muted mb-0" style="font-size:0.82rem;">Tentukan bobot untuk setiap kriteria penilaian</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center p-3" style="background:#f8fafc;border-radius:12px;">
                    <div style="width:48px;height:48px;background:linear-gradient(135deg,#2e7d32,#66bb6a);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;color:#fff;font-weight:800;">3</div>
                    <h6 class="fw-bold" style="color:#0a2463;">Hitung MAUT</h6>
                    <p class="text-muted mb-0" style="font-size:0.82rem;">Sistem hitung nilai utilitas dan ranking hotel</p>
                </div>
            </div>
            <div class="col-md-3">
                <div class="text-center p-3" style="background:#f8fafc;border-radius:12px;">
                    <div style="width:48px;height:48px;background:linear-gradient(135deg,#e65100,#ffa726);border-radius:50%;display:flex;align-items:center;justify-content:center;margin:0 auto 1rem;color:#fff;font-weight:800;">4</div>
                    <h6 class="fw-bold" style="color:#0a2463;">Rute A*</h6>
                    <p class="text-muted mb-0" style="font-size:0.82rem;">Tampilkan rute terpendek menuju hotel terpilih</p>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Info Penelitian --}}
<div class="card border-0 shadow-sm" style="border-radius:16px;">
    <div class="card-body p-4">
        <h5 class="fw-bold mb-4" style="color:#0a2463;">
            <i class="ti ti-school me-2"></i>Informasi Penelitian
        </h5>
        <div class="row g-3">
            <div class="col-md-6">
                <table class="table table-borderless mb-0" style="font-size:0.9rem;">
                    <tr>
                        <td class="text-muted fw-semibold" style="width:40%;">Judul</td>
                        <td>: Sistem Informasi Geografis untuk Rekomendasi dan Penentuan Rute Terpendek Penginapan di Banda Aceh</td>
                    </tr>
                    <tr>
                        <td class="text-muted fw-semibold">Peneliti</td>
                        <td>: Ivan Ghazi</td>
                    </tr>
                    <tr>
                        <td class="text-muted fw-semibold">NIM</td>
                        <td>: 200170241</td>
                    </tr>
                </table>
            </div>
            <div class="col-md-6">
                <table class="table table-borderless mb-0" style="font-size:0.9rem;">
                    <tr>
                        <td class="text-muted fw-semibold" style="width:40%;">Program Studi</td>
                        <td>: Teknik Informatika</td>
                    </tr>
                    <tr>
                        <td class="text-muted fw-semibold">Fakultas</td>
                        <td>: Fakultas Teknik</td>
                    </tr>
                    <tr>
                        <td class="text-muted fw-semibold">Universitas</td>
                        <td>: Universitas Malikussaleh</td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection