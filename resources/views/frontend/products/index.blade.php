@extends('layouts.app')

@section('content')
<h1>All Products</h1>
<div class="grid grid-cols-4 gap-6">
    @foreach($products as $product)
        <div class="border p-4">
            <a href="{{ route('product.show', $product) }}">
                <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" class="w-full h-48 object-cover">
                <h2 class="text-lg font-bold">{{ $product->name }}</h2>
                <p>${{ $product->price }}</p>
            </a>
        </div>
    @endforeach
</div>

<div class="mt-6">
    {{ $products->links() }}
</div>
@endsection
