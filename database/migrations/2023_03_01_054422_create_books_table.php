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
        Schema::create('books', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('bk_title');   
            $table->string('bk_pub');
            $table->string('bk_auth');
            $table->string('bk_yr');
            $table->string('bk_vol');
            $table->integer('bk_qty');
            $table->string('bk_cover')->nullable(); ;       
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};
