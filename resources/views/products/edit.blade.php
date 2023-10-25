@extends('layouts.app')

@section('content')
    <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
        <main>
            <div class="pt-6 px-4">
                <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">
                    <!-- Edit Product Section -->
                    <div class="overflow-x-auto max-h-[600px] bg-white shadow sm:rounded-lg mb-4 p-4 sm:p-6 h-full">
                        <h2 class="text-2xl font-bold mb-6">Edit Product</h2>

                        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')

                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                <input type="text" id="name" name="name" value="{{ $product->name }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                                <textarea id="description" name="description" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">{{ $product->description }}</textarea>
                            </div>

                            <div class="mb-4">
                                <label for="price" class="block text-gray-700 text-sm font-bold mb-2">Price</label>
                                <input type="text" id="price" name="price" value="{{ $product->price }}" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="mb-4">
                                <label for="status" class="block text-gray-700 text-sm font-bold mb-2">Status</label>
                                <select name="status" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    @foreach($statuses as $status)
                                        <option value="{{ $status }}" {{ $product->status == $status ? 'selected' : '' }}>{{ ucfirst($status) }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="category_id" class="block text-gray-700 text-sm font-bold mb-2">Category</label>
                                <select id="category_id" name="category_id" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-4">
                                <label for="image" class="block text-gray-700 text-sm font-bold mb-2">Product Image</label>
                                <input type="file" id="image" name="image">
                                @if($product->image)
                                    <img src="{{ asset('images/' . $product->image) }}" alt="{{ $product->name }}" width="100">
                                @endif
                            </div>

                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Update Product</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
