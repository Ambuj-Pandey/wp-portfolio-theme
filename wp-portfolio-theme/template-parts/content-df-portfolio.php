<?php
/**
 * Template part for displaying portfolio items
 *
 * @package DesignFly
 */

?>

	<div id="portfolio-item-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php 
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular( 'df-portfolio' ) ) :
			?>
			
			<header class="entry-header">
				<div class="entry-title">
					<?php the_title(); ?>
				</div>

				<div class="entry-meta">
				<?php
					designfly_posted_by();
					designfly_posted_on();
				?>

				<span class="comments"><?php echo get_comments_number(); ?> Comment(s) </span> 
			</div><!-- .entry-meta -->
			
			<hr class="bar"/>
			
			</header>
			
			<div class="post-thumbnail">
				<?php the_post_thumbnail(); ?>
			</div>
			
			<div class="entry-content">
				<?php the_content(); ?>
			</div>
			<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'designfly' ),
				'after'  => '</div>',
			) );
			?>
		<?php else: ?>
		
			<div class="view-image">
				<span class="dashicons dashicons-instagram"></span>
				<span>View Image</span>
			</div>
			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true" tabindex="-1">
				<?php the_post_thumbnail(); ?>
			</a>

			<div class="post-title">
				<a aia-hidden="true" href="<?php the_permalink(); ?>" tabindex="-1">
					<?php the_title(); ?>
				</a>
			</div>

		<?php
		endif; // End is_singular().
	?>

    </div><!-- #post-<?php the_ID(); ?> -->
