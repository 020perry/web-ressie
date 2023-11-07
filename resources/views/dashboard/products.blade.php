    <!-- The rest of your HTML goes here -->
    <section class="mb-8" x-data="dashboardData()" x-init="init()">
        <div class="card lg:card-side bg-base-100 shadow-xl">
            <div class="card-body">
                <h2 class="card-title">Products</h2>
                <div class="overflow-x-auto">
                    <table class="table w-full">
                        <!-- ... Table Head ... -->
                        <tbody>
                        <!-- Products Data Loop -->
                        <template x-for="product in products" :key="product.id">
                            <tr :class="{'bg-gray-600': editingId === product.id}">
                                <!-- Image -->
                                <td>
                                    <!-- Always show the current image -->
                                    <div class="flex items-center space-x-3">
                                        <div class="avatar">
                                            <div class="mask mask-square w-12 h-12">
                                                <img :src="product.image" alt="Product Image" class="cursor-pointer" x-on:click="enlargeImage(product.image)">
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Show file input when editing -->
                                    <div x-show="editingId === product.id" class="mt-2">
                                        <input class="input input-bordered" type="file" x-on:change="uploadImage($event, product)">
                                    </div>
                                </td>


                                <!-- Name -->
                                <td x-show="editingId !== product.id" x-text="product.name"></td>
                                <td x-show="editingId === product.id">
                                    <input class="input input-bordered" type="text" x-model="product.name">
                                </td>

                                <!-- Description -->
                                <td x-show="editingId !== product.id" x-text="product.description"></td>
                                <td x-show="editingId === product.id">
                                    <input class="input input-bordered" type="text" x-model="product.description">
                                </td>

                                <!-- Categories -->
                                <td x-show="editingId !== product.id" x-text="product.category"></td>
                                <td x-show="editingId === product.id">
                                    <select class="select select-bordered" x-model="product.category">
                                        <template x-for="category in categories" :key="category.id">
                                            <option :value="category.id" x-text="category.name"></option>
                                        </template>
                                    </select>
                                </td>

                                <!-- Status -->
                                <td x-show="editingId !== product.id" x-text="product.status"></td>
                                <td x-show="editingId === product.id">
                                    <select class="select select-bordered" x-model="product.status">
                                        <option value="Available">Available</option>
                                        <option value="Out of Order">Out of Order</option>
                                    </select>
                                </td>

                                <!-- Price -->
                                <td x-show="editingId !== product.id" x-text="product.price"></td>
                                <td x-show="editingId === product.id">
                                    <input class="input input-bordered" type="text" x-model="product.price">
                                </td>

                                <!-- Actions -->
                                <td>
                                    <div class="flex space-x-2">
                                        <button x-show="editingId !== product.id" class="btn btn-sm btn-outline btn-info" x-on:click="startEditing(product.id)">Edit</button>
                                        <button class="btn btn-primary" x-on:click="saveProduct(product)">Save</button>
                                        <button x-show="editingId === product.id" class="btn btn-sm btn-ghost" x-on:click="cancelEditing()">Cancel</button>
                                        <button x-show="editingId !== product.id" class="btn btn-sm btn-outline btn-error" x-on:click="deleteProduct(product.id)">Delete</button>
                                    </div>
                                </td>
                            </tr>
                        </template>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Modal for Enlarged Image -->
        <div x-cloak x-show="isImageEnlarged" class="fixed inset-0 bg-black bg-opacity-50 flex justify-center items-center z-50" x-on:click.self="isImageEnlarged = false">
            <div class="bg-white p-2 rounded">
                <div class="flex justify-end">
                    <button class="text-black" x-on:click="isImageEnlarged = false">&times;</button>
                </div>
                <img :src="enlargedImage" class="max-w-full max-h-full rounded-md" x-on:click.stop>
            </div>
        </div>

    </section>

