<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <header class="entry-header">
        <?php the_title('<h2 class="entry-title">', '</h2>'); ?>
        <div class="entry-meta">
            <?php
            printf(
                esc_html__('Posted on %s', 'WP-Portfolio'),
                '<span class="posted-on">' . get_the_date() . '</span>'
            );
            ?>
        </div><!-- .entry-meta -->
    </header><!-- .entry-header -->

    <div class="entry-content">
        <?php
        if (has_post_thumbnail()) {
            the_post_thumbnail();
        }
        the_excerpt();
        ?>
    </div><!-- .entry-content -->

    <footer class="entry-footer">
        <?php
        if (is_singular()) {
            wp_link_pages(
                array(
                    'before' => '<div class="page-links">' . esc_html__('Pages:', 'WP-Portfolio'),
                    'after' => '</div>',
                )
            );
        }
        ?>
    </footer><!-- .entry-footer -->
</article><!-- #post-<?php the_ID(); ?> -->
