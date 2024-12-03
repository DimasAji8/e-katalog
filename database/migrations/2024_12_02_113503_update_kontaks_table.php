<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateKontaksTable extends Migration
{
    /**
     * Mengubah struktur tabel kontaks.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kontaks', function (Blueprint $table) {
            // Hapus kolom yang tidak dibutuhkan
            $table->dropColumn(['email', 'youtube', 'facebook', 'tiktok']);

            // Tambahkan kolom Instagram
            $table->string('instagram')->nullable();
        });
    }

    /**
     * Membalikkan perubahan yang dilakukan oleh metode up.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kontaks', function (Blueprint $table) {
            // Menambahkan kembali kolom yang dihapus
            $table->string('email')->nullable();
            $table->string('youtube')->nullable();
            $table->string('facebook')->nullable();
            $table->string('tiktok')->nullable();

            // Menghapus kolom Instagram jika rollback
            $table->dropColumn('instagram');
        });
    }
}
