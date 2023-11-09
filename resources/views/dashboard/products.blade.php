<!-- The rest of your HTML goes here -->
<section class="mb-8" x-data="dashboardData()" x-init="init()">
    <div class="card lg:card-side bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Products</h2>
            <div class="overflow-x-auto">

                <!-- Success message -->
                <div x-cloak x-show.transition="showSuccessMessage" class="alert alert-success">
                    <div class="flex-1">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        <span x-text="successMessage"></span>
                    </div>
                </div>

                <table class="table w-full">
                    <thead>
                    <tr>
                        <th>Image</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Category</th>
                        <th>Status</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <template x-for="(product, index) in products" :key="product.id">
                        <tr>
                            <!-- Non-editable state -->
                            <td x-show="!product.editing">
                                <div class="flex items-center space-x-3">
                                    <div class="avatar">
                                        <div class="mask mask-square w-12 h-12">
                                            <img :src="product.image" alt="Product Image" class="cursor-pointer" x-on:click="enlargeImage(product.image)">
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td x-show="!product.editing" x-text="product.name"></td>
                            <td x-show="!product.editing" x-text="product.description"></td>
                            <td x-show="!product.editing" x-text="getCategoryName(product.category_id)"></td>
                            <td x-show="!product.editing" x-text="formatStatus(product.status)"></td>
                            <td x-show="!product.editing" x-text="product.price"></td>
                            <td x-show="!product.editing">
                                <button class="btn btn-outline btn-info" x-on:click="editProduct(product.id)">Edit</button>
                                <button class="btn btn-outline btn-error" x-on:click="deleteProduct(product.id, index)">Delete</button>
                            </td>

                            <!-- Editable state -->
                            <td x-show="product.editing">
                                <input class="input input-bordered" type="file" x-on:change="handleImageUpload($event, index)">
                            </td>
                            <td x-show="product.editing">
                                <input class="input input-bordered" type="text" x-model="product.name">
                            </td>
                            <td x-show="product.editing">
                                <input class="input input-bordered" type="text" x-model="product.description">
                            </td>
{{--                            <td x-show="product.editing" x-text="getCategoryName(product.category_id)">--}}
{{--                                <select class="select select-bordered" x-model="product.category_id">--}}
{{--                                    <template x-for="category in categories" :key="category.id">--}}
{{--                                        <option :value="category.id" x-text="category.name"></option>--}}
{{--                                    </template>--}}
{{--                                </select>--}}
{{--                            </td>--}}

                            <!-- Editable state (form control) -->
                            <td x-show="product.editing">
                                <select class="select select-bordered" x-model="product.category_id">
                                    <template x-for="category in categories" :key="category.id">
                                        <option :value="category.id" x-text="category.name"></option>
                                    </template>
                                </select>
                            </td>


                            <td x-show="product.editing">
                                <select class="select select-bordered" x-model="product.status">
                                    <option value="available" x-bind:value="statuses.available">Available</option>
                                    <option value="out_of_order" x-bind:value="statuses.outOfOrder">Out of Order</option>
                                </select>

                            </td>






                            <td x-show="product.editing">
                                <input class="input input-bordered" type="text" x-model="product.price">
                            </td>
                            <td x-show="product.editing">
                                <button class="btn btn-success" x-on:click="saveProduct(index, product.id)">Save</button>
                                <button class="btn" x-on:click="cancelEditProduct(index)">Cancel</button>
                            </td>
                        </tr>
                    </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal for Enlarged Image -->
    <div x-cloak x-show="isImageEnlarged" class="fixed inset-0 bg-black bg-opacity-60 flex justify-center items-center z-50 transition-opacity duration-300" x-on:click.self="isImageEnlarged = false">
        <div class="bg-white p-4 rounded-lg shadow-xl max-w-4xl max-h-full overflow-auto relative">
            <!-- Enlarged image -->
            <img :src="enlargedImage" alt="Enlarged product image" class="rounded-md max-w-full max-h-[80vh] block mx-auto">

            <!-- Close button at the top right corner inside the modal -->
            <button class="absolute top-0 right-0 mt-4 mr-4 text-black bg-transparent hover:bg-gray-300 focus:outline-none rounded-full p-2" x-on:click="isImageEnlarged = false">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>
    </div>



</section>
