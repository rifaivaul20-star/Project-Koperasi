@extends('layouts.admin')

@section('content')
<div class="p-4 sm:p-8">
    
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
        <h1 class="text-2xl font-bold text-slate-800 tracking-tight">Daftar Pinjaman</h1>
        
        <a href="{{ route('admin.pinjaman.create') }}" class="inline-flex items-center px-4 py-2 bg-blue-600 border border-transparent rounded-xl font-semibold text-xs text-white uppercase tracking-widest hover:bg-blue-700 hover:shadow-lg hover:-translate-y-0.5 focus:bg-blue-700 active:bg-blue-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">
            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
            </svg>
            Ajukan Pinjaman
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
                        <th class="px-6 py-4 font-semibold">Nama Anggota</th>
                        <th class="px-6 py-4 font-semibold text-right">Jumlah Pinjaman</th>
                        <th class="px-6 py-4 font-semibold text-center">Tanggal</th>
                        <th class="px-6 py-4 font-semibold text-center">Status</th>
                        <th class="px-6 py-4 font-semibold text-center">Aksi</th>
                    </tr>
                </thead>
                
                <tbody class="text-slate-700 text-sm">
                    @forelse($pinjaman as $item)
                        <tr class="border-b border-slate-100 hover:bg-slate-50 transition duration-150 ease-in-out">
                            <td class="px-6 py-4 font-medium text-slate-900">
                                {{ $item->anggota->nama ?? 'Tidak Ditemukan' }}
                            </td>
                            
                            <td class="px-6 py-4 text-right font-medium text-slate-700">
                                Rp {{ number_format($item->jumlah_pinjaman, 0, ',', '.') }}
                            </td>
                            
                            <td class="px-6 py-4 text-center">
                                {{ \Carbon\Carbon::parse($item->tanggal_pengajuan)->format('d M Y') }}
                            </td>
                            
                            <td class="px-6 py-4 text-center">
                                <span class="px-3 py-1 rounded-full text-xs font-semibold tracking-wide bg-slate-100 text-slate-700 uppercase">
                                    {{ $item->status }}
                                </span>
                            </td>
                            
                            <td class="px-6 py-4 flex justify-center gap-4">
                                <a href="{{ route('admin.pinjaman.edit', $item->id) }}" class="font-medium text-indigo-600 hover:text-indigo-900 hover:underline transition">Edit</a>
                                
                                <form action="{{ route('admin.pinjaman.destroy', $item->id) }}" method="POST" class="inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="font-medium text-rose-600 hover:text-rose-900 hover:underline transition" onclick="return confirm('Yakin ingin menghapus data pinjaman ini?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-6 py-8 text-center text-slate-500 italic bg-slate-50/30">
                                Belum ada data pengajuan pinjaman yang tersedia.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
    
</div>
@endsection
