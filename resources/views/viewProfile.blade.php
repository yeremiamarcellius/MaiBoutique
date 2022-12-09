@extends('template.template')

@section('title', 'Profile')

@section('isi')

<div class="d-flex justify-content-center align-items-center" style="height: 82vh">
    <div class="card" style="width: 40vw;">
        <div class="card-body text-center">
            <h1 class="card-title display-2">My Profile</h1>
            @can('admin')
                <span class="badge bg-secondary">Admin</span>
            @else
                <span class="badge bg-secondary">Member</span>
            @endcan
            <h5 class="card-title">Username: {{$user->username}}</h5>
            <h6 class="card-subtitle mb-2 text-muted">{{$user->email}}</h6>
            <p class="card-text">Address: {{$user->address}}</p>
            <p class="card-text">Phone: {{$user->phone_number}}</p>
            @can('admin')

            @else
                <a href="{{route('editProfile')}}" class="btn btn-primary">Edit Profile</a>
            @endcan

            <a href="{{route('editPassword')}}" class="btn btn-outline-primary">Edit Password</a>
        </div>
    </div>
</div>


@endsection
