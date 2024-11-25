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
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('merk_id') // Foreign key ke tabel merk
                ->nullable() // Merk opsional
                ->constrained('merks') // Mengarahkan ke tabel 'merks'
                ->onDelete('set null');

            $table->string('ukuran')->nullable(); // Menambahkan kolom ukuran
            $table->text('penggunaan')->nullable(); // Menambahkan kolom penggunaan
            $table->string('desain')->nullable(); // Menambahkan kolom desain
            $table->string('permukaan')->nullable(); // Menambahkan kolom permukaan
            $table->string('sentuhan_akhir')->nullable(); // Menambahkan kolom sentuhan akhir
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['merk_id']);
            $table->dropColumn(['merk_id', 'ukuran', 'penggunaan', 'desain', 'permukaan', 'sentuhan_akhir']);
        });
    }
};
