<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>{{ config('app.name', 'Laravel') }}</title>
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=instrument-sans:400,500,600" rel="stylesheet" />
        
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            /* Apply the background image to the body */
            body {
                background-image: url("{{ asset('image.png') }}");
                background-size: cover;
                background-position: center;
                background-repeat: no-repeat;
                background-attachment: fixed;
            }
            /* Optional: Add an overlay to ensure text remains readable */
            .bg-overlay {
                background-color: rgba(255, 255, 255, 0.1); /* Light overlay for light mode */
            }
            .dark .bg-overlay {
                background-color: rgba(0, 0, 0, 0.4); /* Darker overlay for dark mode */
            }
        </style>
    </head>
    <body class="flex p-6 lg:p-8 items-center lg:justify-center min-h-screen flex-col bg-overlay">
        
        {{-- 1. HEADER LOGIC --}}
        @if (!request()->routeIs('login') && !request()->routeIs('register'))
            <header class="w-full lg:max-w-4xl max-w-50 text-sm mb-6 z-10">
                @if (Route::has('login'))
                    <nav class="flex items-center justify-end gap-4">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="inline-block px-5 py-1.5 bg-white/80 dark:bg-black/50 backdrop-blur-sm border border-black/10 dark:border-white/10 rounded-sm text-sm">
                                Dashboard
                            </a>
                        @else
                            <a href="{{ route('login') }}" class="inline-block px-5 py-1.5 text-amber-50 bg-white/90 dark:bg-[#161615]/90 border border-black/10 rounded-sm">
                                Log in
                            </a>
                            @if (Route::has('register'))
                                <a href="{{ route('register') }}" class="inline-block px-5 py-1.5 text-amber-50 bg-white/90 dark:bg-[#161615]/90 border border-black/10 rounded-sm">
                                    Register
                                </a>
                            @endif
                        @endauth
                    </nav>
                @endif
            </header>
        @endif

    </body>
</html>