<?php

namespace App;

use Auth;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable=['total', 'delivered'];

    public function orderItems() {
        return $this->belongsToMany(Product::class)->withPivot('qty', 'total');
    }

    public function user() {
        return $this->belongsTo(User::class);
    }

    public static function createOrder(){
        // l'utente dell'ordine
        $user = Auth::user();

        // Create the order
        $order = $user->orders()->create([
            'total' => Cart::total(),
            'delivered' => 0
        ]);

        // inseriamo gli elementi del carrello nell'ordine
        $cartItems = Cart::content();
        foreach ($cartItems as $cartItem){
            $order->orderItems()->attach($cartItem->id, [
                'qty' => $cartItem->qty,
                'total' => $cartItem->qty * $cartItem->price
            ]);
        }
    }
}
