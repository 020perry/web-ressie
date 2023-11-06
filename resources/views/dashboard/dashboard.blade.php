@extends('layouts.app')

@section('content')

    <!-- Main Content -->
    <div class="flex-1 overflow-y-auto p-4" x-data="dashboardData">
        <!-- Secondary Navigation -->
        <div class="bg-gray-100 p-4 rounded-md mb-4">
            <nav class="flex space-x-4">
                <button class="px-3 py-2 text-sm font-medium text-gray-700 rounded-md"
                        :class="{ 'bg-white shadow': activeTab === 'products' }"
                        @click="showTab('products')">Products</button>
                <button class="px-3 py-2 text-sm font-medium text-gray-700 rounded-md"
                        :class="{ 'bg-white shadow': activeTab === 'menus' }"
                        @click="showTab('menus')">Menus</button>
                <button class="px-3 py-2 text-sm font-medium text-gray-700 rounded-md"
                        :class="{ 'bg-white shadow': activeTab === 'categories' }"
                        @click="showTab('categories')">Categories</button>
            </nav>
        </div>

        <!-- Dynamic Content -->
        <div x-show="activeTab === 'products'">
            @include('dashboard.products')
        </div>

        <div x-show="activeTab === 'menus'">
            @include('dashboard.menus')
        </div>

        <div x-show="activeTab === 'categories'">
            @include('dashboard.categories')
        </div>


    </div>





<script>
function dashboardData() {
    return {
        activeTab: 'products',
        products: [],
        menus: [],
        categories: [],
        isImageEnlarged: false,
        enlargedImage: '',
        product: {},
        statuses: [],
        isEditing: false,

        init() {
            this.fetchProducts();
            this.fetchMenus();
            this.fetchCategories();
        },

        showTab(tab) {
            this.activeTab = tab;
        },

        fetchProducts() {
            // Your existing fetchProducts method
        },

        fetchMenus() {
            // Your existing fetchMenus method, but also add an editing flag to each menu
            fetch('/menus')
                .then(response => response.json())
                .then(data => {
                    this.menus = data.map(menu => ({ ...menu, editing: false }));
                });
        },

        fetchCategories() {
            // Your existing fetchCategories method
        },

        editMenu(menuId) {
            let menuIndex = this.menus.findIndex(m => m.id === menuId);
            if(menuIndex !== -1) {
                this.menus[menuIndex].editing = true;
            } else {
                console.error('Menu with ID ' + menuId + ' not found');
            }
        },
        saveMenu(index, menuId) {
            let menu = this.menus[index];
            fetch('/menus/' + menuId, { // Make sure this is the correct endpoint
                method: 'PUT', // or 'PATCH' depending on your API design
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Ensure CSRF token is included
                },
                body: JSON.stringify({
                    name: menu.name,
                    description: menu.description
                    // Include other fields that need to be updated
                })
            })
                .then(response => {
                    if (!response.ok) throw response;
                    return response.json();
                })
                .then(data => {
                    this.menus[index].editing = false;
                    Object.assign(this.menus[index], data);
                })
                .catch(error => {
                    console.error('Error:', error);
                });
        },

        // saveMenu(index, menuId) {
        //     let menu = this.menus[index];
        //     fetch('/menu/' + menuId, {
        //         method: 'POST', // Change to PUT or PATCH as per your API requirements
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content') // Ensure CSRF token is included
        //         },
        //         body: JSON.stringify({
        //             name: menu.name,
        //             description: menu.description
        //             // Include other fields that need to be updated
        //         })
        //     })
        //     .then(response => {
        //         if (!response.ok) throw response;
        //         return response.json();
        //     })
        //     .then(data => {
        //         this.menus[index].editing = false;
        //         Object.assign(this.menus[index], data);
        //     })
        //     .catch(error => {
        //         console.error('Error:', error);
        //     });
        // },

        cancelEdit(index) {
            this.menus[index].editing = false;
            // Optionally reset the fields to their original values if needed
        },
    };
}
</script>


@endsection
