<?php
// Custom Post Type: Projects
add_action( 'init', 'register_cpt_projects' );
function register_cpt_projects() {

	$labels = array(
	'name' => _x( 'Projects', 'projects' ),
	'singular_name' => _x( 'projects', 'projects' ),
	'add_new' => _x( 'Add New', 'projects' ),
	'add_new_item' => _x( 'Add New projects', 'projects' ),
	'edit_item' => _x( 'Edit projects', 'projects' ),
	'new_item' => _x( 'New projects', 'projects' ),
	'view_item' => _x( 'View projects', 'projects' ),
	'search_items' => _x( 'Search Projects', 'projects' ),
	'not_found' => _x( 'No projects found', 'projects' ),
	'not_found_in_trash' => _x( 'No projects found in Trash', 'projects' ),
	'parent_item_colon' => _x( 'Parent projects:', 'projects' ),
	'menu_name' => _x( 'Projects', 'projects' ),
	);

	$args = array(
	'labels' => $labels,
	'hierarchical' => true,
	'supports' => array( 'title', 'editor' ),
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'show_in_nav_menus' => true,
	'publicly_queryable' => true,
	'exclude_from_search' => false,
	'has_archive' => true,
	'query_var' => true,
	'can_export' => true,
	'rewrite' => array( 'slug' => 'projects' ),
	'capability_type' => 'post'
	);

	register_post_type( 'projects', $args );
	}

// Custom Post Type: Raport
add_action( 'init', 'register_cpt_raports' );
function register_cpt_raports() {

	$labels = array(
	'name' => _x( 'Raports', 'raports' ),
	'singular_name' => _x( 'Raports', 'raports' ),
	'add_new' => _x( 'Add New', 'raports' ),
	'add_new_item' => _x( 'Add New Raports', 'raports' ),
	'edit_item' => _x( 'Edit Raports', 'raports' ),
	'new_item' => _x( 'New Raports', 'raports' ),
	'view_item' => _x( 'View Raports', 'raports' ),
	'search_items' => _x( 'Search Raports', 'raports' ),
	'not_found' => _x( 'No Raports found', 'raports' ),
	'not_found_in_trash' => _x( 'No Raports found in Trash', 'raports' ),
	'parent_item_colon' => _x( 'Parent Raports:', 'raports' ),
	'menu_name' => _x( 'Raports', 'raports' ),
	);

	$args = array(
	'labels' => $labels,
	'hierarchical' => true,
	'supports' => array( 'title', 'editor' ),
	'public' => true,
	'show_ui' => true,
	'show_in_menu' => true,
	'show_in_nav_menus' => true,
	'publicly_queryable' => true,
	'exclude_from_search' => false,
	'has_archive' => true,
	'query_var' => true,
	'can_export' => true,
	'rewrite' => array( 'slug' => 'raports' ),
	'capability_type' => 'post'
	);

	register_post_type( 'Raports', $args );
	}

?>