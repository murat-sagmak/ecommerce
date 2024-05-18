<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $categoryId = [1,2,3,4,5,6,7,8,9];
        $brandLists=['Apple', 'Samsung', 'Huawei', 'Xiao Mi'];
        $colorList=['White','Black','Gray','Red'];
        $productName=['Cell Phone','Smart Watch','Laptop','Computer', 'TV', 'Washing Machine', 'Air Conditioner'];

        $color = $colorList[random_int(0,3)];
        $brand = $brandLists[random_int(0,3)];
        return [
            'name'=> $brand.' '.$color.' '.$productName[random_int(0,6)],
            'category_id'=> $categoryId[random_int(0,8)],
            'text'=> 'empty',
            'price'=> random_int(100,500),
            'brand'=> $brand,
            'color'=> $color,
            'status'=> '1',
            'amount'=> 1,
            'content'=> 'empty'       
         ];
    }
}
