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
        Schema::create('class_streams', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('stream_id')->nullable();
            $table->unique(['class_id','stream_id']);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('stream_id')->references('id')->on('streams')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('class_streams');
    }
};
