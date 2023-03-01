import './bootstrap';
import 'lazysizes';
import Alpine from 'alpinejs';
import init from './mapInit';
import useStyles from './useStyles';

window.init = init();
window.styles = useStyles();

window.Alpine = Alpine;
Alpine.start();
