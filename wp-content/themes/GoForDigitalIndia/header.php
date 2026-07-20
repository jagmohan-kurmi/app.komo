<?php
/**
 * Header
 */
?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<header class="site-header" role="banner">
    <div class="wrap header-inner">
        <div class="brand">
            <?php if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) :
                the_custom_logo();
            else : ?>
                <a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
            <?php endif; ?>
        </div>
        <nav class="main-nav" role="navigation">
            <?php wp_nav_menu( array( 'theme_location' => 'primary', 'container' => '' ) ); ?>
        </nav>
    </div>
</header>
