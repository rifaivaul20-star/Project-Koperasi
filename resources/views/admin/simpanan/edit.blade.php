<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Edit Simpanan</title>
</head>
<body class="bg-gray-100 p-8">
    <div class="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
        <h1 class="text-xl font-bold mb-4">Edit Simpanan</h1>
        
        <form action="{{ route('admin.simpanan.update', $simpanan->id) }}" method="POST">
            @csrf
            @method('PUT')
            
            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-700">Nama Anggota</label>
                <select name="anggota_id" class="w-full border p-2 rounded focus:ring-2 focus:ring-blue-500" required>
                    <option value="">-- Pilih Nama Anggota --</option>
                    @foreach($anggota as $a)
                        <option value="{{ $a->id }}" {{ $simpanan->anggota_id == $a->id ? 'selected' : '' }}>
                            {{ $a->nama_lengkap }} 
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-700">Jenis Simpanan</label>
                <input type="text" name="jenis_simpanan" value="{{ $simpanan->jenis_simpanan }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-700">Jumlah</label>
                <input type="number" name="jumlah" value="{{ $simpanan->jumlah }}" class="w-full border p-2 rounded" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 font-semibold text-gray-700">Tanggal</label>
                <input type="date" name="tanggal" value="{{ $simpanan->tanggal }}" class="w-full border p-2 rounded" required>
            </div>

            <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
                Simpan Perubahan
            </button>
        </form>
    </div>
</body>
</html>
