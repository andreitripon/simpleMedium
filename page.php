<?php
/**
 * The template for displaying all pages.
 */
get_header();

if ( have_posts() ) :
    while ( have_posts() ) : the_post(); ?>

        <?php
    endwhile;
endif;
get_footer();