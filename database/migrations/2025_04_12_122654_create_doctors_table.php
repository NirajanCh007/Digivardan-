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
        Schema::create('doctors', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('specialization');
            $table->integer('experience')->comment('In years');
            $table->string('qualification');
            $table->string('clinic_name')->nullable();
            $table->string('location')->nullable();
            $table->text('bio')->nullable();
            $table->string('phone')->nullable();
            $table->string('profile_image')->nullable(); // Optional image path
            $table->timestamps();
            // Foreign key constraint
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('doctors');
    }
};
