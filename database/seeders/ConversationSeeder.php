<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Conversation;

class ConversationSeeder extends Seeder
{
    public function run()
    {
        Conversation::create([
            'user_id' => 'fbuser123',
            'user_name' => 'Sadia Rahman',
            'message' => 'আপনাদের টিশার্টের দাম কত?',
            'reply' => 'আমাদের টিশার্টের দাম ৩৫০ টাকা।',
            'lang' => 'bn',
            'is_from_bot' => true,
        ]);

        Conversation::create([
            'user_id' => 'fbuser124',
            'user_name' => 'John Doe',
            'message' => 'What is the price of your hoodie?',
            'reply' => 'The price of our hoodie is 990 BDT.',
            'lang' => 'en',
            'is_from_bot' => true,
        ]);
    }
}
