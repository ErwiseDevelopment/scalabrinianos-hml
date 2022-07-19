<?php

/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 
 *
 * Template Name: Modelo Santos Scalabrinianos
 * Template Post Type: page
 */

get_header();
?>

<div id="primary">
<main id="main">

<?php if (have_posts()) : while (have_posts()) : the_post(); ?>

<!-- banner -->
<section class="l-page-news__banner">

    <div class="container-fluid">

        <div class="row">
            <!-- Alteraçao feita por raphael 31/05 -->
            <div class="col-12 px-0">
                
                    <img
                    class="img-fluid"
                    src="<?php echo get_field( 'banner_santos' ) ?>"
                    alt="<?php the_title()?>">
                <h1 class="l-page-news__banner__title u-line-height-100 u-font-weight-bold text-center u-color-folk-white pb-sm-3">
                    Santos <br>
                    Scalabrinianos
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- end banner -->

<section class="my-5">

    <div class="container">

        <div class="row justify-content-center">

            <div class="col-12">

                <div class="row">

                    <div class="col-lg-5 order-2 order-lg-1">

                        <?php
                            $id = 171;

                            $child_pages = wp_list_pages( array(
                                'post_type'   => 'page',
                                'title_li'    => '',
                                'child_of'    => $id,
                                'sort_column' => 'menu_order', //campo alterado por raphael
                                'echo'        => 0
                            ));
                        ?>

                        <ul class="l-template-santos__list-page pl-0 js-pages">
                            <!-- loop -->
                            <?php echo $child_pages; ?>
                            <!-- end loop -->
                        </ul>
                    </div>

                    <div class="col-lg-7 order-1 order-lg-2">
                        <!-- <img
                        class="img-fluid w-100 h-100 u-object-fit-cover"
                        src="<php echo get_template_directory_uri()?>/../wp-bootstrap-starter-child/assets/images/santos-scalabrinianos.png"
                        alt=""> -->

                        <?php
                            $alt_title = get_the_title();

                            the_post_thumbnail( 'post-thumbnail',
                                array(
                                    'class' => 'img-fluid w-100 h-100 u-object-fit-cover',
                                    'alt'   => $alt_title
                            ));
                        ?>
                    </div>
                </div>
            </div>

            <div class="col-12 mt-5">
                
                <h2 class="l-template-santos__title position-relative u-font-weight-bold text-center u-color-folk-dark-cyan mb-5 pb-3">
                    <!-- São Carlos Borromeu -->
                    <?php the_title() ?>
                </h2>
                        
                <span class="d-block u-font-size-14 xxl:u-font-size-22 u-font-weight-regular">
                    <?php the_content() ?>
                </span>

                <!-- <p class="u-font-size-14 xxl:u-font-size-22 u-font-weight-regular">
                    Dom João Batista Scalabrini desejava o exemplo e o amparo de um protetor para a obra recém iniciada em favor dos migrantes. Ninguém melhor do que uma pessoa da sua região, cuja fama de santidade irradiava toda a Itália: São Carlos Borromeu. Era conhecida a sua dedicação aos pobres, a sua humildade, a sua dedicação como pastor em sua Diocese e, particularmente, a sua atuação durante a peste que assolou e vitimou milhares em Milão. 

                    <br><br>

                    O bispo fundador, Scalabrini, após uma longa oração para decidir sobre o santo padroeiro de seus missionários, concluiu sua oração dizendo: “São Carlos! Exemplo de constância, paciência generosa, ardente caridade, iluminado zelo, indefectível, magnânimo. Virtudes essas que tornam o homem um verdadeiro apóstolo de Jesus Cristo. São Carlos! Foi um homem profundamente evangelizador, reformador e missionário, testemunhando com a sua vida e irradiando com seu trabalho a esperança de que só no Evangelho encontramos a luz e o sentido para nossas vidas. São Carlos era um daqueles homens de ação que não hesitam, não se dividem, jamais retrocedem; que põem em cada ação toda a força da própria convicção, toda a energia da própria vontade, toda integridade do próprio caráter, todo o próprio ser e triunfam. São Carlos! Esse é um nome que o missionário católico jamais deveria ouvir sem sentir-se inflamado pelo mais nobre, pelo mais vivo entusiasmo, sem sentir-se profundamente comovido. Mais do que uma glória da Lombardia, é uma glória da Igreja; mais do que um luminar da Itália é um luminar do mundo; mais do que o decoro de um século, é o decoro de todas as idades e de todos os séculos. Diletíssimos, espelhai-vos nele, recomendai-vos a ele, depositai nele toda vossa confiança, e ficai certos de sua proteção”.
                    
                    <br><br>

                    Carlos Borromeu nasceu em Arona, Itália, em 2 de outubro de 1538, numa família da nobreza italiana. Seu tio foi o Papa Pio IV, com quem trabalhou em Roma. No entanto, a experiência da morte de um irmão e de um amigo, levou-o a perceber a vida com outros olhos, de modo que nem o poder, nem a carreira tinham sentido para ele. Optou pela vida simples de sacerdote, que era o seu modo de se entregar ao povo e, em particular, aos mais necessitados. Foi ordenado sacerdote em 1562. Foi nomeado Arcebispo de Milão. Implantou na arquidiocese as reformas emanadas pelo Concílio de Trento. Nos anos de 1569 e 1570, a fome e uma epidemia, semelhante à peste, se espalharam pela cidade de Milão. Como não tinha mais o que dar aos pobres, ele próprio pedia esmolas para eles. Em outubro de 1584, mesmo doente, retirou-se para fazer os exercícios espirituais. “Um bom pastor de almas deve saber suportar três febres, antes de se meter na cama”, afirmava. No entanto, não se tratava de uma simples febre, pois aos 03 de novembro de 1584 expirou com apenas 46 anos. Suas últimas palavras foram: “Eis Senhor, eu venho, vou já”. Foi beatificado em 1602, por Clemente VIII e, depois, canonizado em 1610, por Paulo V, que fixou a festa do santo para o dia 4 de novembro. 

                    <br><br>

                    A grande influência de São Carlos Borromeu, pelo que realizou em Milão, serviu de exemplo para que a reforma da Igreja acontecesse em muitos outros países, segundo o espírito do Concílio de Trento.

                    <br><br>

                    Eis o perfil sintético do Padroeiro dos missionários e missionárias scalabrinianos: uma pessoa de fé; renovador da Igreja (“é preciso renovar para renovar-se”, como afirmava); propulsor de seminários para a formação do clero; reformador litúrgico; preocupado com os leigos; pastor e acolhedor dos pobres; apóstolo da caridade, em especial dos doentes atacados pela peste. 
                            
                    <br><br>

                    Humilitas (humildade) era o lema da vida de São Carlos, que João Batista Scalabrini adotou como seu e que deixou como herança a todos os missionários, missionárias e a todas as pessoas que comungam com o carisma scalabriniano. 
                </p> -->
            </div>
        </div>
    </div>
</section>

<section 
class="l-template-santos__prayer py-5"
style="background-image: url(<?php echo get_field( 'fundo_oracao' ) ?>)">

    <div class="container">

        <div class="row justify-content-center">
            
            <div class="col-lg-9 my-5">

               <!--  <h4 class="l-template-santos__prayer__title u-font-weight-bold text-center u-color-folk-bright-orange mb-4">
                    Oração a São Carlos Borromeo
                </h4> -->
                
                <span class="l-template-santos__prayer__description d-block u-font-weight-semibold text-center u-color-folk-white">
                    <?php echo get_field( 'oracao' ) ?>
                </span>

                <!-- <p class="l-template-santos__prayer__description u-font-weight-semibold text-center u-color-folk-white">
                    Deus, Pai de misericórdia, 
                    nós te adoramos, te louvamos e agradecemos ao 
                    recordar São Carlos.
                    Permitiste-lhe contemplar intensamente o amor de teu Filho crucificado. 
                    
                    <br><br>

                    Tu sustentaste nele a oração e o jejum com a 
                    consolação do Espírito
                    e acendeste em seu coração a chama da caridade imensa.
                    
                    <br><br>

                    Tu o fizeste amigo dos pobres e dos doentes, lhe deste a coragem contra toda a injustiça, tornaste-o forte nos sofrimentos e nas provas.

                    <br><br>

                    Suplicamos-te, ó Pai, pela intercessão do nosso santo Patrono, 
                    guia os migrantes pelas estradas do mundo, 
                    suscita novas vocações para as famílias 
                    scalabrinianas,
                    acende em nosso coração a chama da fé, do amor e fortalece nossa esperança 
                    de contemplar a face de teu Filho, junto com Maria, nossa Mãe, e com todos os Santos. 

                    <br><br>

                    Amém.
                </p> -->
            </div>
        </div>  
    </div>
</section>

<section class="my-4">

    <div class="container">

        <div class="row">

            <div class="col-12">
                
                <h4 class="l-template-santos__subtitle u-font-weight-bold text-center u-color-folk-tamarillo mb-4">
                    Notícias recentes
                </h4>

                <div class="row">
                        
                    <!-- loop -->
                    <?php
                        $args = array(
                            'posts_per_page' => 3,
                            'post_type'      => 'post',
                            'category'       => 'noticia',
                            'order'          => 'DESC'
                        );

                        $news = new WP_Query( $args );

                        if( $news->have_posts() ) :
                            while( $news->have_posts() ) : $news->the_post();
                    ?>
                                <div class="col-md-4 my-2">

                                    <a 
                                    class="l-single__other-post__link d-block text-decoration-none position-relative"
                                    href="#">
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
                                            ));
                                        ?>

                                        <div class="l-single__other-post__box px-3 pb-3">
                                            <p class="u-font-size-12 u-font-weight-semibold u-color-folk-bright-orange mb-0">
                                                <!-- 20 de Janeiro de 2022 -->
                                                <?php echo get_date_format( get_the_date( 'd/m/Y', get_the_ID() ) ) ?>
                                            </p>

                                            <h4 class="u-font-size-20 u-font-weight-bold u-color-folk-light-gray">
                                                A nova missão Scalabriniana 
                                                em Algeciras
                                            </h4>
                                        </div>
                                    </a>
                                </div>
                    <?php
                            endwhile;
                        endif;

                        wp_reset_query();
                    ?>
                    <!-- end loop -->
                </div>

                <div class="row justify-content-center">

                    <div class="col-8 col-md-4 my-3">
                        
                        <a
                        class="w-100 rounded d-block u-font-size-18 u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-bright-orange hover:u-bg-folk-cyan py-3"
                        href="<?php echo get_home_url( null, 'noticias' ) ?>">
                            Todas as notícias
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- newsletter -->
<?php echo get_template_part( 'template-parts/content', 'newsletter' ) ?>
<!--  end newsletter -->

<?php endwhile; endif; ?>

</main><!-- #main -->
</div><!-- #primary -->

<?php
get_footer();
?>
