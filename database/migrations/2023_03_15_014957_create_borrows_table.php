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
        Schema::create('borrows', function (Blueprint $table) {
            $table->id('b_id');
            $table->string('b_stat');//return or borrowed
            $table->unsignedBigInteger('s_id');
            $table->foreign('s_id')->references('s_id')->on('students')->onDelete('cascade');
            $table->unsignedBigInteger('id');
            $table->foreign('id')->references('id')->on('books')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('borrows');
    }
};
