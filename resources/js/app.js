import './bootstrap';



import Alpine from 'alpinejs';
import useForm from './components/form';
import './components/lazyload';
import './components/lightgallery';
import './components/map';
import './components/menu';
import './components/modal';
import './components/multiple-uploader';
import './components/phone-mask';
import './components/slider';
import './components/image-crop';





Alpine.data('useForm', useForm)

Alpine.start()