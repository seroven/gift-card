import "./bootstrap";
import "../css/app.css";

import App from "./App.vue";
import { createApp } from "vue";
import addGlobalComponents from "./components/index";
import setGlobalProperties from "./config/globalproperties.config";
import ToastService from 'primevue/toastservice';

import PrimeVue from "primevue/config";
import router from './routes/router';
import store from "./store";

const app = createApp(App);
app.use(PrimeVue);
app.use(ToastService);
app.use(router);
app.use(store);
addGlobalComponents(app);
setGlobalProperties(app);
app.mount("#app");
