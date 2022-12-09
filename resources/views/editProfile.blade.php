@extends('template.template')

@section('title', 'Edit Profile')

@section('isi')

<div class="m-5 p-5 bg-light">
    <h1 class="display-2 mb-5 text-center">Update Profile</h1>
    <form action="{{ route('updateProfile') }}" method="POST" class="mb-3">
        @csrf
        @method('Patch')
        <p>Username</p>
        <div class="input-group mb-3">
            <input type="text" class="form-control @error('username') is-invalid @enderror" placeholder="Username" aria-label="Username" name="username" aria-describedby="basic-addon1" value="{{$user->username}}">
            @error('username')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <p>Email</p>
        <div class="input-group mb-3">
            <input type="text" class="form-control @error('email') is-invalid @enderror" placeholder="Email" aria-label="Email" name="email" aria-describedby="basic-addon1" value="{{$user->email}}">
            @error('email')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <p>Phone Number</p>
        <div class="input-group mb-3">
            <input type="text" class="form-control @error('phone_number') is-invalid @enderror" placeholder="Phone Number" aria-label="Phone Number" name="phone_number" aria-describedby="basic-addon1" value="{{$user->phone_number}}">
            @error('phone_number')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <p>Address</p>
        <div class="input-group mb-3">
            <input type="text" class="form-control @error('address') is-invalid @enderror" placeholder="Address" aria-label="address" name="address" aria-describedby="basic-addon1" value="{{$user->address}}">
            @error('address')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-4">Save Update</button>
    </form>
    <a href="{{ route('showProfile') }}" class="btn btn-danger">Back</a>
</div>

@endsection
