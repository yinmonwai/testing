<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    {{-- Chart.js --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body class="bg-gray-100 min-h-screen">

<!-- NAVBAR -->
<nav class="bg-indigo-600 shadow">
    <div class="max-w-7xl mx-auto px-6">
        <div class="flex justify-between items-center h-14">

            <!-- Logo -->
            <div class="text-white text-lg font-bold">
                My Dashboard
            </div>

            <!-- NAV TABS -->
            <div class="flex space-x-6">

                <a href="{{ route('products') }}"
                   class="px-3 py-2 rounded-md text-sm font-medium
                   {{ request()->routeIs('products')
                        ? 'bg-white text-indigo-600'
                        : 'text-indigo-100 hover:bg-indigo-500 hover:text-white' }}">
                    Products
                </a>

                <a href="{{ route('categories') }}"
                   class="px-3 py-2 rounded-md text-sm font-medium
                   {{ request()->routeIs('categories')
                        ? 'bg-white text-indigo-600'
                        : 'text-indigo-100 hover:bg-indigo-500 hover:text-white' }}">
                    Categories
                </a>

            </div>

            <!-- LOGOUT -->
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button class="text-sm text-indigo-100 hover:text-white">
                    Logout
                </button>
            </form>

        </div>
    </div>
</nav>

<!-- CONTENT -->
<div class="max-w-7xl mx-auto p-6 space-y-6">

    <!-- STATS -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <div class="bg-white rounded-xl shadow p-5">
            <h3 class="text-gray-500 text-sm">Total Products</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">120</p>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <h3 class="text-gray-500 text-sm">Categories</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">18</p>
        </div>

        <div class="bg-white rounded-xl shadow p-5">
            <h3 class="text-gray-500 text-sm">Sales</h3>
            <p class="text-3xl font-bold text-indigo-600 mt-2">$9,200</p>
        </div>
    </div>

    <!-- MAIN SECTION -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <!-- GRAPH -->
        <div class="lg:col-span-2 bg-white rounded-xl shadow p-6">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">
                Monthly Sales
            </h2>
            <canvas id="salesChart" height="120"></canvas>
        </div>

        <!-- CHAT -->
        <div class="bg-white rounded-xl shadow p-6 flex flex-col">
            <h2 class="text-lg font-semibold mb-4 text-gray-700">
                Chat
            </h2>

            <div class="flex-1 space-y-3 overflow-y-auto mb-4">
                <div class="bg-gray-100 p-3 rounded-lg text-sm">
                     Hello, how can I help?
                </div>
                <div class="bg-indigo-600 text-white p-3 rounded-lg text-sm self-end">
                    I need product info
                </div>
            </div>

            <div class="flex gap-2">
                <input type="text"
                       placeholder="Type message..."
                       class="flex-1 border rounded-lg px-3 py-2 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500">
                <button class="bg-indigo-600 text-white px-4 rounded-lg hover:bg-indigo-700">
                    Send
                </button>
            </div>
        </div>

    </div>

    <!-- PAGE CONTENT -->
    <div>
        @yield('content')
    </div>

</div>

<!-- CHART SCRIPT -->
<script>
    const ctx = document.getElementById('salesChart');
    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Jan','Feb','Mar','Apr','May','Jun'],
            datasets: [{
                label: 'Sales',
                data: [1200, 1900, 1500, 2200, 1800, 2600],
                borderWidth: 3,
                borderColor: '#4f46e5',
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    });
</script>

</body>
</html>
