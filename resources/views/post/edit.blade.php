<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Post') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <h2 class="text-2xl font-semibold">Update Post</h2>
                    <small>
                        <p class="text-gray-500">All <span class="text-red-500">*</span> fields are required</p>
                    </small>
                </div>
            </div>
            <div
                class="max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-2">
                <form method="POST" action="{{ route('posts.update', $post->id) }}" enctype="multipart/form-data"
                    class="max-w-lg mx-auto">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-cols-2">
                        <div>
                            {{-- Title --}}
                            <div class="mb-6">
                                <label for="title"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Title <span class="text-red-500">*</span>:
                                </label>
                                <input type="text" id="title" name="title" value="{{ $post->title }}"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white"
                                    placeholder="Enter the Title" required>
                                @error('title')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- Category --}}
                            <div class="mb-6">
                                <label for="category_id"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Category <span class="text-red-500">*</span>:
                                </label>
                                <select id="category_id" name="category_id"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:text-white">
                                    <option value="">Choose a category</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category->id }}"
                                            {{ $post->category_id == $category->id ? 'selected' : '' }}>
                                            {{ $category->name }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                            </div>

                            {{-- File Upload --}}
                            <div class="mb-6">
                                <label for="file"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                    Upload file <span class="text-red-500">*</span>:
                                </label>
                                <input type="file" name="image" id="file"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 cursor-pointer dark:bg-gray-700 dark:text-gray-400 dark:border-gray-600">
                                @error('image')
                                    <span class="text-red-500 text-sm">{{ $message }}</span>
                                @enderror
                                <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Upload an image (jpeg, png,
                                    jpg, gif).
                                </p>
                            </div>
                        </div>
                        <div class="p-5" style="padding: 0 3rem;">
                            <div
                                class="border-2 border-dashed border-gray-300 rounded-lg  flex items-center justify-center">
                                <div class=" bg-gray-100 rounded-lg overflow-hidden"
                                    style="display: flex; justify-content:center; align-items:center">
                                    <img src="{{ $post->public_path }}" alt="{{ $post->title }}"
                                        class="w-1/3 h-1/3 object-cover max-w-[45%]"
                                        style="max-width: 45%; justify-content:center; align-items:center" />
                                </div>
                            </div>
                        </div>

                    </div>


                    {{-- <x-cld-upload-button> Upload Files </x-cld-upload-button> --}}

                    {{-- Content --}}
                    <div class="mb-6">
                        <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            Description
                        </label>
                        <textarea id="content" name="content" rows="4"
                            class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">{{ $post->content }}</textarea>
                    </div>

                    {{-- Submit Buttons --}}
                    <div class="flex justify-between">
                        <button type="submit"
                            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                            Update
                        </button>
                        <a href="{{ route('posts.index') }}"
                            class="py-2.5 px-5 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-700">
                            Go Back
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
