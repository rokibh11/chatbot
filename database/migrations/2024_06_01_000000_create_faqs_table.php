<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFaqsTable extends Migration
{
    public function up()
    {
        Schema::create('f_a_q_s', function (Blueprint $table) {
            $table->id();
            $table->string('question_bn');
            $table->text('answer_bn');
            $table->string('question_en');
            $table->text('answer_en');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('f_a_q_s');
    }
}
