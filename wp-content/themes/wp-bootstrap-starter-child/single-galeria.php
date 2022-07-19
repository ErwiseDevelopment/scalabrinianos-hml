<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
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
					Galeria
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- end banner -->

<section class="my-5">
    
    <div class="container">
		
		<div class="row justify-content-lg-end">

            <div class="col-md-4 mb-3">
                <a class="w-full d-block u-font-size-16 u-font-weight-semibold text-center text-decoration-none u-color-folk-white hover:u-color-folk-white u-bg-folk-bright-orange hover:u-bg-folk-dark-cyan py-2" href="<?php echo get_home_url( null, 'colecao' ) ?>">
                    Voltar a Galeria
                </a>
            </div>
        </div>
		
        <div class="row">
		
            <div class="col-12">

                <div class="row">

                    <?php
                        $images = get_field( 'galeria' );
                        $count = -1;

                        if( $images ) :
                            foreach( $images as $image ) :
                                $count++;
                    ?>
                                <div class="col-md-4 my-2 js-photos" data-value="<?php echo $count; ?>">
                                    <img
                                    class="img-fluid w-100 h-100 u-object-fit-cover"
                                    src="<?php echo $image[ 'url' ]; ?>"
                                    alt="<?php the_title() ?>">
                                </div>
                    <?php
                            endforeach;
                        endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- modal photos -->
<div class="l-modal-photos d-flex justify-content-center align-items-center js-modal-photos">
    
    <div class="l-modal-photos__overlay js-modal-photos-overlay"></div>
    <span class="l-modal-photos__close js-modal-photos-close">x</span>

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-10 col-lg-8">

                <!-- swiper -->
                <div class="swiper-container js-swiper-modal-photos">

                    <div class="swiper-wrapper">
                        
                        <!-- slide -->
                        <?php
                            if( $images ) :
                                foreach( $images as $image ) :
                        ?>
                                    <div class="swiper-slide">
                                        <img
                                        class="l-modal-photos__image img-fluid w-100"
                                        src="<?php echo $image[ 'url' ]; ?>"
                                        alt="<?php the_title() ?>">
                                    </div>
                        <?php
                                endforeach;
                            endif;
                        ?>
                        <!-- end slide -->
                    </div>
                </div>

                <!-- arrows -->
                <div class="swiper-button-prev swiper-button-prev-modal-photos u-color-folk-white js-swiper-button-prev-modal-photos"></div>
                <div class="swiper-button-next swiper-button-next-modal-photos js-swiper-button-next-modal-photos"></div>
                <!-- end swiper -->
            </div>
        </div>
    </div>
</div>
<!-- end modal photos -->

<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
