(function() {
    if( document.querySelector( '.js-select-categories ') ) {
        const selectCategories = document.querySelector( '.js-select-categories ')
        const categories = document.getElementsByClassName( 'js-categories' )
        const categoryCurrent = document.querySelector( '.js-category-current' )

        console.log(categoryCurrent)

        selectCategories.addEventListener( 'click', function() {
            this.classList.add( 'is-active' )
        })

        for( const i of categories ) {
            i.addEventListener( 'click', function() {
                document.querySelector( 'input[name="categoria"]').value = this.innerText
                categoryCurrent.innerText = this.innerText
            })
        }
    }
})()