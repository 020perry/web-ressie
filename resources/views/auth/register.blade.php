@extends('layouts.app')
<div class="register-container">
    <div class="register-box">
        <h3 class="font-bold text-lg">Register</h3>
        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <label for="register-name">Name</label>
                <input id="register-name" class="block mt-1 w-full" type="text" name="name" required autocomplete="name" />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <label for="register-email">Email</label>
                <input id="register-email" class="block mt-1 w-full" type="email" name="email" required autocomplete="username" />
            </div>

            <!-- Password -->
            <div class="mt-4">
                <label for="register-password">Password</label>
                <input id="register-password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <label for="password_confirmation">Confirm Password</label>
                <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a href="{{ route('login') }}" class="underline text-sm text-gray-600 hover:text-gray-900">Already registered?</a>
                <button type="submit" class="ml-4">Register</button>
            </div>
        </form>
    </div>
</div>

