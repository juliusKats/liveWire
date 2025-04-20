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
        Schema::create('states', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->unsignedBigInteger('country_id')->nullable();
            $table->string('country_code',2)->nullable();
             $table->string('fips_code',4)->nullable();
            $table->string('iso2',6)->nullable();
            $table->string('type',100)->nullable();
            $table->integer('level')->nullable();
            $table->integer('parent_id')->nullable();
            $table->decimal('latitude',20,16)->nullable();
            $table->decimal('longitude',20,16)->nullable();
            $table->boolean('flag')->default(1);
            $table->string('wikiDataId',50)->nullable();
            $table->boolean('status')->default('0');

            $table->unique(['country_id','country_code','fips_code','iso2','type','name','latitude','longitude'],'distinct');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('states');
    }
};
