<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Absensi;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';
    protected $primaryKey = 'id';
    protected $fillable = [
        'nama_materi'
    ];

    public function absen()
    {
        return $this->hasMany(Absensi::class);
    }
}
