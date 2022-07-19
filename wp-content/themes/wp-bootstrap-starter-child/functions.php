<?php

//single functions
require get_template_directory() . '/../wp-bootstrap-starter-child/inc/single-functions.php';



//Logo pagina login

function logoadmin() {
echo " <style>
body.login #login h1 a {
background: url('https://erwise.com.br/wp-content/uploads/2022/04/login-wp.jpg') no-repeat scroll center top transparent;
height: 90px;
width: 250px;
}
</style>
";
}
add_action("login_head", "logoadmin");

// Customizar o Footer do WordPress
function remove_footer_admin () {
    echo '© <a href="https://api.whatsapp.com/send?phone=%205511937008521&text=Olá!/">Suporte</a> - Desenvolvimento e Criação Erwise Dev ME';
}
add_filter('admin_footer_text', 'remove_footer_admin');


// Retirar logo do Wordpress admin
 function wps_admin_bar (){
     global $wp_admin_bar;
     $wp_admin_bar -> remove_menu ('wp-logo');
     $wp_admin_bar -> remove_menu ('about');
     $wp_admin_bar -> remove_menu ('wporg');
     $wp_admin_bar -> remove_menu ('documentation');
     $wp_admin_bar -> remove_menu ('support-forums');
     $wp_admin_bar -> remove_menu ('feedback');
     $wp_admin_bar -> remove_menu ('view-site');
 }
add_action ('wp_before_admin_bar_render', 'wps_admin_bar');

// removendo campo comentarios admin wp

add_action( 'admin_menu', 'my_remove_admin_menus' );
function my_remove_admin_menus() {
    remove_menu_page( 'edit-comments.php' );
}

add_action('init', 'remove_comment_support', 100);

function remove_comment_support() {
    remove_post_type_support( 'post', 'comments' );
    remove_post_type_support( 'page', 'comments' );
}

function mytheme_admin_bar_render() {
    global $wp_admin_bar;
    $wp_admin_bar->remove_menu('comments');
}
add_action( 'wp_before_admin_bar_render', 'mytheme_admin_bar_render' );

function limit_words($string, $word_limit) {  
    $words = explode(' ', $string, ($word_limit + 1));  
    if(count($words) > $word_limit) { array_pop($words); array_push($words, "..."); }  
    return implode(' ', $words);
}