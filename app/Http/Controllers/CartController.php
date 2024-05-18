<?php

namespace App\Http\Controllers;

use App\Models\Invoice;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //

    public function index(){
        $cartItem = session("cart", []);
        $totalPrice=0;
        foreach ($cartItem as $cart){
            $totalPrice += $cart['price'] * $cart['amount'];
        }
        return view("frontend.pages.cart", compact("cartItem", "totalPrice"));
    }

    public function bill(Request $request){
        return view("frontend.pages.cartbill");
    }
    public function add(Request $request){
        $productId=$request->product_id;
        $amount=$request->amount ?? 1;
        $color=$request->color;
        $product = Product::find($productId);
        if(!$product){
            return back()->withError("error");
        }
        $cartItem = session("cart", []);
        if(array_key_exists($productId,$cartItem)){
            $cartItem[$productId]['amount'] += $amount;
        }else{
            $cartItem[$productId]= [
                'image' => $product->image,
                'name' => $product->name,
                'price' => $product->price,
                'amount'=> $amount,
                'color'=> $color
            ];
        }
        session(['cart' => $cartItem]);
        return back()->with('success', 'Product added to cart successfully!');    
    }
    public function delete(Request $request){
        $request -> all();
        $productId=$request->product_id;

        $cartItem = session("cart", []);
        if(array_key_exists($productId,$cartItem)){
            unset($cartItem[$productId]);
        }
        session(["cart"=> $cartItem]);
        return back()->withSuccess("Deleted.");
    }

    
    public function cartSave(Request $request){
       $invoice = Invoice::create([
            'order_no' => mt_rand(1000000, 9999999),
            "name"=> $request-> name ?? null,
            "companyname" => $request->company_name ?? null,
            "address"=> $request->address ?? null,
            "city"=> $request->city ?? null,
            "zip_code"=> $request->zip_code ?? null,
            "email"=> $request->email ?? null,
            "phone"=> $request->phone ?? null,
            "note"=>$request->note ??  null,
       ]);

       $cart = session()->get("cart") ?? [];
       foreach($cart as $key => $item){
            Order::create([
                'order_no' => $invoice->order_no,
                'product_id' => $key,
                'name' => $item['name'] ?? null,
                'price' => $item['price'] ?? null,
                'amount' => $item['amount'] ?? null,
            ]);
        }
        session()->forget("cart");
        return redirect()->route('home');
    }

}
