<x-app-layout>
    <div class="py-12">
        <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 rounded-xl shadow-lg border border-gray-100">
                
                <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-4">
                    Edit Simpanan
                </h2>

                <form action="{{ route('admin.simpanan.update', $simpanan->id) }}" method="POST" class="space-y-6">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Nama Anggota</label>
                        <select name="anggota_id" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2" required>
                            <option value="">-- Pilih Anggota --</option>
                            @foreach($anggota as $a)
                                <option value="{{ $a->id }}" {{ $simpanan->anggota_id == $a->id ? 'selected' : '' }}>
                                    {{ $a->nama_lengkap }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Jenis Simpanan</label>
                        <input type="text" name="jenis_simpanan" value="{{ $simpanan->jenis_simpanan }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Jumlah</label>
                        <input type="number" name="jumlah" value="{{ $simpanan->jumlah }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2" required>
                    </div>

                    <div>
                        <label class="block text-sm font-semibold text-gray-700 mb-1">Tanggal</label>
                        <input type="date" name="tanggal" value="{{ $simpanan->tanggal }}" class="w-full border-gray-300 rounded-lg shadow-sm focus:ring-blue-500 focus:border-blue-500 px-4 py-2" required>
                    </div>

                    <div class="flex items-center justify-end pt-4 gap-3">
                        <a href="{{ route('admin.simpanan.index') }}" class="px-5 py-2 text-gray-600 bg-gray-100 rounded-lg hover:bg-gray-200 transition">
                            Batal
                        </a>
                        <button type="submit" class="px-5 py-2 text-white bg-blue-600 rounded-lg hover:bg-blue-700 shadow-md transition">
                            Simpan Perubahan
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</x-app-layout>
