<section class="l-gallery pt-5">

    <div class="container">

        <div class="row">

            <div class="col-lg-6">

                <h2 class="c-title position-relative d-inline-block u-font-weight-bold u-color-folk-white mb-5 pb-1">
                    Galeria    
                </h2>
            </div>

            <div class="col-lg-6 d-flex flex-column justify-content-center mb-4 mb-lg-0">

                <div class="row justify-content-lg-end">

                    <div class="col-4">
                        <a 
                        class="w-full d-block u-font-size-18 u-font-weight-semibold text-center text-decoration-none u-color-folk-white hover:u-color-folk-bright-orange u-bg-folk-bright-orange hover:u-bg-folk-white py-2"
                        href="<?php echo get_home_url( null, 'colecao' )  ?>">
                            Veja mais
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-11">

                <!-- swiper -->
                <div class="swiper-container js-swiper-gallery">

                    <div class="swiper-wrapper">

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
                                    class="swiper-slide"
                                    href="<?php the_permalink() ?>">

                                        <div class="l-gallery__card w-100">
                                            <img
                                            class="img-fluid w-100 h-100 u-object-fit-cover"
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
                <!-- end swiper -->
            </div>

            <div class="col-lg-11 mt-3">

                <!-- swiper -->
                <div class="swiper-container js-swiper-gallery-miniature">

                    <div class="swiper-wrapper">

                        <!-- loop -->
                        <?php
                            if( $galeries->have_posts() ) :
                                while( $galeries->have_posts() ) : $galeries->the_post();
                        ?>
                                    <a 
                                    class="swiper-slide"
                                    href="<?php the_permalink() ?>">
                                        <div class="l-gallery__card-miniature w-100">
                                            <img
                                            class="img-fluid w-100 h-100 u-object-fit-cover"
                                            src="<?php echo get_field( 'capa_do_album' ) ?>"
                                            alt="<?php the_title() ?>">
                                        </div>
                                    </a>
                        <?php
                                endwhile;
                            endif;
                            
                            wp_reset_query();
                        ?>
                        <!-- end loop -->

                        <!-- <a 
                        class="swiper-slide"
                        href="#">
                            <img
                            class="img-fluid"
                            src="<php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/gallery-image-1.png"
                            alt="">
                        </a>

                        <a 
                        class="swiper-slide"
                        href="#">
                            <img
                            class="img-fluid"
                            src="<php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/gallery-image-1.png"
                            alt="">
                        </a>

                        <a 
                        class="swiper-slide"
                        href="#">
                            <img
                            class="img-fluid"
                            src="<php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/gallery-image-1.png"
                            alt="">
                        </a>

                        <a 
                        class="swiper-slide"
                        href="#">
                            <img
                            class="img-fluid"
                            src="<php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/gallery-image-1.png"
                            alt="">
                        </a> -->
                    </div>
                </div>

                <!-- pagination -->
                <div class="swiper-pagination swiper-pagination-gallery-miniature js-swiper-pagination-gallery-miniature"></div>
                <!-- end swiper -->
            </div>

            <div class="col-lg-8 offset-lg-3 mt-5">

                <div class="row justify-content-end">

                    <div class="col-md-7 col-lg-6 d-flex justify-content-md-end align-items-center">
                        <p class="l-gallery__phares u-font-weight-bold family-cormorant-garamond u-color-folk-white mb-3 mb-md-0">
                            Acompanhe-nos nas redes:
                        </p>
                    </div>

                    <div class="col-md-5">

                        <ul class="d-flex justify-content-md-end mb-0 pl-0">

                            <?php if( get_field( 'facebook', 'option' ) ) : ?>
                                <li class="l-social-media__item hover:u-opacity-8 d-flex justify-content-center align-items-center u-bg-folk-facebook u-cursor-pointer">
                                    <a
                                    class="u-icon__brands u-icon__facebook-square u-font-size-0 before::u-font-size-40 text-decoration-none u-color-folk-white"
                                    href="<?php echo get_field( 'facebook', 'option' ) ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        Link do Facebook
                                    </a>
                                </li>
                            <?php endif; ?>
                            
                            <?php if( get_field( 'instagram', 'option' ) ) : ?>
                                <li class="l-social-media__item hover:u-opacity-8 d-flex justify-content-center align-items-center u-bg-folk-instagram u-cursor-pointer">
                                    <a
                                    class="u-icon__brands u-icon__instagram u-font-size-0 before::u-font-size-40 text-decoration-none u-color-folk-white"
                                    href="<?php echo get_field( 'instagram', 'option' ) ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        Link do Instagram
                                    </a>
                                </li>
                            <?php endif; ?>
                            
                            <?php if( get_field( 'youtube', 'option' ) ) : ?>
                                <li class="l-social-media__item hover:u-opacity-8 d-flex justify-content-center align-items-center u-bg-folk-youtube u-cursor-pointer">
                                    <a
                                    class="u-icon__brands u-icon__youtube u-font-size-0 before::u-font-size-40 text-decoration-none u-color-folk-white"
                                    href="<?php echo get_field( 'youtube', 'option' ) ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        Link do Youtube
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if( get_field( 'flickr', 'option' ) ) : ?>
                                <li class="l-social-media__item hover:u-opacity-8 d-flex justify-content-center align-items-center u-bg-folk-flickr u-cursor-pointer">
                                    <a
                                    class="u-icon__brands u-icon__flickr u-font-size-0 before::u-font-size-40 text-decoration-none u-color-folk-white"
                                    href="<?php echo get_field( 'flickr', 'option' ) ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        Link do Flickr
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>