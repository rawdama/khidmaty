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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('photo');
            $table->decimal('price', 10, 2); 
            $table->string('code')->unique();
            $table->unsignedBigInteger('product_type_id'); 
            $table->foreign('product_type_id') 
                    ->references('id')
                    ->on('product_types')
                    ->onDelete('cascade');

            $table->unsignedBigInteger('store_id'); 
            $table->foreign('store_id') 
                        ->references('id')
                        ->on('stores')
                        ->onDelete('cascade');
            
            $table->unsignedBigInteger('product_department_id');
            $table->foreign('product_department_id')
                        ->references('id')
                        ->on('product_departments')
                        ->onDelete('cascade');

            $table->unsignedBigInteger('brand_id');
            $table->foreign('brand_id')
                            ->references('id')
                            ->on('brands')
                            ->onDelete('cascade');
                            
            $table->unsignedBigInteger('car_id');
            $table->foreign('car_id')
                            ->references('id')
                            ->on('cars')
                            ->onDelete('cascade');
            $table->enum('type', ['اصلي', 'مقلد' ]);
            $table->string('model')->nullable(); 
            $table->enum('offer', ['يوجد عرض', 'لا يوجد عرض '])->default('لا يوجد عرض'); 
            $table->enum('offer_type', ['قيمة', ' نسبة %'])->nullable(); 
            $table->decimal('offer_value', 8, 2)->nullable(); 
            $table->date('from_date')->nullable(); 
            $table->date('to_date')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};