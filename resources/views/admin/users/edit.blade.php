@extends('admin.layouts.app')
@section('title', 'Edit User - Admin')
@section('content')


    <div class="card mt-4 m-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title"><i class="fas fa-pen me-2"></i> Edit User</h5>
                <a href="{{ route('admin.users') }}" class="btn btn-secondary me-2">Back</a>
            </div>


        </div>

        <div class="card-body">
            <form action="{{ route('admin.users.update', $user->id) }}" method="POST">
                @csrf
                {{-- @method('PUT') --}}
                {{-- <div class="mb-3">
                    <label for="display_role">Role</label>
                    <input type="text" id="display_role" name="display_role" class="form-control"
                        value="{{ old('display_role', $user->display_role) }}" required>
                    @error('display_role')
                        <small class="alert alert-danger">{{ $message }}</small>
                    @enderror
                </div> --}}

                <div class="mb-3">
                    <label for="display_role">Role</label>
                    <select id="display_role" name="display_role" class="form-control" required>
                        <option value="">-- Select Role --</option>
                        <option value="Sale" {{ old('display_role', $user->display_role) == 'Sale' ? 'selected' : '' }}>
                            Sale</option>
                        <option value="Data Entry"
                            {{ old('display_role', $user->display_role) == 'Data Entry' ? 'selected' : '' }}>Data Entry
                        </option>
                    </select>
                    @error('display_role')
                        <small class="alert alert-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control"
                        value="{{ old('name', $user->name) }}" required>
                    @error('name')
                        <small class="alert alert-danger">{{ $message }}</small>
                    @enderror
                </div>
                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control"
                        value="{{ old('email', $user->email) }}" required>
                    @error('email')
                        <small class="alert alert-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Update User</button>
            </form>
        </div>
    </div>



@endsection
