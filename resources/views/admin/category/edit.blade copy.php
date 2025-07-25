@extends('admin.layouts.app')
@section('title', 'Category-Admin')
@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h4>Edit Category</h4>
        </div>
        <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control" id="name" value="{{ old('name', $category->name) }}"
                    placeholder="Enter Category Name">
                </div>
                <div class="form-group">
                    <label for="image" class="form-label">Image</label>
                    <input type="file" name="image" class="form-control" id="image" value="{{ old('image', $category->image) }}" placeholder="Enter Category Image">
                    <small>
                        <a href="{{ asset('public/images/category/'.$category->image) }}">
                            <img src="{{ asset('public/images/category/'.$category->image) }}" alt="Category Image" width="100" height="100">
                        </a>
                    </small>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Category</button>
            </div>
        </form>
    </div>
</div>
@endsection