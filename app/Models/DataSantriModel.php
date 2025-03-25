<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataSantriModel extends Model
{
    use HasFactory;

         /**
     * fillable
     *
     * @var array
     */
    protected $table = 'dt_santris';
     protected $primaryKey = 'id_santri';

     public function pinjam_buku()
     {
         return $this->hasMany(DataPinjamModel::class, 'id_santri', 'id_santri'); // Relasi Many-to-One
     }
 
     public function denda()
     {
         return $this->hasMany(DataDendaModel::class, 'id_santri', 'id_santri'); // Relasi Many-to-One
     }
 

    protected $fillable = [
        'id_santri',
        'nama_santri',
        'nis',
        'kelas',
        'asrama',
        'status',
    ];
}
