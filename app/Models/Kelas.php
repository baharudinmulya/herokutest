<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Absensi;

class Kelas extends Model
{
    use HasFactory;

    protected $table ='kelas';
    protected $primaryKey = 'id';
    protected $fillable = [
        'jurusan', 'fakultas', 'tingkat', 'kelas'
    ];

    public function absen()
    {
        return $this->hasMany(Absensi::class);
    }
}
