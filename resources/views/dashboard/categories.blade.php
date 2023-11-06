<section class="mb-8" x-data="dashboardData()" x-init="init()">
    <div class="card lg:card-side bg-base-600 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Categories</h2>
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
                    <template x-for="category in categories" :key="category.id">
                        <tr class="border-b border-gray-200 hover:bg-gray-600">

                            <td x-text="category.name"></td>
                            <td x-text="category.description"></td>
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

