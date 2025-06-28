<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    public function run()
    {
        Product::create([
            'name_bn' => 'টিশার্ট',
            'name_en' => 'T-shirt',
            'description_bn' => '১০০% কটন, সাদা কালার, সকল সাইজে পাওয়া যাবে।',
            'description_en' => '100% cotton, white color, available in all sizes.',
            'price' => 350,
            'image' => 'tshirt.jpg'
        ]);

        Product::create([
            'name_bn' => 'হুডি',
            'name_en' => 'Hoodie',
            'description_bn' => 'উত্তম মানের উল, কালো ও ধূসর রঙে পাওয়া যায়।',
            'description_en' => 'Premium wool, available in black and gray.',
            'price' => 990,
            'image' => 'hoodie.jpg'
        ]);
    }
}
