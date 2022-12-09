@extends('template.template')

@section('title', 'Add Item')

@section('isi')

<div class="m-5 p-5 bg-light">
    <h1 class="display-2 mb-5">Add Item</h1>
    <form action="{{ route('storeItem') }}" method="POST" class="mb-3" enctype="multipart/form-data">
        @csrf
        <p>Clothes Image</p>
        <div class="input-group mb-3">
            <input type="file" class="form-control @error('image') is-invalid @enderror" placeholder="Image" aria-label="Image" name="image" aria-describedby="basic-addon1">
            @error('image')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <p>Clothes Name</p>
        <div class="input-group mb-3">
            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Name" aria-label="Name" name="name" aria-describedby="basic-addon1">
            @error('name')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <p>Clothes Desc</p>
        <div class="input-group mb-3">
            <input type="text" class="form-control @error('description') is-invalid @enderror" placeholder="Description" aria-label="Description" name="description" aria-describedby="basic-addon1">
            @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <p>Clothes Price</p>
        <div class="input-group mb-3">
            <input type="text" class="form-control @error('price') is-invalid @enderror" placeholder="Price" aria-label="Price" name="price" aria-describedby="basic-addon1">
            @error('price')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <p>Clothes Stock</p>
        <div class="input-group mb-3">
            <input type="number" class="form-control @error('stock') is-invalid @enderror" placeholder="Stock" aria-label="Stock" name="stock" aria-describedby="basic-addon1">
            @error('stock')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-success mt-4">Add</button>
    </form>
</div>

@endsection
