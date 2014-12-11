<?php
// Ukrywanie paska admina
add_filter( 'show_admin_bar', '__return_false' );

// Dodawanie Menu
function register_menus() {
register_nav_menus(
	array(
		'main-menu' =>  'Main Menu',
		'blog-menu' =>  'Blog Menu',
		'footer-nav--primary' =>  'Footer Primary',
		'footer-nav--secondary' =>  'Footer Secondary'
	)
);
}
add_action( 'init', 'register_menus' );

// Miniaturki dla postów
add_theme_support('post-thumbnails', array('post'));
set_post_thumbnail_size( 345, 230, true );
add_image_size( 'post', 735, 735, true );


// Dodawanie klasy lead do pierwszego paragrafu w poście
function first_paragraph($content) {
	global $post;
	return preg_replace('/<p([^>]+)?>/', '<p$1 class="lead">', $content, 1);
}
add_filter('the_content', 'first_paragraph');


// Skracanie wstępu na blogu
function custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'custom_excerpt_length', 999 );


// Okruszki
function the_breadcrumb() {
		echo '<ol class="breadcrumbs">';
	if (!is_home()) {
		echo '<li><a href="';
		echo get_option('home');
		echo '">';
		bloginfo('name');
		echo "</a></li>";
		if (is_category() || is_single()) {
			echo '<li>';
			the_category(' </li><li> ');
			if (is_single()) {
				echo "</li><li>";
				the_title();
				echo '</li>';
			}
		} elseif (is_page()) {
			echo '<li>';
			echo the_title();
			echo '</li>';
		}
	}
	elseif (is_tag()) {single_tag_title();}
	elseif (is_day()) {echo"<li>Archiwum z "; the_time('F jS, Y'); echo'</li>';}
	elseif (is_month()) {echo"<li>Archiwum z "; the_time('F, Y'); echo'</li>';}
	elseif (is_year()) {echo"<li>Archiwum z "; the_time('Y'); echo'</li>';}
	elseif (is_author()) {echo"<li>Archiwum autora"; echo'</li>';}
	elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Archiwum bloga"; echo'</li>';}
	elseif (is_search()) {echo"<li>Wynik wyszukiwania"; echo'</li>';}
	echo '</ol>';
}


$blog_id = get_current_blog_id();
if($blog_id==2){
	require_once dirname( __FILE__ ) . '/cpt-pl.php';
}

if($blog_id==3){
	require_once dirname( __FILE__ ) . '/cpt-en.php';
}


function shiba_add_rewrite_rules($permastruct, $ep_mask=EP_NONE) {
    if (!$permastruct)return;
    global $wp_rewrite;
    $wp_rewrite->matches = 'matches'; // this is necessary to write the rules properly
    $new_rules = $wp_rewrite->generate_rewrite_rules($permastruct, $ep_mask);
    $rules = get_option('rewrite_rules');
    $rules = array_merge($new_rules, $rules);
    update_option('rewrite_rules', $rules);
}

// remove all rewrite rules for a given permastruct
function shiba_remove_rewrite_rules($permastruct, $ep_mask=EP_NONE) {
    // replace all tags within permastruct
    if (!$permastruct)return;
    global $wp_rewrite;
    $wp_rewrite->matches = 'matches';
    $remove_rules = $wp_rewrite->generate_rewrite_rules($permastruct);
    $num_rules = count($remove_rules);
    // Get first rule
    $rule1 = reset($remove_rules); $key_rule1 = key($remove_rules);

    $rules = get_option('rewrite_rules');
    $i = $num_rules;
    foreach ($rules as $pretty_link => $query_link) {
        // find the first rule
        if (($pretty_link == $key_rule1) && ($query_link == $rule1)) { $i = 0; }
        if ($i < $num_rules) {
            // Delete next $num_rules
            unset($rules[$pretty_link]); $i++;
        }
    }
    update_option('rewrite_rules', $rules);
}
?>