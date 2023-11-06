import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


/*!

=========================================================
* Argon Dashboard Tailwind - v1.0.1
=========================================================

* Product Page: https://www.creative-tim.com/product/argon-dashboard-tailwind
* Copyright 2022 Creative Tim (https://www.creative-tim.com)

* Coded by www.creative-tim.com

=========================================================

* The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

*/
var page = window.location.pathname.split("/").pop().split(".")[0];
var aux = window.location.pathname.split("/");
var to_build = (aux.includes('pages') || aux.includes('docs') ?'../':'./');
var root = window.location.pathname.split("/")
if (!aux.includes("pages")) {
    page = "dashboard";
}

loadStylesheet(to_build + "assets/css/perfect-scrollbar.css");
loadJS(to_build + "assets/js/perfect-scrollbar.js", true);

if (document.querySelector("[slider]")) {
    loadJS(to_build + "assets/js/carousel.js", true);
}

if (document.querySelector("nav [navbar-trigger]")) {
    loadJS(to_build + "assets/js/navbar-collapse.js", true);
}

if (document.querySelector("[data-target='tooltip']")) {
    loadJS(to_build + "assets/js/tooltips.js", true);
    loadStylesheet(to_build + "assets/css/tooltips.css");
}

if (document.querySelector("[nav-pills]")) {
    loadJS(to_build + "assets/js/nav-pills.js", true);
}

if (document.querySelector("[dropdown-trigger]")) {
    loadJS(to_build + "assets/js/dropdown.js", true);

}

if (document.querySelector("[fixed-plugin]")) {
    loadJS(to_build + "assets/js/fixed-plugin.js", true);
}

if (document.querySelector("[navbar-main]") || document.querySelector("[navbar-profile]")) {
    if(document.querySelector("[navbar-main]")){
        loadJS(to_build + "assets/js/navbar-sticky.js", true);
    }
    if (document.querySelector("aside")) {
        loadJS(to_build + "assets/js/sidenav-burger.js", true);
    }
}

if (document.querySelector("canvas")) {
    loadJS(to_build + "assets/js/charts.js", true);
}

if (document.querySelector(".github-button")) {
    loadJS("https://buttons.github.io/buttons.js", true);
}

function loadJS(FILE_URL, async) {
    let dynamicScript = document.createElement("script");

    dynamicScript.setAttribute("src", FILE_URL);
    dynamicScript.setAttribute("type", "text/javascript");
    dynamicScript.setAttribute("async", async);

    document.head.appendChild(dynamicScript);
}

function loadStylesheet(FILE_URL) {
    let dynamicStylesheet = document.createElement("link");

    dynamicStylesheet.setAttribute("href", FILE_URL);
    dynamicStylesheet.setAttribute("type", "text/css");
    dynamicStylesheet.setAttribute("rel", "stylesheet");

    document.head.appendChild(dynamicStylesheet);
}

document.addEventListener('alpine:init', () => {
    Alpine.data('dashboardData', () => ({
        products: [],
        isImageEnlarged: false,
        enlargedImage: '',
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
        enlargeImage(imageUrl) {
            this.enlargedImage = imageUrl;
            this.isImageEnlarged = true;
        },

    }));
});
