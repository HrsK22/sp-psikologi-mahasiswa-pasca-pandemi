<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Riwayat extends Model
{
    use HasFactory;

    protected $table = 'riwayats';
    protected $primaryKey = 'id_riwayat';

    protected $fillable = [
        'nama_mahasiswa',
        'hasil_diagnosa',
        'nilai_cf',
        'detail_diagnosa',
    ];

    // Casting JSON agar otomatis jadi Array saat diambil
    protected $casts = [
        'detail_diagnosa' => 'array',
    ];
}