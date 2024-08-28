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
        Schema::create('details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->json('tenth')->nullable();
            $table->json('twelth')->nullable();
            $table->json('grad')->nullable();
            $table->json('post_grad')->nullable();
            $table->string('resume')->nullable();
            $table->string('experience')->nullable();
            $table->decimal('yoe')->nullable();
            $table->string('location')->nullable();
            $table->string('skills')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('details');
    }
};
