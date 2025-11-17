@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Product Details</h2>

    <div class="card p-4">
        <h3>{{ $product->name }}</h3>

        <p><strong>Product ID:</strong> {{ $product->product_id }}</p>
        <p><strong>Description:</strong> {{ $product->description }}</p>
        <p><strong>Price:</strong> {{ $product->price }}</p>
        <p><strong>Stock:</strong> {{ $product->stock }}</p>

        <div>
            <strong>Image:</strong><br>
            <img src="{{ asset('storage/'.$product->image) }}" width="200">
        </div>

        <a href="{{ url('/products') }}" class="btn btn-primary mt-3">Back</a>
    </div>
</div>
@endsection
