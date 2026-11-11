<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->integer('level_id')->unique(); // ID Level (1, 2, 3, dst)
            $table->string('kode'); // KL, PS, RL, dll
            $table->string('judul');
            $table->string('sub_judul')->nullable(); // Untuk tulisan orange
            $table->text('deskripsi_singkat'); // Untuk sidebar kiri
            $table->longText('konten'); // Isi materi utama
            $table->string('fakta_angka')->nullable(); // Misal "6%"
            $table->string('fakta_teks')->nullable(); // Misal "Permukaan Bumi berupa lahan basah"
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};