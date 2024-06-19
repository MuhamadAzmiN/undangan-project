<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            // $table->string('nis');
            // $table->foreign("nis")->references('nis')->on('users');
            $table->foreignId('user_id');
            $table->string('image')->nullable();
            $table->string('body')->nullable();
            
        });

       
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like');
        Schema::dropIfExists('comment');
        Schema::dropIfExists('posts');
    }
};
