
<div class="mb-8"  x-data="dashboardData()">
    <div class="card lg:card-side bg-base-100 shadow-xl">
        <div class="card-body">
            <h2 class="card-title">Menus</h2>
            <div class="overflow-x-auto">


        <table class="table w-full">
        <thead>
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        <template x-for="(menu, index) in menus" :key="menu.id">
            <tr>
                <!-- Non-editable state -->
                <td x-show="!menu.editing" x-text="menu.name"></td>
                <td x-show="!menu.editing" x-text="menu.description"></td>
                <td x-show="!menu.editing">
                    <button class="btn btn-outline btn-info" x-on:click="editMenu(menu.id)">Edit</button>
                </td>

                <!-- Editable state -->
                <td x-show="menu.editing">
                    <input class="input input-bordered" type="text" x-model="menu.name">
                </td>
                <td x-show="menu.editing">
                    <input class="input input-bordered" type="text"x-model="menu.description">
                </td>
                <td x-show="menu.editing">
                    <button class="btn btn-success" x-on:click="saveMenu(index, menu.id)">Save</button>
                    <button class="btn btn-secondary" x-on:click="cancelEdit(index)">Cancel</button>
                </td>
            </tr>
        </template>
        </tbody>
    </table>
</div>
