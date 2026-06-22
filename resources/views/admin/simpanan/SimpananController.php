<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\SimpananService;
use App\Models\Simpanan;

class SimpananController extends Controller
{
    // Menampilkan daftar semua simpanan
    public function index()
    {
        $simpanan = Simpanan::all();
        return view('admin.simpanan.index', compact('simpanan'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('admin.simpanan.create');
    }

    // Menyimpan data baru
    public function store(Request $request, SimpananService $simpananService)
    {
        $validated = $request->validate([
            'anggota_id'     => 'required|exists:anggota,id',
            'jenis_simpanan' => 'required|string',
            'jumlah'         => 'required|numeric',
            'tanggal'        => 'required|date',
        ]);

        $simpananService->createSimpanan($validated);
        return redirect()->route('admin.simpanan.index')->with('success', 'Simpanan berhasil ditambahkan!');
    }

    // Menampilkan form edit
    public function edit(Simpanan $simpanan)
    {
        return view('admin.simpanan.edit', compact('simpanan'));
    }

    // Memperbarui data
    public function update(Request $request, Simpanan $simpanan)
    {
        $validated = $request->validate([
            'anggota_id'     => 'required|exists:anggota,id',
            'jenis_simpanan' => 'required|string',
            'jumlah'         => 'required|numeric',
            'tanggal'        => 'required|date',
        ]);

        $simpanan->update($validated);
        return redirect()->route('admin.simpanan.index')->with('success', 'Simpanan berhasil diupdate!');
    }

    // Menghapus data
    public function destroy(Simpanan $simpanan)
    {
        $simpanan->delete();
        return redirect()->route('admin.simpanan.index')->with('success', 'Simpanan berhasil dihapus!');
    }
}