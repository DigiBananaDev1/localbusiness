@extends('vendor.layouts.app')
@section('title')
    Products-Vendor
@endsection

@section('content')
    <h1 class="mt-4">All Products</h1>

    <div class="text-end mb-2">
        <a href="{{ route('vendor.createproducts', $vendor->id) }}" class="btn btn-success">Add New Product</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <i class="fas fa-box me-2"></i> Product List
        </div>

        <div class="card-body table-responsive">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Image</th>
                        <th>Name</th>
                        <th>MRP</th>
                        <th>Price</th>
                        <th>Category</th>
                        <th>Slot</th>
                        <th>Search Tags</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($products as $index => $product)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>
                                @if($product->image)
                                    <img src="{{ asset('public/'.$product->image) }}" alt="product image" width="60">
                                @else
                                    <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $product->name }}</td>
                            <td>₹{{ $product->mrp }}</td>
                            <td>₹{{ $product->price }}</td>
                            <td>{{ $product->category->name ?? '-' }}</td>
                            <td>{{ $product->bunch }}</td>
                            <td>{{ $product->search_tags }}</td>
                            <td>
                                <a href="{{ route('vendor.editproducts', [$vendor->id, $product->id]) }}"
                                   class="btn btn-sm btn-primary">Edit</a>

                                <form action="{{ route('vendor.deleteproducts', [$vendor->id, $product->id]) }}"
                                      method="POST" style="display:inline-block;"
                                      onsubmit="return confirm('Are you sure to delete this product?');">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="9" class="text-center text-muted">No products found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
