<?php

namespace App\Services\Admin;

use App\Models\Pinjaman;

class PinjamanService
{
    public function ajukanPinjaman(array $data)
    {
        return Pinjaman::create($data);
    }
}