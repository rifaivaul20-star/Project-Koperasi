<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Koperasi Admin</title>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Tambahan CSS Murni untuk Background -->
    <style>
        .bg-corporate-css {
            background-color: #f8fafc; /* Warna dasar abu-abu terang */
            background-image: 
                radial-gradient(at 0% 100%, rgba(15, 76, 117, 0.4) 0px, transparent 60%), /* Gradasi Biru Koperasi di kiri bawah */
                radial-gradient(at 100% 0%, rgba(242, 169, 0, 0.3) 0px, transparent 50%); /* Gradasi Oranye di kanan atas */
            background-attachment: fixed;
        }
    </style>
</head>
<body class="font-sans antialiased text-gray-900">
    
    <!-- Menggunakan background CSS murni (bg-corporate-css) -->
    <div class="min-h-screen flex flex-col sm:justify-center items-center pt-6 sm:pt-0 bg-corporate-css">
        
        <!-- Kotak Utama -->
        <div class="relative z-10 w-full sm:max-w-md p-8 sm:p-10 bg-white/95 backdrop-blur-sm shadow-2xl sm:rounded-3xl border border-gray-100 flex flex-col items-center">
            
            <!-- Bagian Header -->
            <div class="w-full mb-8 text-center">
                <!-- Ikon -->
                <div class="mx-auto bg-blue-50 text-blue-600 w-16 h-16 rounded-full flex items-center justify-center mb-4 ring-4 ring-blue-50/50 shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-8 h-8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 21v-8.25M15.75 21v-8.25M8.25 21v-8.25M3 9l9-6 9 6m-1.5 12V10.332A48.36 48.36 0 0012 9.75c-2.551 0-5.056.2-7.5.582V21M3 21h18M12 6.75h.008v.008H12V6.75z" />
                    </svg>
                </div>
                
                <h1 class="text-3xl font-extrabold text-slate-800 tracking-tight">Sistem Koperasi</h1>
                <p class="text-slate-500 text-sm mt-2">Silakan masuk untuk melanjutkan</p>
            </div>

            <!-- Form -->
            <div class="w-full px-1 sm:px-2">
                {{ $slot }}
            </div>
            
        </div>
        
        <!-- Footer -->
        <div class="mt-8 text-slate-600 text-xs font-bold tracking-wide bg-white/60 px-5 py-2 rounded-full backdrop-blur-md shadow-sm">
            &copy; 2026 Admin Koperasi
        </div>
    </div>

</body>
</html>
