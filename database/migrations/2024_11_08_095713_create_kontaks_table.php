<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
   public function up()
{
    Schema::create('kontaks', function (Blueprint $table) {
        $table->id();
        $table->string('whatsapp')->nullable();
        $table->string('email')->nullable();
        $table->string('youtube')->nullable();
        $table->string('facebook')->nullable();
        $table->string('tiktok')->nullable();
        $table->string('maps')->nullable();
        $table->string('shopee')->nullable();
        $table->string('tokped')->nullable();
        $table->timestamps();
    });
}


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kontaks');
    }
};
