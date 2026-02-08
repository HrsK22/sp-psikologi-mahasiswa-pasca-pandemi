<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('gejalas', function (Blueprint $table) {
            $table->bigIncrements('id_gejala'); // Primary Key
            $table->string('kode_gejala')->unique(); // G001, G002
            $table->text('nama_gejala'); // Pertanyaan lengkap
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('gejalas');
    }
};