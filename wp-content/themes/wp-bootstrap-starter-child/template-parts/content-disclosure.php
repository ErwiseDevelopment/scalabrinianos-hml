<section class="my-5">

    <div class="container-fluid">

        <div class="row">

            <div class="col-12">

                <div class="row justify-content-center justify-content-lg-end">

                    <div class="col-6 col-lg-4 d-flex justify-content-center align-items-center">

                        <a 
                        href="<?php echo get_field( 'link_imagem_agenda', 'option' ) ?>"
                        target="_blank"
                        rel="noreferrer noopener">
                            <img
                            class="img-fluid"
                            src="<?php echo get_field( 'imagem_agenda', 'option' ) ?>"
                            alt="<?php the_title() ?>">
                        </a>
                    </div>

                    <div class="col-lg-6 d-flex justify-content-center align-items-center c-bg-calendar py-5">
						
                          <div class="col-lg-10" style= "padding-top: 5x">

                            <h2 class="c-title position-relative d-inline-block u-font-weight-bold u-color-folk-white mb-5 pb-1">
								Agenda regional    
                            </h2>
							  
							  <iframe class="w-100" src="https://calendar.google.com/calendar/embed?height=400&wkst=1&bgcolor=%23ffffff&ctz=America%2FSao_Paulo&showTitle=0&showNav=0&showPrint=0&showTabs=0&showCalendars=0&showTz=0&mode=MONTH&src=ZmFsZWNvbm9zY29Ac2NhbGFicmluaWFub3MuY29t&color=%23039BE5" style="border:solid 1px #777" height="400" frameborder="0" scrolling="no"></iframe>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>