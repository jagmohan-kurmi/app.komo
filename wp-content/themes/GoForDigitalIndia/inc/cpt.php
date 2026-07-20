<?php
/**
 * Register Custom Post Types
 */
add_action( 'init', function() {
    $labels = array(
        'name'                  => _x( 'Businesses', 'Post Type General Name', 'gofordigitalindia' ),
        'singular_name'         => _x( 'Business', 'Post Type Singular Name', 'gofordigitalindia' ),
        'menu_name'             => __( 'Businesses', 'gofordigitalindia' ),
    );

    $args = array(
        'label'               => __( 'Business', 'gofordigitalindia' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'editor', 'thumbnail', 'excerpt', 'comments' ),
        'taxonomies'          => array(),
        'public'              => true,
        'has_archive'         => true,
        'show_in_rest'        => true,
        'rewrite'             => array( 'slug' => 'business' ),
        'capability_type'     => 'post',
        'map_meta_cap'        => true,
    );

    register_post_type( 'business', $args );

} );
