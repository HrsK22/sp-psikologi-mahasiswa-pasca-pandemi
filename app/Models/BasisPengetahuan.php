<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BasisPengetahuan extends Model
{
    use HasFactory;

    protected $table = 'basis_pengetahuans';
    protected $primaryKey = 'id_basis';

    protected $fillable = [
        'id_gejala',
        'id_penyakit',
        'cf_pakar', // Nilai probabilitas pakar
    ];

    // Relasi Balik ke Gejala (BelongsTo)
    public function gejala()
    {
        return $this->belongsTo(Gejala::class, 'id_gejala', 'id_gejala');
    }

    // Relasi Balik ke Penyakit (BelongsTo)
    public function penyakit()
    {
        return $this->belongsTo(Penyakit::class, 'id_penyakit', 'id_penyakit');
    }
}