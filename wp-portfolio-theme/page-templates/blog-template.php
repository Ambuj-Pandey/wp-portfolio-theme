<?php
/**
 * Template Name: Blog Page
 *
 * The template for displaying portfolio
 *
 * This is the template that displays all portfolio items.
 * 
 * @package DesignFly
 * 
 * @since 1.0.3
 * 
 */

 get_header();
?>

<div id="blog-template" class="container">
    <div class="row">
        <div class="col-md-8">
            <div class="header">
                <p>Let's Blog</p>
                <hr />
            </div>
            <div id="primary" class="content-area">
                <main id="main" class="site-main">
    
                <?php
                $posts_per_page = get_option( 'posts_per_page' ); // from admin panel > settings

                $paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : '1';
                $args = array(
                    'post_type'      => array( 'post', 'df-portfolio' ),
                    'post_status'    => 'publish',
                    'posts_per_page' => $posts_per_page,
                    'paged'          => $paged,
                    'nopaging'       => false,    
                );
                $query = new WP_Query($args);

                while ( $query -> have_posts() ) :
                    $query -> the_post(); 
                
                    get_template_part( 'template-parts/content', 'blog-template' );
    
                endwhile; // End of the loop.
                ?>

                <!-- pagination -->
                <?php designfly_pagination_bar( $query ); ?>
    
                </main><!-- #main -->
            </div><!-- #primary -->
        </div><!-- .col-md-8 -->

        <div class="col-md-4">
            <?php get_sidebar(); ?>
        </div><!-- .col-md-4 -->
    </div><!-- .row -->
</div> <!-- #blog-template -->

<?php
    get_footer();
?>