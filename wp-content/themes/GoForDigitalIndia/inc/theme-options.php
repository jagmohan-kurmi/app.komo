<?php
/**
 * Basic theme options using Settings API. This keeps theme self-contained and editable from WP Admin.
 * For production-grade features, consider integration into a headless CRM or premium settings panel.
 */
add_action( 'admin_menu', function() {
    add_theme_page( __( 'GoForDigitalIndia Options', 'gofordigitalindia' ), __( 'GoForDigitalIndia', 'gofordigitalindia' ), 'manage_options', 'gfd-theme-options', 'gfd_theme_options_page' );
} );

add_action( 'admin_init', function() {
    register_setting( 'gfd_theme_options', 'gfd_options' );
    add_settings_section( 'gfd_general', __( 'General Settings', 'gofordigitalindia' ), '__return_false', 'gfd-theme-options' );
    add_settings_field( 'gfd_contact_email', __( 'Contact Email', 'gofordigitalindia' ), 'gfd_field_contact_email', 'gfd-theme-options', 'gfd_general' );
} );

function gfd_field_contact_email() {
    $opts = get_option( 'gfd_options', array() );
    printf( '<input type="email" name="gfd_options[contact_email]" value="%s" style="width:50%%">', esc_attr( $opts['contact_email'] ?? '' ) );
}

function gfd_theme_options_page() {
    ?>
    <div class="wrap">
        <h1><?php esc_html_e( 'GoForDigitalIndia Settings', 'gofordigitalindia' ); ?></h1>
        <form method="post" action="options.php">
            <?php settings_fields( 'gfd_theme_options' ); do_settings_sections( 'gfd-theme-options' ); submit_button(); ?>
        </form>
    </div>
    <?php
}
