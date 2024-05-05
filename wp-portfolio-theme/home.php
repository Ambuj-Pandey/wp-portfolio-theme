<?php
/**
 * Template Name: Home Page
 * This is the template for the home page.
 *
 * @package Custom Theme
 */
get_header();
?>

<main id="main-content" class="main-content">
    <section class="hero">
        <div class="hero-content">
            <h2>Welcome to Custom Theme</h2>
            <p>This is a simple and elegant WordPress theme created from scratch.</p>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                    <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                    <div class="entry-content">
                        <?php the_content(); ?>
                    </div>
                </article>
            <?php endwhile;
            else :
                // If no posts are found, display a message
                echo '<p>No content found.</p>';
            endif;
            ?>
        </div>
    </section>
</main>

<?php get_footer(); ?>
