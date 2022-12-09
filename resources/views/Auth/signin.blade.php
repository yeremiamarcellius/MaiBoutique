@extends('template.template')

@section('title', 'Sign In')

@section('isi')
    @if (session()->has('SignUpSuccess'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{session('SignUpSuccess')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    @if (session()->has('SignInFailed'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{session('SignInFailed')}}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <div class="m-5 p-5 bg-light">
        <h1 class="display-2 mb-5">Sign In</h1>
        <form action="{{ route('signin') }}" method="POST" class="mb-3">
            @csrf
            <p>Email</p>
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" name="email" aria-describedby="basic-addon1" value="{{ old('email', @$auth->email) }}">
                @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <p>Password</p>
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" name="password" aria-describedby="basic-addon1" value="{{ @$auth->password }}">
                @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="flexCheckChecked" name="rememberme">
                <label class="form-check-label" for="flexCheckChecked">
                  Remember me
                </label>
              </div>
            <button type="submit" class="btn btn-primary mt-4">submit</button>
        </form>
        <span>Not Regitered yet? </span><a href="{{route('signupPage')}}">Register Now</a>
    </div>

@endsection
