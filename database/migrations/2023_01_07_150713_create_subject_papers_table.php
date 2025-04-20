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
        Schema::create('subject_papers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('subject_id')->nullable();
            $table->unsignedBigInteger('paper_id')->nullable();
            $table->foreign('subject_id')->references('id')->on('subject_levels')->onDelete('cascade');
            $table->foreign('paper_id')->references('id')->on('papers')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->timestamps();
            $table->unique(['subject_id','paper_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_papers');
    }
};
