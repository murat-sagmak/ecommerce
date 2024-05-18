<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PaymentRequest;
class PaymentController extends Controller
{
    public function processPayment(PaymentRequest $request)
    {
        // Eğer buraya kadar geldiyse, girdiler geçerlidir
    
        // Ödeme bilgilerini al
        $cardNumber = $request->input('card_number');
        $expiryDate = $request->input('expiry_date');
        $cvv = $request->input('cvv');
    
        // Geri kalan işlemler...
    
        // Anasayfaya yönlendirme işlemi
        return redirect()->route('home')->with('success', 'Payment Successfull.');
    }
    public function messages()
    {
        return [
            'card_number.required' => 'Card number is required.',
            'card_number.numeric' => 'Card number must be numeric.',
            'expiry_date.required' => 'Expiry date is required.',
            'expiry_date.date_format' => 'Expiry date must be in the format MM/YY.',
            'cvv.required' => 'CVV is required.',
            'cvv.numeric' => 'CVV must be numeric.',
            'cvv.digits' => 'CVV must be 3 digits long.',
        ];
    }
}
