<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Drawing Application') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans text-gray-900 antialiased ">

    {{-- Hero Section --}}
    <div class="grid  w-full h-screen bg-slate-200">

        <div class="flex justify-center items-center h-full w-full">
            <div class="text-center">
                <div class="flex justify-center items-center mb-3">
                    <img class=" " style="max-width: 20%" src="{{ asset('color-palette.svg') }}" alt="Icon"
                        srcset="">
                </div>
                <h1 class="text-5xl font-bold text-black">Artistry Unleashed</h1>
                <p class="text-lg text-gray-600 mt-4">
                    Discover a world where imagination meets canvas, featuring extraordinary works <br />
                    from talented artists around the globe.
                </p>
                {{-- buttons --}}
                <div
                    class="flex flex-col md:flex-row mt-8 justify-center items-center space-y-4 md:space-y-0 md:space-x-11">

                    <a type="button"
                        class="text-white bg-[#3b5998] hover:bg-[#3b5998]/90 focus:ring-4 focus:outline-none focus:ring-[#3b5998]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#3b5998]/55 me-2 mb-2 mt-2">
                        <svg class="w-5 h-5 mr-2 transition-transform group-hover:rotate-12"
                            xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                            strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                            <path d="M3 3v18h18" />
                            <path d="M8 17V9" />
                            <path d="M12 17V7" />
                            <path d="M16 17v-5" />
                        </svg>
                        Explore Gallery
                    </a>
                    <a type="button" href="{{ route('register') }}"
                        class="text-white bg-[#050708] hover:bg-[#050708]/90 focus:ring-4 focus:outline-none focus:ring-[#050708]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:focus:ring-[#050708]/50 dark:hover:bg-[#050708]/30 me-2 mb-2">
                        <svg class="w-5 h-5 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none"
                            stroke="currentColor" strokeWidth="2" strokeLinecap="round" strokeLinejoin="round">
                            <circle cx="12" cy="12" r="10" />
                            <circle cx="12" cy="12" r="6" />
                            <circle cx="12" cy="12" r="2" />
                        </svg>
                        Submit Artwork
                    </a>

                </div>
            </div>
        </div>
    </div>
    {{-- gallery --}}

    {{-- footer --}}

</body>

</html>
