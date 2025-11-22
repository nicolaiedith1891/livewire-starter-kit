<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Store</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow p-4 mb-6">
        <div class="container mx-auto flex justify-between">
            <a href="{{ route('home') }}" class="font-bold text-xl">Clothing Store</a>

            <a href="{{ route('cart') }}" class="text-lg">Cart</a>
        </div>
    </nav>

    <div class="container mx-auto px-4">
        @yield('content')
    </div>

</body>
</html>
