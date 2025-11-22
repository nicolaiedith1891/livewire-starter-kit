<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clothing Store</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>

<body class="bg-gray-100 text-gray-800">

    <nav class="bg-white shadow p-4 mb-6">
        <div class="container mx-auto flex justify-between">
            <a href="{{ route('home') }}" class="font-bold text-xl">Clothing Store</a>

            <a href="{{ route('cart.index') }}">Cart</a>

        </div>
    </nav>

    <div class="container mx-auto px-4">
        @yield('content')
    </div>

    @if(session('success'))
        <div class="bg-green-100 text-green-800 p-2 mb-4">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="bg-red-100 text-red-800 p-2 mb-4">{{ session('error') }}</div>
    @endif

    @livewireScripts
</body>
