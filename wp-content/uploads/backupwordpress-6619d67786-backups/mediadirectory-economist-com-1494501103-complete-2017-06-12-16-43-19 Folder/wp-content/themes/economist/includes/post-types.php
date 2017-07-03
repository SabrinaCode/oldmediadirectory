<?php
/**
 * The registration of any custom post types that need to be defined within
 * the theme.
 */
function register_custom_post_types() {
	$post_types = array(
		'people' => array(
			'labels' 				=> array(
				'name' 					=> _x('People', 'people'),
				'singular_name' 		=> _x('People', 'people'),
				'add_new' 				=> _x('Add New Person', 'people'),
				'add_new_item' 			=> _x('Add New Person', 'people'),
				'edit_item' 			=> _x('Edit Person', 'people'),
				'new_item' 				=> _x('New Person', 'people'),
				'view_item' 			=> _x('View Person', 'people'),
				'search_items' 			=> _x('Search People', 'people'),
				'not_found' 			=> _x('No people found', 'people'),
				'not_found_in_trash' 	=> _x('No people found in Trash', 'people'),
				'parent_item_colon' 	=> _x('Parent:', 'people'),
				'menu_name' 			=> _x('People', 'people')
			),
			'hierarchical' 			=> true,
			'description' 			=> '',
			'supports' 				=> array('title', 'editor', 'thumbnail', 'revisions'),
			'taxonomies' 			=> array(),
			'public' 				=> true,
			'show_ui' 				=> true,
			'show_in_menu' 			=> true,
			'menu_icon' 			=> 'dashicons-businessman',
			'menu_position' 		=> 5,
			'show_in_nav_menus'		=> true,
			'publicly_queryable' 	=> true,
			'exclude_from_search' 	=> false,
			'has_archive' 			=> false,
			'query_var' 			=> true,
			'can_export' 			=> true,
			'rewrite' 				=> true,
			'capability_type' 		=> 'post'
		)
	);
	
	foreach ( $post_types as $name => $args ) {
		register_post_type( $name, $args );
	}
}