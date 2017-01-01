<?php
/**
 * The header template
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package TwoDelighted_Theme
 */
?>
<!DOCTYPE html>

<!--[if lt IE 9]>
<html id="ie" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->

<head>
    <meta charset="<?php bloginfo( "charset" ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1">



    <!-- favicon & links -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo get_template_directory_uri(); ?>/favicon.ico" />
    <link rel="pingback" href="<?php bloginfo( "pingback_url" ); ?>" />

    <!-- stylesheets are enqueued via functions.php -->

    <!-- scripts  -->
    <!--[if lt IE 9]>
        <script src="<?php echo get_template_directory_uri(); ?>/assets/vendor/html5shiv.min.js" type="text/javascript"></script>
    <![endif]-->



    <?php // Lets other plugins and files tie into our theme's <head>:  
    wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<div id="page">
    <div class="main-header">
        <header id="site-header" class="wrapper" role="banner">     
                
                <h1 id="logo">
                    <a href="<?php echo esc_url( home_url( "/" ) ); ?>">
                        <?php get_template_part( 'assets/images/inline', 'logo.svg' );
                        ?>
                    </a>
                </h1>  
                <div class="primary-nav">
                    <nav class="access" role="navigation">
                        <?php wp_nav_menu( array( "theme_location" => "primary", 'container' => '') ); ?>
                    </nav><!-- #access --> 
                    <div class="header-search-button">
                        <?php get_template_part( 'assets/images/inline', 'search.svg' );
                        ?>
                    </div>
                    <div class="header-exit-button">
                        <?php get_template_part( 'assets/images/inline', 'close.svg' );
                        ?>
                    </div>
                </div>    
                <div class="mobile-nav">
                    <div class="menu-button">
                        <?php get_template_part( 'assets/images/inline', 'menu.svg' );
                        ?>
                    </div>
                    <div class="header-search-button">
                        <?php get_template_part( 'assets/images/inline', 'search.svg' );
                        ?>
                    </div>
                    <div class="header-exit-button">
                        <?php get_template_part( 'assets/images/inline', 'close.svg' );
                        ?>
                    </div>
                </div>  
            
        </header><!-- #branding -->
        <div class="primary-click-menu">
            <?php get_template_part( 'assets/images/inline', 'menu.svg' );
                        ?>
        </div>
        <div class="primary-close-menu">
            <?php get_template_part( 'assets/images/inline', 'close.svg' );
                        ?>
        </div>
        <div class="header-search wrapper">
            <?php get_search_form(); ?>
        </div>
        <div class="mobile-menu">
            <nav class="mobile-access" role="navigation">
                <?php wp_nav_menu( array( "theme_location" => "primary" ) ); ?>
            </nav><!-- #access --> 
        </div>
    </div>


    <div id="main">

