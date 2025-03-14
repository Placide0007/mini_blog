import { createApp } from "vue";
import App from './App.vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.min.js'
import 'bootstrap-icons/font/bootstrap-icons.min.css'
import Toast from 'vue-toastification';
import 'vue-toastification/dist/index.css'
import 'typeface-raleway'
import router from './router/index'

createApp(App)
.use(router)
.use(Toast)
.mount('#app');
