@extends('layouts.admin')

@section('content')
<div class="p-4 sm:p-8">
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Data Anggota</h1>
        
        <a href="{{ route('admin.anggota.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 hover:shadow-lg transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Tambah Anggota
        </a>
    </div>

    @if (session('success'))
        <div class="bg-emerald-50 border border-emerald-200 text-emerald-700 px-4 py-3 rounded-xl mb-6 shadow-sm flex items-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
            </svg>
            {{ session('success') }}
        </div>
    @endif

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50/50 border-b border-slate-200 text-slate-500 text-xs uppercase tracking-wider">
                        <th class="px-6 py-4 font-semibold">No. Anggota</th>
                        <th class="px-6 py-4 font-semibold">Nama Lengkap</th>
                        <th class="px-6 py-4 font-semibold">Kontak</th>
                        <th class="px-6 py-4 font-semibold">Alamat</th>
                        <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody class="text-slate-700 text-sm">
                    @forelse ($anggota as $item)
                        <tr class="border-b border-slate-100 hover:bg-slate-50 transition duration-150">
                            <td class="px-6 py-4 font-medium text-slate-900">{{ $item->nomor_anggota }}</td>
                            <td class="px-6 py-4">{{ $item->nama_lengkap }}</td>
                            <td class="px-6 py-4">{{ $item->no_hp ?? '-' }}</td>
                            <td class="px-6 py-4 text-slate-600 truncate max-w-xs">{{ $item->alamat ?? '-' }}</td>
                            <td class="px-6 py-4 flex justify-center gap-4">
                                <a href="{{ route('admin.anggota.edit', $item->nomor_anggota) }}" class="font-medium text-indigo-600 hover:text-indigo-900 hover:underline transition">Edit</a>
                                <form action="{{ route('admin.anggota.destroy', $item->nomor_anggota) }}" method="POST" onsubmit="return confirm('Yakin hapus?')" class="inline">
                                    @csrf @method('DELETE')
                                    <button type="submit" class="font-medium text-rose-600 hover:text-rose-900 hover:underline transition">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-slate-500 italic bg-slate-50/30">
                                Belum ada data anggota yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
