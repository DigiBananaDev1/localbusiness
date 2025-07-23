@extends('vendor.layouts.app')
@section('title')
Service / Products-Vendor
@endsection
@section('content')

<h1 class="my-4">{{ $vendor->category->name }}</h1>
<div class="my-3">
    <a href="{{ asset('public/downloadable/SampleFormat.xlsx') }}" class="btn btn-primary" download>Download Sample Format</a>
</div>
@if ($errors->any())
<div class="toast align-items-center text-bg-danger border-0" id="error-toast" role="alert" aria-live="assertive"
    aria-atomic="true">
    <div class="d-flex">
        <div class="toast-body">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
            aria-label="Close"></button>
    </div>
</div>
@endif
<div class="card mb-4">
    <div class="card-header">
        <i class="fas fa-cube me-2"></i>
        Add Services/Products in Bulk
    </div>
    <form action="{{ route('vendor.saveBulkServices', $vendor->id) }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="mb-3">
                <label>
                    Upload Excel File
                </label>
                <input class="form-control" type="file" name="excelFile"
                    value="{{ old('excelFile') }}" required />
                <small class="text-muted">Allowed format .xlsx .csv</small>
                @error('excelFile')
                <small class="alert alert-danger">{{ $message }}</small>
                @enderror
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>
</div>
@endsection