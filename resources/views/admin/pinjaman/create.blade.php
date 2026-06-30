<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Ajukan Pinjaman</title>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-xl font-bold mb-4">Ajukan Pinjaman Baru</h1>
        
        <form action="{{ route('admin.pinjaman.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Nama Anggota</label>
                <select name="anggota_id" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-500" required>
                    <option value="">-- Pilih Nama Anggota --</option>
                    @foreach($anggota as $a)
                        <option value="{{ $a->id }}">{{ $a->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah Pinjaman</label>
                <input type="number" name="jumlah_pinjaman" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal Pengajuan</label>
                <input type="date" name="tanggal_pengajuan" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-500" required>
            </div>

            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded w-full hover:bg-blue-700 transition">
                Simpan Pinjaman
            </button>
        </form>
    </div>
</body>
</html>
