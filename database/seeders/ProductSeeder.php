<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::create([
            'name' => 'Prodcut 1',
            'image'=> 'images/laptop.jpg',
            'category_id' => 1,
            'text' => 'Short Information',
            'price' => 100,
            'brand' => 'Apple',
            'amount' => 1, 
            'status'=> '1',
            'content' => '<p>Empty</p>'
        ]);

        Product::create([
            'name' => 'Prodcut 2',
            'image'=> 'images/computers.jpg',
            'category_id' => 2,
            'text' => 'Short Information',
            'price' => 250,
            'brand' => 'Samsung',
            'amount' => 2, 
            'status'=> '1',
            'content' => '<p>Empty</p>'
            ]);
    }
}
