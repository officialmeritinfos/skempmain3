import './bootstrap';
import registerGoogleTranslate from './components/google-translate'
import ApexCharts from 'apexcharts';
import Alpine from 'alpinejs'
import collapse from '@alpinejs/collapse'

window.ApexCharts = ApexCharts;

window.Alpine = Alpine

Alpine.plugin(collapse)

registerGoogleTranslate(Alpine)

Alpine.start()
