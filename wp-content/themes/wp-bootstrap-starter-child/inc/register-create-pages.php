<?php

function erwise_create_page() {

    if( function_exists('acf_add_options_page') ) {	
        acf_add_options_page( 
            array( 
                'page_title' => 'Informações Gerais', 
                'menu_title' => 'Informações Gerais', 
                'menu_slug'  => 'Informações Gerais', 
                'capability' => 'edit_posts', 
                'position'   => '23,3', 
                'redirect'   => false, 
                'icon_url'   => 'dashicons-info' 
        ));
    }  
    
    if( function_exists('acf_add_options_page') ) {	
        acf_add_options_page( 
            array( 
                'page_title' => 'Informativos', 
                'menu_title' => 'Informativos', 
                'menu_slug'  => 'Informativos', 
                'capability' => 'edit_posts', 
                'position'   => '21,3', 
                'redirect'   => false, 
                'icon_url'   => 'dashicons-share-alt2' 
        ));
    }
}
add_action( 'init', 'erwise_create_page' );