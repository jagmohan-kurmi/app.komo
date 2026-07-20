<?php
/**
 * Footer
 */
?>
<footer class="site-footer" role="contentinfo">
    <div class="wrap footer-inner">
        <div class="footer-widgets">
            <?php if ( is_active_sidebar( 'footer-1' ) ) : dynamic_sidebar( 'footer-1' ); endif; ?>
        </div>
        <div class="site-info">
            &copy; <?php echo date_i18n( _x( 'Y', 'copyright year', 'gofordigitalindia' ) ); ?> <?php bloginfo( 'name' ); ?>
        </div>
    </div>
</footer>
<?php wp_footer(); ?>
</body>
</html>
