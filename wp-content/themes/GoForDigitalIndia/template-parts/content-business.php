<?php
/**
 * Listing card used in archives and searches
 */
$post_type = get_post_type();
?>
<article id="post-<?php the_ID(); ?>" <?php post_class( 'listing-card' ); ?>>
    <a class="listing-link" href="<?php the_permalink(); ?>">
        <div class="listing-thumb">
            <?php if ( has_post_thumbnail() ) : the_post_thumbnail( 'medium' ); endif; ?>
        </div>
        <div class="listing-body">
            <h2 class="listing-title"><?php the_title(); ?></h2>
            <div class="listing-excerpt"><?php echo wp_kses_post( wp_trim_words( get_the_excerpt(), 20 ) ); ?></div>
            <div class="listing-meta">
                <span class="listing-location"><?php echo esc_html( get_post_meta( get_the_ID(), '_gfd_business_city', true ) ); ?></span>
            </div>
        </div>
    </a>
</article>
