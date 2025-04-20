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
        Schema::create('countries', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->unique();
            $table->string('iso3',3)->nullable();
            $table->string('numeric_code',3)->nullable();
            $table->string('iso2',2)->nullable();
            $table->string('phonecode',3)->nullable();
            $table->string('capital',10)->nullable();
            $table->string('currency',50)->nullable();
            $table->string('currency_name',50)->nullable();
            $table->string('currency_symbol',10)->nullable();
            $table->string('tld' ,3)->nullable();
            $table->string('native',100)->nullable();
             $table->string('region',100)->nullable();
            $table->unsignedBigInteger('region_id')->nullable();
            $table->string('subregion',100)->nullable();
            $table->unsignedBigInteger('subregion_id')->nullable();
             $table->string('nationality',100)->nullable();
            $table->text('timezones',200)->nullable();
            $table->text('translations',255)->nullable();
            $table->decimal('latitude',20,16)->nullable();
            $table->decimal('longitude',20,16)->nullable();
            $table->string('emoji',191)->nullable();
            $table->string('emojiU', 191)->nullable();
            $table->string('wikiDataId',50)->nullable();
            $table->boolean('flag')->default(false);
            $table->boolean('status')->default(false);
            $table->unique(['region_id','name']);
            $table->unique(['subregion_id','name']);
            $table->foreign('subregion_id')->references('id')->on('subregions')->onDelete('cascade');
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
        Schema::dropIfExists('countries');
    }
};

