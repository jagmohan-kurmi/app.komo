<?php
/**
 * Register meta fields and simple meta box fallback. Uses register_post_meta to keep data REST-ready.
 */
add_action( 'init', function() {
    // Business address
    register_post_meta( 'business', '_gfd_business_address', array(
        'type' => 'string',
        'single' => true,
        'show_in_rest' => true,
        'auth_callback' => function() {
            return current_user_can( 'edit_posts' );
        }
    ) );

    register_post_meta( 'business', '_gfd_business_phone', array('type' => 'string','single' => true,'show_in_rest' => true) );
    register_post_meta( 'business', '_gfd_business_whatsapp', array('type' => 'string','single' => true,'show_in_rest' => true) );
    register_post_meta( 'business', '_gfd_business_hours', array('type' => 'string','single' => true,'show_in_rest' => true) );
    register_post_meta( 'business', '_gfd_business_gst', array('type' => 'string','single' => true,'show_in_rest' => true) );
    register_post_meta( 'business', '_gfd_business_lat', array('type' => 'number','single' => true,'show_in_rest' => true) );
    register_post_meta( 'business', '_gfd_business_lng', array('type' => 'number','single' => true,'show_in_rest' => true) );

} );

// Simple meta box for classic editor/admin
add_action( 'add_meta_boxes', function() {
    add_meta_box( 'gfd_business_details', __( 'Business Details', 'gofordigitalindia' ), 'gfd_business_meta_box_cb', 'business', 'normal', 'high' );
} );

function gfd_business_meta_box_cb( $post ) {
    wp_nonce_field( 'gfd_business_save', 'gfd_business_nonce' );
    $address = get_post_meta( $post->ID, '_gfd_business_address', true );
    $phone = get_post_meta( $post->ID, '_gfd_business_phone', true );
    $whatsapp = get_post_meta( $post->ID, '_gfd_business_whatsapp', true );
    $hours = get_post_meta( $post->ID, '_gfd_business_hours', true );
    $gst = get_post_meta( $post->ID, '_gfd_business_gst', true );
    ?>
    <p>
        <label for="gfd_business_address"><?php _e( 'Address', 'gofordigitalindia' ); ?></label><br>
        <textarea id="gfd_business_address" name="gfd_business_address" rows="3" style="width:100%;"><?php echo esc_textarea( $address ); ?></textarea>
    </p>
    <p>
        <label for="gfd_business_phone"><?php _e( 'Phone', 'gofordigitalindia' ); ?></label><br>
        <input id="gfd_business_phone" name="gfd_business_phone" value="<?php echo esc_attr( $phone ); ?>" style="width:100%;">
    </p>
    <p>
        <label for="gfd_business_whatsapp"><?php _e( 'WhatsApp', 'gofordigitalindia' ); ?></label><br>
        <input id="gfd_business_whatsapp" name="gfd_business_whatsapp" value="<?php echo esc_attr( $whatsapp ); ?>" style="width:100%;">
    </p>
    <p>
        <label for="gfd_business_hours"><?php _e( 'Working Hours', 'gofordigitalindia' ); ?></label><br>
        <input id="gfd_business_hours" name="gfd_business_hours" value="<?php echo esc_attr( $hours ); ?>" style="width:100%;">
    </p>
    <p>
        <label for="gfd_business_gst"><?php _e( 'GST / Business Reg. No', 'gofordigitalindia' ); ?></label><br>
        <input id="gfd_business_gst" name="gfd_business_gst" value="<?php echo esc_attr( $gst ); ?>" style="width:100%;">
    </p>
    <?php
}

add_action( 'save_post', function( $post_id, $post ) {
    if ( ! isset( $_POST['gfd_business_nonce'] ) || ! wp_verify_nonce( $_POST['gfd_business_nonce'], 'gfd_business_save' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( 'business' !== $post->post_type ) {
        return;
    }

    $fields = array( 'gfd_business_address' => '_gfd_business_address', 'gfd_business_phone' => '_gfd_business_phone', 'gfd_business_whatsapp' => '_gfd_business_whatsapp', 'gfd_business_hours' => '_gfd_business_hours', 'gfd_business_gst' => '_gfd_business_gst' );

    foreach ( $fields as $input => $meta_key ) {
        if ( isset( $_POST[ $input ] ) ) {
            update_post_meta( $post_id, $meta_key, sanitize_text_field( wp_unslash( $_POST[ $input ] ) ) );
        }
    }

}, 10, 2 );
