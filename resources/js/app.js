import './bootstrap';
import '../css/app.css';

import App from './App.vue';
import { createApp } from 'vue';
import addGlobalComponents from './components/index';

import PrimeVue from 'primevue/config';

const app = createApp(App);
app.use(PrimeVue);
addGlobalComponents(app);
app.mount('#app');