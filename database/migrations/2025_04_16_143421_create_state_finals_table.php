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
        Schema::create('state_finals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('nationality_id');
            $table->string('name',100);
            $table->string('nationality',100);
            $table->string('type',150);
            $table->timestamps();
            $table->foreign('nationality_id')->references('id')->on('nationalities')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('state_finals');
    }
};
