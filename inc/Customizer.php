<?php
namespace  simpleMediumCore;

class Customizer {
    public function register ( $wp_customize ) {
        /**
        * Copyright text
        */
        $wp_customize->add_setting( 'sm_copyright');

        $wp_customize->add_control( 'sm_copyright', array(
           'settings' 		=> 'sm_copyright',
           'label'    		=> __( 'Copyright text', SM_DOMAIN ),
           'section'  		=> 'title_tagline',
           'type'     		=> 'textarea',
        ) );

        /**
        * Header logo
        */
        $wp_customize->add_setting( 'sm_header_logo' );

        $wp_customize->add_control( new \WP_Customize_Image_Control( $wp_customize, 'sm_header_logo', array(
           'label'    => __( 'Header Logo', SM_DOMAIN ),
           'section'  => 'title_tagline',
           'settings' => 'sm_header_logo',
        ) ) );

    }
}