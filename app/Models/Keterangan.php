<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keterangan extends Model
{
    protected $table = 'keterangans'; // Nama tabel dalam database

    protected $fillable = [
        'tanggal',
        'keterangan',
        'kilometer',
        'total_harga',
    ];


    public function kendaraan()
    {
        return $this->belongsTo('App\Models\Kendaraan');
    }
}
