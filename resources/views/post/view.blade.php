<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('View Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 flex justify-between">
                    <h2 class="text-2xl font-semibold">{{ $post->title ? $post->title : '' }}</h2>
                    <div class="flex justify-end items-end ">
                        @if ($post->is_published == 0)
                            <form action="{{ route('posts.publish', $post->id) }}" method="POST">
                                @csrf
                                <button
                                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="submit">
                                    Publish
                                </button>
                            </form>
                        @else
                            <form action="{{ route('posts.unpublish', $post->id) }}" method="POST">
                                @csrf

                                <button
                                    class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                                    type="submit">
                                    Un Publish
                                </button>
                            </form>
                        @endif
                        <button style="margin-left: 10px" wire:navigate="{{ route('posts.show', $post->id) }}"
                            class="ml-2 block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                            type="button">
                            Edit
                        </button>
                    </div>
                </div>
            </div>
            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-2">
                <div class="grid grid-cols-2">
                    {{-- col-1 --}}
                    <div>
                        <div class="w-1/3">
                            <div class="flex-1">
                                <div>
                                    <p class="font-medium">Created By: {{ $post->users->name }}</p>
                                    {{-- <p class="font-sm">{{ $post->users->email }}</p> --}}
                                    <p class="text-sm text-gray-500">Posted {{ $post->created_at }}</p>
                                    <p class="font-sm mt-4">
                                        Category: {{ $post->category->name ? $post->category->name : 'N/A' }}
                                    </p>
                                    <p class="text-gray-600 mt-4 text-justify">
                                        <b class="font-bold">Description:</b>
                                        {{ $post->content ? $post->content : 'N/A' }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- col-2 --}}
                    <div>
                        <div class="w-72">
                            <div
                                class="border-2 border-dashed border-gray-300 rounded-lg h-72 flex items-center justify-center">
                                <div class="aspect-w-16 aspect-h-9 bg-gray-100 rounded-lg overflow-hidden">
                                    <img src="{{ $post->public_path }}" alt="{{ $post->title }}"
                                        class="w-full h-full object-cover" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="flex justify-between">
                    <a wire:navigate href="{{ route('posts.index') }}"
                        class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-700">
                        Go Back
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
