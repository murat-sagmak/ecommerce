<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'card_number' => 'required|numeric', // Kart numarası numerik olmalıdır
            'expiry_date' => 'required|date_format:m/y', // Son kullanma tarihi 'mm/yy' biçiminde olmalıdır
            'cvv' => 'required|numeric|digits:3', // CVV 3 haneli numerik bir değer olmalıdır
        ];
    }
}
