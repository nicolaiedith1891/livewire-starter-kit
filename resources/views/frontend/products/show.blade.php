@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto flex gap-6">
    <div class="w-1/2">
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}">
    </div>
    <div class="w-1/2">
        <h1 class="text-2xl font-bold">{{ $product->name }}</h1>
        <p class="text-xl mt-2">${{ $product->price }}</p>
        <p class="mt-4">{{ $product->description }}</p>

        <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-4">
            @csrf
            <input type="number" name="quantity" value="1" min="1" class="border p-1 w-20">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2">Add to Cart</button>
        </form>
    </div>
</div>
@endsection
