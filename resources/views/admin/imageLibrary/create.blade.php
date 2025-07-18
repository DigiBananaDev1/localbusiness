@extends('admin.layouts.app')
@section('title', 'Image')
@section('content')
<div class="card m-4">
    <div class="card-header">
        <h1>Upload images in the Library</h1>
    </div>
    <div class="card-body">
        <form action="{{ route('admin.image.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="image" class="form-label"><b>Upload Images</b></label>
                <input type="file" name="image[]" id="image" class="form-control" multiple/>
                <small class="form-text text-muted">You may upload one or multiple images at a time.</small>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>
</div>
@endsection