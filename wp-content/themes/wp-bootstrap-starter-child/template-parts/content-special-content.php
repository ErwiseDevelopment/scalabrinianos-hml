<section class="mt-4 mb-5 py-5">

    <div class="container">

        <div class="row">

            <div class="col-12">
                <h2 class="c-title position-relative d-inline-block u-font-weight-bold u-color-folk-tamarillo mb-5 pb-1">
                    Conteúdos especiais 
                </h2>
            </div>

            <div class="col-lg-7 h-100">

                <!-- swiper -->
                <div class="swiper-container js-swiper-special-content pb-5">

                    <div class="swiper-wrapper">

                        <!-- slide -->
                        <?php
                            $args = array(
                                'posts_per_page' => 6,
                                'post_type'      => 'post',
                                'category_name'  => 'conteudos-especiais',
                                'order'          => 'DESC'
                            );

                            $contents = new WP_Query( $args );
                            $cats = array();

                            if( $contents->have_posts() ) :
                                while( $contents->have_posts() ) : $contents->the_post();
                        ?>
                                    <div class="swiper-slide">

                                        <a 
                                        class="card text-decoration-none"
                                        href="<?php the_permalink() ?>">

                                            <div class="l-special-content__card-img card-img">
                                                <!-- <img
                                                class="img-fluid w-100 h-100"
                                                src="<php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/special-content-photo-1.png"
                                                alt="Foto 01"> -->

                                                <?php 
                                                    $alt_title = get_the_title();

                                                    the_post_thumbnail( 'post-thumbnail',
                                                        array(
                                                            'class' => 'img-fluid w-100 h-100',
                                                            'alt'   => $alt_title
                                                    ))
                                                ?>
                                            </div>

                                            <div class="card-body">

                                                <p class="u-font-size-11 u-font-weight-regular u-color-folk-dark-cyan mb-0">
                                                    <?php
                                                        foreach (get_the_category( get_the_ID() ) as $c) {
                                                            $cat = get_category($c);
                                                            array_push($cats, $cat);
                                                        }

                                                        echo $cats[0]->name;
                                                    ?>
                                                </p>
                                                
                                                <p class="u-font-size-11 u-font-weight-semibold u-color-folk-dark-cyan mb-0">
                                                    <!-- 20 de Janeiro de 2022 -->
                                                    <?php echo get_date_format( get_the_date( 'd/m/Y', $post ) ) ?>
                                                </p>

                                                <p class="l-special-content__card-title u-font-weight-bold">
                                                    <!-- Como discernir a 
                                                    vocação sacerdotal -->

                                                    <?php the_title() ?>
                                                </p>

                                                <div class="row">

                                                    <div class="col-5">
                                                        <p class="w-full d-block u-font-size-12 u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-dark-cyan hover:u-bg-folk-bright-orange mb-0 py-2">
                                                            Leia mais
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </a>
                                    </div>
                        <?php
                                endwhile;
                            endif;
                            
                            wp_reset_query();
                        ?>
                        <!-- end slide -->
                    </div>

                    <!-- pagination -->
                    <div class="swiper-pagination swiper-pagination-special-content js-swiper-pagination-special-content"></div>
                </div>
                <!-- end swiper -->

                <div class="row justify-content-center">

                    <div class="col-8 col-md-4 mb-4 mb-md-0">
                        <a 
                        class="w-full d-block u-font-size-22 u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-bright-orange hover:u-bg-folk-dark-cyan py-2" 
                        href="<?php echo get_home_url( null, 'conteudos-especiais' ) ?>">
                            Veja mais
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-lg-5 d-flex flex-column justify-content-between">
                
                <div class="row">

                    <!-- loop -->
                    <?php
                        $args = array(
                            'posts_per_page' => 2,
                            'post_type'      => 'ebook',
                            'order'          => 'DESC'
                        );

                        $books = new WP_Query( $args );

                        if( $books->have_posts() ) :
                            while( $books->have_posts() ) : $books->the_post();
                    ?>
                                <div class="col-12 my-3">

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

                                            <p class="l-book__book u-font-weight-semibold u-color-folk-tamarillo mb-0">
                                                
                                            </p>

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
                                                    <a 
                                                    class="w-full d-block u-font-size-22 u-font-weight-semibold text-center text-decoration-none u-color-folk-white u-bg-folk-dark-cyan hover:u-bg-folk-bright-orange py-2" 
                                                    href="<?php echo get_field( 'link_lp' ) ?> " target="_blank">
                                                        Baixar  
                                                    </a>
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

                    <div class="col-6 mt-3 mt-lg-0">
                        <a 
                        class="w-full d-block u-font-size-22 u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-bright-orange hover:u-bg-folk-dark-cyan py-2" 
                        href="<?php echo get_home_url( null, 'e-books' ) ?>">
                            Veja mais
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>