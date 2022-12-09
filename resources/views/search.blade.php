@extends('template.template')

@section('title', 'Search')

@section('isi')

<p class="display-3 text-center mt-5">Find Your Best Clothes Here!</p>

<form class="d-flex m-5 p-5" action="{{route('search')}}">
    <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search" name="search">
    <button class="btn btn-outline-primary" type="submit">Search</button>
</form>

<div class="d-flex flex-wrap m-5 p-5 justify-content-center gap-3">
    @foreach ($items as $item)
        <div class="card m-1" style="width: 18rem;">
            <img src="{{asset('storage/image/'.$item->image)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <h5 class="card-title">{{$item->name}}</h5>
                <p class="card-text">Rp.{{number_format($item->price,0,'.', '.')}}</p>
                <a href="{{ route('show', ['id'=>$item->id]) }}" class="btn btn-primary">More Detail</a>
            </div>
        </div>
    @endforeach
    {{$items->withQueryString()->links()}}
</div>


@endsection
