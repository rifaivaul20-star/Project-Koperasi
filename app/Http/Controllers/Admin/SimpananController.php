<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\SimpananService;
use App\Models\Simpanan;

class SimpananController extends Controller
{
   public function index()
{
    // Gunakan 'with' agar relasi anggotanya terbawa
    $simpanan = Simpanan::with('anggota')->latest()->get(); 
    return view('admin.simpanan.index', compact('simpanan'));
}

    public function create() {
    $anggota = \App\Models\Anggota::all(); // Ambil semua anggota
    return view('admin.simpanan.create', compact('anggota'));
}

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

    public function edit($id) {
    $simpanan = \App\Models\Simpanan::findOrFail($id);
    $anggota = \App\Models\Anggota::all(); // Tambahkan baris ini
    return view('admin.simpanan.edit', compact('simpanan', 'anggota'));
}

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

    public function destroy(Simpanan $simpanan)
    {
        $simpanan->delete();

        return redirect()->route('admin.simpanan.index')->with('success', 'Simpanan berhasil dihapus!');
    } 
} 
