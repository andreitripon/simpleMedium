<?php
namespace  simpleMediumCore;

class Customizer {
    public function register ( $wp_customize ) {
        /**
        * Copyright text
        */
        $wp_customize->add_setting( 'simpleMedium_copyright');

        $wp_customize->add_control( 'simpleMedium_copyright', array(
           'settings' 		=> 'simpleMedium_copyright',
           'label'    		=> __( 'Copyright text', SM_DOMAIN ),
           'section'  		=> 'title_tagline',
           'type'     		=> 'textarea',
        ) );

        /**
        * Header logo
        */
        $wp_customize->add_setting( 'simpleMedium_header_logo' );

        $wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'simpleMedium_header_logo', array(
           'label'    => __( 'Header Logo', SM_DOMAIN ),
           'section'  => 'title_tagline',
           'settings' => 'simpleMedium_header_logo',
        ) ) );

    }
}