<section class="l-search py-5">

    <div class="container">

        <div class="row">

            <div class="col-12">

                <form method="GET" action="<?php echo get_home_url( null, '/' ) ?>">
                    <div class="row">

                        <div class="col-lg-6 mb-3 mb-md-4 mb-lg-0 pr-md-0">

                            <p class="l-search__text u-font-weight-bold u-color-folk-bright-orange mb-0">
                                O que você está procurando?
                            </p>

                            <div class="row">

                                <div class="col-8 pr-0">
                                    <input 
                                    class="l-search__field w-100 h-100 border-0 d-block u-font-weight-regular py-2 px-3" 
                                    type="search" 
                                    name="s"
                                    placeholder="Busca por palavra-chave">
                                    <!-- <input
                                    type="hidden"
                                    name="s"
                                    value=""> -->
                                </div>

                                <div class="col-4 pl-0">
                                    <input 
                                    class="l-search__submit w-100 border-0 d-block u-font-weight-bold text-center u-color-folk-white u-bg-folk-bright-orange hover:u-bg-folk-water-course py-2 px-3" 
                                    type="submit" 
                                    value="Pesquisar">
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 mb-3 mb-md-0 pr-md-0">
                            
                            <p class="l-search__text u-font-weight-bold u-color-folk-bright-orange mb-0">
                                Selecione uma categoria
                            </p>


                            <div class="l-search__select w-100 py-2 px-3 js-select-categories">
                                <div class="l-page-news__select__field js-category-current" data-value="categorias">
                                    Categorias
                                </div>

                                <div class="l-search__select__box">
                                    <?php
                                        $categories = get_categories();
        
                                        $terms = get_terms(
                                            array(
                                                'taxonomy'   => 'category',
                                                'hide_empty' => true,
                                                'parent'     => 10
                                            )
                                        );

                                        foreach($terms as $term) :
                                    ?>
                                        <div class="l-search__select__item py-2 px-3 js-categories">
                                            <?php echo $term->name; ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>