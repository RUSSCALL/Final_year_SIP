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
        Schema::create('registered', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('academic_year_id');
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('course_id');
            $table->boolean('registered');
            $table->timestamps(); 
            
            $table->foreign('student_id')->references('id')->on('students');
            $table->foreign('academic_year_id')->references('id')->on('academic_years');
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->foreign('course_id')->references('id')->on('courses');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registered');
    }
};
