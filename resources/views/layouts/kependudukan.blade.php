<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kependudukan - Aplikasi Desa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">
    <div class="flex min-h-screen">

        <!-- Sidebar -->
        <aside class="w-64 bg-white shadow-md border-r border-gray-200">
            <div class="p-4 text-lg font-semibold text-gray-700 border-b">
                🏠 Menu Kependudukan
            </div>
            <nav class="p-4 space-y-2">
                <a href="{{ route('dasar-keluarga.index') }}"
                   class="block px-4 py-2 rounded-lg hover:bg-blue-100 {{ request()->is('dasar-keluarga*') ? 'bg-blue-200 font-semibold' : '' }}">
                    📋 Dasar Keluarga
                </a>
                <a href="{{ route('keluarga.index') }}"
                   class="block px-4 py-2 rounded-lg hover:bg-blue-100 {{ request()->is('keluarga*') ? 'bg-blue-200 font-semibold' : '' }}">
                    👨‍👩‍👧‍👦 Anggota Keluarga
                </a>
                <a href="#"
                   class="block px-4 py-2 rounded-lg hover:bg-blue-100">
                    📈 Statistik Kependudukan
                </a>
                <a href="{{ route('dashboard') }}"
                   class="block px-4 py-2 text-sm text-gray-600 hover:text-gray-900 mt-6 border-t pt-4">
                    ← Kembali ke Dashboard
                </a>
            </nav>
        </aside>

        <!-- Main Content -->
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
