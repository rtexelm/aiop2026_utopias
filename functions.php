<?php

// custom navigation
// https://www.wpbeginner.com/wp-themes/how-to-add-custom-navigation-menus-in-wordpress-3-0-themes/
function wpb_custom_new_menu()
{
	register_nav_menus(
		array(
			'top-navigation' => __('Top Navigation'),
			'full-navigation' => __('Full Navigation'),
			'sub-navigation' => __('Sub Navigation'),
		)
	);
}
add_action('init', 'wpb_custom_new_menu');

// Allow featured images to be used
if (function_exists('add_theme_support')) {
	add_theme_support('post-thumbnails');
	// additional image sizes
	add_image_size('listings-thumb', 309, 9999); // 300 pixels wide (and unlimited height)
}


// Add Artists posts type
function register_artists()
{

	$labels = array(
		'name'				=> _x('Projects', 'Post type general name', 'textdomain'),
		'singular_name'		=> _x('Project', 'Post type singular name', 'textdomain'),
		'menu_name'			=> _x('Artists', 'Admin Menu text', 'textdomain'),
		'name_admin_bar'	=> _x('Artist', 'Add New on Toolbar', 'textdomain'),
		'add_new_item'		=> __('Add New Project', 'textdomain'),
		'add_new' 			=> __('Add New Project'),
		'add_new_item'		=> __('Add New Project'),
		'edit_item'   		=> __('Edit Project', 'textdomain'),
		'view_item'   		=> __('View Project', 'textdomain'),
		'all_items'   		=> __('All Projects', 'textdomain'),
		'search_items'		=> __('Search Projects', 'textdomain'),
		'not_found' 		=> __('No project found'),
		'not_found_in_trash' => __('No project found in Trash'),
	);
	$args = array(
		'labels' => $labels,
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'taxonomies' => array('category'),
		'hierarchical' => true,
		'rewrite' => array("slug" => "artists", 'with_front' => true), // Permalinks format
		'supports' => array('title', 'thumbnail'),
		'parent' => __('Parent Info'),
		'menu_position' => __(20),
	);

	register_post_type('artists', $args);
}
// Load up custom post types
add_action('init', 'register_artists');

function register_press()
{
	$args = array(
		'label' => __('Press'),
		'singular_label' => __('Press-Link'),
		'public' => true,
		'show_ui' => true,
		'capability_type' => 'post',
		'taxonomies' => array('category'),
		'hierarchical' => true,
		'rewrite' => array("slug" => "press", 'with_front' => true), // Permalinks format
		'supports' => array('title'), //, 'editor', 'excerpt', 'thumbnail'),
		'add_new' => __('Add New Press-Link'),
		'add_new_item' => __('Add New Press-Link'),
		'edit' => __('Edit Press-Link'),
		'edit_item' => __('Edit Press-Link'),
		'new_item' => __('New Press-Link'),
		'view' => __('View Press-Link'),
		'view_item' => __('View Press-Link'),
		'search_items' => __('Search Press'),
		'not_found' => __('No press-link found'),
		'not_found_in_trash' => __('No press-link found in Trash'),
		'parent' => __('Parent Info'),
		'menu_position' => __(20),
	);

	register_post_type('press', $args);
}
// Load up custom post types
add_action('init', 'register_press');

// Sort artists posts by title
function sort_posts_alpha($query)
{
	if ($query->is_tax('artists') && $query->is_main_query()) {
		$query->set('orderby', 'title');
		$query->set('order', 'ASC');
	}
}
add_action('pre_get_posts', 'sort_posts_alpha');


// Add sortable name field from artist's either group or last name
add_filter('save_post', 'create_sortable_name', 10, 2);
function create_sortable_name($post_id, $post)
{

	if ($post->post_type == 'artists') {
		$sortable_name = $post->last_name ?: $post->group_name;
		update_post_meta($post_id, 'sortable_name', $sortable_name);
	}
}


// add css & javascript
function add_theme_scripts()
{
	wp_enqueue_style('style', get_stylesheet_directory_uri() . '/style.css');
	wp_enqueue_script('jquery');
	wp_enqueue_script('main-js', get_template_directory_uri() . '/js/main.js', array('jquery'));
	wp_enqueue_script('p5-js', 'https://cdnjs.cloudflare.com/ajax/libs/p5.js/1.3.1/p5.min.js');
	if (is_front_page()) {
		// wp_enqueue_script('p5-js', get_template_directory_uri().'/js/p5.min.js');
		// wp_enqueue_script('canvas-js', get_template_directory_uri().'/js/canvas.js');
	}
	if (is_page('about')) {
		wp_enqueue_script('about-js', get_template_directory_uri() . '/js/about.js', array('p5-js'));
	}
}
add_action('wp_enqueue_scripts', 'add_theme_scripts');