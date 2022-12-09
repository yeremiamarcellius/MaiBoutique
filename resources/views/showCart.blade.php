@extends('template.template')

@section('title', 'Cart')

@section('isi')

<h1 class="display-2 text-center">My Cart</h1>

<div class="d-flex justify-content-end p-5 gap-3">
    <h3>Total: {{number_format($totalPrice,0,'.', '.')}}</h3>
    <form action="{{ route('storeTransaction', $totalPrice) }}" method="POST">
        @csrf
        <button class="btn btn-primary">Check Out({{$totalQuantity}})</button>
    </form>
</div>


<div class="d-flex flex-wrap m-5 p-5 justify-content-center gap-3">
    @foreach ($cartHeader->cartDetails as $cartDetail)
        @if ($cartDetail->item != null)
            <div class="card m-1" style="width: 18rem;">
                <img src="{{asset('storage/image/'.$cartDetail->item->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">{{$cartDetail->item->name}}</h5>
                    <p class="card-text">Rp.{{number_format($cartDetail->item->price,0,'.', '.')}}</p>
                    <p class="card-text">Qty: {{$cartDetail->quantity}}</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('editCart', ['id'=>$cartDetail->id]) }}" class="btn btn-primary">Edit Cart</a>
                        <form action="{{ route('deleteCart', ['id'=>$cartDetail->id]) }}" method="POST">
                            @csrf
                            @method('Delete')
                            <button class="btn btn-danger">Remove from cart</button>
                        </form>
                    </div>
                </div>
            </div>
        @endif
    @endforeach
</div>

@endsection
