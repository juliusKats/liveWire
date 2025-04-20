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
        Schema::create('std_addresses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id')->unique();
            $table->unsignedBigInteger('country_id')->nullable();
            $table->unsignedBigInteger('nationality_id')->nullable();
            $table->string('district',20)->nullable();
            $table->string('city',15)->nullable();
            $table->string('province',20)->nullable();
            $table->string('county',20)->nullable();
            $table->string('subcounty',20)->nullable();
            $table->string('parish',20)->nullable();
            $table->text('address');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->foreign('nationality_id')->references('id')->on('countries')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('std_addresses');
    }
};
