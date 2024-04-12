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
        Schema::create('students', function (Blueprint $table) {
            $table->unsignedBigInteger('student_id')->unique()->primary();
            $table->foreign('student_id')->references('id')->on('users')->cascadeOnDelete()->cascadeOnUpdate();
            $table->enum('nivaux', ['1p','2p','3p','4p','5p','1m','2m','3m','4m','1l','2l','3l']);//c'est le nivaux scolair 
            $table->timestamps();
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
