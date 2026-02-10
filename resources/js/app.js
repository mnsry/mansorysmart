import './bootstrap';
import '../css/app.css';
import 'bootstrap/dist/css/bootstrap.rtl.min.css'
import 'bootstrap/dist/js/bootstrap.bundle.min.js'
import 'bootstrap-icons/font/bootstrap-icons.css';

import { createApp } from "vue";

import app from "./layouts/App.vue";
createApp(app).mount("#app");

import appPanel from './layouts/AppPanel.vue'
createApp(appPanel).mount('#app-panel')
