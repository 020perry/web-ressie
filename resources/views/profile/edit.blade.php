@extends('layouts.app')

@section('header')
    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
        {{ __('Profile') }}
    </h2>
@endsection

@section('content')
    <div id="main-content" class="h-full w-full bg-gray-50 relative overflow-y-auto lg:ml-64">
        <main>
            <div class="pt-6 px-4">
                <div class="grid grid-cols-1 2xl:grid-cols-2 xl:gap-4 my-4">

                    <!-- Profile Section -->
                    <div class="overflow-x-auto max-h-[600px] bg-white dark:bg-gray-800 shadow sm:rounded-lg mb-4 p-4 sm:p-6 h-full">
                        <div class="max-w-xl">
                            @include('profile.partials.update-profile-information-form')
                        </div>
                    </div>

                    <!-- Update Password Section -->
                    <div class="overflow-x-auto max-h-[600px] bg-white dark:bg-gray-800 shadow sm:rounded-lg mb-4 p-4 sm:p-6 h-full">
                        <div class="max-w-xl">
                            @include('profile.partials.update-password-form')
                        </div>
                    </div>

                    <!-- Delete User Section -->
                    <div class="overflow-x-auto max-h-[600px] bg-white dark:bg-gray-800 shadow sm:rounded-lg mb-4 p-4 sm:p-6 h-full">
                        <div class="max-w-xl">
                            @include('profile.partials.delete-user-form')
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
@endsection
