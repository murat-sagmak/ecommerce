<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    protected $fillable = [
        'order_no',
        'name',
        'lname',
        'country',
        'address',
        'company_name',
        'city',
        'district',
        'email',
        'phone',
        'zip_code',
        'note',
    ];
    public function orders(){
        return $this->hasMany(Order::class, 'order_no','order_no');

    }

}
