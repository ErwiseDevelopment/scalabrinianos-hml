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
                            'posts_per_page' => -1,
                            'post_type'      => 'galeria',
                            'order'          => 'DESC'
                        );

                        $galeries = new WP_Query( $args );

                        if( $galeries->have_posts() ) :
                            while( $galeries->have_posts() ) : $galeries->the_post();
                    ?>
                                <a 
                                class="col-md-4 d-block my-3"
                                href="<?php the_permalink() ?>">

                                    <div class="l-gallery__card position-relative">
                                        <img
                                        class="img-fluid w-100 h-100  u-object-fit-cover"
                                        src="<?php echo get_field( 'capa_do_album' ) ?>"
                                        alt="<?php the_title() ?>">

                                        <div class="l-gallery__card-content px-3">
                                            <p class="l-gallery__card-title u-font-weight-bold u-color-folk-white">
                                                <!-- Abertura do Postulado Scalabriniano
                                                em Passo Fundo, RS. -->

                                                <?php the_title() ?>
                                            </p>
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
