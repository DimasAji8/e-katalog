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
    Schema::create('products', function (Blueprint $table) {
        $table->id();
        $table->foreignId('kategori_id') // Menggunakan 'kategori_id' sesuai dengan tabel referensi
                  ->constrained('kategoris') // Mengarahkan ke tabel 'kategori'
                  ->onDelete('cascade');
        $table->string('name');
        $table->text('description')->nullable();
        $table->decimal('price', 10, 2)->nullable();
        $table->string('image_url')->nullable();
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
