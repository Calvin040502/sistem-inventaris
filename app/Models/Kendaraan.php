<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Kendaraan extends Model
{
    protected $fillable = [
        'user_id',
        'kode',
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
        'service_date',
        'service_type',
        'oil_change_date',
    ];

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}
}
