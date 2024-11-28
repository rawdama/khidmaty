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
        Schema::create('settings', function (Blueprint $table) {
            $table->id();
            $table->integer('phone_1'); 
            $table->integer('phone_2'); 
            $table->string('email')->unique(); 

            $table->string('twitter_link');
            $table->string('facebook_link');
            $table->string('instagram_link');
            $table->string('snapchat_link');
            $table->string('linkedin_link');
            $table->string('youtube_link');
            $table->string('whatsapp_link');
            $table->string('app_store_link');
            $table->string('google_play_link');

            $table->string('header_logo');
            $table->string('footer_logo');
            $table->string('favicon');
            $table->string('about_image');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('settings');
    }
};
