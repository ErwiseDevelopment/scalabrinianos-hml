<section class="u-bg-folk-persian-plum py-5">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <!-- loop -->
                    <?php
                        $args = array(
                            'posts_per_page' => 4,
                            'post_type'      => 'post',
                            'category_name'  => 'noticias',
                            'order'          => 'DESC'
                        );

                        $news = new WP_Query( $args );

                        if( $news->have_posts() ) :
                            while( $news->have_posts() ) : $news->the_post();
                    ?>
                                <div class="col-md-6 col-lg-3 sm:u-border-l-8 u-border-color-dark-cyan my-3 my-lg-0">

                                    <a 
                                    class="u-color-folk-white"
                                    href="<?php the_permalink() ?>">

                                        <p class="u-font-size-13 u-font-weight-semibold u-color-folk-bright-orange mb-2">
                                            <!-- 20 de Janeiro de 2022 -->
                                            <?php echo get_date_format( get_the_date( 'd/m/Y', $post ) ) ?>
                                        </p>

                                        <p class="u-font-weight-bold u-color-folk-white mb-0">
                                            <!-- “Paz com todos”: 
                                            a mensagem do Padre 
                                            Chiarello para a 
                                            Quaresma de 2022 -->
                                            <?php the_title() ?>
                                        </p>
                                    </a>
                                </div>
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