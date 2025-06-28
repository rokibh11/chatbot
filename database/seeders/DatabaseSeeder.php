<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run()
    {
        $this->call([
            FAQSeeder::class,
            ProductSeeder::class,
            ConversationSeeder::class,
            TrainingDataSeeder::class,
        ]);
    }
}
