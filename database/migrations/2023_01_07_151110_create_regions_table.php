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
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name',100)->unique();
            $table->string('translations',255)->nullable();
            $table->boolean('flag')->default(1);
            $table->string('wikiDataId',50)->nullable();
            $table->boolean('status')->default(0);
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('deleted_by')->nullable();
            $table->dateTime('restored_at')->nullable();
            $table->unsignedBigInteger('restored_by')->nullable();
            $table->foreign('deleted_by')->references('id')->on('users')->onDelete('cascade')->nullable();
            $table->foreign('restored_by')->references('id')->on('users')->onDelete('cascade')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regions');
    }
};

