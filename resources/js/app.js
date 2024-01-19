import './bootstrap';


import './components/map';


import Alpine from 'alpinejs';
import useForm from './components/form';

Alpine.data('useForm', useForm)

Alpine.start()