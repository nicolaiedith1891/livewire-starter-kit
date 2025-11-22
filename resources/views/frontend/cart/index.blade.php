@extends('layouts.app')

@section('content')
<div class="container mx-auto px-4">
    <h1 class="text-3xl font-bold mb-6">Shopping Cart</h1>

    @livewire('cart')
</div>
@endsection
