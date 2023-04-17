
$(document).ready(function () {
    
    var tStorySlider = new Swiper('.tStorySlider', {
        slidesPerView: 1,
        freeMode: false,
        autoplay: false,
        watchSlidesProgress: true,
        spaceBetween: 0,
        navigation: {
            nextEl: '.swiper-button-next',
            prevEl: '.swiper-button-prev',
        },
           /* pagination: {
            el: ".swiper-pagination",
            clickable: true,
        }, */ 
    });

    $('.findBtn, .tSearchSubmit').on('click', function() {
        $('.tSearch-find').hide();
        $('.tSearchMap').fadeIn();
    });

    /* Social share js  */
    if ($(window).width() < 1000) {
        $('.shareIcon').on('click', function () {
            const shareButton = document.querySelector('.shareIcon');
            const closeButton = document.querySelector('.close-button');
        shareButton.addEventListener('click', event => {
                if (navigator.share) {
                    navigator.share({
                        title: 'C20',
                        url: window.location.href
                    }).then(() => {
                        console.log('Thanks for sharing!');
                    })
                    .catch(console.error);
                }
            });

    });
    } else {
        $('.shareIcon').on('click', function () {
            $(this).toggleClass('shareOpened');
            $(this).parents('.shareArea').find('.shareList').slideToggle();
        });
    }



       
    
});




