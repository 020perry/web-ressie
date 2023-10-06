@extends('layouts.app')

@section('content')
    <h2>Products</h2>

    <a href="{{ route('products.create') }}">Add New Product</a>

    <ul>
        @foreach($products as $product)
            <li>
                @if($product->image)
                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                @endif
                {{ $product->name }} (Category: {{ $product->category->name }})
                <a href="{{ route('products.edit', $product->id) }}">Edit</a>
                <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection
