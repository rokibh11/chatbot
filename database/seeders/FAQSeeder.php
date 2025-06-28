<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\FAQ;

class FAQSeeder extends Seeder
{
    public function run()
    {
        FAQ::create([
            'question_bn' => 'কিভাবে অর্ডার করবো?',
            'answer_bn'   => 'অর্ডার করতে ইনবক্সে পণ্যটির নাম লিখুন অথবা আমাদের ওয়েবসাইটে যান।',
            'question_en' => 'How can I place an order?',
            'answer_en'   => 'To order, just type the product name in the inbox or visit our website.'
        ]);

        FAQ::create([
            'question_bn' => 'পণ্যের দাম কত?',
            'answer_bn'   => 'পণ্যের দাম জানতে নির্দিষ্ট পণ্যের নাম লিখুন।',
            'question_en' => 'What is the price of the product?',
            'answer_en'   => 'To know the price, just type the product name.'
        ]);

        FAQ::create([
            'question_bn' => 'ডেলিভারি চার্জ কত?',
            'answer_bn'   => 'ঢাকার মধ্যে ডেলিভারি চার্জ ৬০ টাকা, ঢাকার বাইরে ১২০ টাকা।',
            'question_en' => 'How much is the delivery charge?',
            'answer_en'   => 'Inside Dhaka, delivery charge is 60 BDT; outside Dhaka, it is 120 BDT.'
        ]);
    }
}
