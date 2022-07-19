(function() {
    if( document.querySelector( '.js-pages' ) ) {
        const pages = document.querySelector( '.js-pages' ).getElementsByTagName( 'a' )

        for( const i of pages ) {
            if( i.href == window.location.href ) {
                i.classList.add( 'is-active' )
            } else {
                i.classList.remove( 'is-active' )
            }
        }
    }
})()