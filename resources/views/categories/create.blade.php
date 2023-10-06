@extends('layouts.app')

@section('content')
<h2>Add New Category</h2>

<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
    </div>

    <button type="submit">Add Category</button>
</form>
@endsection
