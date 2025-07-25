@extends('admin.layouts.app')
@section('title', 'Category-admin')
@section('content')
    <div class="container py-4">
        <div class="card">
            <div class="card-header">
                <h4>Category List</h4>
                <a href="{{ route('admin.category.add') }}" class="btn btn-info btn-sm">Add Category</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    {{-- <table class="table table-bordered table-hover">
                    <thead class="table-dark">
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Image</th>
                            <th scope="col">Categories</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ ($categories->currentPage() - 1) * $categories->perPage() + $loop->iteration }}</td>
                            <td>
                                <div class="text-center">
                                    <a href="{{ asset('public/images/category/'.$category->image) }}">
                                        <img src="{{ asset('public/images/category/'.$category->image) }}" alt="Category Image" width="50" height="50">
                                    </a>
                                </div>
                                <!-- {{ $category->image ?? 'N/A'}} -->
                            </td>

                            <td>{{ $category->name ?? 'N/A'}}</td>


                            <td>
                                <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('admin.category.destroy', base64_encode($category->id) ) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach

                    </tbody>
                </table>
                {{ $categories->links('pagination::bootstrap-5') }} --}}


                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Parent</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($categories as $category)
                                <tr>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->parent ? $category->parent->name : '—' }}</td>
                                    <td>
                                        @if ($category->image)
                                            <div class="text-center">
                                                <a href="{{ asset('public/images/category/' . $category->image) }}">
                                                    <img src="{{ asset('public/images/category/' . $category->image) }}"
                                                        alt="Category Image" width="50" height="50">
                                                </a>
                                            </div>
                                        @else
                                            <span>No Image</span>
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('admin.category.edit', $category->id) }}"
                                            class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.category.destroy', $category->id) }}" method="POST"
                                            style="display:inline-block;">
                                            @csrf @method('DELETE')
                                            <button onclick="return confirm('Delete this category?')"
                                                class="btn btn-danger btn-sm">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="4">No categories found.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $categories->links('pagination::bootstrap-5') }}

                </div>
            </div>
        </div>
    </div>
@endsection
