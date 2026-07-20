<?php
/**
 * GoForDigitalIndia functions and definitions
 *
 * @package GoForDigitalIndia
 */

if ( ! defined( 'GFDI_DIR' ) ) {
    define( 'GFDI_DIR', get_template_directory() );
    define( 'GFDI_URI', get_template_directory_uri() );
}

// Require modular files
require_once GFDI_DIR . '/inc/setup.php';
require_once GFDI_DIR . '/inc/enqueue.php';
require_once GFDI_DIR . '/inc/cpt.php';
require_once GFDI_DIR . '/inc/taxonomies.php';
require_once GFDI_DIR . '/inc/meta.php';
require_once GFDI_DIR . '/inc/rest.php';
require_once GFDI_DIR . '/inc/theme-options.php';

// If WP_DEBUG, enable helpful logs (do not expose to production)
if ( defined( 'WP_DEBUG' ) && WP_DEBUG ) {
    ini_set( 'display_errors', '1' );
}
