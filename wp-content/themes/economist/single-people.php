<?php get_header(); ?>

		<main id="main" class="profile">
		<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
			<div class="container">
				<h1 class="page-title">Media directory</h1>

				<?php echo get_template_part('includes/parts/media-directory', 'search'); ?>

				<section class="content-area clearfix">
					<div class="profile-details left">
						<div class="content-area-box biography">
							<header class="biography-header ib-wrap">
								<figure class="profile-picture ib">
									<?php $thumbnail = wp_get_attachment_image_src( get_post_thumbnail_id( $post->ID ), 'full' ); ?>
									<div class="icons">
										<div class="icon icon-zoom">
											<a href="<?php echo $thumbnail[0]; ?>" class="fancybox"><img src="<?php echo get_theme_image('zoom', 'png'); ?>" data-url="<?php echo $thumbnail[0]; ?>"></a>
										</div>

										<div class="icon icon-download">
											<a href="<?php echo $thumbnail[0]; ?>" download><img src="<?php echo get_theme_image('download', 'png'); ?>"></a>
										</div>
									</div>

									<?php echo get_post_thumbnail( $post->ID, 'person_biography_photo' ); ?>
								</figure>

								<div class="profile-basic ib">
									<h2><?php the_title(); ?></h2>

								<?php if ( $role = get_field('person_role') ) : ?>
									<h6><?php echo $role; ?></h6>
								<?php endif; ?>

								<?php if ( $location = get_person_location( $_id ) ) : ?>
									<h6 class="location"><?php echo $location; ?></h6>
								<?php endif; ?>

									<hr>

								<?php if ( $telephone = get_field('person_telephone') ) : ?>
									<h6>Telephone: <span><?php echo $telephone; ?></span></h6>
								<?php endif; ?>

								<?php if ( $mobile = get_field('person_mobile') ) : ?>
									<h6>Mobile: <span><?php echo $mobile; ?></span></h6>
								<?php endif; ?>

								<?php if ( $email = get_field('person_email') ) : ?>
									<h6>E-mail: <span><a href="mailto:<?php echo __obfuscate( $email ); ?>"><?php echo __obfuscate( $email ); ?></a></span></h6>
								<?php endif; ?>

								<?php if ( $twitter = get_field('person_twitter') ) : ?>
									<h7><span class="fa fa-twitter"></span><span><a href="http://www.twitter.com/<?php echo $twitter; ?>"><?php echo $twitter; ?></a></span></h7>
								<?php endif; ?>

								</div>
							</header>

							<article class="biography-content">
								<h6>Biography</h6>
								<?php the_content(); ?>
							</article>

						<?php if ( $file = get_field('person_file_download') ) : ?>
							<a href="<?php echo $file; ?>" class="download" download>Download PDF</a>
							<div class="clear"></div>
						<?php endif; ?>

							<footer class="biography-details">
							<?php if ( $languages = get_the_terms( $post->ID, 'language' ) ) : ?>
								<div class="detail languages">
									<h6>Languages</h6>
									<p>
										<?php
											$i = 1;

											foreach ( $languages as $language ) {
												echo $language->name;

												if ( $i < count( $languages) ) {
													echo ', ';
												}

												$i++;
											}
										?>
									</p>
								</div>
							<?php endif; ?>

							<?php if ( $speciality_subjects = get_the_terms( $post->ID, 'expertise' ) ) : ?>
								<div class="detail languages">
									<h6>Speciality Subjects</h6>
									<p>
										<?php
											$i = 1;

											foreach ( $speciality_subjects as $subject ) {
												echo $subject->name;

												if ( $i < count( $speciality_subjects) ) {
													echo ', ';
												}

												$i++;
											}
										?>
									</p>
								</div>
							<?php endif; ?>

							<?php /*<?php if ( $speciality_subjects = get_field('person_speciality_subjects') ) : ?>
								<div class="detail speciality-subject">
									<h6>Speciality Subjects</h6>
									<p><?php echo str_replace( '<br />', ', ', $speciality_subjects ); ?></p>
								</div>
							<?php endif; ?>*/ ?>

							<?php if ( $previous_work = get_field('person_previous_work') ) : ?>
								<div class="detail previous-work">
									<h6>See <?php echo get_person_first_name( $post->ID ); ?>'s Previous Work</h6>
									<p>
										<?php
											$i = 1;

											foreach ( $previous_work as $item ) {
												echo sprintf( '<a href="%s" target="_blank">%s</a>', $item['link'], $item['title'] );

												if ( $i < count( $previous_work ) ) {
													echo ' &nbsp; ';
												}

												$i++;
											}
										?>
									</p>
								</div>
							<?php endif; ?>
							</footer>
						</div>

						<button type="reset" class="return-to-list">&lt; Return to journalist list</button>
						<h7 class="print-box"><span><a href="javascript:if(window.print)window.print()" class="fa fa-print"></a></span></h7>

						<div class="content-area-box media-request-form">
							<?php gravity_form(1, true, true, false, false, true ); ?>
						</div>
					</div>

					<?php get_sidebar(); ?>
				</section>
			</div>
		<?php endwhile; endif; ?>
		</main>

<?php get_footer(); ?>
