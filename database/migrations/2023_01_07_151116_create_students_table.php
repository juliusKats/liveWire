<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Gender;
return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name',100);
            $table->string('email',30)->nullable();
            $table->string('telephone',15);
            $table->dateTime('dob')->nullable();
            $table->enum('gender',array_column(Gender::cases(),'value'))->nullable();
            $table->boolean('bothparents')->nullable();
            $table->string('livingwith')->nullable();
            $table->unsignedBigInteger('religion_id')->nullable();
            $table->unsignedBigInteger('class_id')->nullable();
            $table->unsignedBigInteger('stream_id')->nullable();
            $table->unsignedBigInteger('year_id')->nullable();
            $table->unsignedBigInteger('term_id')->nullable();
            $table->boolean('admitted')->nullable();
            $table->unsignedBigInteger('level_id')->nullable();
            $table->unsignedBigInteger('section_id')->nullable();
            $table->dateTime('admittedOn')->nullable();
            $table->boolean('condition')->default('0');
            $table->string('stdPhoto', 2048)->nullable();
            $table->string('official_comments');
            $table->timestamps();
            $table->softDeletes();

            $table->unique(['name','telephone']);

            $table->foreign('religion_id')->references('id')->on('religions')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->foreign('section_id')->references('id')->on('sections')->onDelete('cascade');
            $table->foreign('year_id')->references('id')->on('years')->onDelete('cascade');
            $table->foreign('class_id')->references('id')->on('classes')->onDelete('cascade');
            $table->foreign('stream_id')->references('id')->on('streams')->onDelete('cascade');
            $table->foreign('term_id')->references('id')->on('terms')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
