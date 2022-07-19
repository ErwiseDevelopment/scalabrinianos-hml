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

<section id="primary">
<main id="main" class="site-main" role="main">

<?php while ( have_posts() ) : the_post(); ?>

<!-- banner slide -->
<?php echo get_template_part( 'template-parts/content', 'banner-slide' ) ?>
<!-- end banner slide -->

<!-- quick access -->
<?php echo get_template_part( 'template-parts/content', 'quick-access' ) ?>
<!-- end quick access -->

<!-- disclosure -->
<?php echo get_template_part( 'template-parts/content', 'disclosure' ) ?>
<!-- end disclosure -->

<!-- news -->
<?php echo get_template_part( 'template-parts/content', 'news' ) ?>
<!-- end news -->

<!-- banner material -->
<?php echo get_template_part( 'template-parts/content', 'banner-material' ) ?>
<!-- end banner material -->

<!-- special content -->
<?php echo get_template_part( 'template-parts/content', 'special-content' ) ?>
<!-- end special content -->

<!-- gallery -->
<?php echo get_template_part( 'template-parts/content', 'gallery' ) ?>
<!-- end gallery -->

<!-- banners -->
<?php echo get_template_part( 'template-parts/content', 'banners' ) ?>
<!-- end banners -->



<!-- newsletter -->
<?php echo get_template_part( 'template-parts/content', 'newsletter' ) ?>
<!--  end newsletter -->

<?php endwhile; ?>

</main><!-- #main -->
</section><!-- #primary -->

<?php

get_footer();
