@extends('layouts.app')
<div class="login-container">
    <div class="login-box">
        <h3 class="font-bold text-lg">Login</h3>
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
                <a href="{{ route('register') }}" class="underline text-sm text-gray-600 hover:text-gray-900">
                    {{ __("Don't have an account? Register now!") }}
                </a>

                <x-primary-button class="ml-4">
                    {{ __('Login') }}
                </x-primary-button>
            </div>
        </form>
    </div>
</div>


