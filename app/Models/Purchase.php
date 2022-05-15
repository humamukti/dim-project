<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_pemesan',
        'product_id',
        'jumlah_pemesan',
        'lead_time',
        'pakai'
    ];
}
