(function() {
    if( document.querySelector( '.js-swiper-modal-photos' ) ) {
        const photos = document.getElementsByClassName( 'js-photos' )
        const modal = document.querySelector( '.js-modal-photos' )
        const overlay = document.querySelector( '.js-modal-photos-overlay' )
        const close = document.querySelector( '.js-modal-photos-close' )
        const body = document.querySelector( 'body' )

        for( const i of photos ) {
            i.addEventListener( 'click', function() {
                
                modal.classList.add( 'is-active' )
                body.classList.add( 'overflow-hidden' )

                const swiperModalPhotos = new Swiper( '.js-swiper-modal-photos', {
                    initialSlide: this.dataset.value,
                    
                    navigation: {
                        prevEl: '.js-swiper-button-prev-modal-photos',
                        nextEl: '.js-swiper-button-next-modal-photos'
                    }
                })
            })
        }

        overlay.addEventListener( 'click', function() {
            modal.classList.remove( 'is-active' )
            body.classList.remove( 'overflow-hidden' )
        })

        close.addEventListener( 'click', function() {
            modal.classList.remove( 'is-active' )
            body.classList.remove( 'overflow-hidden' )
        })
    }
})()