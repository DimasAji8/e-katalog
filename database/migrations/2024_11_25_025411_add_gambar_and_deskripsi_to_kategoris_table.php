<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGambarAndDeskripsiToKategorisTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('kategoris', function (Blueprint $table) {
            $table->string('gambar')->nullable()->after('name'); // Menambahkan kolom gambar
            $table->text('deskripsi')->nullable()->after('gambar'); // Menambahkan kolom deskripsi
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kategoris', function (Blueprint $table) {
            $table->dropColumn(['gambar', 'deskripsi']); // Menghapus kolom gambar dan deskripsi
        });
    }
}
