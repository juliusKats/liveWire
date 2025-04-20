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
        Schema::create('year_terms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('year_id');
            $table->string('term_id');
            $table->unique(['year_id','term_id']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');
            // $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('year_terms');
    }
};
