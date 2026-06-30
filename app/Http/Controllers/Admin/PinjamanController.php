<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\PinjamanService;
use App\Models\Pinjaman;
use App\Models\Anggota;

class PinjamanController extends Controller
{
    public function index() {
        $pinjaman = Pinjaman::with('anggota')->latest()->get();
        return view('admin.pinjaman.index', compact('pinjaman'));
    }
    
    public function create() {
        $anggota = Anggota::all(); 
        return view('admin.pinjaman.create', compact('anggota'));
    }
    
    public function store(Request $request, PinjamanService $pinjamanService)
    {
        $validated = $request->validate([
            'anggota_id'        => 'required|exists:anggota,id',
            'jumlah_pinjaman'   => 'required|numeric',
            'tanggal_pengajuan' => 'required|date',
        ]);

        $pinjamanService->ajukanPinjaman($validated);

        // SUDAH DIPERBAIKI: Mengarah ke route yang benar (admin.pinjaman.index)
        return redirect()->route('admin.pinjaman.index')->with('success', 'Pinjaman berhasil diajukan!');
    }

    public function edit($id) {
        $pinjaman = Pinjaman::findOrFail($id);
        $anggota = Anggota::all();
        return view('admin.pinjaman.edit', compact('pinjaman', 'anggota'));
    }

    public function update(Request $request, $id) {
        $pinjaman = Pinjaman::findOrFail($id);
        $pinjaman->update($request->all());
        return redirect()->route('admin.pinjaman.index')->with('success', 'Data pinjaman diperbarui!');
    }

    public function destroy($id) {
        Pinjaman::findOrFail($id)->delete();
        return redirect()->route('admin.pinjaman.index')->with('success', 'Data pinjaman dihapus!');
    }
}
