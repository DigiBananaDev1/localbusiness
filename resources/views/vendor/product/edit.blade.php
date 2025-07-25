@extends('vendor.layouts.app')
@section('title', 'Edit Product - Vendor')

@section('content')
    <h1 class="mt-4">Edit Product</h1>

    <div class="text-end mb-2">
        <a href="{{ route('vendor.viewproducts', $vendor->id) }}" class="btn btn-secondary">Back to Products</a>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('vendor.updateproducts', [$product->id, $vendor->id]) }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-edit me-2"></i>Edit Product
            </div>
            <div class="card-body row">

                <!-- Product Fields -->
                <div class="col-md-6 mb-3">
                    <label>Product Name:</label>
                    <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                </div>

                <div class="col-md-6 mb-3">
                    <label>MRP:</label>
                    <input type="number" name="mrp" class="form-control" value="{{ old('mrp', $product->mrp) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Sale Price:</label>
                    <input type="number" name="price" class="form-control" value="{{ old('price', $product->price) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Slot (Bunch):</label>
                    <input type="number" name="bunch" class="form-control" value="{{ old('bunch', $product->bunch) }}">
                </div>

                <div class="col-md-6 mb-3">
                    <label>Category:</label>
                    <select name="category_id" class="form-select" required>
                        <option value="">-- Select Category --</option>
                        @foreach ($categories as $main)
                            <option value="{{ $main->id }}" {{ $product->category_id == $main->id ? 'selected' : '' }}>
                                {{ $main->name }}
                            </option>
                            @foreach ($main->children as $sub)
                                <option value="{{ $sub->id }}" {{ $product->category_id == $sub->id ? 'selected' : '' }}>
                                    -- {{ $sub->name }}
                                </option>
                                @foreach ($sub->children as $child)
                                    <option value="{{ $child->id }}" {{ $product->category_id == $child->id ? 'selected' : '' }}>
                                        ---- {{ $child->name }}
                                    </option>
                                @endforeach
                            @endforeach
                        @endforeach
                    </select>
                </div>

                <div class="col-md-6 mb-3">
                    <label>Description:</label>
                    <textarea name="description" class="form-control" rows="3" required>{{ old('description', $product->description) }}</textarea>
                </div>

                <!-- Main Image -->
                <div class="col-md-6 mb-3">
                    <label>Product Image:</label><br>
                    @if ($product->image)
                        <img src="{{ asset('public/' . $product->image) }}" alt="product" width="80" class="mb-2">
                    @endif
                    <input type="file" name="image" class="form-control">
                </div>

                <!-- Search Tags -->
                <div class="col-md-6 mb-3">
                    <label>Search Tags (comma-separated):</label>
                    <textarea name="search_tags" class="form-control" rows="1">{{ old('search_tags', $product->search_tags) }}</textarea>
                </div>

                <!-- Gallery Upload -->
                <div class="col-md-12 mb-3">
                    <label>Upload Gallery Images:</label>
                    <input type="file" name="gallery[]" class="form-control" multiple>
                </div>

                <!-- Existing Gallery Images -->
                @if ($product->galleries->count())
                    <div class="col-md-12">
                        <label>Existing Gallery:</label>
                        <div class="d-flex flex-wrap gap-3">
                            @foreach ($product->galleries as $gallery)
                                <div style="position: relative;">
                                    <img src="{{ asset('public/' . $gallery->image_path) }}" width="100" class="border rounded">
                                    <form action="{{ route('vendor.gallery.delete', $gallery->id) }}" method="POST" style="position: absolute; top: 0; right: 0;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Delete this image?')">&times;</button>
                                    </form>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

            <div class="card-footer text-end">
                <button type="submit" class="btn btn-primary">Update Product</button>
            </div>
        </div>
    </form>
@endsection
