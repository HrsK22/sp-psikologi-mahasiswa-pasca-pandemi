<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('basis_pengetahuans', function (Blueprint $table) {
            $table->bigIncrements('id_basis');
            
            // Foreign Keys Columns
            $table->unsignedBigInteger('id_gejala');
            $table->unsignedBigInteger('id_penyakit');
            
            // Nilai CF Pakar (0.1 - 1.0)
            $table->double('cf_pakar'); 

            $table->timestamps();

            // Definisi Relasi (Foreign Key Constraints)
            $table->foreign('id_gejala')
                  ->references('id_gejala')
                  ->on('gejalas')
                  ->onDelete('cascade');

            $table->foreign('id_penyakit')
                  ->references('id_penyakit')
                  ->on('penyakits')
                  ->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('basis_pengetahuans');
    }
};