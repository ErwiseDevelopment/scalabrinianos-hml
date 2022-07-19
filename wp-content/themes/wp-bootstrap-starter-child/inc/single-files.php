<?php

function single_temas_scripts()
{
    //css
    wp_enqueue_style('single-temas-style', get_stylesheet_uri());
    wp_enqueue_style('single-temas-main-style', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/css/main.css');
    wp_enqueue_style('custom-style', get_template_directory_uri() . '/style.css');

    //js
    wp_enqueue_script('single-temas-swiper-scripts', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/swiper.min.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-swiper-folk-scripts', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/swiper-folk.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-main-scripts', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/main.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-menu-toggle', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/menu-toggler.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-pages-current', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/pages-current.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-modal-photos', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/modal-photos.js', array(), '1.0.2', true);
    wp_enqueue_script('single-temas-search', get_template_directory_uri() . '/../wp-bootstrap-starter-child/assets/js/search.js', array(), '1.0.2', true);
}
add_action('wp_enqueue_scripts', 'single_temas_scripts');