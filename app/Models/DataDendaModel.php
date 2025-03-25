<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DataDendaModel extends Model
{
   
    
    use HasFactory;
    protected $table = 'dt_dendas';
    protected $primaryKey = 'id_denda';

    public function data_buku()
    {
        return $this->belongsTo(DataBukuModel::class, 'id_buku', 'id_buku'); // Relasi Many-to-One
    }

    public function data_santri()
    {
        return $this->belongsTo(DataSantriModel::class, 'id_santri', 'id_santri'); // Relasi Many-to-One
    }

    protected $fillable = [
        'id_denda',
  'id_santri' ,
  'id_buku',
  'tgldenda' ,
  'denda' ,
  'status_pembayaran' ,
  'tglpengembalian',
    ];
}
