<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package DesignFly
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?> style="background: url( <?php echo get_template_directory_uri() . '/assets/images/rapeatable-bg.png' ?>)">
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'designfly' ); ?></a>

	<header id="masthead" class="site-header" style="background: url( <?php echo get_template_directory_uri() . '/assets/images/rapeatable-bg.png' ?>)">

		<!-- Navigation bar starts here -->

		<div class="container">
			<nav class="navbar navbar-expand-lg navbar-light">
			
				<?php 
					if ( has_custom_logo() ) :
							the_custom_logo();
					else :  
				?>
						<a href=" <?php echo get_site_url(); ?> " class="custom-logo-link">
							<img src=" <?php echo get_template_directory_uri() . '/assets/images/logo.png' ?> " alt="Logo" />
						</a>
				<?php endif; ?>	
			
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav mr-auto">
						<?php
						wp_nav_menu( array(
							'theme_location' => 'menu-1',
							'menu_id'        => 'primary-menu',
							'menu_class'     => 'nav-menu',
						) );
						?>
					</ul>
					<form class="form-inline my-2 my-lg-0" action="<?php echo home_url( '/' ); ?>" method="get">
						<input class="search-box" type="text" name="s" id="search" value="<?php the_search_query(); ?>" />
						<input id="header-search-btn" type="image" alt="Search" src="<?php bloginfo( 'template_url' ); ?>/assets/images/search-icon-normal.png" />
					</form>
				</div> <!-- .collapse -->
			</nav>
		</div> <!-- .container -->

		
	</header><!-- #masthead -->
		
		<?php
		if ( get_theme_mod( 'designfly-home-display-header' ) === true ):
			if ( is_front_page() && is_home() ) :
			?>
				<div id="intro-container">
					<div class="content">
						<h1 class="site-title">
							<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
								<?php bloginfo( 'name' ); ?>
							</a>
						</h1>

						<?php
							$designfly_description = get_bloginfo( 'description', 'display' );
							if ( $designfly_description || is_customize_preview() ) :
						?>
						<p class="site-description"><?php echo $designfly_description; ?></p>
							<?php endif; ?>
					</div>

					<?php 
					if ( has_header_image() ) : 
					?>

						<div class="header-img" style="background: url( <?php echo get_header_image(); ?> )"></div>
						
					<?php
					else : 
					?>
						<div class="header-img" style="background: url( <?php echo get_template_directory_uri() . '/assets/images/full-slider.png' ?> )"></div>

					<?php endif; ?>
				</div>
				
				<hr class="break"/>

				<?php
			else :
				?>
				<?php
			endif;
		endif;
		?>
			
		<!-- Bottom section of header -->

		<?php if ( get_theme_mod( 'designfly-features-display' ) === true ) : ?>

			<div class="container-fluid features-wrapper">
				<div class="container features-container">
					<div class="row">

						<div class="col-sm-4">
							<div class="thumbnail">
								<img src=" <?php echo wp_get_attachment_url( get_theme_mod( 'designfly-features-image-1' ) ); ?> "/>
							</div><!-- .thumbnail -->
							<div class="content">
								<p class="title"> <?php echo esc_html( get_theme_mod( 'designfly-features-title-1' ) ); ?> </p>
								<p class="description"> <?php echo esc_html( get_theme_mod( 'designfly-features-para-1' ) ); ?> </p>
							</div><!-- .content -->
						</div><!-- .col-sm-4 -->

						<div class="col-sm-4">
							<div class="thumbnail">
								<img src=" <?php echo wp_get_attachment_url( get_theme_mod( 'designfly-features-image-2' ) ); ?> "/>
							</div><!-- .thumbnail -->
							<div class="content">
								<p class="title"> <?php echo esc_html( get_theme_mod( 'designfly-features-title-2' ) ); ?> </p>
								<p class="description"> <?php echo esc_html( get_theme_mod( 'designfly-features-para-2' ) ); ?> </p>
							</div><!-- .content -->
						</div><!-- .col-sm-4 -->
						
						<div class="col-sm-4">
							<div class="thumbnail">
								<img src=" <?php echo wp_get_attachment_url( get_theme_mod( 'designfly-features-image-3' ) ); ?> "/>
							</div><!-- .thumbnail -->
							<div class="content">
								<p class="title"> <?php echo esc_html( get_theme_mod( 'designfly-features-title-3' ) ); ?> </p>
								<p class="description"> <?php echo esc_html( get_theme_mod( 'designfly-features-para-3' ) ); ?> </p>
							</div><!-- .content -->
						</div><!-- .col-sm-4 -->

					</div><!-- .row -->
				</div><!-- .container -->
			</div><!-- .container-fluid -->

		<?php endif; ?>	
		


	<div id="content" class="site-content">
