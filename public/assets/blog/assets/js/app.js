function hasStickyMenu(){
    var header = document.querySelector('.header-primary');

    if(header){
    //Sticky Menu
    window.addEventListener('scroll', function() {
    
    if (window.scrollY > 100) {
        header.classList.add('sticky');
    } else {
        header.classList.remove('sticky');
    }
  });
    }
}
hasStickyMenu();




//Typed
var e = document.querySelectorAll(".typing-animation");
0 < e.length && e.forEach(e=>{
    new Typed(e,{
        strings: JSON.parse(e.dataset.strings),
        typeSpeed: 80,
        backSpeed: 40,
        backDelay: 3000,
        startDelay: 1000,
        fadeOut: true,
        loop: true
    })
}
),

//AOS Animation
AOS.init({
duration: 1500,
offset: 120,
mobile: false,
once: false,
})

// Lightbox
var lightbox = GLightbox({
selector: ".video-popup",
touchNavigation: true,
loop: false,
});

//Testimonial Slider Top
let testimoniaslSlider = new Swiper('.testimoniaslSlider', {
    spaceBetween: 30,
    centeredSlides: true,
    freeMode: true,
    speed: 10000,
    autoplay: {
      delay: 1,
      disableOnInteraction: false,
    },
    loop: true,
    slidesPerView:1,
    allowTouchMove: false,
    breakpoints: {
        1: {
            slidesPerView: 1.1
        },
        768: {
            slidesPerView: 2
        },
        992: {
            slidesPerView: 2.5
        },
        1200: {
            slidesPerView: 3
        },
        1400: {
            slidesPerView: 3.5
        },
        1600: {
            slidesPerView: 4
        },
        1900: {
            slidesPerView: 4.5
        }
      },
  });
//Testimonial Slider Bottom
let testimoniaslSliderTwo = new Swiper('.testimoniaslSliderTwo', {
spaceBetween: 30,
centeredSlides: true,
freeMode: true,
speed: 8000,
autoplay: {
    delay: 1,
    reverseDirection: true,
    disableOnInteraction: false,
},
loop: true,
slidesPerView:1,
allowTouchMove: false,

breakpoints: {
    1: {
        slidesPerView: 1.1
    },
    768: {
        slidesPerView: 2
    },
    992: {
        slidesPerView: 2.5
    },
    1200: {
        slidesPerView: 3
    },
    1400: {
        slidesPerView: 3.5
    },
    1600: {
        slidesPerView: 4
    },
    1900: {
        slidesPerView: 4.5
    }
    },
}); 
//Service Image Slider
let aaiImgSlider = new Swiper('.aaiImgSlider', {
spaceBetween: 30,
centeredSlides: true,
freeMode: false,
loop: true,
slidesPerView:1,
allowTouchMove: true,
pagination: {
    el: ".swiper-pagination.aai-swiper-pagination",
    },


});