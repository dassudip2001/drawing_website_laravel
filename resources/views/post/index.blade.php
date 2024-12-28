<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <!--body  -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h2 class="text-2xl font-semibold">Posts</h2>
                        <div>
                            <!-- if the user have admin role other wish add category then show -->
                            {{-- @if (auth()->user()->hasRole('admin') || auth()->user()->can('add category')) --}}
                            <a  href="{{ route('posts.create') }}"
                                class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                type="button">
                                Add New Posts
                            </a>
                            {{-- @endif --}}
                        </div>
                    </div>
                </div>
            </div>
            <!-- card body -->
            <div class="relative overflow-x-auto shadow-md mt-3 sm:rounded-lg">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase ">
                        <tr>
                            <th scope="col" class="px-6 py-3">
                                name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Created By
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Status
                            </th>
                            <!-- check if user has admin or user have edit category or delete category then show -->
                            {{-- @if (auth()->user()->hasRole('admin') || auth()->user()->can('delete category') || auth()->user()->can('edit category')) --}}
                            <th scope="col" class="px-6 py-3 text-center">
                                More
                            </th>
                            {{-- @endif --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($posts as $pst)
                            <tr
                                class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                                <th scope="row"
                                    class="flex items-center px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                    <img class="w-10 h-10 rounded-full" src="{{ $pst->public_path }}"
                                        alt="{{ $pst->title }}">
                                    <div class="ps-3">
                                        <div class="text-base font-semibold" wire:navigate
                                            href="{{ route('details.index', $pst->id) }}">{{ $pst->title }}</div>
                                        {{-- <div class="font-normal text-gray-500">neil.sims@flowbite.com</div> --}}
                                    </div>
                                </th>
                                <td class="px-6 py-4">
                                    {{ $pst->users->name }}
                                </td>

                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        {{-- {{ $category->created_at->diffForHumans() }} --}}
                                        <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div>
                                        {{ $pst->created_at->diffForHumans() }}
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <div class="flex items-center">
                                        {{-- <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> --}}
                                        @if ($pst->is_published == 1)
                                            <span
                                                class="bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">Published</span>
                                        @else
                                            <span
                                                class="bg-red-100 text-red-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-red-900 dark:text-red-300">Not
                                                Published</span>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    {{-- @if (auth()->user()->hasRole('admin') || auth()->user()->can('delete category')) --}}
                                    <livewire:delete-post :post="$pst" :key="$pst->id" />
                                    {{-- @endif --}}


                                    <!-- check user role has admin access or user have edit category then show -->
                                    {{-- @if (auth()->user()->hasRole('admin') || auth()->user()->can('edit category')) --}}
                                    <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline"
                                        wire:navigate href="{{ route('posts.show', $pst->id) }}">Edit</a>
                                    {{-- @endif --}}

                                </td>
                            </tr>
                        @endforeach
                        {{-- no record found --}}
                        @if ($posts->isEmpty())
                            <tr>
                                <td colspan="5" class="text-center py-4 bg-white">No Record Found</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
