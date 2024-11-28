




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
        Schema::create('stores', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_store_id'); 
            $table->foreign('product_store_id') 
                  ->references('id')
                  ->on('product_stores')
                  ->onDelete('cascade');
            $table->string('name'); 
            $table->string('countryCode'); 
            $table->integer('phone'); 
            $table->string('address'); 
            $table->string('email')->unique(); 
            $table->string('password'); 
            $table->string('photo');
            $table->string('Commercial_register');
            $table->string('offer')->default('Not activated');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('stores');
    }
};
