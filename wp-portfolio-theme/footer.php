<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DesignFly
 */

?>

	</div><!-- #content -->

	<footer id="footer-wrapper" class="site-footer">
		<div class="content container">
		<hr class="bar" />
			<div class="row">
				<div class="info col-sm-6">
					<?php 
						// the query
						$the_query = new WP_Query( array(
							'posts_per_page' => 1,
						) ); 
						
						if ( $the_query->have_posts() ) : 
							$the_query->the_post();
					?>
							<p class="title"><a href="<?php echo get_post_permalink(); ?>"><?php echo get_the_title(); ?> </a></p>
							<p class="para"> <?php echo get_the_excerpt(); ?> </p>
					<?php 
						wp_reset_postdata();
			
						else :
							__('No Posts found');
						endif; 
					?>	
						
				</div>
				
				<div class="contact-us col-sm-6">
					<p class="title"><?php esc_html_e( 'Contact Us',  'designfly' ); ?></p>
					<p class="address"> <?php echo get_theme_mod( 'designfly-footer-contact' ); ?> </p>
					<span><?php esc_html_e( 'Email', 'designfly' ); ?>: <p class="email">
						<a href="mailto:<?php echo get_theme_mod( 'designfly-footer-email' ); ?>">
							<?php echo get_theme_mod( 'designfly-footer-email' ); ?>
						</a></p> </span>
					<ul class="social-media">
						<?php 
							/* social media urls */
							$urls = get_theme_mod( 'designfly-footer-urls' );
							$urls = explode( ';', $urls );
							
							foreach ( $urls as $url ) :
								$url = trim( $url );
								if ( strpos( $url, 'facebook.com' ) !== false ) { ?>
									<li>
										<a target="_blank" href="<?php echo $url; ?>"><img id="social-facebook" src=" <?php echo get_template_directory_uri() . '/assets/images/facebook.png' ?>" /></a>
									</li> <?php
								} elseif ( strpos( $url, 'google' ) !== false ) { ?>
									<li>
										<a target="_blank" href="<?php echo $url; ?>"><img id="social-gp" src=" <?php echo get_template_directory_uri() . '/assets/images/gp.png' ?> " /></a>
									</li> <?php
								} elseif ( strpos( $url, 'linkedin.com' ) !== false ) { ?>
									<li>
										<a target="_blank" href="<?php echo $url; ?>"><img id="social-linkedin" src=" <?php echo get_template_directory_uri() . '/assets/images/linkedin.png' ?> " /></a>
									</li> <?php
								} elseif ( strpos( $url, 'pinterest.com' ) !== false ) { ?>
									<li>
										<a target="_blank" href="<?php echo $url; ?>"><img id="social-pin" src=" <?php echo get_template_directory_uri() . '/assets/images/pin.png' ?> " /></a>
									</li> <?php
								} elseif ( strpos( $url, 'twitter.com' ) !== false ) { ?>
									<li>
										<a target="_blank" href="<?php echo $url; ?>"><img id="social-twitter" src=" <?php echo get_template_directory_uri() . '/assets/images/twitter.png' ?> " /></a>
									</li> <?php
								}
							endforeach;
						?>
					</ul>
				</div>
			</div>
			<hr class="bar" />
		</div>

		<?php 
		if ( get_theme_mod( 'designfly-footer-display', 'Yes' ) == 'Yes' ) :
		?>
			<div class="site-info container">
				<p> <?php echo esc_html__( get_theme_mod( 'designfly-footer-info' ) ); ?> | <?php esc_html_e( 'Designed by', 'designfly' ); ?><a href="https://www.rtcamp.com">rtCamp</a>
				</p>
			</div>
		<?php
		endif;
		?>

	</footer><!-- #footer-wrapper -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
