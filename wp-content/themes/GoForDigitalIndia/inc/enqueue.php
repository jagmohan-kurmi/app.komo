<?php
/**
 * Enqueue scripts and styles
 */
add_action( 'wp_enqueue_scripts', function() {
    wp_enqueue_style( 'gfd-style', get_stylesheet_uri(), array(), wp_get_theme()->get( 'Version' ) );
    wp_enqueue_style( 'gfd-main', GFDI_URI . '/assets/css/style.css', array(), wp_get_theme()->get( 'Version' ) );

    wp_enqueue_script( 'gfd-main', GFDI_URI . '/assets/js/main.js', array( 'jquery' ), wp_get_theme()->get( 'Version' ), true );

    // Localize script for AJAX and REST
    wp_localize_script( 'gfd-main', 'gfd_ajax', array(
        'ajax_url' => admin_url( 'admin-ajax.php' ),
        'rest_url' => esc_url_raw( rest_url() ),
        'nonce'    => wp_create_nonce( 'wp_rest' ),
    ) );
} );
