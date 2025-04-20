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
        Schema::create('cities', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->unsignedBigInteger('state_id')->nullable();
            $table->string('state_code',5)->nullable();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('country_code',2)->nullable();
            $table->decimal('latitude',20,16)->nullable();
            $table->decimal('longitude',20,16)->nullable();
            $table->boolean('flag')->default(1);
            $table->string('wikiDataId',50)->nullable();
            $table->timestamps();
            $table->softDeletes();

            // $table->unique(['country_id','state_id','state_code','name','latitude','longitude'],'distinct');
            $table->foreign('state_id')->references('id')->on('states')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cities');
    }
};
