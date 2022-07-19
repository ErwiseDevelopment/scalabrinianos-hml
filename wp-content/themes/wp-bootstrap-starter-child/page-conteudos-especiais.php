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
                src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/noticias-banner.png"
                alt="Banner Notícias">

                <h1 class="l-page-news__banner__title u-font-weight-bold text-center u-color-folk-white pb-sm-3">
                    <?php the_title() ?>
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- end banner -->

<!-- posts -->
<section class="mb-5">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <?php
                        $args = array(
                            'posts_per_page' => -1,
                            'post_type'      => 'post',
                            'category_name'  => 'conteudos-especiais',
                            'order'          => 'DESC'
                        );

                        $news = new WP_Query( $args );

                        if( $news->have_posts() ) :
                            while( $news->have_posts() ) : $news->the_post();
                    ?>
                                <div class="col-sm-6 col-md-4 col-lg-3 my-3">

                                    <a 
                                    class="card rounded-0 text-decoration-none"
                                    href="<?php the_permalink() ?>">

                                        <div class="l-page-news__post__card-img card-img">
                                            <!-- <img
                                            class="img-fluid"
                                            src="<php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/noticias-post-thumbnail.png"
                                            alt="Single Temas"> -->

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
                                                <!-- 20 de Janeiro de 2022    -->
                                                <?php echo get_date_format( get_the_date( 'd/m/Y', $news ) ) ?>
                                            </p>

                                            <h3 class="l-page-news__post__card-title u-font-weight-bold u-color-folk-black">
                                                <!-- A nova missão 
                                                Scalabriniana 
                                                em Algeciras -->

                                                <?php the_title() ?>
                                            </h3>

                                            <p class="l-page-news__post__card-link u-font-weight-bold u-color-folk-tamarillo mb-0">
                                                Ler mais
                                            </p>
                                        </div>
                                    </a>
                                </div>
                    <?php
                            endwhile;
                        endif;

                        wp_reset_query();
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end posts -->

<!-- newsletter -->
<?php echo get_template_part( 'template-parts/content', 'newsletter' ) ?>
<!--  end newsletter -->

<!-- gallery -->
<section class="l-gallery">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-lg-8 offset-lg-3">

                <div class="row justify-content-end">

                    <div class="col-md-7 col-lg-6 d-flex justify-content-md-end align-items-center mb-3 mb-md-0">
                        <p class="l-gallery__phares u-font-weight-bold family-cormorant-garamond u-color-folk-white mb-0">
                            Acompanhe-nos nas redes:
                        </p>
                    </div>

                    <div class="col-md-5">

                        <ul class="d-flex justify-content-md-end mb-0 pl-0">
                            <li class="l-social-media__item hover:u-opacity-8 d-flex justify-content-center align-items-center u-bg-folk-facebook u-cursor-pointer">
                                <a
                                class="u-icon__brands u-icon__facebook-square u-font-size-0 before::u-font-size-40 text-decoration-none u-color-folk-white"
                                href="#"
                                target="_blank"
                                rel="noreferrer noopener">
                                    Link do Facebook
                                </a>
                            </li>

                            <li class="l-social-media__item hover:u-opacity-8 d-flex justify-content-center align-items-center u-bg-folk-instagram u-cursor-pointer">
                                <a
                                class="u-icon__brands u-icon__instagram u-font-size-0 before::u-font-size-40 text-decoration-none u-color-folk-white"
                                href="#"
                                target="_blank"
                                rel="noreferrer noopener">
                                    Link do Instagram
                                </a>
                            </li>

                            <li class="l-social-media__item hover:u-opacity-8 d-flex justify-content-center align-items-center u-bg-folk-youtube u-cursor-pointer">
                                <a
                                class="u-icon__brands u-icon__youtube u-font-size-0 before::u-font-size-40 text-decoration-none u-color-folk-white"
                                href="#"
                                target="_blank"
                                rel="noreferrer noopener">
                                    Link do Youtube
                                </a>
                            </li>

                            <li class="l-social-media__item hover:u-opacity-8 d-flex justify-content-center align-items-center u-bg-folk-flickr u-cursor-pointer">
                                <a
                                class="u-icon__brands u-icon__flickr u-font-size-0 before::u-font-size-40 text-decoration-none u-color-folk-white"
                                href="#"
                                target="_blank"
                                rel="noreferrer noopener">
                                    Link do Flickr
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- end gallery -->

<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<img
class="img-fluid d-none"
data-src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/banner-illustration.png"
alt="Single Temas">

<?php

get_footer();
