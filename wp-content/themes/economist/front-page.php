<?php get_header(); ?>

		<main id="main" class="results">
			<div class="container">
				<h1 class="page-title">Media directory</h1>

				<?php echo get_template_part('includes/parts/media-directory', 'search'); ?>

				<section class="content-area clearfix">
					<div class="directory-results left">
						<div class="loading-overlay">
							<span class="fa fa-circle-o-notch fa-spin"></span>
						</div>

					<?php if ( $people = get_people() ) : ?>
						<ul>
						<?php foreach ( $people as $person ) : $_id = $person->ID; ?>
							<li class="person <?php echo get_post_meta( $_id, 'econ_person_surname', true ); ?>">
								<div class="inner">
									<figure class="person-image ib">
										<a href="<?php echo get_permalink( $_id ); ?>"><?php echo get_post_thumbnail( $_id, 'person_result_photo' ); ?></a>
									</figure>

									<article class="person-detail ib">
										<h5 class="name">
											<a href="<?php echo get_permalink( $_id ); ?>"><?php echo $person->post_title; ?></a>
										</h5>

										<?php if ( $role = get_field( 'person_role', $_id ) ) : ?><h6 class="role"><?php echo $role; ?></h6><?php endif; ?>
										<?php if ( $location = get_person_location( $_id ) ) : ?><h6 class="location"><?php echo $location; ?></h6><?php endif; ?>
										<?php echo get_excerpt_by_id( $person->ID ); ?>
									</article>
								</div>
							</li>
						<?php endforeach; ?>
						</ul>
					<?php endif; ?>
					</div>

					<?php get_sidebar(); ?>
				</section>
			</div>
		</main>

<?php get_footer(); ?>
