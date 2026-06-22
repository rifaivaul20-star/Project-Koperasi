@extends('layouts.admin')

@section('content')
<h1 class="text-3xl font-bold mb-6">Dashboard Koperasi</h1>

<div class="grid grid-cols-3 gap-6">
    <div class="bg-blue-600 text-white p-6 rounded-lg shadow">
        <h2 class="text-lg">Total Anggota</h2>
        <p class="text-4xl font-bold">{{ $data['total_anggota'] }}</p>
    </div>
    <div class="bg-green-600 text-white p-6 rounded-lg shadow">
        <h2 class="text-lg">Total Simpanan</h2>
        <p class="text-4xl font-bold">Rp {{ number_format($data['total_simpanan'], 0, ',', '.') }}</p>
    </div>
    <div class="bg-red-600 text-white p-6 rounded-lg shadow">
        <h2 class="text-lg">Total Pinjaman</h2>
        <p class="text-4xl font-bold">Rp {{ number_format($data['total_pinjaman'], 0, ',', '.') }}</p>
    </div>
</div>
@endsection
