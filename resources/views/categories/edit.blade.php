@extends('layouts.app')

@section('content')
    <h2>Edit Category</h2>

    <form action="{{ route('categories.update', $category->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div>
            <label for="name">Name</label>
            <input type="text" id="name" name="name" value="{{ $category->name }}" required>
        </div>

        <button type="submit">Update Category</button>
    </form>
@endsection
