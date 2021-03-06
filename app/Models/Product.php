<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    /**
     * @var array
     */
    protected $fillable = [
        'nama_barang', 'harga_barang', 'biaya_penyimpanan', 'periode_permintaan', 'satuan', 'konversi'
    ];
}
