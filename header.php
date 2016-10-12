<?php
/**
 * The template for displaying the header
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

    <?php wp_head(); ?>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body <?php body_class(); ?>>

<header class="main-header">
    <nav class="navbar">
        <div class="container">
            <div class="row">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="<?php echo home_url(); ?>" title="<?php bloginfo( 'name' ); ?>">
                        <?php
                        $logo = get_theme_mod( 'sm_header_logo' );
                        if(!empty($logo)): ?>
                            <img src="<?php echo esc_url( $logo ); ?>" alt="<?php bloginfo( 'name' ); ?>">
                        <?php endif; ?>
                        <h1><?php bloginfo( 'name' ); ?></h1>
                        <span><?php bloginfo( 'description' ); ?></span>
                    </a>
                </div>
            </div>
            <div class="row header-navbar">
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <?php
                    if( has_nav_menu( 'header_main' ) ) {
                        wp_nav_menu(
                            array(
                                'theme_location' => 'header_main',
                                'container'      => false,
                                'menu_class'     => 'nav navbar-nav',
                            )
                        );
                    }
                    ?>

                    <form role="search" method="get" class="navbar-form navbar-right" action="<?php echo home_url( '/' ); ?>">
                        <input type="search" class="search-field form-control"
                               placeholder="<?php echo esc_attr_x( 'Search', 'placeholder' ) ?>"
                               value="<?php echo get_search_query() ?>" name="s"
                               title="<?php echo esc_attr_x( 'Search for:', 'label' ) ?>" />
                        <button type="submit" class="btn btn-search glyphicon glyphicon-search"></button>
                    </form>
                </div>
            </div>
        </div>
    </nav>
</header>