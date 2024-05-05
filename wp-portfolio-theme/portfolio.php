<?php
/**
 * Template Name: Portfolio
 */

get_header();
?>

<div id="primary" class="content-area">
    <main id="main" class="site-main">
        <div class="container">
            <h2><?php the_title(); ?></h2>

            <?php
            $portfolio_query = new WP_Query(array(
                'post_type' => 'portfolio',
                'posts_per_page' => -1, // Display all portfolio items
            ));


            if ($portfolio_query->have_posts()) :
                while ($portfolio_query->have_posts()) : $portfolio_query->the_post();
            ?>
                    <div class="portfolio-item">
                        <h3><?php the_title(); ?></h3>
                        <?php the_content(); ?>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo '<p>No portfolio items found.</p>';
            endif;
            ?>
        </div><!-- .container -->
    </main><!-- #main -->
</div><!-- #primary -->

<?php get_footer(); ?>
