import './bootstrap';



import Alpine from 'alpinejs';
import useForm from './components/form';
import './components/lazyload';
import './components/map';
import './components/menu';
import './components/popup';
import './components/slider';


Alpine.data('useForm', useForm)

Alpine.start()