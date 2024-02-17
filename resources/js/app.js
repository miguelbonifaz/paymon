import './bootstrap';

import { createApp } from 'vue/dist/vue.esm-bundler.js'
import VideoList from "./components/Videos/VideoList.vue";
import Analytics from './components/Analytics/Analytics.vue'
import VueApexCharts from 'vue3-apexcharts'

const app = createApp({});
app.component('video-list', VideoList);
app.component('analytics', Analytics);
app.mount('#app');


