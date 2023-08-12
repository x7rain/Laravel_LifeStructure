import './bootstrap';
import './dropdown';
import $ from 'jquery'
import Alpine from 'alpinejs'
import focus from '@alpinejs/focus'

window.$ = $;
Alpine.plugin(focus)
window.Alpine = Alpine;
Alpine.start();

