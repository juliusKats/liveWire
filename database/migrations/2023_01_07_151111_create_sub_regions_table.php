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
        Schema::create('subregions', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->unique();
            $table->string('translations',200)->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->boolean('flag')->default(1);
            $table->string('wikiDataId',50)->nullable();
            $table->boolean('status')->default(0);
            $table->unique(['region_id','name']);
            $table->foreign('region_id')->references('id')->on('regions')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subregions');
    }
};


