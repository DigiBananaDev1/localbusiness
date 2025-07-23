@extends('admin.layouts.app')
@section('title','Admin')
@section('content')

<h1 class="mt-4">Profile</h1>
<div class="card mb-4">
    <div class="card-body">
        <form action="{{ route('admin.updatePassword') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="old_password">Old Password</label>
                <input class="form-control mt-2" id="old_password" name="old_password" type="password" />
                @error('old_password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="password">New Password</label>
                <input class="form-control mt-2" id="password" name="password" type="password" />
                @error('password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="mb-3">
                <label for="confirm_password">Confirm New Password</label>
                <input class="form-control mt-2" id="confirm_password" name="confirm_password" type="password" />
                @error('confirm_password')
                <small class="text-danger">{{ $message }}</small>
                @enderror
            </div>
            <div class="d-block text-center mt-4 mb-0">
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</div>
@endsection