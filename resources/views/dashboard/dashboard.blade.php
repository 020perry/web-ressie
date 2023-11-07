@extends('layouts.app')

@section('content')

    <!-- Main Content -->
    <div class="flex-1 overflow-y-auto p-4" x-data="dashboardData">
        <div>
            <div class="tabs tabs-boxed flex justify-center items-center">
                <span class="mr-4 font-medium">Click to where you want to go:</span>
                <a class="tab" :class="{ 'tab-active': activeTab === 'products' }" @click.prevent="showTab('products')">Products</a>
                <a class="tab" :class="{ 'tab-active': activeTab === 'menus' }" @click.prevent="showTab('menus')">Menus</a>
                <a class="tab" :class="{ 'tab-active': activeTab === 'categories' }" @click.prevent="showTab('categories')">Categories</a>
            </div>



            <!-- Secondary Navigation -->

        <!-- Dynamic Content -->
        <div x-show="activeTab === 'products'">
            @include('dashboard.products')
        </div>

        <div x-cloak x-show="activeTab === 'menus'">
            @include('dashboard.menus')
        </div>

        <div x-cloak x-show="activeTab === 'categories'">
            @include('dashboard.categories')
        </div>

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
        showSuccessMessage: false,
        successMessage: '',

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
                .then(data => {
                this.showSuccessMessage = true;
                this.successMessage = 'Your changes have been saved successfully!';
                // Hide the success message after some time
                setTimeout(() => {
                    this.showSuccessMessage = false;
                }, 3000);
            })
                .catch(error => {
                    console.error('Error:', error);
                });
        },

        cancelEdit(index) {
            this.menus[index].editing = false;
            // Optionally reset the fields to their original values if needed
        },
    };
}
</script>


@endsection
