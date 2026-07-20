<?php
/**
 * Archive template for Business CPT
 */
get_header();
?>
<main id="site-content" role="main">
    <div class="wrap archive-business">
        <header class="archive-header">
            <h1><?php post_type_archive_title(); ?></h1>
            <p class="archive-description"><?php echo esc_html( get_the_archive_description() ); ?></p>
        </header>

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
</main>
<?php get_footer();
