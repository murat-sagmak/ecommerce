<?php

namespace Database\Seeders;

use App\Models\About;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AboutSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        About::create([
            'name'=>'X-kom',
            'content'=>'About',
            'shipping_icon' => 'icon-truck',
            'shipping' => 'Free Shipping',
            'shipping_content' => 'We provide free shipping.',
            'returning_icon'=> 'icon-refresh2',
            'returning'=> 'Returning',
            'returning_content' => 'You can return within 14 days',
            'support_icon'=> 'icon-help',
            'support' => 'Support 24/7',
            'support_content' => 'You can reach out 24/7.'
        ]);

    }
}
