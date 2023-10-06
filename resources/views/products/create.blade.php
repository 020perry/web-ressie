@extends('layouts.app')

@section('content')
    <h2>Add New Product</h2>

    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" required>
        </div>

        <div>
            <label for="description">Description</label>
            <textarea id="description" name="description" required></textarea>
        </div>

        <div>
            <label for="price">Price</label>
            <input type="text" id="price" name="price" required>
        </div>

        <div>
            <label for="category_id">Category</label>
            <select id="category_id" name="category_id" required>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label for="image">Product Image</label>
            <input type="file" id="image" name="image">
        </div>

        <button type="submit">Add Product</button>
    </form>
@endsection
