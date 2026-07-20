<?php
/**
 * REST endpoints and additional API modifications
 */
add_action( 'rest_api_init', function() {
    // Add business search endpoint for advanced filters
    register_rest_route( 'gfd/v1', '/businesses', array(
        'methods' => 'GET',
        'callback' => 'gfd_rest_get_businesses',
        'permission_callback' => '__return_true',
        'args' => array(
            's' => array( 'required' => false ),
            'category' => array( 'required' => false ),
            'city' => array( 'required' => false ),
            'page' => array( 'required' => false ),
        ),
    ) );
} );

function gfd_rest_get_businesses( $request ) {
    $params = $request->get_params();
    $args = array( 'post_type' => 'business', 'posts_per_page' => 12 );
    if ( ! empty( $params['s'] ) ) {
        $args['s'] = sanitize_text_field( $params['s'] );
    }
    if ( ! empty( $params['category'] ) ) {
        $args['tax_query'][] = array( 'taxonomy' => 'business_category', 'field' => 'slug', 'terms' => sanitize_text_field( $params['category'] ) );
    }
    if ( ! empty( $params['city'] ) ) {
        $args['tax_query'][] = array( 'taxonomy' => 'gfd_city', 'field' => 'slug', 'terms' => sanitize_text_field( $params['city'] ) );
    }

    $query = new WP_Query( $args );
    $items = array();
    while ( $query->have_posts() ) {
        $query->the_post();
        $items[] = array(
            'id' => get_the_ID(),
            'title' => get_the_title(),
            'excerpt' => get_the_excerpt(),
            'permalink' => get_the_permalink(),
        );
    }
    wp_reset_postdata();
    return rest_ensure_response( array( 'total' => (int) $query->found_posts, 'items' => $items ) );
}
