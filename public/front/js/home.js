

$(document).ready(function () {

    /* anchor link js */
/*     $('a[href*="#"]').on('click', function (e) {
        e.preventDefault()
        $('html, body').animate({
            scrollTop: $($(this).attr('href')).offset().top - 50,
        }, 500, 'linear')
    }) */
    
    /* Accordian js */
    $('.temp2-accHead').click(function() {
        var temp2AccAct = $(this).parents('.temp2-accItem').hasClass('temp2-accAct');
        $('.temp2-accItem').removeClass('temp2-accAct').find('.temp2-accContent').slideUp();
        if(!temp2AccAct) {
            $(this).parents('.temp2-accItem').addClass('temp2-accAct').find('.temp2-accContent').slideDown();
        }
    });
    
    /* Slider js */   
    var temp2Slider = new Swiper('.temp2-slider', {
        slidesPerView: 4,
        freeMode: false,
        autoplay: true,
        watchSlidesProgress: true,
        grid: {
            rows: 2,
        },
        spaceBetween: 0,
        breakpoints: {
            300: {
              slidesPerView: 2,
            },
            768: {
              slidesPerView: 3,
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
       
    /* temp2 - Video js */
    $('.temp2-vidPoster').on('click', function () {
        $(this).closest('.temp2-vidPoster').css({
            'visibility': 'hidden',
            'opacity': '0'
        });
        $(this).closest('.temp2-vidPoster').siblings('.temp2-vid').fadeIn();
        $(this).closest('.temp2-vidPoster').siblings('.temp2-vid').find('.temp2-vidVideo').get(0).play();
    });
    
    $('.temp2-videoClose').on('click', function () {
        $(this).closest('.temp2-vid').siblings('.temp2-vidPoster').css({
            'visibility': 'visible',
            'opacity': '1'
        });
        $(this).closest('.temp2-vid').fadeOut();
        $(this).siblings('.temp2-vidVideo').get(0).pause();
    });
    
    
});


    /* Countdown timer js */
    var countDownDate = new Date("Apr 23, 2023 00:00:00").getTime();
    var x = setInterval(function() {
      var now = new Date().getTime();
      var distance = countDownDate - now;
      var days = Math.floor(distance / (1000 * 60 * 60 * 24));
      var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
      var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
      var seconds = Math.floor((distance % (1000 * 60)) / 1000);
      document.getElementById("countDown").innerHTML = days + "D " + hours + "H "
      + minutes + "M ";
      if (distance < 0) {
        clearInterval(x);
        document.getElementById("countDown").innerHTML = "EXPIRED";
      }
    }, 1000);


