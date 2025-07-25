@extends('admin.layouts.app')
@section('title', 'Category - Admin')

@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h4>Add Category</h4>
                <a href="{{route('admin.category')}}" class="btn btn-dark">Back</a>
            </div>

            <form method="POST" action="{{ route('admin.category.store') }}" enctype="multipart/form-data">
                @csrf

                <div class="card-body">
                    {{-- Category Name --}}
                    <div class="mb-3">
                        <label for="name" class="form-label">Category Name</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
                            value="{{ old('name') }}" required>
                        @error('name')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Parent Category Dropdown --}}
                    <div class="mb-3">
                        <label class="form-label">Parent Category (optional)</label>
                        <select name="parent_id" class="form-select">
                            <option value="">-- None (Main Category) --</option>
                            @foreach ($categories as $main)
                                <option value="{{ $main->id }}" {{ old('parent_id') == $main->id ? 'selected' : '' }}>
                                    {{ $main->name }}
                                </option>
                                @foreach ($main->children as $sub)
                                    <option value="{{ $sub->id }}"
                                        {{ old('parent_id') == $sub->id ? 'selected' : '' }}>
                                        -- {{ $sub->name }}
                                    </option>
                                    @foreach ($sub->children as $child)
                                        <option value="{{ $child->id }}"
                                            {{ old('parent_id') == $child->id ? 'selected' : '' }}>
                                            ---- {{ $child->name }}
                                        </option>
                                    @endforeach
                                @endforeach
                            @endforeach
                        </select>
                        @error('parent_id')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>

                    {{-- Image Upload --}}
                    <div class="mb-3">
                        <label for="image" class="form-label">Category Image</label>
                        <input type="file" name="image" class="form-control @error('image') is-invalid @enderror"
                            accept="image/*">
                        @error('image')
                            <div class="text-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="card-footer text-end">
                    <button type="submit" class="btn btn-primary">Create Category</button>
                </div>
            </form>
        </div>
    </div>
@endsection
