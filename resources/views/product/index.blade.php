@extends('layouts.app')

@section('content')
<div class="container">
    <h2 class="mb-4">All Products</h2>

    <a href="{{ url('/products/create') }}" class="btn btn-primary mb-3">+ Add New Product</a>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Product ID</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach($products as $p)
                <tr>
                    <td>{{ $p->id }}</td>
                    <td>{{ $p->product_id }}</td>
                    <td>{{ $p->name }}</td>
                    <td>{{ $p->price }}</td>
                    <td>{{ $p->stock }}</td>
                    <td>
                        <img src="{{ asset('storage/'.$p->image) }}" width="60">
                    </td>
                    <td>
                        <a href="{{ url('/products/'.$p->id) }}" class="btn btn-info btn-sm">View</a>
                        <a href="{{ url('/products/'.$p->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>

                        <form action="{{ url('/products/'.$p->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button onclick="return confirm('Delete?')" class="btn btn-danger btn-sm">Delete</button>
                        </form>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{ $products->links() }}

</div>
@endsection
