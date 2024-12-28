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
                    <h2 class="text-2xl font-semibold">Create a new Post</h2>
                    <small>
                        <p class="text-gray-500">All <span class="text-red-500">*</span> fields are required</p>
                    </small>
                </div>
            </div>
            <div
                class=" p-6 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700 mt-2">
                <form method="POST" action="{{ route('posts.store') }}" enctype="multipart/form-data" class=" mx-auto">
                    @csrf

                    <div class="flex ">
                        <div class="main-container w-[60%]">
                             {{-- Title --}}
                        <div class="mb-6">
                            <label for="title" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Title <span class="text-red-500">*</span>:
                            </label>
                            <input type="text" id="title" name="title" value="{{ old('title') }}"
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
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>
                            @error('category_id')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- File Upload --}}
                        {{-- <div class="mb-6">
                            <label for="file" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Upload file <span class="text-red-500">*</span>:
                            </label>
                            <input type="file" name="image" id="file"
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 cursor-pointer dark:bg-gray-700 dark:text-gray-400 dark:border-gray-600">
                            @error('image')
                                <span class="text-red-500 text-sm">{{ $message }}</span>
                            @enderror
                            <p class="mt-1 text-sm text-gray-500 dark:text-gray-300">Upload an image (jpeg, png, jpg,
                                gif).
                            </p>
                        </div> --}}

                        {{-- Content --}}
                        <div class="mb-6">
                            <label for="content" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                                Description
                            </label>
                            <textarea id="content" name="content" rows="4"
                            placeholder="Enter the Description"
                                class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:text-white">{{ old('content') }}</textarea>
                        </div>
                        </div>
                        <div class="image-container w-[40%]">
                            {{-- image --}}
                            <div class="m-2 flex justify-center items-center ">
                                <div class="w-[90%] sm:w-[60%] relative border-2 border-gray-300 border-dashed rounded-lg p-6"
                                    id="dropzone">
                                    <input type="file" class="absolute inset-0 w-full h-full opacity-0 z-50"
                                        id="imageUpload" accept=".png" />
                                    <div class="text-center">
                                        <img class="mx-auto h-12 w-12"
                                            src="https://www.svgrepo.com/show/357902/image-upload.svg"
                                            alt="{{ __('Upload Image') }}">
                                        <h3 class="mt-2 text-sm font-medium text-gray-900">
                                            <label for="file-upload" class="relative cursor-pointer">
                                                <span>{{ __('Drag and drop') }}</span>
                                                <span class="text-indigo-600"> {{ __('or browse') }}</span>
                                                <span>{{ __('to upload') }}</span>
                                                <input id="file-upload" name="file-upload" type="file"
                                                    class="sr-only" accept=".png">
                                            </label>
                                        </h3>
                                        <p class="mt-1 text-xs text-gray-500">
                                            {{ __('Upload PNG only and 400x400 size') }}
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <div class="flex items-center justify-center gap-2 px-4 mt-3" id="imagePreviewContainer">
                            </div>
                            <input type="hidden" id="imageUrls" name="imageUrls">
                        </div>

                    </div>


                    {{-- Submit Buttons --}}
                    <div class="flex items-end justify-end space-x-4">
                        <a href="{{ route('posts.index') }}"
                            class="py-2.5  px-5 text-sm font-medium text-gray-900 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 hover:text-blue-700">
                            Go Back
                        </a>
                        <button type="submit" style="margin-right: 10px"
                            class="text-white  bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5">
                            Save
                        </button>

                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        const imageUpload = document.getElementById('imageUpload');
        const imagePreviewContainer = document.getElementById('imagePreviewContainer');
        const imageUrlsInput = document.getElementById('imageUrls');

        let uploadedUrl = null; // Store the single uploaded URL

        // Function to create a preview element for a single image
        function createImagePreview(imageUrl) {
            const wrapper = document.createElement('div');
            wrapper.className = 'relative inline-block';

            const img = document.createElement('img');
            img.src = imageUrl;
            img.className = 'rounded-md shadow-md';
            img.style.width = '40px';
            img.style.height = '40px';

            const removeBtn = document.createElement('button');
            removeBtn.className =
                'absolute -top-2 -right-2 bg-red-500 text-white rounded-full w-5 h-5 flex items-center justify-center text-sm hover:bg-red-600';
            removeBtn.textContent = '×';
            removeBtn.title = 'Remove Image';
            removeBtn.addEventListener('click', () => {
                uploadedUrl = null; // Clear the uploaded URL
                updateImagePreview();
            });

            wrapper.appendChild(img);
            wrapper.appendChild(removeBtn);
            return wrapper;
        }

        // Function to update the preview container
        function updateImagePreview() {
            imagePreviewContainer.innerHTML = '';
            if (uploadedUrl) {
                const preview = createImagePreview(uploadedUrl);
                imagePreviewContainer.appendChild(preview);
            }
            imageUrlsInput.value = uploadedUrl || ''; // Update the hidden input with the uploaded URL
        }

        // Upload image handler
        imageUpload.addEventListener('change', async (event) => {
            const file = event.target.files[0];
            if (file) {
                const formData = new FormData();
                formData.append('image', file);
                try {
                    const response = await fetch('{{ route('upload.image') }}', {
                        method: 'POST',
                        headers: {
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: formData,
                    });
                    const data = await response.json();
                    if (data.path) {
                        // uploadedUrl = `{{ url('storage') }}/${data.path}`; // Store the new uploaded URL
                        uploadedUrl = data.path; // Store the new uploaded URL
                        updateImagePreview();
                    } else {
                        console.error('Image upload failed:', data);
                    }
                } catch (error) {
                    console.error('Error uploading image:', error);
                }
            }
        });
    </script>
</x-app-layout>
