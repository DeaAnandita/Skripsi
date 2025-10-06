<template>
  <div class="flex min-h-screen bg-gradient-to-br from-green-50 via-blue-50 to-purple-50">
    <!-- Sidebar -->
    <aside class="w-64 bg-white backdrop-blur-md border-r border-gray-200 shadow-lg">
      <nav class="p-4 space-y-3">
        <a href="/dashboard" class="flex items-center gap-3 px-4 py-4 rounded-xl font-medium text-green-700 bg-green-100 hover:bg-green-200 transition">
          🏠 Dashboard
        </a>
        <a href="/menu-utama" class="flex items-center gap-3 px-4 py-4 rounded-xl font-medium text-gray-600 hover:bg-blue-100 transition">
          📋 Menu Utama
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-4 rounded-xl font-medium text-gray-600 hover:bg-yellow-100 transition">
          📈 Statistik
        </a>
        <a href="#" class="flex items-center gap-3 px-4 py-4 rounded-xl font-medium text-gray-600 hover:bg-pink-100 transition">
          ⚙️ Pengaturan
        </a>
        <a href="/profile" class="flex items-center gap-3 px-4 py-4 rounded-xl font-medium text-gray-600 hover:bg-gray-100 transition">
          👤 Profil
        </a>
      </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-y-auto">
      <!-- Header -->
      <div class="bg-gradient-to-r from-blue-400 to-green-300 rounded-2xl shadow-lg p-6 flex justify-between items-center text-white">
        <div>
          <h2 class="text-2xl font-bold text-blue-900">Selamat Datang, {{ userName }} 👋</h2>
          <p class="text-sm text-blue-900/90">Akses cepat ke data dan informasi desa Anda</p>
        </div>
        <img
          src="https://cdn-icons-png.flaticon.com/512/2965/2965879.png"
          alt="Village"
          class="w-20 h-20 drop-shadow-lg"
        />
      </div>

      <!-- Card Menu Section -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-8 py-6">
        <div v-for="card in cards" :key="card.title" class="p-6 bg-white rounded-2xl shadow-md hover:shadow-xl transition transform hover:-translate-y-1 cursor-pointer">
          <h4 :class="['text-lg font-semibold mb-2', card.color]">{{ card.icon }} {{ card.title }}</h4>
          <p class="text-gray-600 text-sm">{{ card.desc }}</p>
        </div>
      </div>

      <!-- Statistik Section -->
      <div class="mt-10 bg-white rounded-2xl shadow-md p-6">
        <h3 class="text-lg font-semibold text-gray-700 mb-4">📈 Statistik Data Desa</h3>
        <canvas id="desaChart" height="120"></canvas>
      </div>
    </main>
  </div>
</template>

<script setup>
import { onMounted, ref } from 'vue';
import Chart from 'chart.js/auto';

// Simulasi nama user dari Laravel (dikirim via props)
const props = defineProps({
  userName: String,
});

// Card data
const cards = [
  { title: 'Buat Soal', icon: '📘', desc: 'Buat dan kelola soal dalam bentuk teks maupun suara.', color: 'text-blue-700' },
  { title: 'Menu Utama', icon: '📂', desc: 'Kelola data aset keluarga serta aset lahan & tanah.', color: 'text-green-700' },
  { title: 'Statistik', icon: '📊', desc: 'Lihat grafik perkembangan aset dan data kependudukan.', color: 'text-purple-700' },
];

// Grafik
onMounted(() => {
  const ctx = document.getElementById('desaChart');
  new Chart(ctx, {
    type: 'bar',
    data: {
      labels: ['Aset Keluarga', 'Aset Lahan', 'Penduduk', 'Survei'],
      datasets: [{
        label: 'Jumlah Data',
        data: [120, 80, 240, 60],
        backgroundColor: ['#93c5fd', '#86efac', '#fde68a', '#c4b5fd'],
        borderRadius: 8,
      }],
    },
    options: {
      responsive: true,
      plugins: {
        legend: { display: false },
      },
      scales: {
        y: { beginAtZero: true },
      },
    },
  });
});
</script>
