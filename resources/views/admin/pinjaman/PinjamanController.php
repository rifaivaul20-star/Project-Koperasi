<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\PinjamanService;
use App\Models\Pinjaman;

class PinjamanController extends Controller
{
    // Menampilkan daftar semua pinjaman
    public function index()
    {
        $pinjaman = Pinjaman::all();
        return view('admin.pinjaman.index', compact('pinjaman'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('admin.pinjaman.create');
    }

    // Menyimpan data baru
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

    // Menampilkan form edit
    public function edit(Pinjaman $pinjaman)
    {
        return view('admin.pinjaman.edit', compact('pinjaman'));
    }

    // Memperbarui data
    public function update(Request $request, Pinjaman $pinjaman)
    {
        $validated = $request->validate([
            'anggota_id'        => 'required|exists:anggota,id',
            'jumlah_pinjaman'   => 'required|numeric',
            'tanggal_pengajuan' => 'required|date',
        ]);

        $pinjaman->update($validated);
        return redirect()->route('admin.pinjaman.index')->with('success', 'Pinjaman berhasil diupdate!');
    }

    // Menghapus data
    public function destroy(Pinjaman $pinjaman)
    {
        $pinjaman->delete();
        return redirect()->route('admin.pinjaman.index')->with('success', 'Pinjaman berhasil dihapus!');
    }
}
