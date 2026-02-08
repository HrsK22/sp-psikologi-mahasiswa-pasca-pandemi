<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('penyakits', function (Blueprint $table) {
            $table->bigIncrements('id_penyakit'); // Primary Key
            $table->string('kode_penyakit')->unique(); // S001, S002
            $table->string('nama_penyakit'); // Stres Ringan, dst
            $table->text('deskripsi_solusi'); // Solusi penanganan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('penyakits');
    }
};