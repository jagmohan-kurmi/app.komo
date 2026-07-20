<?php
/**
 * Setup theme supports, menus, widgets
 */
add_action( 'after_setup_theme', function() {
    // Internationalization
    load_theme_textdomain( 'gofordigitalindia', get_template_directory() . '/languages' );

    // Title tag
    add_theme_support( 'title-tag' );

    // Custom Logo
    add_theme_support( 'custom-logo', array(
        'height'      => 80,
        'width'       => 400,
        'flex-width'  => true,
        'flex-height' => true,
    ) );

    // Post thumbnails
    add_theme_support( 'post-thumbnails' );
    set_post_thumbnail_size( 1568, 9999 );

    // HTML5
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list', 'gallery', 'caption', 'script', 'style' ) );

    // Menus
    register_nav_menus( array(
        'primary' => __( 'Primary Menu', 'gofordigitalindia' ),
    ) );

    // Widgets
    register_sidebar( array(
        'name'          => __( 'Footer Widget', 'gofordigitalindia' ),
        'id'            => 'footer-1',
        'description'   => __( 'Widgets in the footer', 'gofordigitalindia' ),
        'before_widget' => '<div class="widget %2$s">',
        'after_widget'  => '</div>',
    ) );

    // Theme supports for editor styles
    add_theme_support( 'editor-styles' );
    add_editor_style( 'assets/css/style.css' );

    // Allow wide alignments
    add_theme_support( 'align-wide' );

    // REST API: expose featured image
    add_post_type_support( 'post', 'excerpt' );
} );
