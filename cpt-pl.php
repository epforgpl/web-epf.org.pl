<?php
// Custom Post Type: Projects
add_action( 'init', 'register_cpt_projects' );
function register_cpt_projects() {

	$labels = array(
	'name' => _x( 'Nasze projekty', 'projekty' ),
	'singular_name' => _x( 'projekty', 'projekty' ),
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
	'supports'           => array( 'title','author', 'thumbnail' ),
	'rewrite' => array( 'slug' => 'projekty' ),
	'capability_type' => 'post'
	);

	register_post_type( 'projects', $args );
	}

// Custom Post Type: Raport
add_action( 'init', 'register_cpt_raports' );
function register_cpt_raports() {

	$labels = array(
	'name' => _x( 'Raporty', 'raporty' ),
	'singular_name' => _x( 'raporty', 'raporty' ),
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
	'rewrite' => array( 'slug' => 'raporty' ),
	'capability_type' => 'post'
	);

	register_post_type( 'Raports', $args );
	}
// Wydarzenia
    $labels = array(
        'name'               => 'Wydarzenia',
        'singular_name'      => 'Event',
        'menu_name'          => 'Wydarzenia',
        'name_admin_bar'     => 'Event',
        'add_new'            => 'Dodaj nowy',
        'add_new_item'       => 'Dodaj nowy event',
        'new_item'           => 'Nowy event',
        'edit_item'          => 'Edytuj event',
        'view_item'          => 'Zobacz eventy',
        'all_items'          => 'Wszystkie eventy',
        'search_items'       => 'Szukaj eventu',
        'parent_item_colon'  => 'Rodzic eventu:',
        'not_found'          => 'Nie znaleziono eventu.',
        'not_found_in_trash' => 'Nie znaleziono eventu w koszu.',
    );
    
    $args = array(
        'labels'             => $labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'wydarzenia' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 5,
        'menu_icon'          => 'dashicons-star-half',
        'supports'           => array( 'title','author', 'thumbnail' ),
        'taxonomies'         => array( 'category', 'post_tag' )
    );
    register_post_type( 'event', $args );
    
    // Custom Taxonomies
function my_custom_taxonomies() {
    register_taxonomy(
        'Kategoria eventów',
        'event',
        array(
            'label' => __( 'Kategoria eventów' ),
            'rewrite' => array( 'slug' => 'event-kategora' ),
            'hierarchical' => true,
        )
    );
        
}

add_action( 'init', 'my_custom_taxonomies' );
?>