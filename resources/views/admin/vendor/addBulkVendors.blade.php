@extends('admin.layouts.app')
@section('title', 'Sellers-Admin')
@section('content')

<div class="m-4">
    <a href="{{ asset('public/downloadable/BulkVendorsFormat.xlsx') }}" class="btn btn-primary" download>Download Sample Format File</a>
</div>
<div class="card mt-4 m-4">
    <div class="card-header">
        <i class="fas fa-cube me-2"></i>
        Add Vendors
    </div>
    <form action="{{ route('admin.storeVendors.bulk') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="mb-3">
                <label>
                    Upload Excel File
                </label>
                <input class="form-control" type="file" name="excelFile"
                    value="{{ old('excelFile') }}" required />
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