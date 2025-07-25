@extends('admin.layouts.app')
@section('title', 'Category-Admin')
@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h4>Add Category</h4>
            </div>
            {{-- <form action="{{ route('admin.category.store') }}" method="POST" enctype="multipart/form-data">
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
        </form> --}}

            <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Category Name -->
                <div class="mb-3">
                    <label>Category Name</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                <!-- Parent Category (for hierarchy) -->
                <div class="mb-3">
                    <label>Parent Category (optional)</label>
                    <select name="parent_id" class="form-select">
                        <option value="">-- None (Main Category) --</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">
                                {{ str_repeat('--', $category->depth) . ' ' . $category->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Category Image -->
                <div class="mb-3">
                    <label>Category Image</label>
                    <input type="file" name="image" class="form-control" accept="image/*">
                </div>

                <!-- Submit -->
                <button type="submit" class="btn btn-primary">Create Category</button>
            </form>
        </div>
    </div>
@endsection
