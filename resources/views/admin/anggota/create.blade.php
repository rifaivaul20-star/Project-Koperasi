@extends('layouts.admin')

@section('content')
<div class="p-6 lg:p-10">
    <div class="max-w-4xl mx-auto">
        <div class="flex items-center mb-8">
            <a href="{{ route('admin.anggota.index') }}" class="text-slate-400 hover:text-slate-600 transition mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
            </a>
            <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Tambah Anggota Baru</h1>
        </div>

        <div class="bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
            <form action="{{ route('admin.anggota.store') }}" method="POST">
                @csrf

                <div class="space-y-6">
                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nomor Anggota *</label>
                        <input type="text" name="nomor_anggota" 
                            class="w-full bg-slate-50 border-slate-200 rounded-xl px-4 py-3 focus:border-blue-500 focus:ring-blue-500 transition {{ $errors->has('nomor_anggota') ? 'border-red-500' : '' }}" 
                            value="{{ old('nomor_anggota') }}" required placeholder="Contoh: AGT-001">
                        @error('nomor_anggota') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Nama Lengkap *</label>
                        <input type="text" name="nama_lengkap" 
                            class="w-full bg-slate-50 border-slate-200 rounded-xl px-4 py-3 focus:border-blue-500 focus:ring-blue-500 transition {{ $errors->has('nama_lengkap') ? 'border-red-500' : '' }}" 
                            value="{{ old('nama_lengkap') }}" required>
                        @error('nama_lengkap') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Email *</label>
                        <input type="email" name="email" 
                            class="w-full bg-slate-50 border-slate-200 rounded-xl px-4 py-3 focus:border-blue-500 focus:ring-blue-500 transition {{ $errors->has('email') ? 'border-red-500' : '' }}" 
                            value="{{ old('email') }}" required>
                        @error('email') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">No. HP</label>
                        <input type="text" name="no_hp" 
                            class="w-full bg-slate-50 border-slate-200 rounded-xl px-4 py-3 focus:border-blue-500 focus:ring-blue-500 transition" 
                            value="{{ old('no_hp') }}">
                        @error('no_hp') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>

                    <div>
                        <label class="block text-sm font-bold text-slate-700 mb-2">Alamat</label>
                        <textarea name="alamat" rows="4" 
                            class="w-full bg-slate-50 border-slate-200 rounded-xl px-4 py-3 focus:border-blue-500 focus:ring-blue-500 transition">{{ old('alamat') }}</textarea>
                        @error('alamat') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                    </div>
                </div>

                <div class="mt-8 pt-6 border-t border-slate-100 flex justify-end">
                    <button type="submit" class="bg-blue-600 hover:bg-blue-700 text-white px-8 py-3 rounded-xl font-bold shadow-md transition-all active:scale-95">
                        Simpan Data Anggota
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
