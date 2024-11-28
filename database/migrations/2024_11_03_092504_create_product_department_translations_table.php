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
        Schema::create('product_department_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('product_department_id');
            $table->foreign('product_department_id')->references('id')->on('product_departments')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('name')->nullable();
            
            $table->unique(['product_department_id', 'locale'], 'unique_department_locale');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_department_translations');
    }
};