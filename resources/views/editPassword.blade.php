@extends('template.template')

@section('title', 'Edit Password')

@section('isi')

<div class="m-5 p-5 bg-light">
    <h1 class="display-2 mb-5">Update Password</h1>
    <form action="{{ route('updatePassword') }}" method="POST" class="mb-3">
        @csrf
        @method('Patch')
        <p>Old Password</p>
        <div class="input-group mb-3">
            <input type="password" class="form-control @error('old_password') is-invalid @enderror" placeholder="Old Password" aria-label="Old Password" name="old_password" aria-describedby="basic-addon1">
            @error('old_password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <p>New Password</p>
        <div class="input-group mb-3">
            <input type="password" class="form-control @error('new_password') is-invalid @enderror" placeholder="New Password" aria-label="New Password" name="new_password" aria-describedby="basic-addon1">
            @error('new_password')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-4">submit</button>
    </form>
</div>

@endsection
