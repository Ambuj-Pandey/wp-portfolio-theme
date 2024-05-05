<?php
function custom_theme_setup() {
    add_theme_support('title-tag');
    add_theme_support('post-thumbnails');
    register_nav_menus(array(
        'primary-menu' => __('Primary Menu', 'WP-Portfolio'),
    ));
}
add_action('after_setup_theme', 'custom_theme_setup');


function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );


function custom_theme_register_portfolio_post_type() {
    $labels = array(
        'name'                  => _x( 'Portfolio', 'Post Type General Name', 'WP-Portfolio' ),
        'singular_name'         => _x( 'Portfolio Item', 'Post Type Singular Name', 'WP-Portfolio' ),
        'menu_name'             => __( 'Portfolio', 'WP-Portfolio' ),
        'name_admin_bar'        => __( 'Portfolio', 'WP-Portfolio' ),
        'archives'              => __( 'Portfolio Archives', 'WP-Portfolio' ),
        'attributes'            => __( 'Portfolio Attributes', 'WP-Portfolio' ),
        'parent_item_colon'     => __( 'Parent Portfolio Item:', 'WP-Portfolio' ),
        'all_items'             => __( 'All Portfolio Items', 'WP-Portfolio' ),
        'add_new_item'          => __( 'Add New Portfolio Item', 'WP-Portfolio' ),
        'add_new'               => __( 'Add New', 'WP-Portfolio' ),
        'new_item'              => __( 'New Portfolio Item', 'WP-Portfolio' ),
        'edit_item'             => __( 'Edit Portfolio Item', 'WP-Portfolio' ),
        'update_item'           => __( 'Update Portfolio Item', 'WP-Portfolio' ),
        'view_item'             => __( 'View Portfolio Item', 'WP-Portfolio' ),
        'view_items'            => __( 'View Portfolio Items', 'WP-Portfolio' ),
        'search_items'          => __( 'Search Portfolio Item', 'WP-Portfolio' ),
        'not_found'             => __( 'Not found', 'WP-Portfolio' ),
        'not_found_in_trash'    => __( 'Not found in Trash', 'WP-Portfolio' ),
        'featured_image'        => __( 'Featured Image', 'WP-Portfolio' ),
        'set_featured_image'    => __( 'Set featured image', 'WP-Portfolio' ),
        'remove_featured_image' => __( 'Remove featured image', 'WP-Portfolio' ),
        'use_featured_image'    => __( 'Use as featured image', 'WP-Portfolio' ),
        'insert_into_item'      => __( 'Insert into portfolio item', 'WP-Portfolio' ),
        'uploaded_to_this_item' => __( 'Uploaded to this portfolio item', 'WP-Portfolio' ),
        'items_list'            => __( 'Portfolio items list', 'WP-Portfolio' ),
        'items_list_navigation' => __( 'Portfolio items list navigation', 'WP-Portfolio' ),
        'filter_items_list'     => __( 'Filter portfolio items list', 'WP-Portfolio' ),
    );
    $args = array(
        'label'                 => __( 'Portfolio Item', 'WP-Portfolio' ),
        'description'           => __( 'Portfolio items', 'WP-Portfolio' ),
        'labels'                => $labels,
        'supports'              => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'hierarchical'          => false,
        'public'                => true,
        'show_ui'               => true,
        'show_in_menu'          => true,
        'menu_position'         => 5,
        'menu_icon'             => 'dashicons-portfolio', // Use Dashicons for the menu icon, or specify a URL to your custom icon
        'show_in_admin_bar'     => true,
        'show_in_nav_menus'     => true,
        'can_export'            => true,
        'has_archive'           => true,
        'exclude_from_search'   => false,
        'publicly_queryable'    => true,
        'capability_type'       => 'post',
        'rewrite'               => array( 'slug' => 'portfolio' ), 
    );
    register_post_type( 'portfolio', $args );
}
add_action( 'init', 'custom_theme_register_portfolio_post_type', 0 );