<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Aksesori extends Model
{
    protected $fillable = [
        'user_id',
        'kode',
        'jenis_aksesoris',
        'merek',
        'tahun_perolehan',
        'harga_perolehan',
        'masa_guna',
        'lama_pakai',
        'kondisi',
        'lokasi',
        'pengguna',
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
