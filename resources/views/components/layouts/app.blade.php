<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Store</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow p-4">
        <div class="max-w-6xl mx-auto flex justify-between">
            <a href="/" class="text-xl font-bold">ClothingStore</a>

            <div class="flex gap-6">
                <a href="/" class="hover:text-blue-600">Home</a>
                <a href="/cart" class="hover:text-blue-600">Cart</a>
            </div>
        </div>
    </nav>

    <main class="max-w-6xl mx-auto py-10">
        @yield('content')
    </main>

</body>
</html>
