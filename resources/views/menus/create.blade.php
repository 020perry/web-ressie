@extends('layouts.app')

@section('content')
    <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
        <main>
            <div class="pt-6 px-4">
                <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">
                    <!-- Add New Menu Section -->
                    <div class="overflow-x-auto max-h-[600px] bg-white shadow sm:rounded-lg mb-4 p-4 sm:p-6 h-full">
                        <h2 class="text-2xl font-bold mb-6">Add New Restaurant</h2>

                        <form action="{{ route('menus.store') }}" method="POST">
                            @csrf

                            <div class="mb-4">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
                                <input type="text" id="name" name="name" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <div class="mb-4">
                                <label for="description" class="block text-gray-700 text-sm font-bold mb-2">Description</label>
                                <textarea id="description" name="description" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"></textarea>
                            </div>

                            <div class="mb-4">
                                <label for="address" class="block text-gray-700 text-sm font-bold mb-2">Address</label>
                                <input type="text" id="address" name="address" required class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            </div>

                            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">Add Restaurant</button>
                        </form>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
