<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>

<body class="bg-gray-100  dark:text-gray-100">

{{--  NAVBAR (ONLY AFTER LOGIN) --}}
@auth
<nav class="bg-indigo-600 shadow sticky top-0 z-50">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-16">

            <!-- Logo / Title -->
            <div class="text-lg font-semibold text-white">
                Dashboard
            </div>

            <!-- Navigation Tabs -->
            <div class="flex space-x-6">

                <a href="{{ route('products') }}"
                   class="px-4 py-2 rounded-md text-sm font-medium transition
                   {{ request()->routeIs('products')
                        ? 'bg-white text-indigo-600'
                        : 'text-indigo-100 hover:bg-indigo-500 hover:text-white' }}">
                    Products
                </a>

                <a href="{{ route('categories') }}"
                   class="px-4 py-2 rounded-md text-sm font-medium transition
                   {{ request()->routeIs('categories')
                        ? 'bg-white text-indigo-600'
                        : 'text-indigo-100 hover:bg-indigo-500 hover:text-white' }}">
                    Categories
                </a>

            </div>

            <!-- Logout -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button
                    type="submit"
                    class="text-sm font-medium text-indigo-100 hover:text-white transition">
                    Logout
                </button>
            </form>

        </div>
    </div>
</nav>
@endauth
<main class="max-w-7xl mx-auto p-6">
    {{ $slot }}
</main>

@livewireScripts
</body>
</html>
