<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anggota extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'anggota';

    protected $fillable = [
        'user_id',
        'nomor_anggota',
        'nama_lengkap',
        'no_hp',
        'alamat',
    ];

    public function getRouteKeyName()
    {
        return 'nomor_anggota';
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}