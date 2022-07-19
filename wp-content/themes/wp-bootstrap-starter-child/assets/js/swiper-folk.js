/* services */
const swiperSpecialContent = new Swiper( '.js-swiper-special-content', {
	autoplay: {
		delay: 6000,
		disableOnInteraction: false
	},
	
    pagination: {
        el: '.js-swiper-pagination-special-content'
    },

    breakpoints: {
        320: {
            slidesPerView: 1
        },

        768: {
            slidesPerView: 2,
            spaceBetween: 15,
        }
    }
});

/* services */
const swiperGallery = new Swiper( '.js-swiper-gallery', {
    breakpoints: {
        320: {
            slidesPerView: 1
        },

        768: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        992: {
            slidesPerView: 3,
            spaceBetween: 15,
        }
    }
});

const swiperGalleryMiniature = new Swiper( '.js-swiper-gallery-miniature', {
    slidesPerView: 5,
    spaceBetween: 15,

    pagination: {
        el: '.js-swiper-pagination-gallery-miniature'
    },

    breakpoints: {
        320: {
            slidesPerView: 2,
            spaceBetween: 15
        },

        768: {
            slidesPerView: 3
        },

        992: {
            slidesPerView: 4
        },

        1200: {
            slidesPerView: 5
        }
    }
});

//logo
const swiperLogo = new Swiper( '.js-swiper-logo', {
    loop: true,

    breakpoints: {
        320: {
            slidesPerView: 1,
        },

        768: {
            slidesPerView: 2,
            spaceBetween: 30
        },

        992: {
            slidesPerView: 3
        },

        1200: {
            slidesPerView: 4
        }
    }
});

//footer logo
const swiperFooterLogo = new Swiper( '.js-swiper-footer-logo', {
    loop: true,
	
	autoplay: {
		delay: 6000,
		disableOnInteraction: false
	},

    breakpoints: {
        320: {
            slidesPerView: 2,
            spaceBetween: 15,
        },

        768: {
            slidesPerView: 4,
            spaceBetween: 30
        },

        992: {
            slidesPerView: 6
        },

        1200: {
            slidesPerView: 7
        }
    }
});