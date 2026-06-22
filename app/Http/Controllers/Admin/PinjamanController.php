<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\PinjamanService;
use App\Models\Pinjaman;

class PinjamanController extends Controller
{
    // Menampilkan daftar pinjaman
    public function index()
    {
        $pinjaman = Pinjaman::all();
        return view('admin.pinjaman.index', compact('pinjaman'));
    }

    // Menampilkan form tambah pinjaman
    public function create()
    {
        return view('admin.pinjaman.create');
    }

    // Menyimpan data pinjaman baru
    public function store(Request $request, PinjamanService $pinjamanService)
    {
        $validated = $request->validate([
            'anggota_id'        => 'required|exists:anggota,id',
            'jumlah_pinjaman'   => 'required|numeric',
            'tanggal_pengajuan' => 'required|date',
        ]);

        $pinjamanService->ajukanPinjaman($validated);

        return redirect()->route('admin.pinjaman.index')->with('success', 'Pinjaman berhasil diajukan!');
    }
}
