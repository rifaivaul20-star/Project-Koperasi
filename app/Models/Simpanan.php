<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Simpanan extends Model
{
    protected $table = 'simpanan';
    protected $fillable = ['anggota_id', 'jenis_simpanan', 'jumlah', 'tanggal'];

    public function anggota()
    {
        return $this->belongsTo(Anggota::class, 'anggota_id');
    }
}