@extends('layouts.app')

@section('content')
    <h2>Edit Product</h2>

    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $product->name }}" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required>{{ $product->description }}</textarea>
        </div>

        <div>
            <label for="price">Price</label>
            <input type="text" id="price" name="price" value="{{ $product->price }}" required>
        </div>

        <div>
            <label for="category_id">Category</label>
            <select id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="image">Product Image</label>
            <input type="file" id="image" name="image">
            @if($product->image)
                <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="100">
            @endif
        </div>

        <button type="submit">Update Product</button>
    </form>
@endsection
