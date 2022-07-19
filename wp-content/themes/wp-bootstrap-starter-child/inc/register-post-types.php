<?php

function erwise_create_post_type() { 
	
	// funcao para galeria
	  register_post_type( 'galeria', array(
		'labels' 		=> array( 'name' => 'Galeria', 'singular_name' => 'Galeria', 'all_items' => 'Todas as Fotos' ),
		'public' 		=> true,
		'has_archive'	=> true,
		'menu_icon'		=> 'dashicons-format-gallery',
		'supports' 		=> array( 'title',  'revisions', 'author' ) 
	));
	
	// funcao para criar ebook 
	register_post_type( 'ebook', array(
		'labels' 		=> array( 'name' => 'E-book', 'singular_name' => 'E-book', 'all_items' => 'Todos os E-books' ),
		'public' 		=> true,
		'has_archive' 	=> true,
		'menu_icon' 	=> 'dashicons-book',
		'supports' 		=> array( 'title',  'thumbnail', 'revisions', 'author' )
	));
}
add_action( 'init', 'erwise_create_post_type' );


//funcao para criar categorias 
// funcao categoria galeria 
function erwise_create_taxonomy() {
		register_taxonomy( 'galeriacategoria', 'galeria', array( 'labels' => array( 'name' => 'Categorias', 'singular_name' => 'Categoria' ), 'hierarchical' => true, 'show_admin_column' => true ) );
		
		// funcao categoria ebook
		register_taxonomy( 'ebook-categoria', 'ebook', array( 'labels' => array( 'name' => 'Tipo E-book', 'singular_name' => 'Tipo E-book' ), 'hierarchical' => true, 'show_admin_column' => true ) );
    }
add_action( 'init', 'erwise_create_taxonomy' );