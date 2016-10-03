<?php
/**
 *  The template for displaying archive.
 */
get_header();
?>
<?php the_archive_title( '<h1>', '</h1>' ); ?>
<?php if ( have_posts() ) : ?>
    <?php while ( have_posts() ) : the_post(); ?>
    <?php endwhile; ?>
<?php endif;
get_footer();