@extends('layouts.app')

@section('header')
    Welcome to {{ config('app.name', 'webRessie') }}
@endsection

@section('content')
    <div x-data="appData()">

        <div class="hero min-h-screen bg-base-200">
            <div class="hero-content text-center">
                <div class="max-w-md">
                    <h1 class="text-5xl font-bold">Hello there</h1>
                    <p class="py-6">Provident cupiditate voluptatem et in. Quaerat fugiat ut assumenda excepturi exercitationem quasi. In deleniti eaque aut repudiandae et a id nisi.</p>
                    <button class="btn btn-primary" @click.prevent="showModal('register')">Get Started</button>
                </div>
            </div>
        </div>

        <dialog id="registerModal" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Register</h3>
                <!-- Insert the registration form here -->
                <form method="POST" action="{{ route('register') }}">
                    @csrf

                    <!-- Name -->
                    <div>
                        <x-input-label for="name" :value="__('Name')" />
                        <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="email" :value="__('Email')" />
                        <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="password" :value="__('Password')" />

                        <x-text-input id="password" class="block mt-1 w-full"
                                      type="password"
                                      name="password"
                                      required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <!-- Confirm Password -->
                    <div class="mt-4">
                        <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

                        <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                      type="password"
                                      name="password_confirmation" required autocomplete="new-password" />

                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a @click.prevent="showModal('login')" class="underline text-sm text-gray-600 hover:text-gray-900">
                            {{ __('Already have an account?') }}
                        </a>

                        <x-primary-button class="ml-4">
                            {{ __('Register') }}
                        </x-primary-button>
                    </div>
                    @csrf

                </form>

                <div class="modal-action">
                    <form method="dialog">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn">Close</button>
                    </form>
                </div>
            </div>
        </dialog>

        <!-- Login Modal -->
        <dialog id="loginModal" x-ref="loginModal" class="modal modal-bottom sm:modal-middle">
            <div class="modal-box">
                <h3 class="font-bold text-lg">Login</h3>
                <!-- Insert the login form here -->
                <form method="POST" action="{{ route('login') }}">
                    @csrf

                    <!-- Email Address -->
                    <div class="mt-4">
                        <x-input-label for="login-email" :value="__('Email')" />
                        <x-text-input id="login-email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="username" />
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <!-- Password -->
                    <div class="mt-4">
                        <x-input-label for="login-password" :value="__('Password')" />
                        <x-text-input id="login-password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="flex items-center justify-end mt-4">
                        <a @click.prevent="showModal('register')" class="underline text-sm text-gray-600 hover:text-gray-900">
                            {{ __("Don't have an account? Register now!") }}
                        </a>

                        <x-primary-button class="ml-4">
                            {{ __('Login') }}
                        </x-primary-button>
                    </div>
                </form>

                <div class="modal-action">
                    <form method="dialog">
                        <!-- if there is a button in form, it will close the modal -->
                        <button class="btn">Close</button>
                    </form>
                </div>
            </div>
        </dialog>

        <script>
            function appData() {
                return {
                    showModal: function(type) {
                        const registerModal = document.getElementById('registerModal');
                        const loginModal = document.getElementById('loginModal');

                        if (type === 'register') {
                            registerModal.showModal();
                            loginModal.close();
                        } else if (type === 'login') {
                            loginModal.showModal();
                            registerModal.close();
                        }
                    }
                };
            }
        </script>


    </div> <!-- Closing the x-data div -->
@endsection
