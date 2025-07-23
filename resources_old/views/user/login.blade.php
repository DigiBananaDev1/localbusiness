@extends('admin/layouts/auth')
@section('title','User Login')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-5">
            <div class="card shadow-lg border-0 rounded-lg mt-5">
                <div class="card-header">
                    <h3 class="text-center font-weight-light my-4">Login</h3>
                </div>
                <div class="card-body">
                    @error('email')
                    <small class="alert alert-danger p-2 d-block mb-3">{{ $message }}</small>
                    @enderror
                    <form action="{{ route('user.loginSubmit') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-floating mb-3">
                            <input class="form-control" id="email" name="email" type="email" />
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input class="form-control" id="password" name="password" type="password" />
                            <label for="password">Password</label>
                        </div>
                        {{-- <div class="form-check mb-3">
                            <input class="form-check-input" id="inputRememberPassword" type="checkbox" value="" />
                            <label class="form-check-label" for="inputRememberPassword">Remember Password</label>
                        </div> --}}
                        <div class="text-center mt-4 mb-0">
                            <button type="submit" class="btn btn-primary">Login</button>
                        </div>
                    </form>
                </div>
                <div class="card-footer text-center py-3">
                    <div class="small"><a href="{{route('user.register')}}">Need an account? Sign up!</a></div>
                    <a href="{{ url('/') }}" class="btn btn-outline-danger">Back To Home</a>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection