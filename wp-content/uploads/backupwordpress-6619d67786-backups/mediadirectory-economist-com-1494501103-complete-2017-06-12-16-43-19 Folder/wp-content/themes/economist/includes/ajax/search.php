<?php
	$root = dirname( dirname( dirname( dirname( dirname( dirname(__FILE__) ) ) ) ) );
	require_once $root . '/wp-load.php';

	if ( !empty( $_SERVER['HTTP_X_REQUESTED_WITH'] ) && strtolower( $_SERVER['HTTP_X_REQUESTED_WITH'] ) == 'xmlhttprequest' ) {
		function search_join_tables( $join, $query ) {
			global $wpdb;

		 	$join .= " JOIN
	        (
	            {$wpdb->term_relationships} AS tr
	            INNER JOIN
	                {$wpdb->term_taxonomy} ON {$wpdb->term_taxonomy}.term_taxonomy_id = tr.term_taxonomy_id
	            INNER JOIN
	                {$wpdb->terms} ON {$wpdb->terms}.term_id = {$wpdb->term_taxonomy}.term_id
	        )
	        ON {$wpdb->posts}.ID = tr.object_id ";

		 	return $join;
		}

		function search_posts_where( $where, $query ) {
		 	global $wpdb;
	 		$user_where = get_user_posts_where();
	 		$where .= " OR ({$wpdb->term_taxonomy}.taxonomy IN('location', 'language') AND {$wpdb->terms}.name LIKE '%" . esc_sql( $query->query_vars['s'] ) . "%' {$user_where})";
		 	return $where;
		}

		function get_user_posts_where() {
		 	global $wpdb;

		 	$user_id = get_current_user_id();
		 	$sql = '';
		 	$status = array("'publish'");

		 	if ( 0 !== $user_id ) {
		 		$status[] = "'private'";
		 		$sql .= " AND {$wpdb->posts}.post_author = " . absint( $user_id );
		 	}

		 	$sql .= " AND {$wpdb->posts}.post_status IN(" . implode( ',', $status ) . ")";
		 	return $sql;
		}

		function search_posts_groupby( $groupby, $query ) {
			global $wpdb;
			$groupby = "{$wpdb->posts}.ID";
			return $groupby;
		}

		$args = array(
			'post_type' 		=> 'people',
			'posts_per_page' 	=> -1,
			'suppress_filters' 	=> false,
			'meta_key' 			=> 'econ_person_surname',
			'orderby' 			=> 'meta_value',
			'order' 			=> 'ASC'
		);

		if ( isset( $_GET['location'] ) && !empty( $_GET['location'] ) ) {
			$args['tax_query'] = array(
				'relation' => 'AND',
				array(
					'taxonomy' 	=> 'location',
					'field'		=> 'slug',
					'terms' 	=> array( $_GET['location'] )
				)
			);
		}

		if ( isset( $_GET['keyword'] ) && !empty( $_GET['keyword'] ) ) {
			$args['s'] = $_GET['keyword'];

			/*add_filter('posts_join', 'search_join_tables', 10, 2);
			add_filter('posts_where', 'search_posts_where', 10, 2);
			add_filter('posts_groupby', 'search_posts_groupby', 10, 2);*/
		}

		if ( isset( $_GET['language'] ) && !empty( $_GET['language'] ) ) {
			if ( !isset( $args['tax_query'] ) ) {
				$args['tax_query'] = array(
					'relation' => 'AND'
				);
			}

			$args['tax_query'][] = array(
				'taxonomy'	=> 'language',
				'field'		=> 'slug',
				'terms'		=> $_GET['language']
			);
		}

		if ( isset( $_GET['expertise'] ) && !empty( $_GET['expertise'] ) ) {
			if ( !isset( $args['tax_query'] ) ) {
				$args['tax_query'] = array(
					'relation' => 'AND'
				);
			}

			$args['tax_query'][] = array(
				'taxonomy'	=> 'expertise',
				'field'		=> 'slug',
				'terms'		=> $_GET['expertise']
			);
		}

		if ( isset( $_GET['speciality_subject'] ) && !empty( $_GET['speciality_subject'] ) ) {
			if ( strpos( $_GET['speciality_subject'], ',' ) ) {
				$subjects = explode( ',', $_GET['speciality_subject'] );
				$args['meta_query'] = array('compare' => 'AND');

				foreach ( $subjects as $subject ) {
					if ( $subject ) {
						$args['meta_query'][] = array(
							'key'		=> 'person_speciality_subjects',
							'value'		=> trim( $subject ),
							'compare' 	=> 'LIKE'
						);
					}
				}
			} else {
				$args['meta_query'] = array(
					array(
						'key'		=> 'person_speciality_subjects',
						'value'		=> $_GET['speciality_subject'],
						'compare' 	=> 'LIKE'
					)
				);
			}
		}

		$results = get_posts( $args );

		remove_filter('posts_join', 'search_join_tables');
		remove_filter('posts_where', 'search_posts_where');
		remove_filter('posts_groupby', 'search_posts_groupby');

		if ( isset( $_GET['name'] ) && !empty( $_GET['name'] ) ) {
			$new_results = array();

			foreach ( $results as $result ) {
				if ( stripos( $result->post_title, $_GET['name'] ) !== false ) {
					$new_results[] = $result;
				}
			}

			$results = $new_results;
		}

		if ( !empty ( $results ) ) :
			foreach ( $results as $result ) :
				$_id = $result->ID;
		?>
			<li class="person">
				<div class="inner">
					<figure class="person-image ib">
						<a href="<?php echo get_permalink( $_id ); ?>"><?php echo get_post_thumbnail( $_id, 'person_result_photo' ); ?></a>
					</figure>

					<article class="person-detail ib">
						<h5 class="name">
							<a href="<?php echo get_permalink( $_id ); ?>"><?php echo $result->post_title; ?></a>
						</h5>

						<?php if ( $role = get_field( 'person_role', $_id ) ) : ?><h6 class="role"><?php echo $role; ?></h6><?php endif; ?>
						<?php if ( $location = get_person_location( $_id ) ) : ?><h6 class="location"><?php echo $location; ?></h6><?php endif; ?>
						<?php echo get_excerpt_by_id( $result->ID ); ?>
					</article>
				</div>
			</li>
		<?php
			endforeach;
		endif;
	} else {
		exit;
	}
?>