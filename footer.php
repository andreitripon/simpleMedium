<?php
/**
 * The template for displaying the footer
 */
?>

<footer class="main-footer">
    <div class="container">
        <div class="row footer-menu">
            <?php
            if( has_nav_menu( 'footer_main' ) ) {

                wp_nav_menu(
                    array(
                        'theme_location' => 'footer_main',
                        'container' => false,
                    )
                );
            }
            ?>
        </div>
        <div class="row copyright">
            <?php echo get_theme_mod( 'sm_copyright' ); ?>
        </div>
    </div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
