<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'eCommerce')</title>
    @vite('resources/css/app.css')
    @livewireStyles
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow mb-6">
        <div class="container mx-auto px-6 py-3 flex justify-between items-center">
            <a href="{{ route('home') }}" class="text-xl font-bold text-gray-700">MyShop</a>
            <ul class="flex space-x-6">
                <li><a href="{{ route('products.index') }}" class="text-gray-600 hover:text-blue-600 mr-4">Products</a></li>
                <li><a href="{{ route('categories.index') }}" class="text-gray-600 hover:text-blue-600 mr-4">Categories</a></li>
                @auth
                    <li><a href="{{ route('orders.index') }}" class="text-gray-600 hover:text-blue-600 mr-4">My Orders</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="text-gray-600 hover:text-blue-600 mr-4">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="text-gray-600 hover:text-blue-600 mr-4">Login</a></li>
                    <li><a href="{{ route('register') }}" class="text-gray-600 hover:text-blue-600 mr-4">Register</a></li>
                @endauth
            </ul>
        </div>
    </nav>

    <div class="container mx-auto p-6">
        @yield('content')
    </div>

    @livewireScripts
</body>
</html>
