<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Drowing Collection</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    <wireui:scripts />

    <script src="//unpkg.com/alpinejs" defer></script>
    <!-- Styles -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased font-sans">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <div class="relative min-h-screen flex flex-col justify-items-end >
            <div class="relative w-full
            max-w-2xl px-6 lg:max-w-7xl">
            <header class="grid grid-cols-2 justify-items-end gap-2 py-10 lg:grid-cols-3">
                @if (Route::has('login'))
                    <livewire:welcome.navigation />
                @endif
            </header>

            {{-- dashboard --}}
        </div>
    </div>
    </div>

    @wireUiScripts

    <script src="//unpkg.com/alpinejs" defer></script>
</body>

</html>
