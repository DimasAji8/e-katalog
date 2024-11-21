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
    Schema::table('galleries', function (Blueprint $table) {
        $table->string('gambar')->change(); // Pastikan kolom 'gambar' bertipe string
    });
}

public function down()
{
    Schema::table('galleries', function (Blueprint $table) {
        // Balikkan perubahan tipe kolom jika diperlukan
    });
}

};
