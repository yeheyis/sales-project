<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <script>
        // On page load or when changing themes, best to add inline in `head` to avoid FOUC
        if (localStorage.getItem('color-theme') === 'dark' || (!('color-theme' in localStorage) && window.matchMedia(
                '(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        } else {
            document.documentElement.classList.remove('dark')
        }
    </script>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class=" w-full">

    <div class="w-full flex flex-col">
        <div class="w-full border">
            <x-navbar />
        </div>

        <div class=" w-full flex">
            <div class="  w-0 md:w-[25%] h-screen">
                <x-sidebar />
            </div>

            <div class=" w-full md:w-[75%] h-full">
                <main class=" w-full h-screen p-4">
                    {{ $slot }}
                </main>
            </div>
        </div>
    </div>
    </div>
</body>

</html
