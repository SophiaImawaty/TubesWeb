<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventaris extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama_barang',
        'kategori',
        'lokasi',
        'tanggal_pembelian',
        'kondisi',
        'harga',
        'penanggung_jawab',
        'jumlah',
        'keterangan',
    ];
}
