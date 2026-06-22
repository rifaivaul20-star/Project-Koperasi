<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Models\Simpanan;
use App\Models\Pinjaman;

class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'total_anggota'  => Anggota::count(),
            'total_simpanan' => Simpanan::sum('jumlah'),
            'total_pinjaman' => Pinjaman::sum('jumlah_pinjaman'),
        ];

        return view('admin.dashboard', compact('data'));
    }
}

