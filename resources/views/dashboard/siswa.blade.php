<x-app-layout>
    <div class="bg-white rounded shadow p-6">
        <h2 class="text-2xl font-bold mb-2">Siswa Dashboard</h2>
        <p>Selamat datang, {{ Auth::user()->name }}!</p>
    </div>
</x-app-layout>
