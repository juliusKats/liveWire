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
        Schema::create('level_classes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unique(['level_id','class_id']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('level_classes');
    }
};
