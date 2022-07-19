<section class="my-5 py-5">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <div class="row">

                    <div class="col-lg-4">

                        <a 
                        class="l-box-banner__box d-flex flex-column justify-content-center align-items-center u-font-weight-bold text-center text-decoration-none u-color-folk-white mb-2"
						style="background-image:url(<?php echo get_field( 'banner_esquerdo_cima', 'option' ) ?>)"
                        href="<?php echo get_field( 'card_destaque2', 'option' ) ?>">
                            <span class="l-box-banner__box__title u-line-height-100 d-block">
<!--                                 Baixe <br>
                                materiais <br>
                                exclusivos -->
								
								<?php echo get_field( 'texto_card_destaque', 'option' ) ?>
                            </span>

                            <div class="row w-100 justify-content-center">

                                <div class="col-6">
                                    <p class="rounded-lg u-font-size-12 u-font-weight-extrabold u-color-folk-white u-bg-folk-bright-orange py-2">
<!--                                         Acessar -->
										<?php echo get_field( 'botao_card_destaque', 'option' ) ?>
                                    </p>
                                </div>
                            </div>
                        </a>

                        <a 
                        class="l-box-banner__box d-flex flex-column justify-content-center align-items-center u-font-weight-bold text-center text-decoration-none u-color-folk-white mb-2 mb-lg-0 mt-2"
						style="background-image:url(<?php echo get_field( 'banner_esquerdo_baixo', 'option' ) ?>)"
                        href="<?php echo get_field( 'card_destaque', 'option' ) ?>">
                            <span class="l-box-banner__box__title u-line-height-100 d-block">
<!--                                 Baixe <br>
                                materiais <br>
                                exclusivos -->
								
								<?php echo get_field( 'texto_card_destaque_2', 'option' ) ?>
                            </span>

                            <div class="row w-100 justify-content-center">

                                <div class="col-6">
                                    <p class="rounded-lg u-font-size-12 u-font-weight-extrabold u-color-folk-white u-bg-folk-bright-orange py-2">
<!--                                         Acessar -->
										<?php echo get_field( 'botao_card_destaque_2', 'option' ) ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-lg-8">

                        <a 
                        class="l-box-banner__box--highlight w-100 d-flex flex-column justify-content-center align-items-center text-decoration-none c-bgi-complete" 
                        style="background-image:url(<?php echo get_field( 'banner_direito_cima', 'option' ) ?>)"
                        href="<?php echo get_field( 'card_destaque_direito', 'option' ) ?>">
                            <span class="l-box-banner__box__title--highlight u-line-height-100 d-block u-font-weight-bold text-center u-color-folk-white">
<!--                                 Seja um <br>
                                Scalabriniano! -->
								<?php echo get_field( 'texto_card_destaque_direito', 'option' ) ?>
                            </span>

                            <div class="row w-100 justify-content-center">

                                <div class="col-6">
                                    <p class="rounded-lg u-font-size-22 u-font-weight-extrabold text-center u-color-folk-white u-bg-folk-bright-orange py-2">
<!--                                         Acessar -->
										<?php echo get_field( 'botao_card_destaque_direito', 'option' ) ?>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>