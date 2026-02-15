import './bootstrap';
import '../css/app.css';
import 'bootstrap/dist/css/bootstrap.rtl.min.css'
import 'bootstrap/dist/js/bootstrap.bundle.min.js'
import 'bootstrap-icons/font/bootstrap-icons.css';

import { createApp } from "vue";

import app from "./layouts/App.vue";
createApp(app).mount("#app");

import AppPanel from './layouts/AppPanel.vue'
createApp(AppPanel).mount('#app-panel')

import Mqtt from './layouts/Mqtt.vue'
createApp(Mqtt).mount('#app-mqtt')
