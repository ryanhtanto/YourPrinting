@extends('main/admin-main')

@section('auth')
<div class="row d-flex justify-content-center mt-5">
        <div class="col-sm-4 mt-5">
                <h3 class="text-center fw-bold">LOGIN</h3>
                <div>
                        @if(session('success'))
                                        <div class="alert alert-success mt-3">
                                                {{ session('success') }}
                                        </div>
                        @endif
                        @if(session()->has('loginError'))
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        {{session('loginError')}}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                        @endif
                </div>
                <div>
                        <form action="/admin/login" method="POST">
                                @csrf
                                <div class="form-floating mt-3">
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}">
                                        <label for="email">Email address</label>
                                        <span class="invalid-feedback">@error('email'){{$message}}@enderror</span>
                                </div>
                                <div class="form-floating mt-3">
                                        <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password">
                                        <label for="password">Password</label>
                                        <span class="invalid-feedback">@error('password'){{$message}}@enderror</span>
                                </div>
                                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
                        </form>
                </div>
        </div>
</div>
        
@endsection