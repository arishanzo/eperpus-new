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
        Schema::create('dt_dendas', function (Blueprint $table) {
            $table->increments('id_denda');
            $table->integer('id_santri');
            $table->integer('id_buku');
            $table->date('tgldenda');
            $table->integer('denda');
            $table->string('status_pembayaran');
            $table->date('tglpengembalian');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dt_dendas');
    }
};
