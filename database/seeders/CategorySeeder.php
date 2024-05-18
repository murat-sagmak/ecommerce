<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $smart = Category::create([
            'image'=>null,
            'thumbnail'=>null,
            'cat_up' =>null,
            'name'=> 'Smart',
            'content'=> 'Phones & Watches',
            'status'=> '1',
            ]);
        Category::create([
            'image'=>null,
            'thumbnail'=>null,
            'cat_up' =>$smart ->id,
            'name'=> 'Phones',
            'content'=> 'Phones',
            'status'=> '1',
            ]);
        Category::create([
            'image'=>null,
            'thumbnail'=>null,
            'cat_up' =>$smart ->id,
            'name'=> 'Watches',
            'content'=> 'Watches',
            'status'=> '1',
            ]);

       $computers=Category::create([
            'image'=>null,
            'thumbnail'=>null,
            'cat_up' =>null,
            'name'=> 'Computers',
            'content'=> 'Laptops & Computers',
            'status'=> '1',
            ]);
        Category::create([
            'image'=>null,
            'thumbnail'=>null,
            'cat_up' =>$computers ->id,
            'name'=> 'Laptops',
            'content'=> 'Laptops',
            'status'=> '1',
            ]);
         Category::create([
            'image'=>null,
            'thumbnail'=>null,
            'cat_up' =>$computers ->id,
            'name'=> 'Computer',
            'content'=> 'Computer',
            'status'=> '1',
            ]);
        $homes=Category::create([
            'image'=>null,
            'thumbnail'=>null,
            'cat_up' =>null,
            'name'=> 'Homes',
            'content'=> 'Home & Living',
            'status'=> '1',
            ]);
        Category::create([
            'image'=>null,
            'thumbnail'=>null,
            'cat_up' =>$homes ->id,
            'name'=> 'TV',
            'content'=> 'TV',
            'status'=> '1',
            ]);   
        Category::create([
            'image'=>null,
            'thumbnail'=>null,
            'cat_up' =>$homes ->id,
            'name'=> 'Washing Machine',
            'content'=> 'Washing Machine',
            'status'=> '1',
            ]);   
        Category::create([
            'image'=>null,
            'thumbnail'=>null,
            'cat_up' =>$homes ->id,
            'name'=> 'Air Conditioner',
            'content'=> 'Air Conditioner',
            'status'=> '1',
            ]);   
    }
}
