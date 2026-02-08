<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penyakit extends Model
{
    use HasFactory;

    protected $table = 'penyakits';
    protected $primaryKey = 'id_penyakit';

    protected $fillable = [
        'kode_penyakit',
        'nama_penyakit',
        'deskripsi_solusi',
    ];

    // Relasi ke Basis Pengetahuan
    public function basisPengetahuans()
    {
        return $this->hasMany(BasisPengetahuan::class, 'id_penyakit', 'id_penyakit');
    }
}