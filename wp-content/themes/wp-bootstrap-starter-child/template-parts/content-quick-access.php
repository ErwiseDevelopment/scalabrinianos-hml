<section class="l-quick-acess py-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-md-10 px-4 px-md-3">

                <h2 class="c-title c-title--center position-relative u-font-weight-bold text-center u-color-folk-moccaccino mb-5 pb-1"> 
                    Acesso rápido
                </h2>

                <div class="row justify-content-between">

                    <?php if( get_field( 'imigrantes', 'option' ) ) : ?>
                        <a 
                        class="l-quick-access__item migrantes d-flex flex-column justify-content-center align-items-center text-decoration-none my-3 my-lg-0 px-3 px-lg-1"
                        href="<?php echo get_field( 'imigrantes', 'option' ) ?>">
                            <img 
                            class="l-quick-access__icon"
                            src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-migrantes-white.png"
                            alt="Migrantes">

                            <img 
                            class="l-quick-access__icon--white"
                            src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-migrantes.png"
                            alt="Migrantes">

                            <span class="u-font-size-12 u-font-weight-extrabold text-center text-uppercase pt-3">
                                migrantes
                            </span>
                        </a>
                    <?php endif; ?>
                    
                    <?php if( get_field( 'paroquias', 'option' ) ) : ?>
                        <a 
                        class="l-quick-access__item paroquias d-flex flex-column justify-content-center align-items-center text-decoration-none my-3 my-lg-0 px-3 px-lg-1"
                        href="<?php echo get_field( 'paroquias', 'option' ) ?>">
                            <img 
                            class="l-quick-access__icon"
                            src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-paroquias-white.png"
                            alt="Paróquias">

                            <img 
                            class="l-quick-access__icon--white"
                            src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-paroquias.png"
                            alt="Paróquias">

                            <span class="u-font-size-12 u-font-weight-extrabold text-center text-uppercase pt-3">
                                paróquias
                            </span>
                        </a>
                    <?php endif; ?>
                    
                    <?php if( get_field( 'apostolado_do_mar', 'option' ) ) : ?>
                        <a 
                        class="l-quick-access__item apostolado d-flex flex-column justify-content-center align-items-center text-decoration-none my-3 my-lg-0 px-3 px-lg-1"
                        href="<?php echo get_field( 'apostolado_do_mar', 'option' ) ?>">
                            <img 
                            class="l-quick-access__icon"
                            src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-apostolado-white.png"
                            alt="Apostolado do Mar">

                            <img 
                            class="l-quick-access__icon--white"
                            src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-apostolado.png"
                            alt="Apostolado do Mar">

                            <span class="u-font-size-12 u-font-weight-extrabold text-center text-uppercase pt-3">
                                apostolado do mar
                            </span>
                        </a>
                    <?php endif; ?>
                    
                    <?php if( get_field( 'publicacoes', 'option' ) ) : ?>
                        <a 
                        class="l-quick-access__item publicacoes d-flex flex-column justify-content-center align-items-center text-decoration-none my-3 my-lg-0 px-3 px-lg-1"
                        href="<?php echo get_field( 'publicacoes', 'option' ) ?>">
                            <img 
                            class="l-quick-access__icon"
                            src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-publicacoes-white.png"
                            alt="Publicações">

                            <img 
                            class="l-quick-access__icon--white"
                            src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-publicacoes.png"
                            alt="Publicações">

                            <span class="u-font-size-12 u-font-weight-extrabold text-center text-uppercase pt-3">
                                publicações
                            </span>
                        </a>
                    <?php endif; ?>
                    
                    <?php if( get_field( 'santos_scalabrinianos', 'option' ) ) : ?>
                        <a 
                        class="l-quick-access__item santos d-flex flex-column justify-content-center align-items-center text-decoration-none my-3 my-lg-0 px-3 px-lg-1"
                        href="<?php echo get_field( 'santos_scalabrinianos', 'option' ) ?>">
                            <img 
                            class="l-quick-access__icon"
                            src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-santos-white.png"
                            alt="Santos Scalabrinianos">

                            <img 
                            class="l-quick-access__icon--white"
                            src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-santos.png"
                            alt="Santos Scalabrinianos">

                            <span class="u-font-size-12 u-font-weight-extrabold text-center text-uppercase pt-3">
                                santos scalabrinianos
                            </span>
                        </a>
                    <?php endif; ?>
                    
                    <?php if( get_field( 'vocacao_e_carisma', 'option' ) ) : ?>
                        <a 
                        class="l-quick-access__item vocacao d-flex flex-column justify-content-center align-items-center text-decoration-none my-3 my-lg-0 px-3 px-lg-1"
                        href="<?php echo get_field( 'vocacao_e_carisma', 'option' ) ?>">
                            <img 
                            class="l-quick-access__icon"
                            src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-vocacao-white.png"
                            alt="Vocação e Carisma">

                            <img 
                            class="l-quick-access__icon--white"
                            src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/icon-vocacao.png"
                            alt="Vocação e Carisma">

                            <span class="u-font-size-12 u-font-weight-extrabold text-center text-uppercase pt-3">
                                vocação e carisma
                            </span>
                        </a>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>