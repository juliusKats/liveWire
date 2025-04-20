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
        Schema::create('subject_level_class_streams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('year_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('stream_id')->nullable();
            $table->unique(['class_id','subject_id','level_id','stream_id','year_id'],'stream_subjects');

            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('subject_id')->references('id')->on('subject_level_classes')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('stream_id')->references('id')->on('streams')->onDelete('cascade');
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_level_class_streams');
    }
};
