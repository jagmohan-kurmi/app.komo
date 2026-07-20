<?php
/**
 * Basic index fallback
 */
get_header();
?>
<main id="site-content" role="main">
    <section class="site-intro">
        <div class="wrap">
            <h1><?php bloginfo( 'name' ); ?></h1>
            <p><?php bloginfo( 'description' ); ?></p>
        </div>
    </section>

    <section class="listing-archive">
        <div class="wrap">
            <?php if ( have_posts() ) : ?>
                <div class="listing-grid">
                <?php while ( have_posts() ) : the_post();
                    get_template_part( 'template-parts/content', get_post_type() );
                endwhile; ?>
                </div>
                <?php the_posts_pagination(); ?>
            <?php else :
                get_template_part( 'template-parts/content', 'none' );
            endif; ?>
        </div>
    </section>
</main>

<?php
get_footer();
