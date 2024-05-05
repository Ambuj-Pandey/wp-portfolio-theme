<?php
/**
 * DesignFly Theme Customizer
 *
 * @package DesignFly
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function designfly_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial( 'blogname', array(
			'selector'        => '.site-title a',
			'render_callback' => 'designfly_customize_partial_blogname',
		) );
		$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
			'selector'        => '.site-description',
			'render_callback' => 'designfly_customize_partial_blogdescription',
		) );
	}
}
add_action( 'customize_register', 'designfly_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function designfly_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function designfly_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function designfly_customize_preview_js() {
	wp_enqueue_script( 'designfly-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'designfly_customize_preview_js' );


/**
 * function for registering all theme mods on 'Home Page'
 * 
 * @since 1.0.5
 */

 function register_home_mods( $wp_customize ) {
/* Home Page Settings */
	// 'Home Page' display header section or not
	$wp_customize -> add_setting( 'designfly-home-display-header', array(
		'default' => true,
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'designfly-home-display-header-control',
	array(
		'label'    => __( 'Display header section', 'designfly' ),
		'section'  => 'static_front_page',
		'settings' => 'designfly-home-display-header',
		'type'     => 'checkbox',
		'priority' => 1,
	) ) );

	// 'Home page' display recent portfolio
	$wp_customize -> add_setting( 'designfly-home-display-portfolio', array(
		'default' => true,
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'designfly-home-display-portfolio-control',
	array(
		'label'    => __( 'Display latest portfolio items', 'designfly' ),
		'section'  => 'static_front_page',
		'settings' => 'designfly-home-display-portfolio',
		'type'     => 'checkbox',
		'priority' => 2,
	) ) );

	// 'Home Page' portfolio section title
	$wp_customize -> add_setting( 'designfly-home-portfolio-title', array(
		'default' => 'D\'sign is the soul'
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'designfly-home-portfolio-title-control',
	array(
		'label'    => __( 'Portfolio Section Title', 'designfly' ),
		'section'  => 'static_front_page',
		'settings' => 'designfly-home-portfolio-title',
		'type'     => 'text',
		'priority' => 3,
	) ) );

	// 'Home Page' View all button url
	$wp_customize -> add_setting( 'designfly-home-portfolio-btn', array(
		'default' => '',
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'designfly-hoome-portfolio-btn-control',
	array(
		'label'    => __( 'Portfolio \'View all\' button url', 'designfly' ),
		'section'  => 'static_front_page',
		'settings' => 'designfly-home-portfolio-btn',
		'type'     => 'dropdown-pages', 
		'priority' => 4,
	) ) );

 }

/**
 * function for registering 'Footer section' theme mods
 * 
 * @since 1.0.5
 */
function register_footer_mods( $wp_customize ) {
	$wp_customize -> add_section( 'designfly-footer-section', array(
		'title' => __( 'Footer settings', 'designfly' )
	) );

	// contact info
	$wp_customize -> add_setting( 'designfly-footer-contact', array(
		'capability' => 'edit_theme_options',
		'default'    => 'Street 21 Planet, A-11, california <br> Tel: 91234 42354'
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'designfly-footer-contact-control',
	array(
		'label'    => __( 'Contact info(use \'<br>\' for new line)', 'designfly' ),
		'section'  => 'designfly-footer-section',
		'settings' => 'designfly-footer-contact',
		'type'     => 'textarea',
	) ) );

	// Email
	$wp_customize -> add_setting( 'designfly-footer-email', array(
		'capability' => 'edit_theme_options',
		'default' => ''
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'designfly-footer-email-control',
	array(
		'label'    => __( 'Contact email', 'designfly' ),
		'section'  => 'designfly-footer-section',
		'settings' => 'designfly-footer-email',
		'type'     => 'text',
	) ) );

	
	// Site info text
	$wp_customize -> add_setting( 'designfly-footer-info', array(
		'capability' => 'edit_theme_options',
		'default' => '2012 - DESIGNfly'
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'designfly-footer-info-control',
	array(
		'label'    => __( 'Site info text', 'designfly' ),
		'section'  => 'designfly-footer-section',
		'settings' => 'designfly-footer-info',
		'type'     => 'text',
	) ) );

	// Social media urls
	$wp_customize -> add_setting( 'designfly-footer-urls', array(
		'capability' => 'edit_theme_options',
		'default' => 'https://www.facebook.com/'
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'designfly-footer-urls-control',
	array(
		'label'    => __( 'Social site urls(separate urls with a semicolon(;))', 'designfly' ),
		'section'  => 'designfly-footer-section',
		'settings' => 'designfly-footer-urls',
		'type'     => 'textarea',
	) ) );

}

/**
 * function for making the 'features' section customizable from admin panel
 * @since 1.0.2
 */

function register_features_mods( $wp_customize ) {
	$wp_customize -> add_section( 'designfly-features-section', array(
		'title' => __( 'Services bar', 'designfly' )
	) );

	/* Features settings */
	// 'Features' display or not
	$wp_customize -> add_setting( 'designfly-features-display', array(
		'default' => true,
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'designfly-features-display-control',
	array(
		'label'    => __( 'Display features?', 'designfly' ),
		'section'  => 'designfly-features-section',
		'settings' => 'designfly-features-display',
		'type'     => 'checkbox',
	) ) );
	/* Features block-1 */
	// 'Features' title
	$wp_customize -> add_setting( 'designfly-features-title-1', array(
		'default' => 'Title Text'
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'designfly-features-title-control-1',
	array(
		'label'    => __( 'Title-1', 'designfly' ),
		'section'  => 'designfly-features-section',
		'settings' => 'designfly-features-title-1',
	) ) );
	
	// 'Features' paragraph
	$wp_customize -> add_setting( 'designfly-features-para-1', array(
		'default' => 'Description about the service...'
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'designfly-features-para-control-1',
	array(
		'label'    => __( 'Description-1', 'designfly' ),
		'section'  => 'designfly-features-section',
		'settings' => 'designfly-features-para-1',
		'type'     => 'textarea',
	) ) );

	// 'Features' Image
	$wp_customize -> add_setting( 'designfly-features-image-1' );

	$wp_customize -> add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'designfly-features-image-control-1',
	array(
		'label'    => __( 'Image-1', 'designfly' ),
		'section'  => 'designfly-features-section',
		'settings' => 'designfly-features-image-1',
		'width'    => 50,
		'height'   => 50,
	) ) );

	/* Features block-2 */
	// 'Features' title
	$wp_customize -> add_setting( 'designfly-features-title-2', array(
		'default' => 'Title Text'
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'designfly-features-title-control-2',
	array(
		'label'    => __( 'Title-2', 'designfly' ),
		'section'  => 'designfly-features-section',
		'settings' => 'designfly-features-title-2',
	) ) );
	
	// 'Features' paragraph
	$wp_customize -> add_setting( 'designfly-features-para-2', array(
		'default' => 'Description about the service...'
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'designfly-features-para-control-2',
	array(
		'label'    => __( 'Description-2', 'designfly' ),
		'section'  => 'designfly-features-section',
		'settings' => 'designfly-features-para-2',
		'type'     => 'textarea',
	) ) );

	// 'Features' Image
	$wp_customize -> add_setting( 'designfly-features-image-2' );

	$wp_customize -> add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'designfly-features-image-control-2',
	array(
		'label'    => __( 'Image-2', 'designfly' ),
		'section'  => 'designfly-features-section',
		'settings' => 'designfly-features-image-2',
		'width'    => 50,
		'height'   => 50,
	) ) );

	/* Features block-1 */
	// 'Features' title
	$wp_customize -> add_setting( 'designfly-features-title-3', array(
		'default' => 'Title Text'
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'designfly-features-title-control-3',
	array(
		'label'    => __( 'Title-3', 'designfly' ),
		'section'  => 'designfly-features-section',
		'settings' => 'designfly-features-title-3',
	) ) );
	
	// 'Features' paragraph
	$wp_customize -> add_setting( 'designfly-features-para-3', array(
		'default' => 'Description about the service...'
	) );

	$wp_customize -> add_control( new WP_Customize_Control( $wp_customize, 'designfly-features-para-control-3',
	array(
		'label'    => __( 'Description-3', 'designfly' ),
		'section'  => 'designfly-features-section',
		'settings' => 'designfly-features-para-3',
		'type'     => 'textarea',
	) ) );

	// 'Features' Image
	$wp_customize -> add_setting( 'designfly-features-image-3' );

	$wp_customize -> add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'designfly-features-image-control-3',
	array(
		'label'    => __( 'Image-3', 'designfly' ),
		'section'  => 'designfly-features-section',
		'settings' => 'designfly-features-image-3',
		'width'    => 50,
		'height'   => 50,
	) ) );
 }

 /**
  * this function calls all helper function to register all theme mods
  * 
  * @since 1.0.5
  */
  function designfly_theme_mods( $wp_customize ) {
	  register_features_mods( $wp_customize );
	  register_home_mods( $wp_customize );
	  register_footer_mods( $wp_customize );
  }
  
 add_action( 'customize_register', 'designfly_theme_mods' );
