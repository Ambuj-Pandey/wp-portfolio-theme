<?php
/**
 * DesignFly functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package DesignFly
 */

if ( ! function_exists( 'designfly_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function designfly_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on DesignFly, use a find and replace
		 * to change 'designfly' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'designfly', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'menu-1' => esc_html__( 'Primary', 'designfly' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );
		
		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 65,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => false,
		) );
	}
endif;
add_action( 'after_setup_theme', 'designfly_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function designfly_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'designfly_content_width', 640 );
}
add_action( 'after_setup_theme', 'designfly_content_width', 0 );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function designfly_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'designfly' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'designfly' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'designfly_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function designfly_scripts() {

	/**
	 * wp_enqueue_style( string $handle, string $src = '', array $deps = array(), string|bool|null $ver = false, string $media = 'all' )
	 */

	// dashicons support
	wp_enqueue_style('dashicons');
	
	// jquery script
	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/lib/jquery3.4.1/jquery.js' );

	// bootstrap styles
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/lib/bs-4.3.1/css/bootstrap.min.css' );

	// bootstrap scripts
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/lib/bs-4.3.1/js/bootstrap.min.js', 'jquery', false, true );

	// custom css (main style)
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/layouts/css/main.css' );
	
	// sidebar style
	wp_enqueue_style( 'sidebar-style', get_template_directory_uri() . '/layouts/sidebar-content.css' );
	
	// Media queryes
	wp_enqueue_style( 'media-query', get_template_directory_uri() . '/layouts/css/media-queries.css' );

	wp_enqueue_style( 'designfly-style', get_stylesheet_uri() );

	// Main js file
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/main.js', 'main', false, true );
	wp_localize_script( 'main-script', 'directory_name', array( 'templateUrl' => get_stylesheet_directory_uri() ) );

	wp_enqueue_script( 'designfly-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'designfly-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'designfly_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Custom widget 'Designfly Portfolio'
 */
require get_template_directory() . '/inc/widgets.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

/**
 * function for maintaining the styling of active class
 * 
 * @since 1.0.2
 */
function special_nav_class ($classes, $item) {
  if (in_array('current-menu-item', $classes) ){
    $classes[] = 'active ';
  }
  return $classes;
}

add_filter( 'nav_menu_css_class' , 'special_nav_class' , 10 , 2 );

/**
 * function for registering custom post type 'portfolio'
 * 
 * @since 1.0.3
 */
function designfly_custom_post_type() {
	
	$labels = array(
			'name'           => esc_html__( 'Portfolio', 'designfly' ),
			'singular_name'  => esc_html__( 'Portfolio', 'designfly' ),
			'add_new'        => esc_html__( 'Add Portfolio Item', 'designfly' ),
			'all_items'      => esc_html__( 'All Portfolio Items', 'designfly' ),
			'add_new_item'   => esc_html__( 'Add Portfolio item', 'designfly' ),
			'edit_item'      => esc_html__( 'Edit Portfolio Item', 'designfly' ),
			'new_item'       => esc_html__( 'New Portfolio Item', 'designfly' ),
			'view_item'      => esc_html__( 'View Portfolio Item', 'designfly' ),
			'search_item'    => esc_html__( 'Search Portfolio', 'designfly' ),
			'not_found'      => esc_html__( 'No portfolio items found', 'designfly' ),
		'not_found_in_trash' => esc_html__( 'No portfolio items found in trash', 'designfly' ),
		'parent_item_colon'  => esc_html__( 'Parent Item', 'designfly' )
	);
	
	$args = array(
		'labels'             => $labels,
		'public'             => true,
		'has_archive'        => true,
		'publicly_queryable' => true,
		'query_var'          => true,
		'rewrite'            => true,
		'capability_type'    => 'post',
		'hierarchical'       => false,
		'menu_icon'          => 'dashicons-instagram',
		'supports'            => array(
			'title',
			'editor',
			'excerpt',
			'thumbnail',
			'comments',
			'revision',
		),
		'taxonomies'          => array( 'category', 'post_tag' ),
		'menu_position'       => 5,
		'exclude_from_search' => false,
		'rewrite'             => array( 'slug' => 'df-portfolio' ),
	);

	register_post_type( 'df-portfolio', $args );
}

add_action( 'init', 'designfly_custom_post_type' );

/**
 * Filter the "read more" excerpt string link to the post.
 *
 * @param string $more "Read more" excerpt string.
 * @return string (Maybe) modified "read more" excerpt string.
 * @since 1.0.6
 */
function wpdocs_excerpt_more( $more ) {
    if ( ! is_single() ) {
        $more = sprintf( '<a class="read-more" href="%1$s">%2$s</a>',
            get_permalink( get_the_ID() ),
            __( 'Read More', 'textdomain' )
        );
    }
 
    return $more;
}
add_filter( 'excerpt_more', 'wpdocs_excerpt_more' );


add_filter( 'the_excerpt', 'do_shortcode' );
add_filter( 'widget_text', 'do_shortcode' );

/**
 * Filter the except length to 20 words.
 *
 * @param int $length Excerpt length.
 * @return int (Maybe) modified excerpt length.
 * @since 1.0.4
 */
function wpdocs_custom_excerpt_length( $length ) {
    return 35;
}
add_filter( 'excerpt_length', 'wpdocs_custom_excerpt_length', 999 );
