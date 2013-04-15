<?php

function nicelex_setup() {

    // Path constants
    define( 'THEME_DIR',  get_template_directory() );

    /**
     * Custom template tags for this theme.
     */
    require( THEME_DIR . '/inc/template-tags.php' );

    /**
     * Add default posts and comments RSS feed links to head
     */
    add_theme_support( 'automatic-feed-links' );

    // Add post thumbnails (http://codex.wordpress.org/Post_Thumbnails)
    add_theme_support('post-thumbnails');
    // set_post_thumbnail_size(150, 150, false);
    // add_image_size('category-thumb', 300, 9999); // 300px wide (and unlimited height)

    // Translate, if applicable
    load_theme_textdomain( 'nicelex', THEME_DIR . '/languages' );

    $locale = get_locale();
    $locale_file = THEME_DIR . "/languages/$locale.php";
    if ( is_readable($locale_file) )
        require_once ($locale_file);


    /**
     * This theme uses wp_nav_menu() in one location.
     */
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'nicelex' ),
    ) );


    /**
     * Add support for custom backgrounds
     */

    add_theme_support('custom-background', array(
        'default-color' => 'f1f2e9',
    ));

}
add_action( 'after_setup_theme', 'nicelex_setup' );

/**
 * Adds support for a custom header image.
 */
require( get_template_directory() . '/inc/custom-header.php' );

/**
 * Creates a nicely formatted and more specific title element text
 * for output in head of document, based on current view.
 *
 * @since
 *
 * @param string $title Default title text for current view.
 * @param string $sep Optional separator.
 * @return string Filtered title.
 */
function nicelex_wp_title( $title, $sep ) {
    global $paged, $page;

    if ( is_feed() )
        return $title;

    // Add the site name.
    $title .= get_bloginfo( 'name' );

    // Add the site description for the home/front page.
    $site_description = get_bloginfo( 'description', 'display' );
    if ( $site_description && ( is_home() || is_front_page() ) )
        $title = "$title $sep $site_description";

    // Add a page number if necessary.
    if ( $paged >= 2 || $page >= 2 )
        $title = "$title $sep " . sprintf( __( 'Page %s', 'nicelex' ), max( $paged, $page ) );

    return $title;
}
add_filter( 'wp_title', 'nicelex_wp_title', 10, 2 );

/**
 * Makes our wp_nav_menu() fallback -- wp_page_menu() -- show a home link.
 *
 * @since
 */
function nicelex_page_menu_args( $args ) {
    if ( ! isset( $args['show_home'] ) )
        $args['show_home'] = true;
    return $args;
}
add_filter( 'wp_page_menu_args', 'nicelex_page_menu_args' );

/**
 * Register widgetized area and update sidebar with default widgets
 *
 * @since Nicelex 1.0
 */
function nicelex_widgets_init() {
    register_sidebar( array(
        'name' => __( 'Sidebar', 'nicelex' ),
        'id' => 'sidebar-1',
        'before_widget' => '<aside id="%1$s" class="widget %2$s">',
        'after_widget' => "</aside>",
        'before_title' => '<h2 class="widget-title">',
        'after_title' => '</h2>',
    ) );
}
add_action( 'widgets_init', 'nicelex_widgets_init' );