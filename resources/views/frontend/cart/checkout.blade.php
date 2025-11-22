@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6">Checkout</h1>

    @if(session('error'))
        <div class="bg-red-200 text-red-800 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

    @if($cart && count($cart) > 0)
        <div class="bg-white rounded-lg shadow p-6 mb-6">
            <h2 class="text-xl font-bold mb-4">Order Summary</h2>

            @foreach($cart as $productId => $item)
                <div class="flex justify-between items-center border-b py-3">
                    <div class="flex items-center gap-4">
                        @if(isset($item['image']))
                            <img src="{{ asset('storage/' . $item['image']) }}" alt="{{ $item['name'] }}" class="w-16 h-16 object-cover rounded">
                        @endif
                        <div>
                            <h3 class="font-semibold">{{ $item['name'] }}</h3>
                            <p class="text-gray-600">Quantity: {{ $item['quantity'] }} × ${{ $item['price'] }}</p>
                        </div>
                    </div>
                    <div class="font-semibold">
                        ${{ $item['price'] * $item['quantity'] }}
                    </div>
                </div>
            @endforeach

            <div class="flex justify-between items-center border-t pt-4 mt-4">
                <span class="text-xl font-bold">Total:</span>
                <span class="text-xl font-bold">
                    ${{ collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']) }}
                </span>
            </div>
        </div>

        <form action="{{ route('checkout.store') }}" method="POST">
            @csrf
            <button type="submit"
                    class="w-full bg-blue-600 text-white py-3 px-6 rounded-lg hover:bg-blue-700 text-lg font-semibold">
                Place Order
            </button>
        </form>
    @else
        <div class="text-center py-8">
            <p class="text-xl text-gray-600">Your cart is empty.</p>
            <a href="{{ route('cart.index') }}" class="text-blue-600 hover:underline mt-2 inline-block">Return to Cart</a>
        </div>
    @endif
</div>
@endsection
