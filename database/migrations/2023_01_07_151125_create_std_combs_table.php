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
        Schema::create('std_combs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->unique();
            $table->unsignedBigInteger('combination_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('stream_id');
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('combination_id')->references('id')->on('alevel_combs')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('stream_id')->references('id')->on('streams')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('std_combs');
    }
};
