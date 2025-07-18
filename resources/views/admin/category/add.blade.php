@extends('admin.layouts.app')
@section('title', 'Category-Admin')
@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h4>Add Category</h4>
        </div>
        <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name') }}" placeholder="Enter Category Name">
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="image" value="{{ old('image') }}"
                        placeholder="Enter Category Image">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Category</button>
            </div>
        </form>
    </div>
</div>
@endsection