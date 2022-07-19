<section class="u-bg-folk-tamarillo py-5">

<div class="container">

    <div class="row">

        <div class="col-lg-6">

            <h2 class="c-title position-relative d-inline-block u-font-weight-bold u-color-folk-white mb-5 pb-1">
                Notícias    
            </h2>
        </div>

        <div class="col-lg-6 d-flex flex-column justify-content-center mb-4 mb-lg-0">

            <div class="row justify-content-lg-end">

                <div class="col-4">
                    <a 
                    class="w-full d-block u-font-size-16 u-font-weight-semibold text-center text-decoration-none u-color-folk-white hover:u-color-folk-bright-orange u-bg-folk-bright-orange hover:u-bg-folk-white py-2"
                    href="<?php echo get_home_url( null, 'noticias' ) ?>">
                        Veja mais
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">

        <div class="col-12">

            <div class="row">

                <?php
                    $args = array(
                        'posts_per_page' => 1,
                        'post_type'      => 'post',
                        'category_name'  => 'noticia-destaque',
                        'order'          => 'DESC'
                    );

                    $news_highlight = new WP_Query( $args );

                    if( $news_highlight->have_posts() ) :
                        while( $news_highlight->have_posts() ) : $news_highlight->the_post();
                            $news_highlight_id = get_the_ID();
                ?>
                            <div class="col-lg-6 mb-3 mb-lg-0 px-lg-1">
                                
                                <a 
                                class="l-news__card-highlight position-relative d-block"
                                href="<?php the_permalink() ?>">
                                    
                                    <div class="l-news__card-highlight-img overflow-hidden">
                                        <?php 
                                            $alt_title = get_the_title();

                                            the_post_thumbnail( 'post-thumbnail',
                                                array(
                                                    'class' => 'l-news__card-highlight-thumbnail img-fluid w-100 h-100 u-object-fit-cover',
                                                    'alt'   => $alt_title
                                            ))
                                        ?>
                                    </div>

                                    <div class="l-news__card-highlight-body w-100 h-100 d-flex flex-column justify-content-end px-4 pb-5">

                                        <p class="l-news__card-highlight-date u-font-weight-semibold u-color-folk-bright-orange">
                                            <?php echo get_date_format( get_the_date( 'd/m/Y', $news_highlight ) ) ?>
                                        </p>

                                        <h5 class="l-news__card-highlight-title u-font-weight-bold u-color-folk-light-gray">
                                            <?php the_title() ?>
                                        </h5>
                                    </div>
                                </a>
                            </div>
                <?php
                        endwhile;
                    endif;

                        wp_reset_query();
                ?>

                <div class="col-lg-6">

                    <div class="row h-100">

                        <!-- loop -->
                        <?php 
                            $news_miniatures = array();
                            
                            $args = array(
                                'posts_per_page' => -1,
                                'category_name'  => 'noticias',
                                'order'          => 'DESC'  
                            );

                            $news = new WP_Query( $args );
                            $count = 0;

                            if( $news->have_posts() ) :
                                while( $news->have_posts() ) : $news->the_post(); 
                                    if( get_the_ID() != $news_highlight_id ) :
                                        array_push( $news_miniatures, get_the_ID() );
                                        $count++;
                        ?>
                                    <div class="col-md-6 my-3 my-md-0 px-lg-1">

                                        <a 
                                        class="l-news__card h-100 overflow-hidden position-relative d-block text-decoration-none u-bg-folk-white"
                                        href="<?php the_permalink() ?>">

                                            <div class="l-news__card-img">
                                                <?php 
                                                    $alt_title = get_the_title();

                                                    the_post_thumbnail( 'post-thumbnail',
                                                        array(
                                                            'class' => 'l-news__card-thumbnail img-fluid w-100 h-100 u-object-fit-cover',
                                                            'alt'   => $alt_title
                                                    ))
                                                ?>
                                            </div>

                                            <div class="l-news__card-body p-3">

                                                <p class="l-news__card-date u-font-weight-semibold u-color-folk-tamarillo mb-0">
                                                    <?php echo get_date_format( get_the_date( 'd/m/Y', $news ) ) ?>
                                                </p>

                                                <h5 class="u-font-weight-bold u-color-folk-bright-orange">
                                                    <?php the_title() ?>
                                                </h5>

                                                

                                                <div class="l-news__card-overlay w-100 d-flex justify-content-center align-items-center u-bg-folk-persian-plum">
                                                    <p class="u-font-size-14 u-font-weight-bold u-color-folk-white mb-0">
                                                        Leia mais
                                                    </p>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                        <?php 
                                        if($count == 2)
                                            break;
                                    endif;
                                endwhile; 
                            endif;
                            wp_reset_query();
                        ?>
                        <!-- end loop -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</section>

<section class="u-bg-folk-persian-plum py-5">

<div class="container">

    <div class="row">

        <div class="col-12">

            <div class="row">

                <!-- loop -->
                <?php
                    $news_miniature_id_1 = $news_miniatures[0];
                    $news_miniature_id_2 = $news_miniatures[1];

                    $args = array(
                        'posts_per_page' => -1,
                        'post_type'      => 'post',
                        'category_name'  => 'noticias',
                        'order'          => 'DESC',
                        'post__not_in'   => array(
                            $news_miniature_id_1,
                            $news_miniature_id_2,
                            $news_highlight_id
                        )
                    );

                    $news = new WP_Query( $args );
					$count = 0;

                    if( $news->have_posts() ) :
                        while( $news->have_posts() ) : $news->the_post();
							$count++;
                ?>
                            <div class="col-md-6 col-lg-3 sm:u-border-l-8 u-border-color-dark-cyan my-3 my-lg-0">

                                <a 
                                class="u-color-folk-white"
                                href="<?php the_permalink() ?>">

                                    <p class="u-font-size-13 u-font-weight-semibold u-color-folk-bright-orange mb-2">
                                        <?php echo get_date_format( get_the_date( 'd/m/Y', $post ) ) ?>
                                    </p>

                                    <p class="u-font-weight-bold u-color-folk-white mb-0">
                                        <?php the_title() ?>
                                    </p>
                                </a>
                            </div>
                <?php
							if( $count == 4 )
								break;
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