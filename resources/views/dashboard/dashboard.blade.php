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
        statuses: {
            available: 'AVAILABLE',
            outOfOrder: 'OUT_OF_ORDER'
        },
        isEditing: false,
        showSuccessMessage: false,
        successMessage: '',
        formatStatus(status) {
            return status === this.statuses.available ? 'Available' : 'Out of Order';
        },

        //
        // availableStatus: 'AVAILABLE', // This should match the constant in your Product model
        // outOfOrderStatus: 'OUT_OF_ORDER', // This should also match the constant in your Product model
        //
        //

        init() {
            this.fetchProducts();
            this.fetchMenus();
            this.fetchCategories();
        },

        showTab(tab) {
            this.activeTab = tab;
        },

        enlargeImage(imageSrc) {
            this.isImageEnlarged = true;
            this.enlargedImage = imageSrc;
        },

        fetchProducts() {
            fetch('/products')
                .then(response => response.json())
                .then(data => {
                    this.products = data.map(product => {
                        // If there's no category, provide a default empty object
                        product.category = product.category || { name: 'No category' };
                        product.editing = false;
                        return product;
                    });
                });
        },

        fetchCategories() {
            fetch('/categories') // Adjust URL as needed
                .then(response => response.json())
                .then(data => {
                    this.categories = data;
                });
        },

        editProduct(productId) {
            let productIndex = this.products.findIndex(p => p.id === productId);
            if (productIndex !== -1) {
                // Store the original data before editing
                this.products[productIndex].originalData = { ...this.products[productIndex] };
                this.products[productIndex].editing = true;
                this.products[productIndex].status = this.convertStatus(this.products[productIndex].status);

                // Log the status and available statuses
                console.log('Editing status:', this.products[productIndex].status);
                console.log('Available statuses:', this.statuses);
            } else {
                console.error('Product with ID ' + productId + ' not found');
            }
        },
        convertStatus(status) {
            if (status === 'out_of_order') {
                return this.statuses.outOfOrder;
            }
            if (status === 'available') {
                return this.statuses.available;
            }
            return status; // default return if no match
        },

        getCategoryName(categoryId) {
            let category = this.categories.find(c => c.id === categoryId);
            return category ? category.name : 'No category';
        },

        // saveProduct(index, productId) {
        //     let product = this.products[index];
        //     fetch('/products/' + productId, { // The correct endpoint for product update
        //         method: 'PUT', // or 'PATCH' depending on your API
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //         },
        //         body: JSON.stringify({
        //             name: product.name,
        //             description: product.description,
        //             price: product.price
        //             // Include other fields that need to be updated
        //         })
        //     })
        //         .then(response => {
        //             if (!response.ok) throw response;
        //             return response.json();
        //         })
        //         .then(data => {
        //             this.products[index].editing = false;
        //             Object.assign(this.products[index], data);
        //             // Handle success message...
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //             // Handle error message...
        //         });
        // },

        // saveProduct(index, productId) {
        //     let product = this.products[index];
        //     fetch('/products/' + productId, { // The correct endpoint for product update
        //         method: 'POST', // Use POST for compatibility with browsers that do not support PUT directly
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        //         },
        //         body: JSON.stringify({
        //             '_method': 'PUT', // Spoof the PUT method
        //             name: product.name,
        //             description: product.description,
        //             price: product.price,
        //             status: product.status, // Assuming you want to update the status as well
        //             category_id: product.category_id // Assuming you want to update the category as well
        //             // Add any other fields you need to update
        //         })
        //     })
        //         .then(response => {
        //             if (!response.ok) throw response;
        //             return response.json();
        //         })
        //         .then(data => {
        //             this.products[index].editing = false;
        //             Object.assign(this.products[index], data);
        //         })
        //         .then(data => {  this.showSuccessMessage = true;
        //             this.successMessage = 'Product changes have been saved successfully!';
        //             // Hide the success message after some time
        //             setTimeout(() => {
        //                 this.showSuccessMessage = false;
        //             }, 3000);
        //         })
        //         .catch(error => {
        //             console.error('Error:', error);
        //         });
        // },


        // saveProduct(index, productId) {
        //     let product = this.products[index];
        //
        //     // Include the CSRF token from a meta tag
        //     let csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');
        //
        //     let requestOptions = {
        //         method: 'PUT', // or 'PATCH'
        //         headers: {
        //             'Content-Type': 'application/json',
        //             'X-CSRF-TOKEN': csrfToken
        //         },
        //         body: JSON.stringify({
        //             name: product.name,
        //             description: product.description,
        //             price: product.price,
        //             status: product.status,
        //             category_id: product.category_id,
        //             // Include other product fields here
        //         })
        //     };
        //
        //     // Use the correct route as defined in your web.php
        //     fetch('/products/' + productId, requestOptions)
        //         .then(response => {
        //             if (!response.ok) {
        //                 // If the response is a redirect, it's likely an error page
        //                 if (response.redirected) {
        //                     throw new Error('Redirected to an error page.');
        //                 }
        //                 throw response;
        //             }
        //             return response.json();
        //         })
        //         .then(updatedProduct => {
        //             // Update the local product with the updated data
        //             this.products[index] = { ...this.products[index], ...updatedProduct };
        //             this.products[index].editing = false;
        //             // Display success message or update UI as needed
        //         })
        //         .catch(error => {
        //             error.json().then(body => {
        //                 // Log or display error information from the server
        //                 console.error('Error:', body);
        //             }).catch(() => {
        //                 // If the error response wasn't JSON, log the whole error
        //                 console.error('Error:', error);
        //             });
        //         });
        // },

        handleImageUpload(event, index) {
            let file = event.target.files[0];
            if (file) {
                // Temporary URL to display the image
                this.products[index].imagePreview = URL.createObjectURL(file);
                // Attach the file to the product object to be sent to the server
                this.products[index].newImage = file;
            }
        },

        saveProduct(index, productId) {
            let product = this.products[index];
            let formData = new FormData();

            // Add the fields to the form data object
            formData.append('name', product.name);
            formData.append('description', product.description);
            formData.append('price', product.price);
            formData.append('status', product.status);
            formData.append('category_id', product.category_id);
            formData.append('_method', 'PUT'); // For Laravel to treat this as a PUT request

            // Check if a new image file is attached
            if (product.newImage) {
                formData.append('image', product.newImage);
            }

            // Perform the request
            fetch('/products/' + productId, {
                method: 'POST', // Since FormData is used, Laravel requires POST method
                headers: {
                    'X-Requested-With': 'XMLHttpRequest', // To indicate an AJAX request
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: formData
            })
                .then(response => {
                    if (!response.ok) throw response;
                    return response.json();
                })
                .then(data => {
                    if (data.success) {
                        this.products[index].editing = false;
                        Object.assign(this.products[index], product);
                        this.products[index].image = data.imageUrl || this.products[index].image; // Update image URL if new image is uploaded
                        // Handle success message...
                    }
                })
                .then(data => {
                    this.products[index].editing = false;
                    Object.assign(this.products[index], data);
                    // Clear the original data on successful save
                    delete this.products[index].originalData;
                    // Handle success message...
                })
                .catch(error => {
                    error.json().then(err => {
                        console.error('Error:', err);
                        // Handle error message...
                    });
                });
        },


        deleteProduct(productId, index) {
            if (confirm('Are you sure you want to delete this product?')) {
                fetch('/products/' + productId, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => {
                        if (!response.ok) throw response;
                        return response.json();
                    })
                    .then(() => {
                        this.products.splice(index, 1);
                        // Handle success message...
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        // Handle error message...
                    });
            }
        },

        cancelEditProduct(index) {
            // Reset the editing state
            this.products[index].editing = false;

            // If you kept the original product data before editing,
            // you can revert to that data here. For example:
            if (this.products[index].originalData) {
                Object.assign(this.products[index], this.products[index].originalData);
                // Remove the temporary original data to avoid stale data
                delete this.products[index].originalData;
            }

            // If you have an image preview, you should also reset it
            if (this.products[index].imagePreview) {
                this.products[index].imagePreview = null;
            }

            // Reset the newImage property if it was set
            if (this.products[index].newImage) {
                this.products[index].newImage = null;
            }
        },



        fetchMenus() {
            // Your existing fetchMenus method, but also add an editing flag to each menu
            fetch('/menus')
                .then(response => response.json())
                .then(data => {
                    this.menus = data.map(menu => ({ ...menu, editing: false }));
                });
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

        deleteMenu(menuId, index) {
            if (confirm('Are you sure you want to delete this menu?')) {
                fetch('/menus/' + menuId, {
                    method: 'DELETE',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                })
                    .then(response => {
                        if (!response.ok) throw response;
                        return response.json();
                    })
                    .then(() => {
                        // Remove the menu item from the menus array
                        this.menus.splice(index, 1);
                        this.showSuccessMessage = true;
                        this.successMessage = 'Menu deleted successfully.';
                        // Hide the success message after some time
                        setTimeout(() => {
                            this.showSuccessMessage = false;
                        }, 3000);
                    })
                    .catch(error => {
                        console.error('Error:', error);
                    });
            }
        },

        cancelEdit(index) {
            this.menus[index].editing = false;
            // Optionally reset the fields to their original values if needed
        },


    };
}
</script>


@endsection
