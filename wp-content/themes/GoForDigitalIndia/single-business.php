<?php
/**
 * Single template for Business CPT
 */
get_header();
if ( ! function_exists( 'get_post_type' ) ) {
    return;
}
?>
<main id="site-content" role="main">
    <div class="wrap single-business">
        <?php while ( have_posts() ) : the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <div class="business-meta">
                        <?php echo esc_html( get_post_meta( get_the_ID(), '_gfd_business_address', true ) ); ?>
                    </div>
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>

                    <section class="business-gallery">
                        <?php // placeholder for gallery, use meta or attachments ?>
                    </section>

                    <section class="business-contact">
                        <?php // enquiry form and contact links ?>
                    </section>

                </div>

            </article>
        <?php endwhile; ?>
    </div>
</main>
<?php
get_footer();
