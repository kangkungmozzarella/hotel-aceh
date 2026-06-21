@extends('layouts.app')

@section('title', 'Edit Alternatif')
@section('page-title', 'Edit Alternatif')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-7">
        <div class="card border-0 shadow-sm" style="border-radius:16px;">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4" style="color:#0a2463;">
                    <i class="ti ti-table-options me-2"></i>Edit Data Alternatif
                </h5>

                <div class="alert py-3 px-4 mb-4" style="background:#e3f2fd;border-radius:12px;border:none;">
                    <div class="fw-bold" style="color:#0a2463;">
                        <i class="ti ti-building me-2"></i>{{ $hotel->name }}
                    </div>
                    <div class="text-muted" style="font-size:0.85rem;">{{ $hotel->address }}</div>
                </div>

                <form action="{{ route('alternatives.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="hotel_id" value="{{ $hotel->id }}">

                    @if($criterias->count() > 0)
                    <div class="mb-4">
                        <h6 class="fw-bold mb-3" style="color:#0a2463;">
                            <i class="ti ti-list-check me-2"></i>Nilai Per Kriteria
                        </h6>
                        <div class="row g-3">
                            @foreach($criterias as $criteria)
                            @php $val = isset($values[$criteria->id]) ? $values[$criteria->id]->value : ''; @endphp
                            <div class="col-6">
                                <label class="form-label fw-semibold" style="font-size:0.85rem;">
                                    {{ $criteria->name }}
                                    <span class="badge ms-1 px-2 py-1"
                                        style="background:{{ $criteria->type == 'benefit' ? '#e8f5e9' : '#ffebee' }};color:{{ $criteria->type == 'benefit' ? '#2e7d32' : '#c62828' }};border-radius:6px;font-size:0.7rem;">
                                        {{ $criteria->type }}
                                    </span>
                                </label>
                                <input type="number" step="0.01" name="values[{{ $criteria->id }}]"
                                    class="form-control" placeholder="0"
                                    value="{{ old('values.'.$criteria->id, $val) }}">
                            </div>
                            @endforeach
                        </div>
                    </div>
                    @endif

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn fw-bold px-4"
                            style="background:linear-gradient(135deg,#0a2463,#1565c0);color:#fff;border-radius:10px;">
                            <i class="ti ti-device-floppy me-1"></i> Update
                        </button>
                        <a href="{{ route('alternatives.index') }}" class="btn btn-light fw-semibold px-4"
                            style="border-radius:10px;">
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('styles')
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