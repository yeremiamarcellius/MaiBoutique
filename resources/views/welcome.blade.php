@extends('template.template')

@section('title', 'Welcome')

@section('isi')

<div class="text-center p-5 bg-image"  style="background-image: url({{asset('bg-home.jpg')}}); height: 82.5vh; background-repeat: no-repeat; background-size: cover;">
    <h1 class="mt-5">Welcome to MaiBoutique</h1>

    <p>Online Boutique that Provides You with Various Clothes to Suit Your Various Activities</p>

    <a class="btn btn-outline-primary m-3" href="{{ route('signupPage') }}">Sign Up Now</a>
</div>


@endsection
