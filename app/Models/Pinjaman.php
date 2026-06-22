<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table = 'pinjaman'; // Memberitahu nama tabel
    
    // Memberitahu Laravel kolom mana saja yang boleh diisi
    protected $fillable = ['anggota_id', 'jumlah_pinjaman', 'tanggal_pengajuan', 'status'];

    // Tambahkan ini agar bisa memanggil nama anggota
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
}
