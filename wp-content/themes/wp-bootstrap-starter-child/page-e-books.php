<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<section id="primary" class="content-area">
<div id="main" class="site-main" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<!-- banner -->
<section class="l-page-news__banner">

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 px-0">
                <img
                class="img-fluid"
                src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/single-background.png"
                alt="Banner Notícias">

                <h1 class="l-page-news__banner__title u-font-weight-bold text-center u-color-folk-white pb-3">
					<?php the_title() ?>
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- end banner -->

<section class="my-4">

    <div class="container">

        <div class="row">

            <div class="col-12">
                
                <div class="row">

                    <!-- loop -->
                    <?php
                        $args = array(
                            'posts_per_page' => 22,
                            'post_type'      => 'ebook',
                            'order'          => 'DESC'
                        );

                        $books = new WP_Query( $args );

                        if( $books->have_posts() ) :
                            while( $books->have_posts() ) : $books->the_post();
                    ?>
                                <a 
                                class="col-md-4 d-block text-decoration-none my-3"
                                href="<?php echo get_field( 'link_lp' ) ?>" target="_blank">

                                    <div class="row justify-content-center">

                                        <div class="col-10 col-md-4">
                                            <!-- <img
                                            class="img-fluid"
                                            src="<php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/book-1.png"
                                            alt="E-book 1"> -->

                                            <?php 
                                                $alt_title = get_the_title();

                                                the_post_thumbnail( 'post-thumbnail',
                                                    array(
                                                        'class' => 'img-fluid',
                                                        'alt'   => $alt_title
                                                ));
                                            ?>
                                        </div>

                                        <div class="col-md-8">

                                            <h6 class="l-book__title u-font-weight-semibold u-color-folk-very-dark-grayish">
                                                <!-- Lições de São Carlos
                                                Borromeu sobre 
                                                Caridade -->

                                                <?php the_title() ?>
                                            </h6>
                                        </div>
                                    </div>

                                    <div class="row justify-content-center">

                                        <div class="col-10 l-book__line-center mt-3">

                                            <div class="row justify-content-center">

                                                <div class="col-md-5 offset-1 pl-0">
                                                    <p class="w-full d-block u-font-size-22 u-font-weight-semibold text-center text-decoration-none u-color-folk-white u-bg-folk-dark-cyan hover:u-bg-folk-bright-orange mb-0 py-2">
                                                        Baixar  
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </a>
                    <?php
                            endwhile;
                        endif;
                        
                        wp_reset_query();
                    ?>
                    <!-- end loop -->
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
