@extends('components.layouts.app')

@section('content')
<div class="max-w-5xl mx-auto py-10">
    <div class="grid grid-cols-1 md:grid-cols-2 gap-10">
        <img src="{{ asset('storage/' . $product->image) }}"
             alt="{{ $product->name }}"
             class="w-full h-96 object-cover rounded-xl">

        <div>
            <h1 class="text-3xl font-bold">{{ $product->name }}</h1>

            <p class="text-2xl text-green-600 mt-2">${{ $product->price }}</p>

            <p class="mt-4 text-gray-600">{{ $product->description }}</p>

            <p class="mt-4">Stock: {{ $product->stock }}</p>

            <form action="{{ route('cart.add', $product) }}" method="POST" class="mt-6">
                @csrf
                <button class="bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700">
                    Add to Cart
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
