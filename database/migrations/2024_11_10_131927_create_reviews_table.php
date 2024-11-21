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
    Schema::create('reviews', function (Blueprint $table) {
        $table->id();
        $table->string('name');
        $table->string('email');
        $table->text('content');
        $table->boolean('is_visible')->default(true); // Untuk kontrol tampil/tidak
        $table->timestamps(); // Menambahkan kolom created_at dan updated_at otomatis
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reviews');
    }
};
