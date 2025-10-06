import './bootstrap';
import 'alpinejs';
import { createApp } from 'vue';
import DashboardPage from './components/Dashboard.vue';

// Buat app baru
const app = createApp({});

// Daftarkan komponen
app.component('dashboard-page', DashboardPage);

// Mount ke #app
app.mount('#app');
