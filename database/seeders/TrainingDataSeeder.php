<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TrainingData;

class TrainingDataSeeder extends Seeder
{
    public function run()
    {
        TrainingData::create([
            'question' => 'আপনার দোকানের ঠিকানা কোথায়?',
            'answer'   => 'আমাদের কোনো ফিজিক্যাল দোকান নেই, শুধুমাত্র অনলাইন শপ।',
            'lang'     => 'bn',
            'image'    => null
        ]);

        TrainingData::create([
            'question' => 'Do you deliver outside Dhaka?',
            'answer'   => 'Yes, we deliver all over Bangladesh.',
            'lang'     => 'en',
            'image'    => null
        ]);
    }
}
