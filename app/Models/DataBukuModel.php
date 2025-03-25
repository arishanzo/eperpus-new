<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataBukuModel extends Model
{
    use HasFactory;
    protected $table = 'dt_bukus';
    protected $primaryKey = 'id_buku';

    public function pinjam_bukus()
    {
        return $this->hasMany(DataPinjamModel::class, 'id_buku', 'id_buku'); // Relasi Many-to-One
    }


    

    protected $fillable = [
        'id_buku',
        'judul_buku',
        'pengarang',
        'kategori',
        'isbn',
        'tahunterbit',
        'jumlahsalinan'
    ];
}
