<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Kendaraan extends Model
{
    protected $fillable = [
        'user_id',
        'kode',
        'plat_nomor',
        'jenis_kendaraan',
        'merek',
        'tahun_perolehan',
        'harga_perolehan',
        'masa_guna',
        'lama_pakai',
        'kondisi',
        'lokasi',
        'pengguna',
        'masa_pajak',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function keterangans()
    {
        return $this->hasMany(Keterangan::class);
    }
}
