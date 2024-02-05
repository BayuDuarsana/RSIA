<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jabatan extends Model
{
    protected $table = 'jabatan'; // Nama tabel pada database

    protected $fillable = [
        'nama',
    ];

    // Relasi dengan model Karyawan
    public function karyawan()
    {
        return $this->belongsToMany(Karyawan::class, 'jabatan_karyawan', 'jabatan_id', 'karyawan_id');
    }
}
