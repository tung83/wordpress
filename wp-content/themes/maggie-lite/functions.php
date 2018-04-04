<?php
/**
 * Maggie Lite functions and definitions
 *
 * @package Maggie Lite
 */

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if (!isset($content_width)) {
    $content_width = 640;
    /* pixels */
}

if (!function_exists('maggie_lite_setup')):
    /**
     * Sets up theme defaults and registers support for various WordPress features.
     *
     * Note that this function is hooked into the after_setup_theme hook, which
     * runs before the init hook. The init hook is too late for some features, such
     * as indicating support for post thumbnails.
     */
function maggie_lite_setup()
{

        /*
        * Make theme available for translation.
        * Translations can be filed in the /languages/ directory.
        * If you're building a theme based on Maggie, use a find and replace
        * to change 'maggie-lite' to the name of your theme in all the template files
        */
        load_theme_textdomain('maggie-lite', get_template_directory() . '/languages');

        // Add default posts and comments RSS feed links to head.
        add_theme_support('automatic-feed-links');

        /*
        * Let WordPress manage the document title.
        * By adding theme support, we declare that this theme does not use a
        * hard-coded <title> tag in the document head, and expect WordPress to
        * provide it for us.
        */
        add_theme_support('title-tag');

        /*
        * Enable support for Post Thumbnails on posts and pages.
        *
        * @link http://codex.wordpress.org/Function_Reference/add_theme_support#Post_Thumbnails
        */
        add_theme_support('post-thumbnails');

        add_image_size('maggie-lite-slider-image', 1920, 700, true); //Big image for homepage slider
        add_image_size('maggie-lite-block-big-thumb', 869, 739, true); //Big thumb for homepage block
        add_image_size('maggie-lite-block-smallright-thumb', 300, 260, true); //Small thumb for homepage top right small block
        add_image_size('maggie-lite-block-small-thumb', 640, 640, true); //Small thumb for homepage block
        add_image_size('maggie-lite-blockthree-big-thumb', 570, 363, true); //Big thumb for homepage 3rd block 570*363
        add_image_size('maggie-lite-blockthree-small-thumb', 160, 160, true); //Small thumb for homepage 3rd block 160*160
        add_image_size('maggie-lite-blockfour-thumb', 550, 275, true); //Small thumb for homepage block 550*275
        add_image_size('maggie-lite-singlepost-default', 1170, 600, true); //Default image size for single post
        add_image_size('maggie-lite-singlepost-style1', 326, 235, true); //Style1 image size for single post
        add_image_size('maggie-lite-featured-post', 1170, 350, true); //featured post img size

        // This theme uses wp_nav_menu() in one location.
        register_nav_menus(array('primary' => __('Primary Menu', 'maggie-lite'), ));

        /*
        * Switch default core markup for search form, comment form, and comments
        * to output valid HTML5.
        */
        add_theme_support('html5', array(
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
            ));
        /*
        * Enable support for Post Formats.
        * See http://codex.wordpress.org/Post_Formats
        */
        add_theme_support('post-formats', array(
            'aside',
            'video',
            'audio',
            ));

        // Set up the WordPress core custom background feature.
        add_theme_support('custom-background', apply_filters('stepone_custom_background_args',
            array(
                'default-color' => 'ffffff',
                'default-image' => '',
                )));
        add_theme_support( 'custom-logo' , array(
            'header-text' => array( 'site-title', 'site-description' ),
            ));

        add_theme_support( 'woocommerce' );

        // Add theme support for selective refresh for widgets.
        add_theme_support( 'customize-selective-refresh-widgets' );

        /*
         * This theme styles the visual editor to resemble the theme style,
         * specifically font, colors, and column width.
         */
        add_editor_style( array( 'css/editor-style.css') );

        $args = array(
            'flex-width'    => true,
            'width'         => 1920,
            'flex-height'    => true,
            'height'        => 87,
            );
        add_theme_support( 'custom-header', $args );
    }
endif; // maggie_lite_setup
add_action('after_setup_theme', 'maggie_lite_setup');

/**
 * Register widget area.
 *
 * @link http://codex.wordpress.org/Function_Reference/register_sidebar
 */
function maggie_lite_widgets_init()
{
    register_sidebar(array(
        'name' => __('Sidebar', 'maggie-lite'),
        'id' => 'maggie-sidebar-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title"><span>',
        'after_title' => '</span></h1>',
        ));

    register_sidebar(array(
        'name' => __('Left Sidebar', 'maggie-lite'),
        'id' => 'maggie-sidebar-left',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title"><span>',
        'after_title' => '</span></h1>',
        ));

    register_sidebar(array(
        'name' => __('Right Sidebar', 'maggie-lite'),
        'id' => 'maggie-sidebar-right',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title"><span>',
        'after_title' => '</span></h1>',
        ));

    register_sidebar(array(
        'name' => __('Header Ad ', 'maggie-lite'),
        'id' => 'maggie-header-ad',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title"><span>',
        'after_title' => '</span></h1>',
        ));

    register_sidebar(array(
        'name' => __('Homepage sidebar', 'maggie-lite'),
        'id' => 'maggie-home-sidebar',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title"><span>',
        'after_title' => '</span></h1>',
        ));

    register_sidebar(array(
        'name' => __('Homepage Inline Ad', 'maggie-lite'),
        'id' => 'maggie-homepage-inline-ad',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title"><span>',
        'after_title' => '</span></h1>',
        ));

    register_sidebar(array(
        'name' => __('Article Ad', 'maggie-lite'),
        'id' => 'maggie-article-ad',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title"><span>',
        'after_title' => '</span></h1>',
        ));
    
    register_sidebar(array(
        'name' => __('Top Footer', 'maggie-lite'),
        'id' => 'maggie-top-footer',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s above-footer-widget widgets-'.maggie_lite_count_widgets('maggie-top-footer').'">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title"><span>',
        'after_title' => '</span></h1>',
        ));

    register_sidebar(array(
        'name' => __('Middle Footer', 'maggie-lite'),
        'id' => 'maggie-footer-middle',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title"><span>',
        'after_title' => '</span></h1>',
        ));

    register_sidebar(array(
        'name' => __('Footer Social', 'maggie-lite'),
        'id' => 'maggie-footer-social',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title"><span>',
        'after_title' => '</span></h1>',
        ));

    register_sidebar(array(
        'name' => __('Footer 1', 'maggie-lite'),
        'id' => 'maggie-footer-1',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title"><span>',
        'after_title' => '</span></h1>',
        ));

    register_sidebar(array(
        'name' => __('Footer 2', 'maggie-lite'),
        'id' => 'maggie-footer-2',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title"><span>',
        'after_title' => '</span></h1>',
        ));

    register_sidebar(array(
        'name' => __('Footer 3', 'maggie-lite'),
        'id' => 'maggie-footer-3',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title"><span>',
        'after_title' => '</span></h1>',
        ));

    register_sidebar(array(
        'name' => __('Footer 4', 'maggie-lite'),
        'id' => 'maggie-footer-4',
        'description' => '',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => '</aside>',
        'before_title' => '<h1 class="widget-title"><span>',
        'after_title' => '</span></h1>',
        ));
}
add_action('widgets_init', 'maggie_lite_widgets_init');

/**
 * Enqueue scripts and styles.
 */
function maggie_lite_scripts()
{
    $my_theme = wp_get_theme();
    $theme_version = $my_theme->get('Version');
    wp_enqueue_style('maggie-lite-fontawesome-font', get_template_directory_uri() . '/css/font-awesome.min.css');
    wp_enqueue_style('maggie-lite-lato-font','//fonts.googleapis.com/css?family=Lato:400,300,300italic,400italic,700,700italic,900,900italic|Roboto+Condensed:400,400italic,700,700italic|Roboto:400,300,300italic,400italic,500,500italic,700,700italic');
    
    wp_enqueue_style('animate', get_template_directory_uri() . '/css/animate.css');
    wp_enqueue_style('maggie-lite-style', get_stylesheet_uri(), array(),
        esc_attr($theme_version));
    if(get_theme_mod('theme_option_setting','dark')=='light' || is_page_template('template-lighttheme.php')){
        wp_enqueue_style('maggie-lite-light-theme', get_template_directory_uri() .
            '/css/light-theme.css');
    }
    wp_enqueue_style('maggie-lite-responsive', get_template_directory_uri() .
        '/css/responsive.css');
    if(get_theme_mod('theme_option_setting','dark')=='light' || is_page_template('template-lighttheme.php')){
        wp_enqueue_style('maggie-lite-light-theme-responsive', get_template_directory_uri() .
            '/css/light-theme-responsive.css');
    }

    wp_enqueue_script('maggie-lite-newsticker', get_template_directory_uri() .
        '/js/jquery.newsTicker.js', array(), '4.1.2', true);
    wp_enqueue_script('maggie-lite-bxslider', get_template_directory_uri() .
        '/js/jquery.bxslider.min.js', array(), '4.1.2', true);
    wp_enqueue_script('maggie-lite-navigation', get_template_directory_uri() .
        '/js/navigation.js', array(), '20120206', true);
    wp_enqueue_script('maggie-lite-skip-link-focus-fix',
        get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20130115', true);
    wp_enqueue_script('maggie-lite-wow', get_template_directory_uri() .
        '/js/wow.min.js', array(), '1.0.1');
    wp_enqueue_script('maggie-lite-custom-scripts', get_template_directory_uri() .
        '/js/custom-scripts.js', array('jquery'), '1.0.1');

    if (is_singular() && comments_open() && get_option('thread_comments')) {
        wp_enqueue_script('comment-reply');
    }
}
add_action('wp_enqueue_scripts', 'maggie_lite_scripts');

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/maggie-functions.php';
/**
 * adding customizer options default-settings.php
 */
require get_template_directory() . '/inc/admin-panel/assets/theme-setting.php';
/**
 * adding customizer options default-settings.php
 */
require get_template_directory() . '/inc/admin-panel/assets/default-settings.php';

/**
 * adding customizer options header-settings.php
 */
require get_template_directory() . '/inc/admin-panel/assets/header-settings.php';

/**
 * adding customizer options footer-settings.php
 */
require get_template_directory() . '/inc/admin-panel/assets/footer-settings.php';

/**
 * adding customizer options ads-settings.php
 */
require get_template_directory() . '/inc/admin-panel/assets/ads-settings.php';

/**
 * adding customizer options homepage-settings.php
 */
require get_template_directory() . '/inc/admin-panel/assets/homepage-settings.php';

/**
 * adding customizer options post-settings.php
 */
require get_template_directory() . '/inc/admin-panel/assets/post-settings.php';

/**
 * adding customizer options misc-settings.php
 */
require get_template_directory() . '/inc/admin-panel/assets/misc-settings.php';

/**
 * adding customizer options related-settings.php
 */
require get_template_directory() . '/inc/admin-panel/assets/related-settings.php';
require get_template_directory() . '/inc/about-theme.php';
/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';
/**
 * Customizer Sanitizer additions.
 */
require get_template_directory() . '/inc/maggie-lite-sanitizer.php';
/**
 * maggie-choose-option additions.
 */
require get_template_directory() . '/inc/maggie-choose-option.php';

/**
 * maggie-menu-option additions.
 */
require get_template_directory() . '/inc/maggie-menu-dropdown.php';

/**
 * maggie-radio-option additions.
 */
require get_template_directory() . '/inc/maggie-image-radio.php';

/**
 * maggie-ads-option additions.
 */
require get_template_directory() . '/inc/maggie-ad-option.php';
/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

/**
 * Implement the custom metabox feature
 */
require get_template_directory() . '/inc/custom-metabox.php';

/**
 * Load Options Maggie Widgets
 */
require get_template_directory() . '/inc/maggie-widgets.php';


remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

function maggie_lite_wrapper_start() {
    echo '<div class="maggie-container"><div id="primary" class="right-sidebar">';
}
add_action('woocommerce_before_main_content', 'maggie_lite_wrapper_start', 10);

function maggie_lite_wrapper_end() {
    echo '</div>';
    do_action( 'woocommerce_sidebar' );
    echo '</div>';
}
add_action('woocommerce_after_main_content','maggie_lite_wrapper_end',9);

add_filter( 'loop_shop_per_page', create_function( '$cols', 'return 12;' ), 20 );