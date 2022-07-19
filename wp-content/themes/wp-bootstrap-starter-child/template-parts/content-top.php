<section class="u-gradient-fire-brick-w-dull-red py-3">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <div class="col-md-6 col-lg-2 d-flex justify-content-center align-items-center mt-3 mt-md-0 px-lg-0">
                        <?php echo do_shortcode('[gtranslate]'); ?>
                    </div>

                    <div class="col-md-6 col-lg-2 d-flex justify-content-center mt-3 mt-md-0">
                        
                        <ul class="d-flex mb-0 pl-0">

                            <?php if( get_field( 'facebook', 'option' ) ) : ?>
                                <li class="u-list-style-none mx-2">
                                    <a 
                                    class="u-icon__brands u-icon__facebook-square u-font-size-0 before::u-font-size-22 text-decoration-none u-color-folk-white hover:u-color-folk-bright-orange" 
                                    href="<?php echo get_field( 'facebook', 'option' ) ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        Link do Facebook
                                    </a>
                                </li>
                            <?php endif; ?>
                            
                            <?php if( get_field( 'instagram', 'option' ) ) : ?>
                                <li class="u-list-style-none mx-2">
                                    <a 
                                    class="u-icon__brands u-icon__instagram u-font-size-0 before::u-font-size-22 text-decoration-none u-color-folk-white hover:u-color-folk-bright-orange" 
                                    href="<?php echo get_field( 'instagram', 'option' ) ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        Link do Instagram
                                    </a>
                                </li>
                            <?php endif; ?>
                            
                            <?php if( get_field( 'youtube', 'option' ) ) : ?>
                                <li class="u-list-style-none mx-2">
                                    <a 
                                    class="u-icon__brands u-icon__youtube u-font-size-0 before::u-font-size-22 text-decoration-none u-color-folk-white hover:u-color-folk-bright-orange" 
                                    href="<?php echo get_field( 'youtube', 'option' ) ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        Link do Youtube
                                    </a>
                                </li>
                            <?php endif; ?>
                            
                            <?php if( get_field( 'whatsapp', 'option' ) ) : ?>
                                <li class="u-list-style-none mx-2">
                                    <a 
                                    class="u-icon__brands u-icon__whatsapp u-font-size-0 before::u-font-size-22 text-decoration-none u-color-folk-white hover:u-color-folk-bright-orange" 
                                    href="<?php echo get_field( 'whatsapp', 'option' ) ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        Link do Whatsapp
                                    </a>
                                </li>
                            <?php endif; ?>
                            
                            <?php if( get_field( 'flickr', 'option' ) ) : ?>
                                <li class="u-list-style-none mx-2">
                                    <a 
                                    class="u-icon__brands u-icon__flickr u-font-size-0 before::u-font-size-22 text-decoration-none u-color-folk-white hover:u-color-folk-bright-orange" 
                                    href="<?php echo get_field( 'flickr', 'option' ) ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        Link do Flickr
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>

                    <div class="col-md-6 col-lg-4 d-flex justify-content-center align-items-center mt-3 mt-lg-0">
                        <a 
                        href="<?php echo get_home_url( null, '/' ) ?>" 
                        target="_blank" 
                        rel="noreferrer noopener">
                            <img 
                            src="<?php echo get_field( 'logo_no_topo', 'option' ) ?>"
                            alt="Logo Scalabrinianos">
                        </a>
                    </div>

                    <div class="col-md-6 col-lg-4 d-none d-lg-flex justify-content-center mt-3 mt-lg-0">
                        <a 
                        class="hover:u-opacity-8 rounded-pill u-font-weight-semibold text-decoration-none u-color-folk-white u-bg-folk-bright-orange py-2 px-5" 
                        href="<?php echo get_field ('fale_conosco', 'option')?>">
                            Fale conosco
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>