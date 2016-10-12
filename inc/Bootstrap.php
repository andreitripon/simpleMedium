<?php
namespace  simpleMediumCore;

/**
 * The setup theme class.
 *
 * This is used to define public-facing site hooks and multiple methods.
 *
 * @package WordPress
 * @subpackage simpleMedium
 * @since 1.0
 * @author Andrei Tripon <contact@andreitripon.ro>
 */
class Bootstrap{
    /**
     * Define the core functionality of the theme.
     *
     * @since 1.0
     */
    public function __construct() {
        $this->hooksInit();
        $this->imageSize();
    }

    /**
     * Set the hooks.
     *
     * @since 1.0
     */
    public function hooksInit(){
        add_theme_support( 'menus' );
        load_theme_textdomain(SM_DOMAIN, get_template_directory() . '/languages' );
        add_theme_support( 'post-thumbnails' );

        add_action( 'wp_enqueue_scripts', array($this, 'addScripts') );
        add_action( 'init', array($this, 'menus') );
        add_action( 'customize_register', array(new Customizer(), 'register') );

    }

    /**
     * Enqueue scripts and styles.
     *
     * @since 1.0
     */
    public function addScripts(){
        wp_enqueue_style('googel-fonts', 'https://fonts.googleapis.com/css?family=Roboto:100,100i,300,300i,400,400i,500,500i,700,700i,900,900i');
        wp_enqueue_style('style', get_stylesheet_uri());
        wp_enqueue_script('scripts', get_template_directory_uri() . '/Resources/public/js/scripts.min.js', array(), '1.0.0', true);
    }

    /**
     * Navigation Menus
     *
     * @since 1.0
     */
    function menus(){
        $locations = array(
            'header_main' => __( 'Header Main', SM_DOMAIN),
            'footer_main' => __( 'Footer Main', SM_DOMAIN),
        );
        register_nav_menus( $locations );
    }

    /**
     * Resize all image
     *
     * @since 1.0
     */
    function imageSize(){
        //add_image_size('customThumbnail', 255, 170, true);
    }

}