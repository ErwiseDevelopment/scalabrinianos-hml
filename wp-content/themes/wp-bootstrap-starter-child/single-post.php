<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package WP_Bootstrap_Starter
 */

get_header(); ?>

<section id="primary" class="content-area">
<div id="main" class="site-main" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<?php
	$post_current_id = get_the_ID();
?>
<!-- banner -->
<section class="l-page-news__banner">

    <div class="container-fluid">

        <div class="row">

            <div class="col-12 px-0">
                <img
                class="img-fluid"
                src="<?php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/single-background.png"
                alt="Banner Notícias">

                <h1 class="l-page-news__banner__title u-font-weight-bold text-center u-color-folk-white pb-3">
					<?php
						$cats = array();

						$post_categories = array(
							'noticias',
							'blog'
						);

						foreach (get_the_category( get_the_ID() ) as $c) {
							$cat = get_category($c);
							array_push($cats, $cat);
						}

						foreach( $cats as $cat ) {
							foreach( $post_categories as $category ) {
								if( $category == $cat->slug ) {
									echo $cat->name;
									break;
								}
							}
						}
					?>
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- end banner -->

<!-- post -->
<section class="my-5 py-4">

	<div class="container">

		<div class="row">

			<div class="col-12">

				<div class="row">

					<div class="col-lg-8">

						<?php
							$alt_title = get_the_title();

							the_post_thumbnail(
								'post-thumbnail',
								array(
									'class' => 'img-fluid w-100',
									'alt'   => $alt_title
								)
							);
						?>

						<div class="d-flex mt-3">

							<p class="u-font-size-14 u-font-weight-medium u-color-folk-persian-plum mr-4">
								<!-- Camila de Andrade Moura -->
								<?php echo get_the_author_meta( 'user_firstname', $user_id ) . ' ' . get_the_author_meta( 'user_lastname', $user_id ); ?>
							</p>

							<p class="u-font-size-14 u-font-weight-medium u-color-folk-persian-plum">
								<i class="fa-solid fa-calendar u-color-folk-bright-orange"></i>
								<?php echo get_date_format( get_the_date( 'd/m/Y', $post ) ) ?>
								<!-- 01 de Abril de 2022 -->
							</p>
						</div>

						<div class="d-flex">

							<?php
								$cats = array();
								$count = 0;

								foreach (get_the_category( get_the_ID() ) as $c) {
									$cat = get_category($c);
									array_push($cats, $cat);
								}

								foreach( $cats as $cat ) :
									$count++;
							?>
									<p class="u-line-height-100 u-border-1 u-border-color-persian-plum rounded u-font-size-12 u-font-weight-bold u-color-folk-persian-plum mr-3 py-1 px-3">
										<?php echo $cat->name; ?>	
									</p>
							<?php 
									if( $count == 2 )
										break;
								endforeach; 
							?>
							<!-- <p class="u-line-height-100 u-border-1 u-border-color-persian-plum rounded u-font-size-12 u-font-weight-bold u-color-folk-persian-plum mr-3 py-1 px-3">
								Categoria 01
							</p>

							<p class="u-line-height-100 u-border-1 u-border-color-persian-plum rounded u-font-size-12 u-font-weight-bold u-color-folk-persian-plum py-1 px-3">
								Categoria 02
							</p> -->
						</div>

						<h1 class="l-single__title u-font-weight-bold u-color-folk-cyan mb-4">
							<!-- Inaugurado o Departamento de
							Comunicação dos Scalabrinianos
							na América do Sul -->

							<?php the_title() ?>
						</h1>

						<p class="l-single__text-highlight u-font-weight-regular u-color-folk-cyan mb-4">
							<!-- O órgão tem por função institucionalizar e gerir os diversos meios de comunicação da Congregação nos países da Região, além de estabelecer novos processos e qualificar os já existentes. -->
							<?php echo get_field( 'texto_destacado' ) ?>
						</p>


						<div class="my-5" style="width:190px;height:10px;background-color:#303336"></div>
						
						<span class="d-block u-font-size-15 u-font-weight-regular mt-4">
							<?php the_content() ?>
						</span>

						<!-- <p class="u-font-size-15 u-font-weight-regular mt-4">
							Na sexta-feira, 25, ocorreu a inauguração do Departamento Regional de Comunicação da Congregação dos Missionários de São Carlos (Scalabrinianos), na Região Nossa Senhora Mãe dos Migrantes, que congrega sete países da América do Sul: Argentina, Bolívia, Brasil, Chile, Paraguai, Peru e Uruguai.

							<br> <br>

							O evento contou com a presença do padre Algacir Munhak, CS, Superior Regional dos Scalabrinianos, que comentou sobre os objetivos da comunicação nessa Região e sobre os trabalhos do Departamento Regional. Também participaram o padre Evandro Antônio Cavalli, CS, Diretor Regional de Comunicação; o padre José Edvaldo Pereira da Silva, CS, Diretor do Instituto Cristóvão Colombo; e demais padres, colaboradores e convidados.

							<br> <br>

							Logo após o discurso do Superior Regional da Congregação, o bispo auxiliar da Arquidiocese de São Paulo, dom Ângelo Ademir Mezzari, RCJ, abençoou a sala do Departamento Regional de Comunicação.

							<br> <br>

							Francisco David Rodrigues, gerente do Departamento Regional de Comunicação, explica que o órgão que está sob sua responsabilidade tem por função institucionalizar e gerir os diversos meios de comunicação da Congregação nos países da Região, além de estabelecer novos processos e qualificar os já existentes.
						</p>

						<p class="u-font-weight-bold">
							Foto: Camila de Andrade Moura	
						</p> -->
						
						<div class="row">	

							<div class="col-12 mt-5 pt-5">

								<div class="row">

									<?php 
										if( have_rows( 'galeria' ) ) :
											while( have_rows( 'galeria' ) ) : the_row();
									?>
												<div class="col-4">
													<img 
													class="img-fluid w-100" 
													src="<?php echo get_sub_field( 'foto' ) ?>"
													alt="<?php the_title() ?>">
												</div>
									<?php 
											endwhile;
										endif;
									?>
								</div>
							</div>
						</div>
					</div>

					<div class="col-lg-4">

						<h3 class="l-single__subtitle u-font-weight-bold u-color-folk-cyan">
							Confira mais!
						</h3>

						<div class="mb-2" style="width:190px;height:10px;background-color:#303336"></div>

						<div class="row">

							<!-- loop -->
							<?php
								$args = array(
									'posts_per_page' => 3,
									'post_type'      => 'post',
									'category_name'  => $cat->slug,
									'order'          => 'DESC'
								);

								$news = new WP_Query( $args );

								if( $news->have_posts() ) :
									while( $news->have_posts() ) : $news->the_post();
										if( $post_current_id != get_the_ID() ) :
							?>
											<div class="col-12 my-2">

												<a 
												class="l-single__other-post__link d-block text-decoration-none position-relative"
												href="<?php the_permalink() ?>">
													<!-- <img
													class="img-fluid"
													src="http://scalabrinianos.test/wp-content/uploads/2022/05/thumbnail.png"
													alt=""> -->

													<?php 
														$alt_title = get_the_title();

														the_post_thumbnail( 'post-thumbnail',
															array(
																'class' => 'img-fluid w-100 h-100 u-object-fit-cover',
																'alt'   => $alt_title
														))
													?>

													<div class="l-single__other-post__box px-3 pb-3">
														<p class="u-font-size-12 u-font-weight-semibold u-color-folk-bright-orange mb-0">
															<!-- 20 de Janeiro de 2022 -->
															<?php echo get_date_format( get_the_date( 'd/m/Y', $post ) ) ?>
														</p>

														<h4 class="u-font-size-20 u-font-weight-bold u-color-folk-light-gray">
															<!-- A nova missão Scalabriniana 
															em Algeciras -->

															<?php the_title() ?>
														</h4>
													</div>
												</a>
											</div>
							<?php
										endif;
									endwhile;
								endif;

								wp_reset_query();
							?>
							<!-- end loop -->
						</div>

						<div class="row justify-content-end">

							<div class="col-4 mt-3">
								<a 
								class="w-full d-block u-font-size-16 u-font-weight-semibold text-center text-decoration-none u-color-folk-white hover:u-color-folk-bright-orange hover:u-color-folk-white u-bg-folk-bright-orange hover:u-bg-folk-water-course py-2" 
								href="<?php echo $cat->slug == 'noticias' ? get_home_url( null, 'noticias' ) : get_home_url( null, 'blog' ) ?>">
									Veja mais
								</a>
							</div>
						</div>
						<!-- adicionado dinamico -->
                        <a   href = "<?php echo get_field('link_anuncio', 'option') ?>">
							<img
							class="img-fluid mt-4"
							src="<?php echo get_field( 'banner_anuncio', 'option' ) ?>"
							alt="Banner de anúncio">
						</a>
						<!-- fim -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
<!-- end post -->

<?php endwhile; ?>

</div><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
