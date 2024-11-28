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
        Schema::create('opnion_translations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('opnion_id');
            $table->foreign('opnion_id')->references('id')->on('opnions')->onDelete('cascade');
            $table->string('locale')->index();
            $table->string('name')->nullable();
            $table->string('comment')->nullable();
            $table->unique(['opnion_id', 'locale']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('opnion_translations');
    }
};
