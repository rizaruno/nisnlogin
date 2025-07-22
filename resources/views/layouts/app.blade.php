<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css" crossorigin="anonymous" referrerpolicy="no-referrer" />
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const roleWrapper = document.getElementById('role-wrapper');
            sidebar.classList.toggle('w-64');
            sidebar.classList.toggle('w-16');
            document.querySelectorAll('.menu-label').forEach(el => {
                el.classList.toggle('hidden');
                el.classList.toggle('block');
                el.classList.toggle('text-[10px]');
            });
            document.querySelectorAll('.menu-item').forEach(el => {
                el.classList.toggle('flex-col');
                el.classList.toggle('items-center');
                el.classList.toggle('space-x-2');
                el.classList.toggle('space-y-1');
            });
            if (sidebar.classList.contains('w-16')) {
                roleWrapper.classList.remove('flex-row');
                roleWrapper.classList.add('flex-col');
                document.getElementById('sidebar-role').classList.add('hidden');
            } else {
                roleWrapper.classList.remove('flex-col');
                roleWrapper.classList.add('flex-row');
                document.getElementById('sidebar-role').classList.remove('hidden');
            }
        }
    </script>
</head>
<body class="flex h-screen bg-gray-100 text-sm">
    <!-- Sidebar -->
    <aside id="sidebar" class="transition-all duration-300 w-64 bg-blue-800 text-white flex flex-col">
        <div class="px-4 py-4 border-b border-blue-700 text-center">
            <div id="role-wrapper" class="flex flex-row items-center justify-center space-x-2">
                <i id="sidebar-role-icon" class="fas fa-user text-white text-2xl"></i>
                <span class="font-bold text-sm" id="sidebar-role">{{ strtoupper(Auth::user()->role) }}</span>
            </div>
        </div>
        <nav class="flex-1 px-2 py-4 space-y-4">
            <a href="/dashboard" class="menu-item flex items-center space-x-2 px-3 py-2 rounded hover:bg-blue-700">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M13 5v6h6m-6 0v13H5V11h6z"></path></svg>
                <span class="menu-label">Dashboard</span>
            </a>
            @if(Auth::user()->role === 'admin')
                <a href="#" class="menu-item flex items-center space-x-2 px-3 py-2 rounded hover:bg-blue-700">
                    <i class="fas fa-plus"></i>
                    <span class="menu-label">Tambah Prestasi</span>
                </a>
                <a href="#" class="menu-item flex items-center space-x-2 px-3 py-2 rounded hover:bg-blue-700">
                    <i class="fas fa-file-excel"></i>
                    <span class="menu-label">Export Excel</span>
                </a>
                <a href="#" class="menu-item flex items-center space-x-2 px-3 py-2 rounded hover:bg-blue-700">
                    <i class="fas fa-book"></i>
                    <span class="menu-label">Course</span>
                </a>
                <a href="#" class="menu-item flex items-center space-x-2 px-3 py-2 rounded hover:bg-blue-700">
                    <i class="fas fa-cog"></i>
                    <span class="menu-label">Pengaturan</span>
                </a>
            @endif
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="menu-item w-full flex items-center space-x-2 px-3 py-2 rounded hover:bg-blue-700">
                    <i class="fas fa-sign-out-alt"></i>
                    <span class="menu-label">Logout</span>
                </button>
            </form>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="flex-1 flex flex-col">
        <!-- Topbar -->
        <header class="bg-white shadow px-6 py-3 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <button onclick="toggleSidebar()" class="text-gray-700">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                </button>
                <h1 class="text-lg font-semibold">Dashboard</h1>
            </div>
            <span class="text-sm text-gray-600">{{ Auth::user()->name }}</span>
        </header>

        <!-- Page Content -->
        <main class="flex-1 p-6">
            {{ $slot }}
        </main>
    </div>
</body>
</html>
