<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Cart extends Component
{
    public $cart = [];

    public function mount()
    {
        // Ensure cart is always an array
        $this->cart = session()->get('cart', []);
    }

    public function render()
    {
        // Ensure cart is always an array before passing to view
        $cartItems = is_array($this->cart) ? $this->cart : [];

        return view('livewire.cart', [
            'cartItems' => $cartItems,
            'total' => $this->getTotalProperty()
        ]);
    }

    public function increase($productId)
    {
        if(isset($this->cart[$productId])){
            $this->cart[$productId]['quantity']++;
            session()->put('cart', $this->cart);
            $this->emit('cartUpdated');
        }
    }

    public function decrease($productId)
    {
        if(isset($this->cart[$productId])){
            if($this->cart[$productId]['quantity'] > 1){
                $this->cart[$productId]['quantity']--;
            } else {
                // Remove if quantity becomes 0
                unset($this->cart[$productId]);
            }
            session()->put('cart', $this->cart);
            $this->emit('cartUpdated');
        }
    }

    public function remove($productId)
    {
        if(isset($this->cart[$productId])){
            unset($this->cart[$productId]);
            session()->put('cart', $this->cart);
            $this->emit('cartUpdated');
        }
    }

    public function getTotalProperty()
    {
        // Ensure we're working with an array
        $cart = is_array($this->cart) ? $this->cart : [];

        return collect($cart)->sum(function($item) {
            return ($item['price'] ?? 0) * ($item['quantity'] ?? 0);
        });
    }
}
