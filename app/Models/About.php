<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model
{
    protected $fillable = [
            'name',
            'image',
            'content',
            'shipping_icon',
            'shipping',
            'shipping_content',
            'returning_icon',
            'returning',
            'returning_content',
            'support_icon',
            'support',
            'support_content'];
}
