@extends('layouts.app')

@section('content')

    <div class="flex-1 overflow-y-auto p-4">
        <div>
            <main>
                <!-- Products -->
                <article x-data="dashboardData()" x-init="init()">
                    @csrf
                    <section class="mb-8">
                        <div class="card lg:card-side bg-base-100 shadow-xl">
                            <div class="card-body">
                                <h2 class="card-title">Products</h2>
                                <div class="overflow-x-auto">
                                    <table class="table w-full">
                                        <!-- head -->
                                        <thead>
                                        <tr>
                                            <th>Image</th>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Status</th>
                                            <th>Price</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- Loop through products data -->
                                        <template x-for="product in products" :key="product.id">
                                            <tr class="border-b border-gray-200 hover:bg-gray-600">
                                                <td>
                                                    <div class="flex items-center space-x-3">
                                                        <div class="avatar">
                                                            <div class="mask mask-square w-12 h-12">
                                                                <img :src="product.image" alt="Product Image" class="click-to-enlarge-image cursor-pointer" x-on:click="enlargeImage(product.image)">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td x-text="product.name"></td>
                                                <td x-text="product.description"></td>
                                                <td x-text="product.status"></td>
                                                <td x-text="product.price"></td>
                                                <td>
                                                    <div class="card-actions">
                                                        <button class="btn btn-sm btn-outline btn-info" x-on:click="editProduct(product.id)">Edit</button>
                                                        <button class="btn btn-sm btn-outline btn-error" x-on:click="deleteProduct(product.id)">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </template>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <!-- Modal for displaying the clicked product image -->
                        <div x-show="isImageEnlarged" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50 rounded-md " style="display: none;" x-on:click.self="isImageEnlarged = false">
                            <img :src="enlargedImage" class="max-w-full max-h-full p-4" x-on:click.stop>
                        </div>
                    </section>
                    <!-- Menus Section -->
                    <section class="mb-8">
                        <div class="card lg:card-side bg-base-100 shadow-xl">
                            <div class="card-body">
                                <h2 class="card-title">Menus</h2>
                                <div class="overflow-x-auto">
                                    <table class="table w-full">
                                        <!-- head -->
                                        <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Description</th>
                                            <th>Actions</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <!-- Loop through menus data -->
                                        <template x-for="menu in menus" :key="menu.id">
                                            <tr class="border-b border-gray-200 hover:bg-gray-600">

                                                <td x-text="menu.name"></td>
                                                <td x-text="menu.description"></td>
                                                <td>
                                                    <div class="card-actions">
                                                        <button class="btn btn-sm btn-outline btn-info" x-on:click="editMenu(menu.id)">Edit</button>
                                                        <button class="btn btn-sm btn-outline btn-error" x-on:click="deleteMenu(menu.id)">Delete</button>
                                                    </div>
                                                </td>
                                            </tr>
                                        </template>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </section>
                    <!-- ... existing modal for displaying images ... -->


                </article>
            </main>
        </div>
    </div>

    <script>
        document.addEventListener('alpine:init', () => {
            Alpine.data('dashboardData', () => ({
                products: [],
                menus: [],
                // ... existing properties ...

                init() {
                    this.fetchProducts();
                    this.fetchMenus();
                    // ... any additional fetch calls ...
                },

                fetchProducts() {
                    fetch('/products') // Adjust the URL if necessary to match your route definition
                        .then(response => {
                            if (!response.ok) {
                                throw new Error('Network response was not ok');
                            }
                            return response.json();
                        })
                        .then(data => {
                            this.products = data;
                        })
                        .catch(error => {
                            console.error('There has been a problem with your fetch operation:', error);
                        });
                },

                fetchMenus() {
                    fetch('/menus')
                        .then(response => response.json())
                        .then(data => this.menus = data)
                        .catch(error => console.error('Error fetching menus:', error));
                },

                // ... existing methods for products ...

                editMenu(menuId) {
                    // Logic to edit menu
                },

                deleteMenu(menuId) {
                    // Logic to delete menu
                },

            }));
        });
    </script>

@endsection

