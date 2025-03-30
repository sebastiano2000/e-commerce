<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'eCommerce')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles
</head>
<body class="bg-gray-100">

    <nav class="bg-blue-500 text-white p-4">
        <div class="container mx-auto flex justify-between">
            <a href="{{ route('home') }}" class="text-xl font-bold">My Shop</a>
            <ul class="flex space-x-6">
                <li><a href="{{ route('products.index') }}" class="hover:underline">Products</a></li>
                <li><a href="{{ route('categories.index') }}" class="hover:underline">Categories</a></li>
                @auth
                    <li><a href="{{ route('orders.index') }}" class="hover:underline">My Orders</a></li>
                    <li>
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button type="submit" class="hover:underline">Logout</button>
                        </form>
                    </li>
                @else
                    <li><a href="{{ route('login') }}" class="hover:underline">Login</a></li>
                    <li><a href="{{ route('register') }}" class="hover:underline">Register</a></li>
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
