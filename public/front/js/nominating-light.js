

$(document).ready(function () {
    
    var temp4Slider = new Swiper('.temp4-slider', {
        slidesPerView: 4,
        freeMode: true,
        autoplay: false,
        watchSlidesProgress: true,
        spaceBetween: 0,
        breakpoints: {
            300: {
              slidesPerView: 1,
              slidesPerView: "auto",
            },
            768: {
              slidesPerView: 2,
              slidesPerView: "auto",
            },
            1030: {
              slidesPerView: 4,
            }
          },
           /* pagination: {
            el: ".swiper-pagination",
            clickable: true,
        }, */ 
    });
       
    
});