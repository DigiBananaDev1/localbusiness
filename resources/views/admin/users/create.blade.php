@extends('admin.layouts.app')
@section('title', 'Sellers-Admin')
@section('content')


    <div class="card mt-4 m-4">
        <div class="card-header">
            <div class="d-flex justify-content-between align-items-center">
                <h5 class="card-title"><i class="fas fa-plus me-2"></i>Add Users</h5>
                <a href="{{ route('admin.users') }}" class="btn btn-secondary me-2">Back</a>
            </div>
        </div>

        <div class="card-body">

            <form action="{{ route('admin.users.store') }}" method="post" enctype="multipart/form-data">
                @csrf

                {{-- <div class="mb-3">
                    <label for="display_role">Role</label>
                    <input type="text" id="display_role" name="display_role" class="form-control"
                        value="{{ old('display_role') }}" required>
                    @error('display_role')
                        <small class="alert alert-danger">{{ $message }}</small>
                    @enderror
                </div> --}}
                <div class="mb-3">
                    <label for="display_role">Role</label>
                    <select id="display_role" name="display_role" class="form-control" required>
                        <option value="">-- Select Role --</option>
                        <option value="Sale" {{ old('display_role') == 'Sale' ? 'selected' : '' }}>Sale</option>
                        <option value="Data Entry" {{ old('display_role') == 'Data Entry' ? 'selected' : '' }}>Data Entry
                        </option>
                    </select>
                    @error('display_role')
                        <small class="alert alert-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control" value="{{ old('name') }}"
                        required>
                    @error('name')
                        <small class="alert alert-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="email">Email</label>
                    <input type="email" id="email" name="email" class="form-control" value="{{ old('email') }}"
                        required>
                    @error('email')
                        <small class="alert alert-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    @error('password')
                        <small class="alert alert-danger">{{ $message }}</small>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="password_confirmation">Confirm Password</label>
                    <input type="password" id="password_confirmation" name="password_confirmation" class="form-control"
                        required>
                    @error('password_confirmation')
                        <small class="alert alert-danger">{{ $message }}</small>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Submit</button>
            </form>

        </div>
    </div>
@endsection
