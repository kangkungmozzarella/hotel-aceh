@extends('layouts.app')

@section('title', 'Edit Kriteria')
@section('page-title', 'Edit Kriteria')

@section('content')

<div class="row justify-content-center">
    <div class="col-lg-6">
        <div class="card border-0 shadow-sm" style="border-radius:16px;">
            <div class="card-body p-4">
                <h5 class="fw-bold mb-4" style="color:#0a2463;">
                    <i class="ti ti-list-details me-2"></i>Edit Kriteria
                </h5>

                <form action="{{ route('criterias.update', $criteria) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Nama Kriteria <span class="text-danger">*</span></label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $criteria->name) }}">
                        @error('name')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-3">
                        <label class="form-label fw-semibold">Tipe <span class="text-danger">*</span></label>
                        <select name="type" class="form-select @error('type') is-invalid @enderror">
                            <option value="benefit" {{ old('type', $criteria->type) == 'benefit' ? 'selected' : '' }}>Benefit (semakin tinggi semakin baik)</option>
                            <option value="cost" {{ old('type', $criteria->type) == 'cost' ? 'selected' : '' }}>Cost (semakin rendah semakin baik)</option>
                        </select>
                        @error('type')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="mb-4">
                        <label class="form-label fw-semibold">Bobot <span class="text-danger">*</span></label>
                        <input type="number" name="weight" step="0.01" min="0" max="1"
                            class="form-control @error('weight') is-invalid @enderror"
                            value="{{ old('weight', $criteria->weight) }}">
                        <div class="form-text">Total bobot semua kriteria harus = 1</div>
                        @error('weight')<div class="invalid-feedback">{{ $message }}</div>@enderror
                    </div>

                    <div class="d-flex gap-2">
                        <button type="submit" class="btn fw-bold px-4"
                            style="background:linear-gradient(135deg,#0a2463,#1565c0);color:#fff;border-radius:10px;">
                            <i class="ti ti-device-floppy me-1"></i> Update
                        </button>
                        <a href="{{ route('criterias.index') }}" class="btn btn-light fw-semibold px-4"
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