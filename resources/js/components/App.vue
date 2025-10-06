<template>
  <div class="flex min-h-screen bg-gray-50">
    <!-- Sidebar -->
    <aside class="w-64 bg-green-100 p-6 shadow-lg">
      <h1 class="text-2xl font-bold text-green-800 mb-4">🌿 Desa Kaliwungu</h1>
      <ul>
        <li v-for="menu in menus" :key="menu.name" class="mb-3">
          <a :href="menu.link" class="flex items-center gap-2 text-gray-700 hover:text-green-700">
            <i :class="menu.icon"></i> {{ menu.name }}
          </a>
        </li>
      </ul>
    </aside>

    <!-- Main content -->
    <main class="flex-1 p-8">
      <h2 class="text-3xl font-bold text-gray-800 mb-4">Selamat Datang, Dea 🌼</h2>

      <!-- Statistik -->
      <div class="bg-white p-6 rounded-2xl shadow-md">
        <canvas id="chart"></canvas>
      </div>
    </main>
  </div>
</template>

<script setup>
import { onMounted } from 'vue';
import Chart from 'chart.js/auto';

const menus = [
  { name: 'Dashboard', link: '/dashboard', icon: 'bi bi-house' },
  { name: 'Menu Utama', link: '/menu-utama', icon: 'bi bi-folder' },
  { name: 'Statistik', link: '/statistik', icon: 'bi bi-bar-chart' },
  { name: 'Profil', link: '/profil', icon: 'bi bi-person' },
];

onMounted(() => {
  new Chart(document.getElementById('chart'), {
    type: 'bar',
    data: {
      labels: ['Aset Keluarga', 'Aset Tanah', 'Kependudukan'],
      datasets: [
        {
          label: 'Jumlah Data',
          data: [12, 19, 8],
        },
      ],
    },
  });
});
</script>

<style scoped>
body {
  font-family: 'Inter', sans-serif;
}
</style>
