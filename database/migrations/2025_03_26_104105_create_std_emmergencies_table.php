<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\ContactType;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('std_emmergencies', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->string('emmName');
            $table->string('emmMobile',15);
            $table->unsignedBigInteger('relation_id');
            $table->string('emmTelephone',15)->nullable();
            $table->string('emmPhoto',2048)->nullable();
            $table->string('emmMail',30)->nullable();
            $table->text('emAddress',2048)->nullable();
            $table->unsignedBigInteger('emmType_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unique(['student_id','emmType_id']);
            $table->unique(['student_id','emmName']);
            $table->unique(['student_id','emmMobile']);
            $table->unique(['student_id','emmName','emmMobile']);
            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
            $table->foreign('relation_id')->references('id')->on('relationships')->onDelete('cascade');
            $table->foreign('emmType_id')->references('id')->on('contact_types')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('std_emmergencies');
    }
};
