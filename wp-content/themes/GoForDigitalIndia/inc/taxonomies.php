<?php
/**
 * Register taxonomies: categories and hierarchical locations
 */
add_action( 'init', function() {
    // Business Categories
    register_taxonomy( 'business_category', array( 'business' ), array(
        'labels' => array( 'name' => __( 'Business Categories', 'gofordigitalindia' ) ),
        'hierarchical' => true,
        'show_in_rest' => true,
        'rewrite' => array( 'slug' => 'business-category' ),
    ) );

    // Location hierarchy: state -> district -> city -> area -> pincode
    register_taxonomy( 'gfd_state', 'business', array(
        'label' => __( 'State', 'gofordigitalindia' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    ) );
    register_taxonomy( 'gfd_district', 'business', array(
        'label' => __( 'District', 'gofordigitalindia' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    ) );
    register_taxonomy( 'gfd_city', 'business', array(
        'label' => __( 'City', 'gofordigitalindia' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    ) );
    register_taxonomy( 'gfd_area', 'business', array(
        'label' => __( 'Area', 'gofordigitalindia' ),
        'hierarchical' => true,
        'show_in_rest' => true,
    ) );
    register_taxonomy( 'gfd_pincode', 'business', array(
        'label' => __( 'PIN Code', 'gofordigitalindia' ),
        'hierarchical' => false,
        'show_in_rest' => true,
    ) );

} );
