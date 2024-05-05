<?php
/**
 * Template Name: Blog Page
 */
get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <?php
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
            $args = array(
                'post_type' => 'post',
                'posts_per_page' => 5,
                'paged' => $paged,
            );

            $query = new WP_Query($args);

            if ($query->have_posts()) :
                while ($query->have_posts()) : $query->the_post();
            ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                        <h2><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        <div class="entry-content">
                            <?php the_excerpt(); ?>
                        </div>
                    </article>
            <?php
                endwhile;

                // Reset post data
                wp_reset_postdata();
            else :
                get_template_part('template-parts/content', 'none');
            endif;
            ?>
        </div><!-- .container -->
    </main><!-- #main -->
</div><!-- #primary -->

<div class="pagination_bar">
    <?php
    echo paginate_links(array(
        'total' => $query->max_num_pages,
        'prev_text' => __('Previous', 'WP-Portfolio'),
        'next_text' => __('Next', 'WP-Portfolio'),
    ));
    ?>
</div>

<?php get_footer(); ?>
