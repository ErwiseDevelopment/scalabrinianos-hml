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

<section class="my-4">

    <div class="container">

        <div class="row justify-content-center blog-posts">

            <!-- loop -->
            <?php
                $args = array(
                    'posts_per_page' => 4,
                    'post_type'      => 'post',
                    'category_name'  => 'blog',
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
                                                    'class' => 'l-page-blog__thumbnail img-fluid w-100 h-100 u-object-fit-cover',
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

                                        <p class="l-page-blog__excerpt u-font-size-14 xxl:u-font-size-18 u-font-weight-regular u-color-folk-gray">
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
                <p class="l-page-news__btn-load-more w-100 u-font-weight-semibold text-center u-color-folk-white u-bg-folk-bright-orange hover:u-bg-folk-tamarillo u-cursor-pointer mb-0 py-3 js-load-more">
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
