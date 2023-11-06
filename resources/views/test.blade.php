@extends('layouts.app')

@section('content')
    <div class="flex-1 overflow-y-auto p-4">
        <div>
            <main>
                <article>
                    <div class="card lg:card-side bg-base-100 shadow-xl">
                        <div class="card-body">
                            <h2 class="card-title">New album is released!</h2>
                            <div class="overflow-x-auto">
                                <table class="table">
                                    <!-- head -->
                                    <thead>
                                    <tr>
                                        <th>
                                            <label>
                                                <input type="checkbox" class="checkbox" />
                                            </label>
                                        </th>
                                        <th>Name</th>
                                        <th>Description</th>
                                        <th>Status</th>
                                        <th>Price</th>
                                        <th>Actions</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <!-- row 1 -->
                                    <tr>
                                        <th>
                                            <label>
                                                <input type="checkbox" class="checkbox" />
                                            </label>
                                        </th>
                                        <td>
                                            <div class="flex items-center space-x-3">
                                                <div class="avatar">
                                                    <div class="mask mask-square w-12 h-12">
                                                        <img src="" alt="Avatar Tailwind CSS Component" />
                                                    </div>
                                                </div>
                                                <div>
                                                    <div class="font-bold">Hart Hagerty</div>
                                                    <div class="text-sm opacity-50">United States</div>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            Zemlak, Daniel and Leannon
                                            <br/>
                                            <span class="badge badge-ghost badge-sm">Desktop Support Technician</span>
                                        </td>
                                        <td>Purple</td>
                                        <th>
                                            Available
                                        </th>
                                        <th>
                                            <div class="card-actions">
                                                <button class="btn btn-sm btn-outline btn-info">Edit</button>
                                                <button class="btn btn-sm btn-outline btn-error">Delete</button>
                                            </div>
                                        </th>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </article>
            </main>
        </div>


    </div>

@endsection


