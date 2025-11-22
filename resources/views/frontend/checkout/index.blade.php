@extends('layouts.app')

@section('content')
<div class="container mx-auto">
    <h1 class="text-3xl font-bold mb-6">Checkout</h1>

    @if(count($cart) > 0)
        <div class="grid gap-4">
            @foreach($cart as $item)
                <div class="flex justify-between bg-white p-4 rounded shadow">
                    <div>{{ $item['name'] }} (x{{ $item['quantity'] }})</div>
                    <div>${{ $item['price'] * $item['quantity'] }}</div>
                </div>
            @endforeach

            <div class="text-right font-bold mt-4">
                Total: ${{ collect($cart)->sum(fn($item) => $item['price'] * $item['quantity']) }}
            </div>

            <form action="{{ route('cart.storeOrder') }}" method="POST" class="mt-4 text-right">
                @csrf
                <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded">Place Order</button>
            </form>
        </div>
    @else
        <p>Your cart is empty.</p>
    @endif
</div>
@endsection
