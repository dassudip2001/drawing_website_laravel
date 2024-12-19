<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Module') }}
        </h2>
    </x-slot>

    <!--body  -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="flex justify-between">
                        <h2 class="text-2xl font-semibold">Users</h2>
                        <div>
                            <!-- if the user have admin role other wish add user then show -->
                            {{-- @if (auth()->user()->hasRole('admin') || auth()->user()->can('add user'))
                                <button data-modal-target="default-modal" data-modal-toggle="default-modal"
                                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="button">
                                    Add New user
                                </button>
                                @endif --}}
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
                                Name
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Email
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Role
                            </th>
                            <th scope="col" class="px-6 py-3">
                                Date
                            </th>
                            <!-- check if user has admin or user have edit user or delete user then show -->
                            @if (auth()->user()->hasRole('admin') || auth()->user()->can('delete user') || auth()->user()->can('edit user'))
                                <th scope="col" class="px-6 py-3 text-center">
                                    More
                                </th>
                            @endif
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $usr)
                            <tr class="bg-white border-b dark:bg-w ">
                                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $usr->name ? $usr->name : 'No Name' }}
                                </th>
                                <td class="px-6 py-4">
                                    {{ $usr->email ? $usr->email : 'No Email' }}
                                </td>
                                <td class="px-6 py-4">
                                    @foreach ($usr->roles as $ur)
                                        <span
                                            class="inline-flex items-center justify-center px-2 py-1 text-xs font-bold leading-none text-green-100 bg-green-600 rounded-full">
                                            {{ ucfirst($ur->name) }}
                                        </span>
                                    @endforeach
                                </td>
                                <td class="px-6 py-4">
                                    {{ $usr->created_at->diffForHumans() }}
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <!-- check user role has admin access or user have delete user then show -->
                                    @if (auth()->user()->hasRole('admin') || auth()->user()->can('delete user'))
                                        <a href="#"
                                            class="font-medium text-red-600 dark:text-red-500 hover:underline"
                                            style="margin-right: 1rem;">
                                            Delete
                                        </a>
                                    @endif
                                    <!-- check user role has admin access or user have edit user then show -->
                                    @if (auth()->user()->hasRole('admin') || auth()->user()->can('edit user'))
                                        <a href="{{ url('/user', $usr->id) }}"
                                            class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                    @endif
                                </td>
                            </tr>
                    </tbody>
                    @endforeach
                </table>
            </div>

        </div>
    </div>
</x-app-layout>
