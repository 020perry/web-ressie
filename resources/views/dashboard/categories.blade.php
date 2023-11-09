<div class="mb-8" x-data="dashboardData()" x-init="init()">
    <div class="card lg:card-side bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Categories</h2>
            <div class="overflow-x-auto">
                <div x-cloak x-show.transition="showSuccessMessage" class="alert alert-success">
                    <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span x-text="successMessage"></span>
                </div>

                <table class="table w-full">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <template x-for="(category, index) in categories" :key="category.id">
                        <tr>
                            <!-- Non-editable state -->
                            <td x-show="!category.editing" x-text="category.name"></td>
                            <td x-show="!category.editing">
                                <button class="btn btn-outline btn-info" x-on:click="editCategory(category.id)">Edit</button>
                                <button class="btn btn-outline btn-error" x-on:click="deleteCategory(category.id, index)">Delete</button>
                            </td>

                            <!-- Editable state -->
                            <td x-show="category.editing">
                                <input class="input input-bordered" type="text" x-model="category.name">
                            </td>
                            <td x-show="category.editing">
                                <button class="btn btn-success" x-on:click="saveCategory(index, category.id)">Save</button>
                                <button class="btn btn-secondary" x-on:click="cancelEdit(index)">Cancel</button>
                            </td>
                        </tr>
                    </template>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
