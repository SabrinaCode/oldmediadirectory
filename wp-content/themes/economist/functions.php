<?php
/**
 * Base constants
 */
	define( 'THEME_PATH', get_template_directory() );
	define( 'THEME_DIR', get_bloginfo('template_directory') );
	define( 'CSS_DIR', THEME_DIR . '/css/' );
	define( 'JS_DIR', THEME_DIR . '/js/' );
	define( 'IMAGE_DIR', THEME_DIR . '/images/' );
	define( 'INC', THEME_PATH . '/includes/' );
	// define( 'DISALLOW_FILE_EDIT', true );

/**
 * Separate files
 */
	require_once INC . 'post-types.php';
	require_once INC . 'taxonomies.php';

/**
 * Filters and actions
 */
 	add_theme_support( 'post-thumbnails', 'full' );

	add_action('init', 'load_resources');
	add_action('init', 'register_custom_post_types');
	add_action('init', 'register_custom_taxonomies');
	add_action('show_admin_bar', '__return_false');
	add_action('save_post', 'save_person_surname_as_meta');

	if ( !WP_DEBUG ) {
		// add_filter('acf/settings/show_admin', '__return_false');
	}

	add_filter('gform_submit_button', 'modify_gform_submit', 10, 2);
	add_filter('jpeg_quality', function($arg){return 100;});
	add_filter( 'wp_editor_set_quality', function($arg){return 100;} );


/**
 * Image Sizes
 */
 	add_image_size('person_result_photo', 65, 80, true);
	add_image_size('person_biography_photo', 210, 256, true);

/**
 * Functions
 */
	function load_resources() {
		if ( is_admin() || in_array( $GLOBALS['pagenow'], array( 'wp-register.php', 'wp-login.php' ) ) ) {
			return;
		}

		wp_enqueue_style( 'font-awesome', 'https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
		wp_enqueue_style( 'reset', get_theme_stylesheet('reset') );
		wp_enqueue_style( 'main', get_theme_stylesheet('main') );
		wp_enqueue_style( 'fancybox', get_theme_stylesheet('fancybox') );
		wp_enqueue_style( 'orig', get_theme_stylesheet('orig') );

		if ( wp_script_is( 'jquery', 'registered') ) {
			wp_deregister_script('jquery');
		}

		wp_enqueue_script( 'modernizr', get_theme_script('modernizr') );
		wp_enqueue_script( 'jquery', '//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js', array(), '1.10.2' );
		wp_enqueue_script( 'extensions', get_theme_script('extensions') );
		wp_enqueue_script( 'economist', get_theme_script('economist') );
		wp_enqueue_script( 'main', get_theme_script('main') );
		wp_enqueue_script( 'fancybox', get_theme_script('fancybox') );
	}

	function get_website_title( $separator = '|' ) {
		$name = get_bloginfo('name');
		$description = get_bloginfo('description') ? ' ' . $separator . ' ' . get_bloginfo('description') : '';
		$title = is_front_page() ? $name . $description : wp_title( $separator, false, 'right' );
		return $title;
	}

	function get_display_title( $id = '' ) {
		global $post;

		if ( $id == '' ) {
			$id = $post->ID;
		}

		$title = ( $custom_title = get_field( 'display_title', $id ) ) ? $custom_title : get_the_title( $id );
		$title = str_replace( '|', '<br />', $title );
		return $title;
	}

	function get_post_thumbnail( $id = '', $size =  'full', $alt = '', $boolean = false ) {
		global $post;

		$id = $id ? $id : $post->ID;
		$alt = $alt ? $alt : $post->post_title;
		$size = $size ? $size : 'full';

		if ( $boolean && !get_the_post_thumbnail( $id, $size ) ) {
			return false;
		}

		$size_data = get_image_sizes( $size );
		$thumbnail = ( $t = get_the_post_thumbnail( $id, $size ) ) ? $t :
			'<img src="http://placehold.it/' . $size_data['width'] . 'x' . $size_data['height'] . '/ecf0f1/ecf0f1/" alt="' . $alt . '">';

		return $thumbnail;
	}

	function get_image_sizes( $size = '' ) {
		global $_wp_additional_image_sizes;

		$sizes = array();
		$image_sizes = get_intermediate_image_sizes();

		foreach ( $image_sizes as $_size ) {
			if ( in_array( $size, array( 'thumbnail', 'medium', 'large' ) ) ) {
				$sizes[ $_size ]['width'] = get_option( $_size . '_size_w' );
				$sizes[ $_size ]['height'] = get_option( $_size . '_size_h' );
				$sizes[ $_size ]['crop'] = (bool) get_option( $_size . '_crop' );
			} elseif ( isset( $_wp_additional_image_sizes[ $_size ] ) ) {
				$sizes[ $_size ] = array(
					'width' => $_wp_additional_image_sizes[ $_size ]['width'],
					'height' => $_wp_additional_image_sizes[ $_size ]['height'],
					'crop' => $_wp_additional_image_sizes[ $_size ]['crop'],
				);
			}
		}

		if ( $size ) {
			if ( isset( $sizes[ $size ] ) ) {
				return $sizes[ $size ];
			} else {
				return false;
			}
		}

		return $sizes;
	}

	// register_nav_menu( 'main-menu', __('Main Menu') );

	if ( function_exists('acf_add_options_sub_page') ) {
		acf_add_options_sub_page( array(
			'title' => 'Options',
			'parent' => 'themes.php',
			'capability' => 'manage_options'
		) );
	}

/**
 * Custom functions
 */
 	function get_people() {
		 $people = get_posts( array(
			 'post_type' 		=> 'people',
			 'posts_per_page'	=> -1,
			 'meta_key' 		=> 'econ_person_surname',
			 'orderby' 			=> 'meta_value',
			 'order' 			=> 'ASC'
		 ) );

		 if ( !empty( $people ) ) {
			 return $people;
		 }

		 return false;
	 }

	 function get_person_location( $id ) {
		 $location = get_the_terms( $id, 'location' );

		 if ( !empty( $location ) ) {
			 return $location[0]->name;
		 }

		 return false;
	 }

	 function get_person_first_name( $id ) {
	 	$person = get_post( $id );
	 	$name = $person->post_title;

	 	if ( strpos( $name, ' ' ) ) {
	 		$names = explode( ' ', $person->post_title );
	 		$name = $names[0];
	 	}

	 	return $name;
	 }

	 function modify_gform_submit( $button, $form ) {
	 	return '<p class="note">*indicates mandatory field</p><button class="button" type="submit" id="gform_submit_button_' . $form['id'] . '">Send</button>';
	 }

	 function get_excerpt_by_id( $id ) {
		 $p = get_post( $id );
		 $e = strip_tags( strip_shortcodes( $p->post_content ) );
		 $l = 19;
		 $w = explode( ' ', $e, $l + 1 );

		 if ( count( $w ) > $l ) {
			 array_pop( $w );
			 $e = implode( ' ', $w );
			 $e .= '...';
		 }

		 $e = '<p>' . $e . '</p>';
		 return $e;
	 }

	 function save_person_surname_as_meta( $post_id ) {
	 	if ( wp_is_post_revision( $post_id ) ) {
	 		return;
	 	}

	 	if ( get_post_type( $post_id ) == 'people' ) {
		 	$name = get_the_title( $post_id );

		 	if ( strpos( $name, ' ' ) !== false ) {
		 		$name = explode( ' ', $name );

		 		if ( count( $name ) == 3 ) {
		 			update_post_meta( $post_id, 'econ_person_surname', sprintf( '%s %s', $name[ count( $name ) - 2 ], $name[ count( $name ) - 1 ] ) );
		 		} else {
		 			update_post_meta( $post_id, 'econ_person_surname', $name[ count( $name ) - 1 ] );
		 		}
		 	}
		}
	 }

/**
 * Developer functions
 */
	function get_theme_stylesheet( $name ) {
		return CSS_DIR . $name . '.css';
	}

	function get_theme_script( $name ) {
		return JS_DIR . $name . '.js';
	}

	function get_theme_image( $name, $extension = 'jpg' ) {
		if ( file_exists( THEME_PATH . '/images/' . $name . '.' . $extension ) ) {
			return IMAGE_DIR . $name . '.' . $extension;
		}

		return false;
	}

	function __d( $var, $output = 'print_r', $die = false ) {
		echo '<pre>';
		$output( $var );
		echo '</pre>';

		if ( true === $die ) {
			die;
		}
	}

	function __obfuscate( $string ) {
		if ( $string ) {
			$obfuscation = '';

			for ( $i = 0; $i < strlen( $string ); $i++ ) {
				$obfuscation .= '&#' . ord( $string[ $i ] ) . ';';
			}

			return $obfuscation;
		}

		return false;
	}
