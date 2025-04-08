// import Swiper bundle with all modules installed
import Swiper from 'swiper/bundle';
// import styles bundle
import 'swiper/css/bundle';

import './bootstrap';

import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


/* swiper slider */
if (typeof Swiper !== 'undefined') {
    var swiper = new Swiper('.swiper', {
      slidesPerView: 2,
      loop: true,
      autoplay: {
          delay: 3000,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      breakpoints: {
          1024: {
              slidesPerView: 6,
          },
      },
    });

    var swiper = new Swiper('.main-slider', {
      slidesPerView: 1,
      loop: true,
      autoplay: {
        delay: 5000,
    },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  }




