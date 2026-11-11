<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    protected $fillable = [
        'level_id',
        'pertanyaan',
        'urutan',
    ];

    // Soal dimiliki oleh satu level
    public function level()
    {
        return $this->belongsTo(Level::class);
    }

    // Satu soal memiliki banyak pilihan jawaban
    public function options()
    {
        return $this->hasMany(QuestionOption::class);
    }
}
