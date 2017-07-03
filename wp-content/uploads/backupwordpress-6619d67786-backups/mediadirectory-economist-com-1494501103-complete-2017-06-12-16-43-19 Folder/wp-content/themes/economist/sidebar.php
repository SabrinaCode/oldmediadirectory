<aside id="sidebar" class="right">
	<div id="social-share-buttons-block">
		<div class="title">Follow <cite>The Economist</cite></div>

		<div class="social-share-buttons">
			<ul class="clearfix">
				<li class="facebook">
					<a data-ec-omniture="rightrail|social_share|facebook" href="http://www.facebook.com/TheEconomist" title="Facebook" target="_blank" class="omniture-tagged omniture-tagged-6">Facebook</a>
				</li>

				<li class="twitter">
					<a data-ec-omniture="rightrail|social_share|twitter" href="http://twitter.com/TheEconomist" title="Twitter" target="_blank" class="omniture-tagged omniture-tagged-7">Twitter</a>
				</li>

				<li class="linked-in">
					<a data-ec-omniture="rightrail|social_share|linked-in" href="http://www.linkedin.com/groups/Economist-official-group-Economist-newspaper-3056216" title="Linked in" target="_blank" class="omniture-tagged omniture-tagged-8">Linked in</a>
				</li>

				<li class="google-plus">
					<a data-ec-omniture="rightrail|social_share|plusone" href="https://plus.google.com/100470681032489535736/posts" title="Google plus" target="_blank" class="omniture-tagged omniture-tagged-9">Google plus</a>
				</li>

				<li class="tumblr">
					<a data-ec-omniture="rightrail|social_share|tumblr" href="http://theeconomist.tumblr.com/" title="Tumblr" target="_blank" class="omniture-tagged omniture-tagged-10">Tumblr</a>
				</li>

				<li class="instagram">
					<a data-ec-omniture="rightrail|social_share|instagram" href="http://instagram.com/theeconomist/" title="Instagram" target="_blank" class="omniture-tagged omniture-tagged-11">Instagram</a>
				</li>

				<li class="youtube">
					<a data-ec-omniture="rightrail|social_share|youtube" href="http://www.youtube.com/user/economistmagazine" title="YouTube" target="_blank" class="omniture-tagged omniture-tagged-12">YouTube</a>
				</li>

				<li class="rss">
					<a data-ec-omniture="rightrail|social_share|rss" href="/rss" title="RSS" target="_blank" class="omniture-tagged omniture-tagged-13">RSS</a>
				</li>

				<li class="newsletters">
					<a data-ec-omniture="rightrail|social_share|newsletters" href="/newsletters" title="Newsletters" target="_blank" class="omniture-tagged omniture-tagged-14">Newsletters</a>
				</li>
			</ul>
		</div>
	</div>

<?php if ( $additional = get_field('sidebar_additional_box', 'option') ) : ?>
	<div class="sidebar-content">
		<div class="footer-text">
			<?php echo apply_filters( 'the_content', $additional ); ?>
		</div>
	</div>
<?php endif; ?>

	<div class="sidebar-content">
	<?php if ( $leading_text = get_field('sidebar_leading_text', 'option') ) : ?>
		<div class="leading-text">
			<?php echo apply_filters( 'the_content', $leading_text ); ?>
		</div>
	<?php endif; ?>

	<?php if ( $locations = get_field('sidebar_locations', 'option') ) : $total = count( $locations ); ?>
		<div class="locations">
		<?php $i = 1; foreach ( $locations as $location ) : ?>
			<div class="location<?php echo ( $i == $total ) ? ' last' : ''; ?>">
				<h6><?php echo $location['name']; ?></h6>
				<ul class="contacts">
				<?php foreach ( $location['contacts'] as $contact ) : ?>
					<li class="contact">
						<p class="name"><?php echo $contact['name']; ?></p>

					<?php if ( $contact['telephone'] ) : ?>
						<p class="telephone"><?php echo $contact['telephone']; ?></p>
					<?php endif; ?>

					<?php if ( $contact['email'] ) : ?>
						<p class="email"><a href="mailto:<?php echo __obfuscate( $contact['email'] ); ?>"><?php echo __obfuscate( $contact['email'] ); ?></a></p>
					<?php endif; ?>
					</li>
				<?php endforeach; ?>
				</ul>
			</div>
		<?php $i++; endforeach; ?>
		</div>
	<?php endif; ?>

	<?php if ( $footer_text = get_field('sidebar_footer_text', 'option') ) : ?>
		<div class="footer-text">
			<?php echo apply_filters( 'the_content', $footer_text ); ?>
		</div>
	<?php endif; ?>
	</div>
</aside>