<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
// Memanggil fitur Spatie
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    // Mengaktifkan fitur Spatie (HasRoles) di dalam akun pengguna
    use HasFactory, Notifiable, HasRoles;

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
    
    // Relasi ke data Anggota (Jika user ini adalah anggota, bukan admin)
    public function anggota()
    {
        return $this->hasOne(Anggota::class);
    }
}
