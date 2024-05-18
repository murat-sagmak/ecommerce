<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CheckoutController extends Controller
{
    public function index()
    {
        $cartItems = session('cart');
        $totalPrice = 0;

       
        if (!is_null($cartItems) && is_array($cartItems)) {
            foreach ($cartItems as $item) {
                $totalPrice += $item['price'] * $item['amount'];
            }
        } else {
            $cartItems = [];
        }


        // Ödeme sayfasını gösterirken, sepet içeriğini ve toplam tutarı gönder
        return view('frontend.pages.checkout', compact('cartItems', 'totalPrice'));
    }
}
