<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Input Simpanan</title>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-xl font-bold mb-4">Tambah Simpanan Baru</h1>
        
        @if ($errors->any())
            <div class="bg-red-100 border border-red-400 text-red-700 p-4 mb-4 rounded">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('admin.simpanan.store') }}" method="POST">
            @csrf
            
            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Pilih Nama Anggota</label>
                <select name="anggota_id" class="w-full border p-2 rounded focus:ring-2 focus:ring-green-500" required>
                    <option value="">-- Pilih Nama Anggota --</option>
                    @foreach($anggota as $a)
                        <option value="{{ $a->id }}">{{ $a->nama_lengkap }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Jenis Simpanan</label>
                <select name="jenis_simpanan" class="w-full border p-2 rounded focus:ring-2 focus:ring-green-500">
                    <option value="Wajib">Wajib</option>
                    <option value="Sukarela">Sukarela</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Jumlah</label>
                <input type="number" name="jumlah" class="w-full border p-2 rounded focus:ring-2 focus:ring-green-500" required>
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium text-gray-700 mb-1">Tanggal</label>
                <input type="date" name="tanggal" class="w-full border p-2 rounded focus:ring-2 focus:ring-green-500" required>
            </div>

            <button type="submit" class="bg-green-600 text-white px-4 py-2 rounded w-full hover:bg-green-700 transition">
                Simpan Simpanan
            </button>
        </form>
    </div>
</body>
</html>
