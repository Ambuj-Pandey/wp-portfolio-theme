<?php get_header(); ?>

<div class="single_wrapper">
    <div class="single_content">
        <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <p class="single-blog-title"><?php the_title(); ?></p>
            <hr class="single-blog-title-bottom-hr"/>
            <div class="single-blog-disc"><?php the_excerpt(); ?></div>
            <br/>
            <div class="single-blog-disc"><?php the_content(); ?></div>
            <br/>
            </br/>
            <p class="comments-own-title"><?php echo __('Comments', 'WP-Portfolio'); ?></p>
            <hr/>
            <?php comments_template(); ?>
        <?php endwhile; endif; ?>
    </div>
</div>
<br/>

<?php get_footer(); ?>
