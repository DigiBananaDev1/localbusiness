@extends('vendor.layouts.app')
@section('title')
{{ $vendor->categories == "Service" ? "Service" : ($vendor->categories == "Manufacturer" ? "Product" : "Product" ) }}-Vendor
@endsection
@section('content')

<h1 class="mt-4">{{ $vendor->categories }}</h1>
<ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">{{ $vendor->categories }}</li>
</ol>
<a href="{{ route('vendor.viewServices',$vendor->id) }}">Back</a>
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
        Add {{ $vendor->categories == "Service" ? "Service" : ($vendor->categories == "Manufacturer" ? "Product" : "Product" ) }}
    </div>
    <form action="{{ route('vendor.updateServices', ['service_id' =>$service->id]) }}" method="post" enctype="multipart/form-data">
        @php
       // dd($vendor->categories);
        @endphp
        <div class="card-body">
            @csrf
            <div class="form-group row">
                <div class="col-md-6 mb-3">
                    <label>
                    {{ $vendor->categories == "Service" ? "Service" : ($vendor->categories == "Manufacturer" ? "Product" : "Product" ) }} Name:
                    </label>
                    <input class="form-control" type="text" name="name"
                        value="{{ old('name', $service->name) }}" required />
                    @error('service_name')
                    <small class="alert alert-danger">{{ $message }}</>
                        @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>Description:</label>
                    <input class="form-control" type="text" name="description"
                        value="{{ old('description', $service->description) }}" required>
                    @error('description')
                    <small class="alert alert-danger">{{ $message }}</>
                        @enderror
                </div>
                <div class="col-md-6 mb-3">
                    <label>{{ $vendor->categories == "Service" ? "Service" : ($vendor->categories == "Manufacturer" ? "Product" : "Product" ) }} Image:</label>
                    <input class="form-control" type="file" name="image" id="image"
                        value="{{ old('image') }}">
                        @error('image')
                        <small class="alert alert-danger">{{ $message }}</>
                        @enderror
                        <a href="{{ asset('public/storage/'.$service->image) }}" target="_blank">view image</a>
                </div>
                <div class="col-md-6 mb-3">
                    <label>{{ $vendor->categories == "Service" ? "Service" : ($vendor->categories == "Manufacturer" ? "Product" : "Product" ) }} Price:</label>
                    <input class="form-control" type="number" name="mrp" id="mrp"
                        value="{{ old('mrp', $service->mrp) }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="search_tags">Search Tags (Max 10 tags, comma-separated):</label>
                    <textarea class="form-control" rows="1" id="search_tags"
                        name="search_tags">{{ old('search_tags', $service->search_tags) }}</textarea>
                    <small class="text-danger" id="error-message"></small>
                </div>
            </div>
        </div>
        <div class="card-footer">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
</div>
<script>
    document.getElementById("searchTerms").addEventListener("change", function(event) {
        let inputField = this;
        let errorMessage = document.getElementById("error-message");

        // Get the text, split by comma, trim spaces, remove empty values
        let tags = inputField.value.split(",")
            .map(tag => tag.trim()) // Trim spaces
            .filter(tag => tag !== ""); // Remove empty values

        // Enforce max 10 tags
        if (tags.length > 10) {
            errorMessage.textContent = "You can only enter up to 10 tags.";
            inputField.value = tags.slice(0, 10).join(", "); // Keep only first 10
            console.log(tags);
        } else {
            errorMessage.textContent = "";
        }
    });
</script>
@endsection