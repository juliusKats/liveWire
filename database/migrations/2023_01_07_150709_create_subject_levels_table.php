<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Enums\Compulsory;
use App\Enums\Principle;
use App\Enums\Groups;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('subject_levels', function (Blueprint $table) {
            $table->id();
            $table->string('code',6)->nullable();
            $table->unsignedBigInteger('subject_id');
            $table->unsignedBigInteger('level_id');
            $table->enum('isComp',array_column(Compulsory::cases(),'value'))->unllable();
            $table->enum('isPrinciple',array_column(Principle::cases(),'value'))->unllable();
            $table->enum('Categoty',array_column(Groups::cases(),'value'))->unllable();
            $table->unique(['subject_id','level_id']);
            $table->unique(['code','subject_id']);

            $table->foreign('subject_id')->references('id')->on('subjects')->onDelete('cascade');
            $table->foreign('level_id')->references('id')->on('levels')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }
   
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subject_levels');
    }
};
