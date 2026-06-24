<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\Admin\PinjamanService;
use App\Models\Pinjaman;

class PinjamanController extends Controller
{
    
    public function index()
    {
        $pinjaman = Pinjaman::all();
        return view('admin.pinjaman.index', compact('pinjaman'));
    }

    
    public function create()
    {
        return view('admin.pinjaman.create');
    }

    
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

    
    public function edit(Pinjaman $pinjaman)
    {
        return view('admin.pinjaman.edit', compact('pinjaman'));
    }

    
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

    
    public function destroy(Pinjaman $pinjaman)
    {
        $pinjaman->delete();
        return redirect()->route('admin.pinjaman.index')->with('success', 'Pinjaman berhasil dihapus!');
    }
}
