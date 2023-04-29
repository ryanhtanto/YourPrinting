@extends('main/admin-main')

@section('container')
        <h3 class="text-center fw-bold">REGISTER</h3>
        <form action="/admin/register" method="POST">
                @csrf
                <div class="form-floating mt-3">
                        <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" placeholder="Username" name="username" value="{{ old('username') }}">
                        <label for="username">Username</label>
                        <span class="invalid-feedback">@error('username'){{$message}}@enderror</span>
                </div>
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
@endsection