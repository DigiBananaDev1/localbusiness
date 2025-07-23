@extends('user.layouts.app')
@section('title', 'profile - User')
@section('content')

    <h1 class="mt-4">Profile</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Profile</li>
    </ol>
    @if ($errors->any())
        <div class="toast align-items-center text-bg-danger border-0" id="error-toast" role="alert" aria-live="assertive"
            aria-atomic="true">
            <div class="d-flex">
                <div class="toast-body">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast"
                    aria-label="Close"></button>
            </div>
        </div>
    @endif
    <div class="card mb-4">
        <div class="card-header">
            <i class="fas fa-user me-1"></i>
            Profile Update
        </div>
        <form action="{{ route('updateUserProfile', $user->id) }}" method="post">
            <div class="card-body">
                @csrf
                <div class="form-group row">
                    <div class="col-md-6 mb-3">
                        <label>Name:</label>
                        <input class="form-control" type="text" name="name" value="{{ old('name', $user->name) }}"
                            required>
                            @error('name')
                            <small class="alert alert-danger">{{ $message }}</>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Mobile:</label>
                        <input class="form-control" type="text" name="mobile" value="{{ old('mobile', $user->mobile) }}"
                            required>
                        @error('mobile')
                            <small class="alert alert-danger">{{ $message }}</>
                        @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Address:</label>
                        <textarea class="form-control" rows="1" name="address"
                            required> {{ old('address', $user->address) }}</textarea>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>City:</label>
                        <input class="form-control" type="text" name="city" value="{{ old('city', $user->city) }}"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>State:</label>
                        <input class="form-control" type="text" name="state" value="{{ old('state', $user->state) }}"
                            required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Pin Code:</label>
                        <input class="form-control" type="text" name="pincode"
                            value="{{ old('pincode', $user->pincode) }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Email:</label>
                        <input class="form-control" type="email" name="email" value="{{ old('email', $user->email) }}">
                    </div>
                </div>

            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
@endsection