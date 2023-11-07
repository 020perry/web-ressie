<div class="navbar bg-base-100">
    <div class="navbar-start">
        <div class="dropdown">
            <label tabindex="0" class="btn btn-ghost lg:hidden">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h8m-8 6h16" /></svg>
            </label>
            <ul tabindex="0" class="menu menu-sm dropdown-content mt-3 z-50 p-2 shadow bg-base-100 rounded-box w-52">
                <li>
                    <a>Restaurant</a>
                    <ul class="p-2">
                        <li><a href="{{ route('menus.index') }}">Menus</a></li>
                        <li><a href="{{ route('products.index') }}">Producten</a></li>
                        <li><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li><a href="{{ route('dashboard.qr') }}">QR</a></li>
                    </ul>
                </li>

                <li><a href="{{ route('dashboard') }}">Dashboard</a></li>


                <li>
                    <a>Profile</a>
                    <ul class="p-2">
                        <li><a href="{{ route('profile.edit') }}">Edit</a></li>
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                                Logout
                            </a></li>
                    </ul>
                </li>

            </ul>
        </div>
     <a class="btn btn-ghost normal-case text-xl" href="{{ route('dashboard') }}">Web-Ressie</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal z-50 px-1">

            <li tabindex="0">
                <details>
                    <summary>Restaurant</summary>
                    <ul class="p-2">
                        <li><a href="{{ route('menus.index') }}">Menus</a></li>
                        <li><a href="{{ route('products.index') }}">Producten</a></li>
                        <li><a href="{{ route('categories.index') }}">Categories</a></li>
                        <li><a href="{{ route('dashboard.qr') }}">QR</a></li>
                    </ul>


                </details>
            </li>

            <li><a href="{{ route('dashboard') }}">Dashboard</a></li>


        </ul>

    </div>

    <div class="navbar-end hidden lg:flex">
        <ul class="menu menu-horizontal z-50 px-1">
            <!-- Profile Dropdown -->
            <li tabindex="0">
                <details>
                    <summary>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z" />
                            </svg>
                        Profile
                    </summary>
                    <ul class="p-1">
                        <li><a href="{{ route('profile.edit') }}">Edit</a></li>
                        <li><a href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                           document.getElementById('logout-form').submit();">
                                Logout
                            </a></li>
                    </ul>
                </details>
            </li>
        </ul>
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    </div>
</div>
