<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Anggota;
use App\Http\Requests\Admin\StoreAnggotaRequest;
use App\Services\Admin\AnggotaService;

class AnggotaController extends Controller
{
    public function index() {
        $anggota = Anggota::latest()->get();
        return view('admin.anggota.index', compact('anggota'));
    }

    public function create() {
        return view('admin.anggota.create');
    }

    public function store(StoreAnggotaRequest $request, AnggotaService $anggotaService) {
        $anggotaService->createAnggota($request->validated());
        return redirect()->route('admin.anggota.index')->with('success', 'Data berhasil ditambah!');
    }

    

    public function edit($id) {
       
        $anggota = Anggota::where('nomor_anggota', $id)->firstOrFail();
        
        return view('admin.anggota.edit', compact('anggota'));
    }

    public function update(StoreAnggotaRequest $request, $id, AnggotaService $anggotaService) {
        
        $anggota = Anggota::where('nomor_anggota', $id)->firstOrFail();
        
        $anggotaService->updateAnggota($anggota, $request->validated());
        return redirect()->route('admin.anggota.index')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id) {
        
        $anggota = Anggota::where('nomor_anggota', $id)->firstOrFail();
        
        $anggota->delete();
        return redirect()->route('admin.anggota.index')->with('success', 'Data berhasil dihapus!');
    }
}
