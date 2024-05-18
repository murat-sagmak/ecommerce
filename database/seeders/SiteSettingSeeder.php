<?php

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SiteSetting::create([
            'name' =>'location',
            'data'=> 'Poland/Krakow',]);
        SiteSetting::create([
            'name' =>'phone',
            'data'=> '+48 573 465 120',]);
        SiteSetting::create([
            'name' =>'email',
            'data'=> 'test@domain.com',]);
        SiteSetting::create([
            'name' =>'maps',
            'data'=> null]);
    }

    
}
