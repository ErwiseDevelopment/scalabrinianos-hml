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
                    <?php the_title() ?>
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- end banner -->

<section class="my-5">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <div class="col-md-6">
                        <?php echo do_shortcode( '[contact-form-7 id="11" title="Contato"]' ) ?>
                    </div>

                    <div class="col-md-5 offset-md-1 mt-5 mt-md-0">

                        <p class="u-font-weight-bold text-uppercase mb-0    ">
                            Endereço:
                        </p>

                        <span class="d-block u-font-size-12 mb-3">
                            <?php echo get_field( 'endereco', 'option' ) ?>
                        </span>

                        <p class="u-font-weight-bold text-uppercase mb-0">
                            Telefone:
                        </p>

                        <span class="d-block u-font-size-12">
                            <?php echo get_field( 'telefone_1', 'option' ) ?> <br>
                            <?php echo get_field( 'telefone_2', 'option' ) ?>
                        </span>

                        <p class="u-font-weight-bold text-uppercase mt-3 mb-0">
                            E-mail:
                        </p>

                        <span class="d-block u-font-size-12">
                            <?php echo get_field( 'e-mail', 'option' ) ?>
                        </span>

                        <hr>

                        <p class="u-font-weight-bold text-uppercase">
                            nossas redes sociais
                        </p>

                        <ul class="d-flex flex-column justify-content-center mb-0 pl-0">

                            <?php if(get_field( 'instagram', 'option' )) : ?>
                                <li class=" d-flex align-items-center my-2 mx-1">
                                    <a
                                    class="d-flex align-items-center u-font-size-14 u-font-weight-bold text-decoration-none u-color-folk-black"
                                    href="<?php echo get_field( 'instagram', 'option' ); ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        <span class="u-icon__brands u-icon__instagram position-relative d-flex justify-content-center align-items-center before::u-font-size-20 u-font-weight-light u-color-folk-cyan mr-3"></span>
                                        Instagram
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if(get_field( 'facebook', 'option' )) : ?>
                                <li class=" d-flex align-items-center my-2 mx-1">
                                    <a
                                    class="d-flex align-items-center u-font-size-14 u-font-weight-bold text-decoration-none u-color-folk-black"
                                    href="<?php echo get_field( 'facebook', 'option' ); ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        <span class="u-icon__brands u-icon__facebook-square position-relative d-flex justify-content-center align-items-center before::u-font-size-20 u-font-weight-light u-color-folk-cyan mr-3"></span>
                                        Facebook
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if(get_field( 'youtube', 'option' )) : ?>
                                <li class=" d-flex align-items-center my-2 mx-1">
                                    <a
                                    class="d-flex align-items-center u-font-size-14 u-font-weight-bold text-decoration-none u-color-folk-black"
                                    href="<?php echo get_field( 'youtube', 'option' ); ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        <span class="u-icon__brands u-icon__youtube position-relative d-flex justify-content-center align-items-center before::u-font-size-20 u-font-weight-light u-color-folk-cyan mr-3"></span>
                                        Youtube
                                    </a>
                                </li>
                            <?php endif; ?>

                            <?php if(get_field( 'whatsapp', 'option' )) : ?>
                                <li class=" d-flex align-items-center my-2 mx-1">
                                    <a
                                    class="d-flex align-items-center u-font-size-14 u-font-weight-bold text-decoration-none u-color-folk-black"
                                    href="<?php echo get_field( 'whatsapp', 'option' ); ?>"
                                    target="_blank"
                                    rel="noreferrer noopener">
                                        <span class="u-icon__brands u-icon__whatsapp position-relative d-flex justify-content-center align-items-center before::u-font-size-20 u-font-weight-light u-color-folk-cyan mr-3"></span>
                                        Whatsapp
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-4">

                <div class="row">

                    <div class="col-lg-6 my-3 my-lg-0">
                        <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3454.321497349539!2d-51.22073417633647!3d-30.02763312395829!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x951979a8b263b01b%3A0x9c516cb3faeabf9a!2sAv.%20Alberto%20Bins%2C%201020%20-%20Centro%20Hist%C3%B3rico%2C%20Porto%20Alegre%20-%20RS%2C%2090030-141!5e0!3m2!1spt-BR!2sbr!4v1653702322756!5m2!1spt-BR!2sbr" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                        <p>
                            <strong>Sede Canônica:</strong> <br>
                            Av. Alberto Bins, 1020 - Floresta <br>
                            90030-141 - Porto Alegre - SP - Brasil
                        </p>
                    </div>

                    <div class="col-lg-6 my-3 my-lg-0">
                        <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3656.3070076020203!2d-46.615676185021506!3d-23.593320084667013!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94ce5bc1f83f13c1%3A0x5134f0705a0edb80!2sPia%20Sociedade%20Mission%C3%A1rios%20S%C3%A3o%20Carlos%20-%20Escalabrinianos!5e0!3m2!1spt-BR!2sbr!4v1653702274293!5m2!1spt-BR!2sbr" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                        <p>
                            <strong>Sede Administrativa:</strong> <br>
                            Rua Huet Bacelar, 657 - Ipiranga <br>
                            04275-000 - São Paulo - SP - Brasil
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
