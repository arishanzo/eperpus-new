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
        Schema::create('dt_bukus', function (Blueprint $table) {
            $table->increments('id_buku');
            $table->string('judul_buku');
            $table->string('pengarang');
            $table->string('kategori');
            $table->string('isbn');
            $table->string('tahunterbit');
            $table->integer('jumlahsalinan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dt_bukus');
    }
};
