@extends('template.template')

@section('title', 'Item Detail')

@section('isi')

<div class="d-flex justify-content-center align-items-center" style="height: 82vh">
    <div class="card mb-3" style="width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="{{asset('storage/image/'.$item->image)}}" class="img-fluid rounded-start d-flex align-items-center" style="height: 100%" alt="...">
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h2 class="card-title">{{$item->name}}</h2>
                    <h3 class="card-text">Rp.{{number_format($item->price,0,'.', '.')}}</h3>
                    <h5 class="card-text">Product Detail</h5>
                    <p class="card-text">{{$item->description}}</p>

                    @can('admin')
                        <form action="{{ route('delete', ['id'=>$item->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-success" type="submit">Delete</button>
                        </form>
                    @else
                        <h5 class="card-text">Quantity</h5>
                        <form action="{{ route('storeCart', ['id'=>$item->id]) }}" method="POST">
                            @csrf
                            <div class="d-flex">
                                <div>
                                    <input class="form-control me-2 @error('quantity') is-invalid @enderror" type="text" placeholder="Quantity" aria-label="Quantity" name="quantity">
                                    @error('quantity')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                                </div>
                                <button class="btn btn-success ms-2" type="submit">Add to Cart</button>
                            </div>
                        </form>
                    @endcan
                    <a href="{{ route('home') }}" class="btn btn-danger mt-3" type="submit">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
