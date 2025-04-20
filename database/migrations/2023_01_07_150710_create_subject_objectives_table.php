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
        Schema::create('subject_objectives', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('level_id');
            $table->unsignedBigInteger('term_id');
            $table->unsignedBigInteger('subject_id');
            $table->string('objective');
            $table->string('details')->nullable();
            $table->unique(['subject_id','objective','level_id']);
            $table->unique(['subject_id','term_id','level_id']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_objectives');

    }
};
