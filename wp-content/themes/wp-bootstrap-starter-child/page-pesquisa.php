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

<!-- search -->
<?php echo get_template_part( 'template-parts/content', 'fields-search' ); ?>
<!-- end search -->

<section class="my-4">

    <div class="container">

        <div class="row justify-content-center">

            <!-- loop -->
            <?php
                if( isset($_GET[ 'categoria' ] ) )
                    $search_category = $_GET[ 'categoria' ];

                // foreach( $categories as $category ) {
                //     if( $category->slug == $search_category ) {
                //         $category_current = $category->slug;
                //     } else if ( $category->name == $search_category ) {
                //         $category_current = $category->slug; 
                //     }
                // }

                foreach( $terms as $term ) {
                    if( $term->slug == $search_category ) {
                        $category_current = $term->slug;
                    } else if ( $term->name == $search_category ) {
                        $category_current = $term->slug; 
                    }
                }
                            
                $args = array(
                    'posts_per_page' => -1,
                    'post_type'      => 'post',
                    'category_name'  => $category_current,
                    'order'          => 'DESC'
                );

                $blogs = new WP_Query( $args );
                $cats = array();

                if( $blogs->have_posts() ) :
                    while( $blogs->have_posts() ) : $blogs->the_post();
            ?>
                        <div class="col-lg-10 my-3">

                            <div class="border overflow-hidden px-3 pl-md-0 pr-md-4">

                                <div class="row">

                                    <div class="col-md-5">
                                        <!-- <img
                                        class="img-fluid w-100 h-100 u-object-fit-cover"
                                        src="http://scalabrinianos.test/wp-content/uploads/2022/05/quote-img.png"
                                        alt=""> -->

                                        <?php
                                            $alt_title = get_the_title();
                                            
                                            the_post_thumbnail( 'post-thumbnail',
                                                array(
                                                    'class' => 'img-fluid w-100 h-100 u-object-fit-cover',
                                                    'alt'   => $alt_title
                                            ));
                                        ?>
                                    </div>

                                    <div class="col-md-7 py-3">

                                        <p class="u-font-size-12 xxl:u-font-size-15 u-font-weight-bold text-uppercase u-color-folk-bright-orange mb-0">
                                            <!-- 10 de março de 2022 -->
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
                                            <!-- O que significa caridade
                                            na Bíblia? -->

                                            <?php the_title() ?>
                                        </h4>

                                        <p class="u-font-size-14 xxl:u-font-size-18 u-font-weight-regular u-color-folk-gray">
                                            <!-- Lorem ipsum dolor sit amet, con;ectetur adipiscing elit. Mauris scelerisque vel dolor et vehicula. Nullam volutpat blandit velit id elementum. -->
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
                        endwhile;
                    endif;

                    wp_reset_query();
                ?>
            <!-- end loop -->
        </div>

        <div class="row justify-content-center">

            <div class="col-8 col-md-6 col-lg-4">
                <p class="l-page-news__btn-load-more w-100 u-font-weight-semibold text-center u-color-folk-white u-bg-folk-bright-orange hover:u-bg-folk-tamarillo u-cursor-pointer mb-0 py-3">
                    Carregar mais
                </p>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
