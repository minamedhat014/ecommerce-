<?php

namespace App\Traits;

use App\Models\Product;

trait HasCart {

        public array $cart = [];
        public float $total = 0;
    
        
        public function mountCart()
        {
    
            $this->initializeCart();
        }
    

        public function initializeCart()
        {
            $this->cart = session('cart', []);
            $this->calculateTotal();
        }
    
        public function addToCart(int $id)
        {
        $product = Product::findOrFail($id);
            if (isset($this->cart[$id])) {
                $this->cart[$id]['quantity'] += $product['quantity'] ?? 1;
            } else {
                $this->cart[$id] = [
                    'id' => $product->id,
                    'name' => $product->name,
                    'price' => $product->price?->price,
                    'quantity' => $product['quantity'] ?? 1,
                    'category'=> $product->category?->name,
                    'image'=> $product->getFirstMediaUrl('products','thumb')?: siteLogo(),
                ];
            }
            $this->syncCart();
        }
    
        public function removeFromCart(int $productId)
        {
            if (isset($this->cart[$productId])) {
                unset($this->cart[$productId]);
                $this->syncCart();
            }
        }
    
        public function updateQuantity(int $productId, int $quantity)
        {
            if (isset($this->cart[$productId])) {
                $this->cart[$productId]['quantity'] = $quantity;
                $this->syncCart();
            }
        }
    
        public function calculateTotal()
        {
            $this->total = array_reduce($this->cart, fn($carry, $item) => $carry + ($item['price'] * $item['quantity']), 0);
        }
    
        private function syncCart()
        {
            session()->put('cart', $this->cart);
            $this->calculateTotal();
            $this->dispatch('cartUpdated'); // Notify other components
        }
    }
    

    
    

