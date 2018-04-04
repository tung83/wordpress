<?php
/**
* The header for our theme.
*
* Displays all of the <head> section and everything up till <div id="content">
*
* @package Maggie Lite
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="profile" href="http://gmpg.org/xfn/11" />
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
    <div id="page" class="hfeed site">
        <a class="skip-link screen-reader-text" href="#content"><?php _e( 'Skip to content', 'maggie-lite' ); ?></a>
        <?php 
        $maggie_lite_top_menu_switch = get_theme_mod('header_option','1');
        $maggie_lite_top_menu = get_theme_mod('header_top_option','');
        $maggie_lite_top_search_switch = get_theme_mod('header_option_search','1');
        $ticker_category = esc_attr(get_theme_mod('ticker_setting_category',''));
        ?>  

        <header id="masthead" class="site-header" role="banner">
            <?php if ($maggie_lite_top_menu_switch=='1'):?> 
                <?php if(!empty($maggie_lite_top_menu) || !empty($ticker_category)):?>
                    <div class="top-header-wrapper <?php if(!empty($maggie_lite_top_menu)){echo "top-menu-left";}?>">
                        <div class="maggie-container"> 
                            <div class="top-header-left">
                                <?php if(empty($maggie_lite_top_menu)):?>
                                    <?php maggie_ticker_header_customizer(); ?>
                                <?php else: ?>  
                                    <div class="top-menu-wrapper clearfix">
                                        <nav id="top-navigation" class="top-main-navigation" role="navigation">
                                            <button class="menu-toggle hide" aria-controls="menu" aria-expanded="false"><?php _e( 'Top Menu', 'maggie-lite' ); ?></button>
                                            <?php wp_nav_menu( array( 'menu' => $maggie_lite_top_menu ) ); ?>
                                        </nav><!-- #site-navigation -->
                                    </div>
                                <?php endif;?> 
                            </div>
                            <div class="top-header-date">
                                <?php echo date('M j, Y | h:i:s a', time());?>
                            </div>
                        </div>
                    </div>
                <?php endif ;?>
            <?php endif ;?>
            <div class="logo-ad-wrapper">
                <div class="maggie-container">
                    <div class="site-branding">
                        <div class="sitelogo-wrap">  
                            <?php 
                            if ( function_exists( 'the_custom_logo' ) ) {
                                if ( has_custom_logo() ) : ?>
                                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                        <?php the_custom_logo(); ?>
                                    </a>
                                    <?php 
                                    endif;
                                }
                                ?>
                            </div>
                            <div class="sitetext-wrap">  
                                <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
                                    <h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
                                    <h2 class="site-description"><?php bloginfo( 'description' ); ?></h2>
                                </a>
                            </div>
                        </div><!-- .site-branding -->



                        <?php if ( is_active_sidebar( 'maggie-header-ad' ) ) : ?>
                            <div class="header-ad">
                                <?php dynamic_sidebar( 'maggie-header-ad' ); ?> 
                            </div><!--header ad-->
                        <?php endif; ?>


                    </div>
                </div>

                <nav id="site-navigation" class="main-navigation" role="navigation">
                    <div class="maggie-container">
                        <div class="nav-wrapper">
                            <div class="nav-toggle hide">
                                <i class="fa fa-bars"></i>
                            </div>
                            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container_class' => 'mag-primary-menu' ) ); ?>
                            <?php if($maggie_lite_top_search_switch=='1'){ ?>
                                <div class="top-header-right">
                                    <?php get_template_part('searchform-header'); ?>
                                </div>
                                <?php } ?>
                            </div> 
                        </div>
                    </nav><!-- #site-navigation --> 
                </header><!-- #masthead -->
                <div id="content" class="site-content">