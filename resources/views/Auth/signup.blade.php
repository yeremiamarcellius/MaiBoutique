@extends('template.template')

@section('title', 'Sign Up')

@section('isi')

    <div class="m-5 p-5 bg-light">
        <h1 class="display-2 mb-5">Sign Up</h1>
        <form action="{{ route('signup') }}" method="POST" class="mb-3">
            @csrf
            <p>Username</p>
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" aria-label="Username" name="username" aria-describedby="basic-addon1" value="{{old('username')}}">
                @error('username')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <p>Email</p>
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" name="email" aria-describedby="basic-addon1" value="{{old('email')}}">
                @error('email')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <p>Password</p>
            <div class="input-group mb-3">
                <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password" aria-label="Password" name="password" aria-describedby="basic-addon1">
                @error('password')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <p>Phone Number</p>
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" aria-label="Phone Number" name="phone_number" aria-describedby="basic-addon1" value="{{old('phone_number')}}">
                @error('phone_number')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <p>Address</p>
            <div class="input-group mb-3">
                <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Address" aria-label="address" name="address" aria-describedby="basic-addon1" value="{{old('address')}}">
                @error('address')
                    <div class="invalid-feedback">
                        {{$message}}
                    </div>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary mt-4">submit</button>
        </form>
        <span>Already Regitered? </span><a href="{{route('signinPage')}}">Sign In Here</a>
    </div>

@endsection
