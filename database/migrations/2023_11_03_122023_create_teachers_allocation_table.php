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
        Schema::create('teachers_allocation', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('academic_year_id'); // Assuming this is the academic year ID.
            $table->unsignedBigInteger('semester_id');
            $table->unsignedBigInteger('course_id');
            
            $table->foreign('teacher_id')->references('id')->on('teachers');
            $table->foreign('academic_year_id')->references('id')->on('academic_years');
            $table->foreign('semester_id')->references('id')->on('semesters');
            $table->foreign('course_id')->references('id')->on('courses');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers_allocation');
    }
};
