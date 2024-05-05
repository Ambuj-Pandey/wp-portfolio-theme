<?php
/**
 * Template Name: Portfolio Page
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

$paged = ( get_query_var( 'paged' ) ) ? get_query_var( 'paged' ) : 1;
$query = new WP_Query( array( 
	'post_type' => 'df-portfolio',
	'posts_per_page' => 15,
	'paged'          => $paged 
	)
 );

 if ( $query -> have_posts() ):
	?>

	<div id="view-image-container">
		<div class="content-wrapper">
			<img src="" />
			<span class="close"><span class="dashicons dashicons-no-alt"></span></span>
		</div>
	</div>

    <div id="portfolio-wrapper">

		<!-- top bar -->
		<div class="portfolio-wrapper-top">
			<p class="title"> <?php echo esc_html( get_theme_mod( 'designfly-home-portfolio-title', 'd\'sign is the soul' ) ); ?> </p>
			<hr />
		</div>
	
	<?php
    while ( $query -> have_posts() ):
        $query -> the_post();
    	get_template_part( 'template-parts/content', 'df-portfolio' );  
	endwhile;
	?>
	</div> <!-- #portfolio-wrapper -->
	
	<?php
		designfly_pagination_bar( $query );
	?>
	</div>

	<?php
else:
    ?>
    <p>
		<?php _e( 'Sorry, no portfolio items found.', 'designfly' ); ?>
	</p>
    <?php
endif;
?>


<?php
get_footer();
?>