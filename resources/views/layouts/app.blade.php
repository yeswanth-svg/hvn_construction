<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="font-sans antialiased">
    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
        @include('layouts.navigation')


        <!-- Page Heading -->
        @isset($header)
            <header class="bg-white dark:bg-gray-800 shadow">
                <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                    {{ $header }}
                </div>
            </header>
        @endisset

        <!-- Page Content -->
        <main>
            {{ $slot }}
        </main>
    </div>

    <script>
        document.querySelector('#theme-toggle').addEventListener('click', () => {
            console.log('Toggle button clicked'); // Log when button is clicked

            const htmlElement = document.documentElement;

            if (htmlElement.classList.contains('dark')) {
                console.log('Switching to light mode'); // Log switch
                htmlElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            } else {
                console.log('Switching to dark mode'); // Log switch
                htmlElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            }

            console.log('Current classes on <html>: ', htmlElement.classList); // Log the classes
        });

        // Log current theme on page load
        const savedTheme = localStorage.getItem('theme');
        if (savedTheme === 'dark') {
            console.log('Dark mode loaded from localStorage'); // Log mode
            document.documentElement.classList.add('dark');
        } else {
            console.log('Light mode loaded from localStorage'); // Log mode
            document.documentElement.classList.remove('dark');
        }

    </script>
</body>



</html>