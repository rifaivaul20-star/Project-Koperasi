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
        $simpanan = Simpanan::all();
        return view('admin.simpanan.index', compact('simpanan'));
    }

    public function create()
    {
        return view('admin.simpanan.create');
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
    } // <--- KURUNG TUTUP store HARUS ADA DI SINI

    public function edit(Simpanan $simpanan)
    {
        return view('admin.simpanan.edit', compact('simpanan'));
    } // <--- KURUNG TUTUP edit

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
    } // <--- KURUNG TUTUP update

    public function destroy(Simpanan $simpanan)
    {
        $simpanan->delete();

        return redirect()->route('admin.simpanan.index')->with('success', 'Simpanan berhasil dihapus!');
    } // <--- KURUNG TUTUP destroy
} // <--- KURUNG TUTUP AKHIR (milik class Controller)
