//swiper

// import Swiper JS
import Swiper from 'swiper';
import { Navigation, Pagination } from 'swiper/modules';

// import Swiper styles
import 'swiper/css';

const swiper1 = new Swiper(".swiper-main", {
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

const swiperDefault = new Swiper('.swiper-default', {
  modules: [Navigation, Pagination],
  speed: 600,
  loop: true,

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  // Navigation arrows
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
  slidesPerView: 1,
  spaceBetween: 30,

  breakpoints: {
      720: {
        slidesPerView: 2,
      },
      960: {
          slidesPerView: 3,
          spaceBetween: 40,
      },
  }
});