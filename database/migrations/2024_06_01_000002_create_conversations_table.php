<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateConversationsTable extends Migration
{
    public function up()
    {
        Schema::create('conversations', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('user_name')->nullable();
            $table->text('message');
            $table->text('reply')->nullable();
            $table->string('lang', 5)->default('bn');
            $table->boolean('is_from_bot')->default(true);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('conversations');
    }
}
