<?php

namespace App\Traits;

use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

trait HasWishList {

        public function getWishlist()
        {
            if (Auth::check()) {
                return Wishlist::where('user_id', Auth::id())->pluck('product_id')->toArray();
            }
    
            return Session::get('wishlist', []);
        }
    
        public function toggleWishlist($productId)
        {
            if (Auth::check()) {
                $exists = Wishlist::where('user_id', Auth::id())->where('product_id', $productId)->exists();
    
                if ($exists) {
                    Wishlist::where('user_id', Auth::id())->where('product_id', $productId)->delete();
                } else {
                    Wishlist::create([
                        'user_id' => Auth::id(),
                        'product_id' => $productId
                    ]);
                }
    
                return $this->getWishlist();
            } else {
                $wishlist = Session::get('wishlist', []);
    
                if (in_array($productId, $wishlist)) {
                    $wishlist = array_diff($wishlist, [$productId]); // Remove if exists
                } else {
                    $wishlist[] = $productId; // Add if not exists
                }
    
                Session::put('wishlist', $wishlist);
    
                return $wishlist;
            }
        }
    
        public function migrateWishlistToDatabase()
        {
            if (Auth::check() && Session::has('wishlist')) {
                $wishlist = Session::pull('wishlist', []);
    
                foreach ($wishlist as $productId) {
                    if (!Wishlist::where('user_id', Auth::id())->where('product_id', $productId)->exists()) {
                        Wishlist::create([
                            'user_id' => Auth::id(),
                            'product_id' => $productId
                        ]);
                    }
                }
            }
        }
    }
    
    

    
    

