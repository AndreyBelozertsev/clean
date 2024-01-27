//swiper

// import Swiper JS
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

// import Swiper styles
import 'swiper/css';

const swiper1 = new Swiper(".swiper", {
    modules: [Navigation, Pagination],
    loop: true,
    spaceBetween: 10,
  
    // If we need pagination
    pagination: {
      el: ".swiper-pagination",
      clickable: true,
    },
  
    // Navigation arrows
    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
});