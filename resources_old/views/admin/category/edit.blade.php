@extends('admin.layouts.app')
@section('title', 'Category-Admin')
@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h4>Edit Category</h4>
                 <a href="{{route('admin.category')}}" class="btn btn-dark text-end">Back</a>
            </div>
            {{-- <form action="{{ route('admin.category.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="form-group">
                        <label for="name" class="form-label">Name</label>
                        <input type="text" name="name" class="form-control" id="name"
                            value="{{ old('name', $category->name) }}" placeholder="Enter Category Name">
                    </div>
                    <div class="form-group">
                        <label for="image" class="form-label">Image</label>
                        <input type="file" name="image" class="form-control" id="image"
                            value="{{ old('image', $category->image) }}" placeholder="Enter Category Image">
                        <small>
                            <a href="{{ asset('public/images/category/' . $category->image) }}">
                                <img src="{{ asset('public/images/category/' . $category->image) }}" alt="Category Image"
                                    width="100" height="100">
                            </a>
                        </small>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Update Category</button>
                </div>
            </form> --}}


            <form method="POST" action="{{ route('admin.category.update', $category->id) }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    {{-- Category Name --}}
                    <div class="mb-3">
                        <label class="form-label">Category Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name', $category->name) }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Parent Category Dropdown --}}
                    <div class="mb-3">
                        <label class="form-label">Parent Category</label>
                        <select name="parent_id" class="form-select">
                            <option value="">-- None (Main Category) --</option>
                            @foreach ($categories as $main)
                                @if ($main->id != $category->id)
                                    <option value="{{ $main->id }}"
                                        {{ $category->parent_id == $main->id ? 'selected' : '' }}>
                                        {{ $main->name }}
                                    </option>
                                    @foreach ($main->children as $sub)
                                        @if ($sub->id != $category->id)
                                            <option value="{{ $sub->id }}"
                                                {{ $category->parent_id == $sub->id ? 'selected' : '' }}>
                                                -- {{ $sub->name }}
                                            </option>
                                            @foreach ($sub->children as $child)
                                                @if ($child->id != $category->id)
                                                    <option value="{{ $child->id }}"
                                                        {{ $category->parent_id == $child->id ? 'selected' : '' }}>
                                                        ---- {{ $child->name }}
                                                    </option>
                                                @endif
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif
                            @endforeach
                        </select>
                        @error('parent_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Current Image --}}
                    @if ($category->image)
                        <div class="mb-3">
                            <label class="form-label">Current Image</label><br>
                            <a href="{{ asset('public/images/category/' . $category->image) }}">
                                <img src="{{ asset('public/images/category/' . $category->image) }}" alt="Category Image"
                                    width="100" height="100">
                            </a>
                        </div>
                    @endif

                    {{-- New Image --}}
                    <div class="mb-3">
                        <label class="form-label">Change Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                            accept="image/*">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                </div>

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-success">Update Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection
