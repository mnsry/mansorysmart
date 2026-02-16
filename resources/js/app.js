import './bootstrap';
import '../css/app.css';
import 'bootstrap/dist/css/bootstrap.rtl.min.css'
import 'bootstrap/dist/js/bootstrap.bundle.min.js'
import 'bootstrap-icons/font/bootstrap-icons.css';

import { createApp } from "vue";

import welcome from "./layouts/Welcome.vue";
if (document.getElementById('welcome')) {
    createApp(welcome).mount("#welcome");
}
import AppPanel from './layouts/AppPanel.vue'
if (document.getElementById('app-panel')) {
    createApp(AppPanel).mount('#app-panel')
}

import Mqtt from './layouts/Mqtt.vue'
if (document.getElementById('app-mqtt')) {
    createApp(Mqtt).mount('#app-mqtt')
}
