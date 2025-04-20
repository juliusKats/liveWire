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
        Schema::create('student_scores', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('student_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('year_id');
            $table->unsignedBigInteger('stream_id');
            $table->unsignedBigInteger('term_id')
            ;$table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('examset_id');
            $table->unsignedBigInteger('objective_id');
            $table->unsignedBigInteger('paper_id');
            $table->unsignedBigInteger('grade_id');
            $table->unsignedInteger('score');
            $table->unique(['student_id','class_id','year_id','term_id','subject_id','examset_id','objective_id','paper_id'],'uni');
            $table->foreign ('examset_id')->references('id')->on('exam_sets')->onDelete('cascade');
            $table->foreign ('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign ('objective_id')->references('id')->on('subject_objectives')->onDelete('cascade');
            $table->foreign ('grade_id')->references('id')->on('grades')->onDelete('cascade');
            $table->foreign ('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign ('class_id')->references('id')->on('classes')->onDelete('cascade');
             $table->foreign ('year_id')->references('id')->on('years')->onDelete('cascade');
             $table->foreign ('stream_id')->references('id')->on('streams')->onDelete('cascade');
             $table->foreign ('term_id')->references('id')->on('terms')->onDelete('cascade');
             $table->foreign ('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign ('paper_id')->references('id')->on('papers')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_scores');
    }
};
