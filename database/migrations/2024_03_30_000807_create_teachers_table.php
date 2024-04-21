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
        Schema::create('teachers', function (Blueprint $table) {
            $table->unsignedBigInteger('teacher_id')->unique()->primary();
            $table->foreign('teacher_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('matiere',['Arabic','English','French','Matimatic','Physic','Islamic','Historic_and_geography']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('teachers');
    }
};
