<?php
	function register_custom_taxonomies() {
		$taxonomies = array(
			'location' => array(
				'post_types' 	=> 'people',
					'args' 			=> array(
						'labels'             => array(
							'name'                       => _x( 'Locations', 'Taxonomy General Name' ),
							'singular_name'              => _x( 'Location', 'Taxonomy Singular Name' ),
							'menu_name'                  => __( 'Locations' ),
							'all_items'                  => __( 'All Locations' ),
							'parent_item'                => __( 'Parent Location' ),
							'parent_item_colon'          => __( 'Parent Location:' ),
							'new_item_name'              => __( 'New LocationName' ),
							'add_new_item'               => __( 'Add New Location' ),
							'edit_item'                  => __( 'Edit Location' ),
							'update_item'                => __( 'Update Location' ),
							'view_item'                  => __( 'View Location' ),
							'separate_items_with_commas' => __( 'Separate locations with commas' ),
							'add_or_remove_items'        => __( 'Add or remove locations' ),
							'choose_from_most_used'      => __( 'Choose from the most used locations' ),
							'popular_items'              => __( 'Popular Locations' ),
							'search_items'               => __( 'Search Locations' ),
							'not_found'                  => __( 'No locations found' )
						),
					'hierarchical'       => true,
					'public'             => true,
					'show_ui'            => true,
					'show_admin_column'  => true,
					'show_in_nav_menus'  => true,
					'show_tagcloud'      => true
				)
			),

			'language' => array(
				'post_types' 	=> 'people',
				'args' 			=> array(
					'labels'             => array(
						'name'                       => _x( 'Languages', 'Taxonomy General Name' ),
						'singular_name'              => _x( 'Language', 'Taxonomy Singular Name' ),
						'menu_name'                  => __( 'Languages' ),
						'all_items'                  => __( 'All Languages' ),
						'parent_item'                => __( 'Parent Language' ),
						'parent_item_colon'          => __( 'Parent Language:' ),
						'new_item_name'              => __( 'New LanguageName' ),
						'add_new_item'               => __( 'Add New Language' ),
						'edit_item'                  => __( 'Edit Language' ),
						'update_item'                => __( 'Update Language' ),
						'view_item'                  => __( 'View Language' ),
						'separate_items_with_commas' => __( 'Separate languages with commas' ),
						'add_or_remove_items'        => __( 'Add or remove languages' ),
						'choose_from_most_used'      => __( 'Choose from the most used languages' ),
						'popular_items'              => __( 'Popular Languages' ),
						'search_items'               => __( 'Search Languages' ),
						'not_found'                  => __( 'No languages found' )
					),
					'hierarchical'       => false,
					'public'             => true,
					'show_ui'            => true,
					'show_admin_column'  => true,
					'show_in_nav_menus'  => true,
					'show_tagcloud'      => true
				)
			),

			'expertise' => array(
				'post_types' 	=> 'people',
				'args' 			=> array(
					'labels'             => array(
						'name'                       => _x( 'Speciality Subjects', 'Taxonomy General Name' ),
						'singular_name'              => _x( 'Speciality Subject', 'Taxonomy Singular Name' ),
						'menu_name'                  => __( 'Speciality Subjects' ),
						'all_items'                  => __( 'All Speciality Subjects' ),
						'parent_item'                => __( 'Parent Speciality Subject' ),
						'parent_item_colon'          => __( 'Parent Speciality Subject:' ),
						'new_item_name'              => __( 'New Speciality SubjectName' ),
						'add_new_item'               => __( 'Add New Speciality Subject' ),
						'edit_item'                  => __( 'Edit Speciality Subject' ),
						'update_item'                => __( 'Update Speciality Subject' ),
						'view_item'                  => __( 'View Speciality Subject' ),
						'separate_items_with_commas' => __( 'Separate Speciality Subjects with commas' ),
						'add_or_remove_items'        => __( 'Add or remove Speciality Subjects' ),
						'choose_from_most_used'      => __( 'Choose from the most used Speciality Subjects' ),
						'popular_items'              => __( 'Popular Speciality Subjects' ),
						'search_items'               => __( 'Search Speciality Subjects' ),
						'not_found'                  => __( 'No speciality subjects found' )
					),
					'hierarchical'       => true,
					'public'             => true,
					'show_ui'            => true,
					'show_admin_column'  => true,
					'show_in_nav_menus'  => true,
					'show_tagcloud'      => true
				)
			)
		);

		foreach ( $taxonomies as $name => $taxonomy ) {
			register_taxonomy( $name, $taxonomy['post_types'], $taxonomy['args'] );
		}
	}