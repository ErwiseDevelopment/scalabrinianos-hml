jQuery( document ).ready( function() {
    var page = 2;
    
    jQuery( function($) {   
        jQuery( 'body' ).on( 'click', '.js-load-more', function() {
            let link = window.location.pathname
            link = link.normalize('NFD').replace(/([\u0300-\u036f]|[^0-9a-zA-Z])/g, '')            

            var data = {
                'action': 'load_posts_by_ajax',
                'page': page,
                'security': blog.security,
                'link': link
            };
        
            jQuery.post( blog.ajaxurl, data, function( response ) {
                if( $.trim(response) != '' ) {
                    jQuery( '.blog-posts' ).append( response );
                    page++;
                } else {
                    jQuery( '.js-load-more' ).hide();
                }
            });
        });
    });
});