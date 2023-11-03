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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('index_number')->unique();
            $table->string('firstname');
            $table->string('lastName');
            $table->string('surname');
            $table->string('phone_number')->nullable();
            $table->date('Date_enrolled')->nullable();
            $table->unsignedBigInteger('Program_id');
            $table->foreign('Program_id')->references('id')->on('programs');
            $table->rememberToken();
            $table->timestamps();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
