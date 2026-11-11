<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Level extends Model
{
    use HasFactory;

    protected $fillable = [
        'kode',
        'judul',
        'deskripsi',
        'warna',
        'urutan',
    ];

    // Satu level memiliki banyak materi
    public function materials()
    {
        return $this->hasMany(Material::class);
    }

    // Satu level memiliki banyak progres pengguna
    public function userProgress()
    {
        return $this->hasMany(UserProgress::class);
    }

    // Satu level memiliki banyak soal kuis
    public function questions()
    {
        return $this->hasMany(Question::class)->orderBy('urutan');
    }
}
