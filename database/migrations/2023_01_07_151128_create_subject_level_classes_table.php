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
        Schema::create('subject_level_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('class_id');
            $table->unsignedBigInteger('subject_id');
            $table->unique(['class_id','subject_id','level_id']);
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subject_levels')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->timestamps();
        });
    }


   /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_level_classes');
    }
};
