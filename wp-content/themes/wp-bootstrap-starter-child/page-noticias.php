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

 global $wp_query;

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
                    Notícias
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- end banner -->

<section class="l-search py-5">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <form method="GET" action="<?php echo get_home_url( null, 'pesquisa' ) ?>">
                    <div class="row">

                        <div class="col-lg-6 mb-3 mb-md-4 mb-lg-0 pr-md-0">

                            <p class="l-search__text u-font-weight-bold u-color-folk-bright-orange mb-0">
                                O que você está procurando?
                            </p>

                            <div class="row">

                                <div class="col-8 pr-0">
                                    <input 
                                    class="l-search__field w-100 h-100 border-0 d-block u-font-weight-regular py-2 px-3" 
                                    type="text" 
                                    name="titulo"
                                    placeholder="Busca por palavra-chave">
                                    <input
                                    type="hidden"
                                    name="categoria"
                                    value="">
                                </div>

                                <div class="col-4 pl-0">
                                    <input 
                                    class="l-search__submit w-100 border-0 d-block u-font-weight-bold text-center u-color-folk-white u-bg-folk-bright-orange hover:u-bg-folk-water-course py-2 px-3" 
                                    type="submit" 
                                    value="Pesquisar">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3 mb-md-0 pr-md-0">
                            
                            <p class="l-search__text u-font-weight-bold u-color-folk-bright-orange mb-0">
                                Selecione uma categoria
                            </p>


                            <div class="l-search__select w-100 py-2 px-3 js-select-categories">
                                <div class="l-page-news__select__field js-category-current" data-value="categorias">
                                    Categorias
                                </div>

                                <div class="l-search__select__box">
                                    <?php
                                        $categories = get_categories();
        
                                        $terms = get_terms(
                                            array(
                                                'taxonomy'   => 'category',
                                                'hide_empty' => true,
                                                'parent'     => 10
                                            )
                                        );

                                        foreach($terms as $term) :
                                    ?>
                                        <div class="l-search__select__item py-2 px-3 js-categories">
                                            <?php echo $term->name; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<!-- posts -->
<section class="mb-5">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row blog-posts">

                    <?php 
                        $args = array(
                            'post_type'      => 'post',
                            'category_name'  => 'noticias',
                            'post_status'    => 'publish',
                            'posts_per_page' => '8',
                            'paged'          => $paged,
                        );

                        $news = new WP_Query( $args ); 
                        
                        if ( $news->have_posts() ) : 
                            while ( $news->have_posts() ) : $news->the_post(); 
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
                    <?php 
                            endwhile; 
                        endif;
                        
                        wp_reset_query();
                    ?>
                </div>
            </div>


            <div class="col-12 mt-4">

                <div class="row justify-content-center">

                    <div class="col-8 col-md-6 col-lg-4">
                        <p class="l-page-news__btn-load-more w-100 u-font-weight-semibold text-center u-color-folk-white u-bg-folk-bright-orange hover:u-bg-folk-tamarillo u-cursor-pointer mb-0 py-3 js-load-more">
                            Carregar mais
                        </p>
                    </div>
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

<?php

get_footer();
