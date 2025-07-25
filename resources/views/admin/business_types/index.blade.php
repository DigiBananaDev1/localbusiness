@extends('admin.layouts.app')
@section('title', 'Manage Business Types')

@section('content')
<div class="container py-4">
    <div class="card">
        <div class="card-header">
            <h4>Manage Business Types</h4>
        </div>
        <div class="card-body">

            <!-- Add New Business Type -->
            <form method="POST" action="{{ route('business-types.store') }}">
                @csrf
                <div class="input-group mb-4">
                    <input type="text" name="name" class="form-control" placeholder="e.g., product, service" required>
                    <button type="submit" class="btn btn-primary">Add</button>
                </div>
            </form>

            <!-- List and Edit Business Types -->
            <ul class="list-group">
                @foreach ($types as $type)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        @if(request()->get('edit') == $type->id)
                            <!-- Inline Edit Form -->
                            <form action="{{ route('business-types.update', $type->id) }}" method="POST" class="d-flex w-100">
                                @csrf
                                @method('PUT')
                                <input type="text" name="name" value="{{ $type->name }}" class="form-control me-2" required>
                                <button type="submit" class="btn btn-success btn-sm me-2">Update</button>
                                <a href="{{ route('business-types.index') }}" class="btn btn-secondary btn-sm">Cancel</a>
                            </form>
                        @else
                            <!-- Display Mode -->
                            <span>{{ ucfirst($type->name) }}</span>
                            <div class="btn-group gap-1">
                                <a href="{{ route('business-types.index', ['edit' => $type->id]) }}" class="btn btn-sm btn-warning">Edit</a>

                                <form action="{{ route('business-types.destroy', $type->id) }}" method="POST" onsubmit="return confirm('Delete this type?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </div>
                        @endif
                    </li>
                @endforeach
            </ul>

        </div>
    </div>
</div>
@endsection
