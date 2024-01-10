<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id('post_id');
            $table->string('title');
            $table->text('content');
            $table->timestamp('post_date')->default(now());
            $table->foreignId('user_id')->constrained('users','user_id');
            $table->foreignId('game_id')->constrained('games','game_id');
            $table->string('image')->nullable();
            $table->integer('reports')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
