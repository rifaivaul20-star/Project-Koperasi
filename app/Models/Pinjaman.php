<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    protected $table = 'pinjaman'; 
    
    
    protected $fillable = ['anggota_id', 'jumlah_pinjaman', 'tanggal_pengajuan', 'status'];

    
    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
}
