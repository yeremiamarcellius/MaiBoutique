@extends('template.template')

@section('title', 'Transaction')

@section('isi')

<h1 class="display-2 text-center p-5">Check What Have You Bought</h1>

<div class="d-flex justify-content-center flex-wrap m-5 gap-3">
    @foreach ($transactionHeaders as $transactionHeader)

    <div class="card p-3 bg-light" style="width: 70vw;">
        <div class="card-body">
            <h5 class="card-title">{{$transactionHeader->created_at}}</h5>
            <ul>
                @foreach ($transactionHeader->transactionDetails as $transactionDetail)
                    <li class="card-subtitle mb-2 text-muted ">
                        <div class="row">
                            <span class="col-md-2">{{$transactionDetail->quantity}} pc(s) {{$transactionDetail->item->name}}</span>
                            <span class="col-md-10">Rp.{{number_format($transactionDetail->item->price,0,'.', '.')}}</span>
                        </div>

                    </li>
                @endforeach

            </ul>

            <h5 class="card-text">Total Price: Rp.{{number_format($transactionHeader->totalprice,0,'.', '.')}}</h5>
        </div>
    </div>
@endforeach
</div>



@endsection
