<?php

namespace App\Services\Admin;

use App\Models\Anggota;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AnggotaService
{
    public function createAnggota(array $data) {
        return DB::transaction(function () use ($data) {
            $user = User::create([
                'name' => $data['nama_lengkap'],
                'email' => $data['email'],
                'password' => Hash::make('koperasi123'),
            ]);

            return Anggota::create([
                'user_id' => $user->id,
                // Prioritas: Pakai input dari form jika ada, jika tidak ada baru Generate otomatis
                'nomor_anggota' => $data['nomor_anggota'] ?? $this->generateNomorAnggota(),
                'nama_lengkap' => $data['nama_lengkap'],
                'no_hp' => $data['no_hp'],
                'alamat' => $data['alamat'],
            ]);
        });
    }

    public function updateAnggota(Anggota $anggota, array $data) {
        return DB::transaction(function () use ($anggota, $data) {
            // Update user email/name jika ada
            if ($anggota->user) {
                $anggota->user->update([
                    'name' => $data['nama_lengkap'], 
                    'email' => $data['email']
                ]);
            }
            return $anggota->update($data);
        });
    }

    public function generateNomorAnggota(): string {
        $year = date('Y');
        // Cari data terakhir dengan tahun berjalan
        $last = Anggota::where('nomor_anggota', 'like', "AGT-{$year}-%")
                       ->orderBy('id', 'desc')
                       ->first();
        
        // Ambil angka terakhir, tambah 1
        $num = $last ? (int) substr($last->nomor_anggota, -3) + 1 : 1;
        
        $newNomor = "AGT-{$year}-" . str_pad($num, 3, '0', STR_PAD_LEFT);

        // Tambahan: Cek sekali lagi apakah nomor ini sudah ada di DB untuk menghindari bentrok
        if (Anggota::where('nomor_anggota', $newNomor)->exists()) {
            // Kalau bentrok, coba nomor berikutnya
            return $this->generateNomorAnggotaRecurse($num + 1, $year);
        }

        return $newNomor;
    }

    // Fungsi tambahan untuk jaga-jaga kalau nomor bentrok
    private function generateNomorAnggotaRecurse($num, $year) {
        $newNomor = "AGT-{$year}-" . str_pad($num, 3, '0', STR_PAD_LEFT);
        if (Anggota::where('nomor_anggota', $newNomor)->exists()) {
            return $this->generateNomorAnggotaRecurse($num + 1, $year);
        }
        return $newNomor;
    }
}
