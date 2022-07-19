<?php

/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 
 *
 * Template Name: Modelo Menu Lateral Fixo
 * Template Post Type: page
 */

get_header();
?>

<div id="primary">
<main id="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- banner -->
<section class="l-page-news__banner">

    <div class="container-fluid">

        <div class="row">
<!-- Alteraçao feita por raphael 31/05 -->
            <div class="col-12 px-0">
                
                    <img
                    class="img-fluid w-100"
                    src="<?php echo get_field( 'banner_paginas') ?>"
                    alt="">

                <h1 class="l-page-news__banner__title u-line-height-100 u-font-weight-bold text-center u-color-folk-white pb-sm-3">
                    <?php the_title() ?>
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- end banner -->

<section class="my-5">

    <div class="container">

        <div class="row justify-content-end">

            <div class="col-12">

                <div class="row">

                    <div class="col-lg-5">

                        <?php
                            $child_pages = wp_list_pages( array(
                                'post_type'   => 'page',
                                'title_li'    => '',
                                'child_of'    => $post->post_parent,
                                'sort_column' => 'menu_order', //campo alterado por raphael
                                'echo'        => 0
                            ));
                        ?>

                        <ul class="l-template-santos__list-page sticky-top pt-3 pl-0 js-pages">
                            <!-- loop -->
                            <?php echo $child_pages; ?>
                            <!-- end loop -->
                        </ul>
                    </div>

                    <div class="col-lg-7 ">
                        
                        <div class="l-template-santos__item col-lg-11 mt-5">
                            
                            <?php
                                $alt_title = get_the_title();

                                the_post_thumbnail( 'post-thumbnail',
                                    array(
                                        'class' => 'img-fluid w-100 h-100 u-object-fit-cover',
                                        'alt'   => $alt_title
                                ));
                            ?>
							
							<h4 class="l-template-santos__prayer__title u-font-weight-bold text-center u-color-folk-cyan mb-4 pt-3">
                                <?php echo get_field( 'titulo' ) ?>
                            </h4>
							
                            <span class="d-block u-font-size-14 xxl:u-font-size-18 u-font-weight-regular">
                                <?php echo get_field( 'descricao' ) ?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-4 my-3">
                <?php if( get_field( 'botao' ) && get_field( 'link_do_botao' ) ) : ?>
                    <a
                    class="w-100 rounded d-block u-font-size-14 md:u-font-size-18 u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-cyan hover:u-bg-folk-bright-orange py-3"
                    href="<?php echo get_field( 'link_do_botao' ) ?>">
                        Conheça a história de Scalabrini
                        <?php echo get_field( 'botao' ) ?>
                    </a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</section>

<section class="my-4">

    <div class="container">

        <div class="row">

            <div class="col-12">
                
                <h4 class="l-template-santos__subtitle u-font-weight-bold text-center u-color-folk-tamarillo mb-4">
                    Notícias recentes
                </h4>

                <div class="row">
                        
                    <!-- loop -->
                    <?php
                        $args = array(
                            'posts_per_page' => 3,
                            'post_type'      => 'post',
                            'category'       => 'noticia',
                            'order'          => 'DESC'
                        );

                        $news = new WP_Query( $args );

                        if( $news->have_posts() ) :
                            while( $news->have_posts() ) : $news->the_post();
                    ?>
                                <div class="col-md-4 my-2">

                                    <a 
                                    class="l-single__other-post__link d-block text-decoration-none position-relative"
                                    href="<?php the_permalink() ?>">
                                        <!-- <img
                                        class="img-fluid"
                                        src="http://scalabrinianos.test/wp-content/uploads/2022/05/thumbnail.png"
                                        alt=""> -->

                                        <?php
                                            $alt_title = get_the_title();
                                            
                                            the_post_thumbnail( 'post-thumbnail',
                                                array(
                                                    'class' => 'img-fluid w-100 h-100 u-object-fit-cover',
                                                    'alt'   => $alt_title
                                            ));
                                        ?>

                                        <div class="l-single__other-post__box px-3 pb-3">
                                            <p class="u-font-size-12 u-font-weight-semibold u-color-folk-bright-orange mb-0">
                                                <!-- 20 de Janeiro de 2022 -->
                                                <?php echo get_date_format( get_the_date( 'd/m/Y', get_the_ID() ) ) ?>
                                            </p>

                                            <h4 class="u-font-size-20 u-font-weight-bold u-color-folk-light-gray">
<!--                                                 A nova missão Scalabriniana 
                                                em Algeciras -->
												<?php the_title() ?>
                                            </h4>
                                        </div>
                                    </a>
                                </div>
                    <?php
                            endwhile;
                        endif;

                        wp_reset_query();
                    ?>
                    <!-- end loop -->
                </div>

                <div class="row justify-content-center">

                    <div class="col-8 col-md-4 my-3">
                        
                        <a
                        class="w-100 rounded d-block u-font-size-18 u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-bright-orange hover:u-bg-folk-cyan py-3"
                        href="<?php echo get_home_url( null, 'noticias' ) ?>">
                            Todas as notícias
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- newsletter -->
<?php echo get_template_part( 'template-parts/content', 'newsletter' ) ?>
<!--  end newsletter -->

<?php endwhile; endif; ?>

</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>
