<?php

//register post ACF
require get_template_directory() . '/../wp-bootstrap-starter-child/inc/single-files.php';
require get_template_directory() . '/../wp-bootstrap-starter-child/inc/register-post-types.php';
require get_template_directory() . '/../wp-bootstrap-starter-child/inc/register-create-pages.php';

function get_date_format( $date ) {
    list($data_day, $data_month, $data_year) = explode('/', $date); 

    $months = array(
        '01' => 'janeiro',
        '02' => 'fevereiro',
        '03' => 'março',
        '04' => 'abril',
        '05' => 'maio',
        '06' => 'junho',
        '07' => 'julho',
        '08' => 'agosto',
        '09' => 'setembro',
        '10' => 'outubro',
        '11' => 'novembro',
        '12' => 'dezembro',
    );

    foreach( $months as $key => $value ) {
        if( $key == $data_month ) {
            $date_format = $data_day . ' de ' . $value . ' de ' . $data_year; 
        }
    }

    return $date_format;
}

function thecodehubs_enqueue_script_style() {
    wp_register_script( 'custom-script', get_stylesheet_directory_uri(). '/../wp-bootstrap-starter-child/assets/js/posts-loader.js', array('jquery'), false, true );
    
    $script_data_array = array(
        'ajaxurl'  => admin_url( 'admin-ajax.php' ),
        'security' => wp_create_nonce( 'load_more_posts' ),
    );

    wp_localize_script( 'custom-script', 'blog', $script_data_array );
    
    wp_enqueue_script( 'custom-script' ); 
}
add_action( 'wp_enqueue_scripts', 'thecodehubs_enqueue_script_style' );

function load_posts_by_ajax_callback() {
    check_ajax_referer('load_more_posts', 'security');
    $paged = $_POST['page'];
    $category = $_POST['link'];

    $args = array(
        'post_type'      => 'post',
        'category_name'  => $category,
        'post_status'    => 'publish',
        'posts_per_page' => '2',
        'paged'          => $paged,
    );

    $news = new WP_Query( $args ); 
    
    if ( $news->have_posts() ) : 
        while ( $news->have_posts() ) : $news->the_post(); 
            if( $category == 'noticias' ) :
?>
                <div class="col-sm-6 col-md-4 col-lg-3 my-3">

                    <a 
                    class="card h-100 rounded-0 text-decoration-none"
                    href="<?php the_permalink() ?>">

                        <div class="l-page-news__post__card-img card-img">
                            <?php
                                $alt_title = get_the_title();
                                
                                the_post_thumbnail( 'post-thumbnail',
                                    array(
                                        'class' => 'img-fluid w-100 h-100 u-object-fit-cover',
                                        'alt'   => $alt_title
                                ));
                            ?>
                        </div>

                        <div class="card-body">

                            <p class="l-page-news__post__card-date u-font-weight-semibold u-color-folk-tamarillo mb-0">
                                <?php echo get_date_format( get_the_date( 'd/m/Y', $news ) ) ?>
                            </p>

                            <h3 class="l-page-news__post__card-title u-font-weight-bold u-color-folk-black">
                                <?php the_title() ?>
                            </h3>

                            <p 
                            class="l-page-news__post__card-link u-font-weight-bold u-color-folk-tamarillo mb-0">
                                Ler mais
                            </p>
                        </div>
                    </a>
                </div>
<?php       elseif( $category == 'blog' ) : ?>
                <div class="col-lg-10 my-3">

                    <div class="border overflow-hidden px-3 pl-md-0 pr-md-4">

                        <div class="row">

                            <div class="col-md-5">
                                <img
                                class="img-fluid w-100 h-100 u-object-fit-cover"
                                src="http://scalabrinianos.test/wp-content/uploads/2022/05/quote-img.png"
                                alt="">
                            </div>

                            <div class="col-md-7 py-3">

                                <p class="u-font-size-12 xxl:u-font-size-15 u-font-weight-bold text-uppercase u-color-folk-bright-orange mb-0">
                                    <?php echo get_date_format( get_the_date( 'd/m/Y', $news ) ) ?>
                                </p>

                                <p class="u-font-size-12 xxl:u-font-size-15 u-font-weight-bold text-uppercase u-color-folk-cyan">
                                    <?php
                                        foreach (get_the_category( get_the_ID() ) as $c) {
                                            $cat = get_category($c);
                                            array_push($cats, $cat);
                                        }

                                        echo $cats[0]->name;
                                    ?>
                                </p>

                                <h4 class="l-page-blog__title u-font-weight-bold u-color-folk-night-rider">
                                    <?php the_title() ?>
                                </h4>

                                <p class="u-font-size-14 xxl:u-font-size-18 u-font-weight-regular u-color-folk-gray">
                                    <?php echo(limit_words(get_the_excerpt(), 25)); ?>
                                </p>

                                <div class="row">

                                    <div class="col-6 mt-3">
                                        <a 
                                        class="w-full d-block u-font-size-22 u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-bright-orange hover:u-bg-folk-dark-cyan py-2" 
                                        href="<?php the_permalink() ?>">
                                            Veja mais
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
<?php 
            endif;
        endwhile; 
    endif;
    wp_die();
}
add_action('wp_ajax_load_posts_by_ajax', 'load_posts_by_ajax_callback');
add_action('wp_ajax_nopriv_load_posts_by_ajax', 'load_posts_by_ajax_callback');