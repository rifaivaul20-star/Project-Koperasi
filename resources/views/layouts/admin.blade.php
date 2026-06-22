<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdn.tailwindcss.com"></script>
    <title>Koperasi Admin</title>
</head>
<body class="bg-slate-50 flex h-screen font-sans antialiased">
    
    <div class="w-64 bg-slate-900 text-white p-6 flex flex-col shadow-xl z-10">
        <div class="mb-8 px-2">
            <h2 class="text-2xl font-extrabold text-blue-400 tracking-tight">Koperasiku <span class="text-white">Admin</span></h2>
        </div>
        
        <ul class="flex-grow space-y-2">
            <li>
                <a href="/admin/anggota" class="block px-4 py-3 hover:bg-slate-800 rounded-xl transition duration-150 font-medium text-slate-300 hover:text-white">
                    Data Anggota
                </a>
            </li>
            <li>
                <a href="/admin/simpanan" class="block px-4 py-3 hover:bg-slate-800 rounded-xl transition duration-150 font-medium text-slate-300 hover:text-white">
                    Data Simpanan
                </a>
            </li>
            <li>
                <a href="/admin/pinjaman" class="block px-4 py-3 hover:bg-slate-800 rounded-xl transition duration-150 font-medium text-slate-300 hover:text-white">
                    Data Pinjaman
                </a>
            </li>
        </ul>

        <form method="POST" action="{{ route('logout') }}" class="mt-auto">
            @csrf
            <button type="submit" class="w-full text-left px-4 py-3 text-rose-400 hover:text-rose-300 hover:bg-slate-800 rounded-xl transition duration-150 font-medium flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1" />
                </svg>
                Logout
            </button>
        </form>
    </div>

    <div class="flex-1 overflow-y-auto bg-slate-50">
        
        @yield('content')
        
    </div>

</body>
</html>