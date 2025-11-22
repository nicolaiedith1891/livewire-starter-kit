<div>
    <h1 class="text-3xl font-bold mb-6">Shopping Cart</h1>

    @if(session('success'))
        <div class="bg-green-200 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    {{-- Safely check if cart has items --}}
    @php
        $cartItems = $cart ?? [];
        $hasItems = !empty($cartItems) && count($cartItems) > 0;
    @endphp

    @if($hasItems)
        <div class="grid grid-cols-1 gap-6">
            @foreach($cartItems as $productId => $item)
                <div class="flex items-center justify-between bg-white p-4 rounded shadow">
                    <div class="flex items-center gap-4">
                        @if(isset($item['image']))
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-24 h-24 object-cover rounded">
                        @endif
                        <div>
                            <h2 class="text-xl font-bold">{{ $item['name'] ?? 'Unknown Product' }}</h2>
                            <p class="text-gray-600">${{ $item['price'] ?? 0 }} each</p>
                        </div>
                    </div>

                    <div class="flex items-center gap-4">
                        {{-- Quantity Controls --}}
                        <div class="flex items-center gap-2">
                            <button wire:click="decrease({{ $productId }})"
                                    class="bg-gray-200 w-8 h-8 rounded flex items-center justify-center hover:bg-gray-300">
                                -
                            </button>
                            <span class="mx-2 font-semibold">{{ $item['quantity'] ?? 0 }}</span>
                            <button wire:click="increase({{ $productId }})"
                                    class="bg-gray-200 w-8 h-8 rounded flex items-center justify-center hover:bg-gray-300">
                                +
                            </button>
                        </div>

                        {{-- Item Total --}}
                        <div class="text-lg font-semibold">
                            ${{ ($item['price'] ?? 0) * ($item['quantity'] ?? 0) }}
                        </div>

                        {{-- Remove Button --}}
                        <button wire:click="remove({{ $productId }})"
                                class="bg-red-600 text-white px-4 py-2 rounded hover:bg-red-700">
                            Remove
                        </button>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Total and Checkout --}}
        <div class="mt-6 text-right">
            <p class="text-2xl font-bold mb-4">
                Total: ${{ $total ?? 0 }}
            </p>

            <a href="{{ route('checkout.index') }}"
               class="bg-blue-600 text-white px-6 py-3 rounded hover:bg-blue-700 text-lg">
                Proceed to Checkout
            </a>
        </div>
    @else
        <div class="text-center py-8">
            <p class="text-xl text-gray-600">Your cart is empty.</p>
            <a href="/" class="text-blue-600 hover:underline mt-2 inline-block">Continue Shopping</a>
        </div>
    @endif
</div>
