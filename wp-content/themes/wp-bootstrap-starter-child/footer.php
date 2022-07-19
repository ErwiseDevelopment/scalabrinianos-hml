<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WP_Bootstrap_Starter
 */

?>
<?php if(!is_page_template( 'blank-page.php' ) && !is_page_template( 'blank-page-with-container.php' )): ?>
  
    <?php get_template_part( 'footer-widget' ); ?>

    <footer>
        
        <div class="d-none d-lg-block u-bg-folk-light-tamarillo py-4">

            <div class="container">

                <div class="row">

                    <div class="col-12">

                        <!-- swiper -->
                        <div class="swiper-container js-swiper-footer-logo">

                            <div class="swiper-wrapper">

                                <!-- loop -->
                                <?php
                                    if( have_rows( 'obras_sociais', 'option' ) ) :
                                        while( have_rows( 'obras_sociais', 'option' ) ) : the_row();
                                ?>
                                            <a 
                                            class="swiper-slide"
                                            href="<?php echo get_sub_field( 'link_do_site' ) ?>">
                                                <img
                                                class="img-fluid"
                                                src="<?php echo get_sub_field( 'logo' ) ?>"
                                                alt="<?php the_title() ?>">
                                            </a>
                                <?php
                                        endwhile;
                                    endif;
                                ?>
                                <!-- end loop -->
                            </div>
                        </div>
                        <!-- end swiper -->
                    </div>
                </div>
            </div>
        </div>

        <div class="u-bg-folk-persian-plum py-4">

            <div class="container">

                <div class="col-12">

                    <div class="row justify-content-center">

                        <div class="col-7 col-lg-2 order-1 d-flex justify-content-center align-items-center mb-4 mb-lg-0">

                            <div class="row justify-content-center">

                                <div class="col-8 col-lg-12">
                                    <a 
                                    class="w-100 d-block"
                                    href="<?php echo get_home_url( null, '/' ) ?>">
                                        <img
                                        class="img-fluid"
                                        src="<?php echo get_field( 'logo_do_rodape', 'option' ) ?>"
                                        alt="Scalabrinianos">
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-4 order-3 order-md-2 d-flex flex-column justify-content-center mb-4 mb-lg-0">

                            <div class="d-flex align-items-center">
                                <div class="pr-2">
                                    <i class="fa-solid fa-phone u-color-folk-bright-orange"></i>
                                </div>

                                <p class="u-font-size-15 u-font-weight-medium u-color-folk-white mb-0">
                                    <?php echo get_field( 'telefone_1', 'option' ) ?> <br>
                                    <?php echo get_field( 'telefone_2', 'option' ) ?>
                                </p>
                            </div>

                            <div class="d-flex align-items-center mt-2">
                                <i class="fa-solid fa-envelope u-color-folk-bright-orange"></i>
                                <p class="u-font-size-15 u-font-weight-medium u-color-folk-white ml-2 mb-0">
                                    <?php echo get_field( 'e-mail', 'option' ) ?>
                                </p>
                            </div>
                        </div>

                        <div class="col-md-6 col-lg-3 order-4 order-md-3 d-flex flex-column justify-content-center mb-4 mb-lg-0">

                            <div class="d-flex align-items-center">
                                <div class="pr-2">
                                    <i class="fa-solid fa-location-dot u-color-folk-bright-orange"></i>
                                </div>

                                <p class="u-font-size-15 u-font-weight-medium u-color-folk-white mb-0">
                                    <?php echo get_field( 'endereco', 'option' ) ?>
                                </p>
                            </div>

                            <div class="mt-2">
                                <p class="u-font-size-15 u-font-weight-medium u-color-folk-white ml-4 mb-0">
                                    São Paulo – SP
                                </p>
                            </div>
                        </div>

                        <div class="col-lg-3 order-2 order-md-4 d-flex justify-content-center align-items-center mb-3 mb-md-0">
                            <iframe class="w-100 h-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.3471635050805!2d-46.616509785383144!3d-23.591879268604277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5bc1f9aa0503%3A0x94aea68501d80262!2sR.%20Dr.%20M%C3%A1rio%20Vicente%2C%201108%20-%20Vila%20S%C3%A3o%20Jos%C3%A9%2C%20S%C3%A3o%20Paulo%20-%20SP%2C%2004270-001!5e0!3m2!1spt-BR!2sbr!4v1651795814041!5m2!1spt-BR!2sbr" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
					
					<!-- footer logos -->
                    <div class="col-12 my-4">
                        
                        <div class="row">

                            <div class="col-lg-8 d-flex align-items-center">
                                <p class="u-line-height-100 u-font-weight-semibold text-center text-md-left u-color-folk-white mb-0" style= "font-size: 13px;">
                                    CONGREGAÇÃO DOS MISSIONÁRIOS DE SÃO CARLOS © <?php echo date('Y'); ?> TODOS OS DIREITOS RESERVADOS.
                                </p>
                            </div>

                            <div class="col-lg-4">
                            
                                <div class="row">

                                    <div class="col-6">
                                        <a 
                                        href="https://www.dominuscomunicacao.com/" 
                                        target="_blank" 
                                        rel="noreferrer noopener">
                                            <img
                                            class="img-fluid my-3 my-md-0"
                                            src="https://erwise.com.br/wp-content/uploads/2022/06/dominus.png"
                                            alt="Dominus">
                                        </a>
                                    </div>

                                    <div class="col-6">
                                        <a 
                                        href="https://www.erwise.com.br" 
                                        target="_blank" 
                                        rel="noreferrer noopener">
                                            <img
                                            class="img-fluid my-3 my-md-0"
                                            src="https://erwise.com.br/wp-content/uploads/2022/06/erwise.png"
                                            alt="Erwise">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					<!-- end footer logo -->
				</div>
            </div>
        </div>
    </footer>

<?php endif; ?>
</div><!-- #page -->

<?php wp_footer(); ?>
</body>
</html>