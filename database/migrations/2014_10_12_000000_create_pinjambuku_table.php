<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pinjam_bukus', function (Blueprint $table) {
            $table->increments('id_pinjambuku');
            $table->integer('id_buku');
            $table->integer('id_santri');
            $table->integer('jumlah');
            $table->date('tglpinjam');
            $table->date('tgljatuhtempo');
            $table->string('statuspinjam');
            $table->timestamps();
        });

        DB::unprepared('
        CREATE TRIGGER delete_stok
AFTER DELETE ON pinjam_bukus
FOR EACH ROW
BEGIN
    UPDATE dt_bukus 
    SET jumlahsalinan = jumlahsalinan + OLD.jumlah
    WHERE id_buku = OLD.id_buku;
END;
    ');

    
    DB::unprepared('
    CREATE TRIGGER update_stok
AFTER DELETE ON pinjam_bukus
FOR EACH ROW
BEGIN
UPDATE dt_bukus 
SET jumlahsalinan = jumlahsalinan + jumlah
WHERE id_buku = OLD.id_buku;
END;
');

    DB::unprepared('
    CREATE TRIGGER kurang_stock
AFTER INSERT ON pinjam_bukus
FOR EACH ROW
BEGIN
    UPDATE dt_bukus 
    SET jumlahsalinan = jumlahsalinan - NEW.jumlah
    WHERE id_buku = NEW.id_buku;
END;
');


    }

    
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pinjam_bukus');
    }
   
};
