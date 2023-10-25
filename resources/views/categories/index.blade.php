@extends('layouts.app')

@section('content')
    <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
        <main>
            <div class="pt-6 px-4">
                <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4  my-4">
                    <!-- Categories Section -->
                    <div class="overflow-x-auto max-h-[600px] bg-white shadow rounded-lg mb-4 p-4 sm:p-6 h-full">
                        <div class="flex items-center justify-between mb-4">
                            <h3 class="text-xl font-bold leading-none text-gray-900">Categories</h3>
                            <a href="{{ route('categories.create') }}" class="text-sm font-medium text-cyan-600 hover:bg-gray-100 rounded-lg inline-flex items-center p-2">
                                Add New Category
                            </a>
                        </div>

                        <!-- Categories Table -->
                        <table class="min-w-full bg-white">
                            <thead class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                            <tr>
                                <th class="py-2 px-6 text-left">Category Name</th>
                                <th class="py-2 px-6 text-left">Associated Restaurant</th>
                                <th class="py-2 px-6 text-center">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="text-gray-600 text-sm font-light">
                            @foreach($categories as $category)
                                <tr class="border-b border-gray-200 hover:bg-gray-100">
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        <div class="flex items-center">
                                            <span class="font-medium">{{ $category->name }}</span>
                                        </div>
                                    </td>
                                    <td class="py-3 px-6 text-left whitespace-nowrap">
                                        {{ $category->restaurant ? $category->restaurant->name : 'No Associated Restaurant' }}
                                    </td>
                                    <td class="py-3 px-6 text-center">
                                        <div class="flex item-center justify-center">
                                            <a href="{{ route('categories.edit', $category->id) }}" class="text-blue-500 hover:text-blue-700 mx-2">
                                                Edit
                                            </a>
                                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700 mx-2">
                                                    Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="bg-white md:flex md:items-center md:justify-between shadow rounded-lg p-4 md:p-6 xl:p-8 my-6 mx-4">
            <ul class="flex items-center flex-wrap mb-6 md:mb-0">
                <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline mr-4 md:mr-6">Terms and conditions</a></li>
                <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline mr-4 md:mr-6">Privacy Policy</a></li>
                <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline mr-4 md:mr-6">Licensing</a></li>
                <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline mr-4 md:mr-6">Cookie Policy</a></li>
                <li><a href="#" class="text-sm font-normal text-gray-500 hover:underline">Contact</a></li>
            </ul>
            <div class="flex sm:justify-center space-x-6">
                <a href="#" class="text-gray-500 hover:text-gray-900">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <!-- Twitter icon SVG here -->
                    </svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <!-- Facebook icon SVG here -->
                    </svg>
                </a>
                <a href="#" class="text-gray-500 hover:text-gray-900">
                    <svg class="h-5 w-5" fill="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                        <!-- LinkedIn icon SVG here -->
                    </svg>
                </a>
            </div>
        </footer>
        <p class="text-center text-sm text-gray-500 my-10">
            <a href="#" class="hover:underline" target="_blank">All rights reserved.</a>
        </p>
    </div>
@endsection
