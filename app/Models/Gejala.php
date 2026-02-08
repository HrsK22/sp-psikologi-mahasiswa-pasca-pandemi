<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gejala extends Model
{
    use HasFactory;

    // 1. Definisikan nama tabel secara eksplisit (Opsional di Laravel standar, tapi bagus untuk kepastian)
    protected $table = 'gejalas';

    // 2. Definisikan Primary Key Custom
    protected $primaryKey = 'id_gejala';

    // 3. Pastikan kolom ini boleh diisi (Mass Assignment)
    protected $fillable = [
        'kode_gejala',
        'nama_gejala',
    ];

    // Relasi ke Basis Pengetahuan (One to Many)
    public function basisPengetahuans()
    {
        return $this->hasMany(BasisPengetahuan::class, 'id_gejala', 'id_gejala');
    }
}