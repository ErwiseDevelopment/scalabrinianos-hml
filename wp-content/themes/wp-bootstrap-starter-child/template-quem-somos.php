<?php

/**
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package 
 *
 * Template Name: Modelo Conteúdo
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
                    src="<?php echo get_field( 'banner_paginas') ?>"
                    alt="">
        <h1 class="l-page-news__banner__title u-line-height-100 u-font-weight-bold text-center u-color-folk-white pb-sm-3">
                    <?php the_title() ?>
                </h1>
            </div>
        </div>
    </div>
</section>
<!-- end banner -->

<section class="my-5">

    <div class="container">

        <div class="row justify-content-end">

            <div class="col-12">

                <div class="row">

                    <div class="col-lg-5 pos <?php echo get_the_post_thumbnail() ? 'order-2 order-lg-1' : 'order-1'; ?>">

                        <?php
                            $child_pages = wp_list_pages( array(
                                'post_type'   => 'page',
                                'title_li'    => '',
                                'child_of'    => $post->post_parent,
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

                    <div class="col-lg-7 <?php echo get_the_post_thumbnail() ? 'order-1 order-lg-2' : 'order-2'; ?>">
                        <?php
                            $alt_title = get_the_title();

                            if( get_the_post_thumbnail() ) :
                                    the_post_thumbnail( 'post-thumbnail',
                                    array(
                                        'class' => 'img-fluid w-100 h-100 u-object-fit-cover',
                                        'alt'   => $alt_title
                                ));
                            else :
                                if( have_rows( 'conteudos' ) ) :
                                    while( have_rows( 'conteudos' ) ) : the_row();
                        ?>
                                        <div class="l-template-santos__item col-lg-11 mt-5">

                                            <h4 class="l-template-santos__prayer__title u-font-weight-bold text-center u-color-folk-cyan mb-4">
                                                <!-- A emigração italiana -->
                                                <?php echo get_sub_field( 'titulo' ) ?>
                                            </h4>

                                            <div class="mx-auto mb-4 u-bg-folk-night-rider"style="width:180px;height:10px"></div>

                                            <div class="row">

                                                <div class="col-12 my-2 my-lg-0">

                                                    <span class="d-bloc ku-font-size-14 xxl:u-font-size-18 u-font-weight-regular">
                                                        <?php echo get_sub_field( 'descricao' ) ?>
                                                    </span>
                                                </div>

                                                <div class="col-12 my-2 my-lg-0">

                                                    <div class="row">

                                                        <?php
                                                            if( have_rows( 'galeria' ) ) :
                                                                while( have_rows( 'galeria' ) ) : the_row();
                                                        ?>
                                                                    <div class="col-6">
                                                                        <img
                                                                        class="img-fluid my-2"
                                                                        src="<?php echo get_sub_field( 'foto' ) ?>"
                                                                        alt="<?php echo get_sub_field( 'titulo' ) ?>">
                                                                    </div>                            
                                                            <?php
                                                                endwhile;
                                                            endif;
                                                        ?>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                        <?php
                                    endwhile;
                                endif;
                            endif;
                        ?>
                    </div>
                </div>
            </div>

            <!-- loop -->
            <?php
                if( get_the_post_thumbnail() ) :
                    if( have_rows( 'conteudos' ) ) :
                        while( have_rows( 'conteudos' ) ) : the_row();
            ?>
                            <div class="l-template-santos__item col-lg-11 mt-5">

                                <h4 class="l-template-santos__prayer__title u-font-weight-bold text-center u-color-folk-cyan mb-4">
                                    <!-- A emigração italiana -->
                                    <?php echo get_sub_field( 'titulo' ) ?>
                                </h4>

                                <div class="mx-auto mb-4 u-bg-folk-night-rider"style="width:180px;height:10px"></div>

                                <div class="row">

                                    <div class="l-template-santos__col-child col-lg-3 my-2 my-lg-0">

                                        <div class="row">

                                            <?php
                                                if( have_rows( 'galeria' ) ) :
                                                    while( have_rows( 'galeria' ) ) : the_row();
                                            ?>
                                                        <div class="col-6 col-lg-12">
                                                            <img
                                                            class="img-fluid my-2"
                                                            src="<?php echo get_sub_field( 'foto' ) ?>"
                                                            alt="<?php echo get_sub_field( 'titulo' ) ?>">
                                                        </div>                            
                                                <?php
                                                    endwhile;
                                                endif;
                                            ?>
                                        </div>
                                    </div>

                                    <div class="l-template-santos__col-child col-lg-9 my-2 my-lg-0">

                                        <span class="d-bloc ku-font-size-14 xxl:u-font-size-18 u-font-weight-regular">
                                            <?php echo get_sub_field( 'descricao' ) ?>
                                        </span>

                                        <!-- <p class="u-font-size-14 xxl:u-font-size-18 u-font-weight-regular">
                                            A história da Congregação dos Missionários de São Carlos está intimamente ligada ao drama da mobilidade humana ocorrida no século XIX na Europa. Como todo carisma eclesial, a Congregação surgiu como uma resposta dada a uma situação específica. Dom João Batista Scalabrini era bispo de Placência, toda a sua diocese, toda a Itália e grande parte da Europa encontravam-se em movimento. As causas são variadas e complexas. O fato é que em cem anos, desde 1820 a 1920, mais de sessenta milhões de pessoas deixaram a Europa para procurar um outro lugar que lhes proporcionasse uma vida melhor do que a própria terra lhes oferecia.
                                            Entre as prováveis causas do êxodo humano europeu está a necessidade de abandonar o campo e migrar para as cidades, fato ocorrido com a Revolução Industrial e com as invenções das máquinas a vapor. Criaram-se empregos nas cidades, nas imensas fábricas. Encurtaram-se distâncias com os barcos e os trens a vapor. Violências, opções políticas equivocadas, desastres naturais, provocaram o empobrecimento e a consequente migração. 
                                            Assim estamos numa época em que milhares de italianos procuram o modo de deixar suas terras e o fazem essencialmente com esses dois símbolos da Revolução Industrial: o trem e o barco a vapor. As estações e os portos estão abarrotados de pessoas desesperadas que entendem a migração como único caminho de salvação. Roubar ou migrar era o dilema que milhares de pessoas encontravam.

                                            <br><br>

                                            É conhecida a cena paradigmática da estação de Milão, por onde passou o bispo de Placência, Dom Scalabrini, que seu olhar sensível registrou e cuja dor feriu o seu coração paterno. Assim ele mesmo narra o fato: “Passando pela estação, vi a vasta sala, os pórticos laterais e a praça adjacente invadidos por trezentos ou quatrocentos indivíduos, vestidos pobremente, divididos em diversos grupos. Nos seus rostos bronzeados pelo sol, marcados por rugas precoces que a privação costuma imprimir, apareciam o tumulto dos afetos que agitavam seus corações naquele momento, eram velhos curvados pela idade e pelas fadigas, homens na flor da virilidade, mulheres que levavam após si ou carregavam ao colo suas crianças…eram migrantes”. 
                                            Boa parte dos italianos emigraram para os Estados Unidos, a Austrália, a Argentina, o Brasil, entre outros países. Nestas terras desconhecidas, enfrentaram as mais diversas dificuldades, onde a carência de tudo é uma característica comum. Desmataram e criaram terras férteis para as plantações no Rio Grande do Sul, foram cafeeiros nas Fazendas de São Paulo e de Minas Gerais, construíram cidades com a constância da saudade e da falta da terra mãe. 
                                            O coração do bom bispo Scalabrini sofria com o drama de seus compatriotas: “Ecoa dentro de mim dolorosamente, até agora, a voz de um pobre camponês lombardo, vindo a Placência há dois anos, do extremo vale do Tibagi no Brasil, para me pedir, em nome da numerosa colônia, um Missionário. “Ah, Padre, dizia-me, com voz comovida, se soubesse quanto temos sofrido! quanto temos chorado, junto ao leito de nossos caros moribundos, que nos pediam consternados um padre..., e não poder tê-lo. Oh Deus, nós não, não podemos mais viver, não podemos mais viver assim”. E o pobrezinho continuava, com rude, mas eloquente linguagem, a narrar-me cenas verdadeiramente dolorosas. Eu confesso: nunca, como naquele momento desejei o vigor dos meus vinte anos, nunca lamentei, como então, a impossibilidade de trocar a cruz de ouro do Bispo por aquela de madeira do missionário para voar em auxílio daqueles infelizes, verdadeiramente infelizes, porque aos outros perigos para eles, se acrescenta o de cair no abismo do desespero” (João Batista Scalabrini, A migração dos operários italianos, 1889).
                                        </p> -->
                                    </div>
                                </div>
                            </div>
            <?php
                        endwhile;
                    endif;
                endif;
            ?>
            <!-- end loop -->
        </div>

        <div class="row justify-content-center">

            <div class="col-lg-4 my-3">
                <?php if( get_field( 'botao' ) && get_field( 'link_do_botao' ) ) : ?>
                    <a
                    class="w-100 rounded d-block u-font-size-14 md:u-font-size-18 u-font-weight-bold text-center text-decoration-none u-color-folk-white u-bg-folk-cyan hover:u-bg-folk-bright-orange py-3"
                    href="<?php echo get_field( 'link_do_botao' ) ?>">
                        <!-- Conheça a história de Scalabrini -->
                        <?php echo get_field( 'botao' ) ?>
                    </a>
                <?php endif; ?>
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
                                            ));
                                        ?>

                                        <div class="l-single__other-post__box px-3 pb-3">
                                            <p class="u-font-size-12 u-font-weight-semibold u-color-folk-bright-orange mb-0">
                                                <!-- 20 de Janeiro de 2022 -->
                                                <?php echo get_date_format( get_the_date( 'd/m/Y', get_the_ID() ) ) ?>
                                            </p>

                                            <h4 class="u-font-size-20 u-font-weight-bold u-color-folk-light-gray">
<!--                                                 A nova missão Scalabriniana 
                                                em Algeciras -->
												<?php the_title() ?>
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
