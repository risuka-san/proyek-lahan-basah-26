<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'level_id',
        'kode',
        'judul',
        'sub_judul',
        'deskripsi_singkat',
        'konten',
        'fakta_angka',
        'fakta_teks',
    ];

    // Satu materi dimiliki oleh satu level.
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
