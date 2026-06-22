<?php

namespace App\Services\Admin;

use App\Models\Simpanan;

class SimpananService
{
    public function createSimpanan(array $data)
    {
        return Simpanan::create($data);
    }
}
