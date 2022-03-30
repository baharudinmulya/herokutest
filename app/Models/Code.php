<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Absensi;

class Code extends Model
{
    use HasFactory;

    protected $table = 'code';
    protected $primaryKey = 'id';
    protected $fillable = [
        'code', 'user_id', 'user_id_get'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function absen()
    {
        return $this->belongsTo(Absen::class);
    }
}
