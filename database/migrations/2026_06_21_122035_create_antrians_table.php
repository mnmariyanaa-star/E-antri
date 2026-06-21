<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('antrians', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')->constrained('layanans')->cascadeOnDelete();
            $table->string('nomor_antrian', 20);
            $table->string('nama');
            $table->string('nik', 20);
            $table->string('no_hp', 20);
            $table->text('keperluan');
            $table->date('tanggal');
            $table->time('jam');
            $table->enum('status', ['Menunggu', 'Dipanggil', 'Selesai', 'Tidak Hadir'])->default('Menunggu');
            $table->timestamps();

            $table->unique(['nomor_antrian', 'tanggal']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('antrians');
    }
};