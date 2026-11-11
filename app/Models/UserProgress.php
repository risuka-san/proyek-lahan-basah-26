<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserProgress extends Model
{
    use HasFactory;

    protected $table = 'user_progress';

    protected $fillable = [
        'user_id',
        'level_id',
        'is_completed',
    ];

    protected function casts(): array
    {
        return [
            'is_completed' => 'boolean',
        ];
    }

    // Progres dimiliki oleh satu pengguna.
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Progres terhubung dengan satu level.
    public function level()
    {
        return $this->belongsTo(Level::class);
    }
}
