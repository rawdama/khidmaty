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
        Schema::create('product_departments', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->unsignedBigInteger('product_store_id'); 
            $table->foreign('product_store_id') 
                  ->references('id')
                  ->on('product_stores')
                  ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_departments');
    }
};
