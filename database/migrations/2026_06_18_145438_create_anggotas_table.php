<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('anggota', function (Blueprint $table) {
            $table->id();
            
            // Relasi ke akun login (tabel users)
            $table->foreignId('user_id')->constrained('users')->cascadeOnDelete();
            
            // Kolom data diri anggota
            $table->string('nomor_anggota', 50)->unique();
            $table->string('nama_lengkap');
            $table->string('no_hp', 20)->nullable();
            $table->text('alamat')->nullable();
            
            $table->timestamps();
            $table->softDeletes(); // Agar data tidak benar-benar hilang saat dihapus
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('anggota');
    }
};