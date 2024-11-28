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
        Schema::create('followings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('follower_id'); 
            $table->unsignedBigInteger('followed_id');
            $table->unsignedInteger('stars');
            $table->timestamps();
            $table->foreign('follower_id')->references('id')->on('users');
            $table->foreign('followed_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('followings');
    }
};
