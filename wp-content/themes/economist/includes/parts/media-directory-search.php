<aside id="search">
	<form action="<?php echo home_url('/'); ?>" class="media-directory-search ib-wrap clearfix" method="get">
		<div class="field ib">
			<label for="field-name">Name</label>
			<input type="text" value="" id="field-name" name="name">
			<button type="reset" class="initial-reset ib">×</button>
		</div>

		<button type="submit" class="initial-search ib">Search</button>


		<div class="advanced-fields ib right">
			<span>Advanced Search</span>

			<ul class="fields">
			<?php if ( $locations = get_terms('location') ) : ?>
				<li>
					<h6 class="field-title">Location</h6>
					<div class="field">
						<select name="location">
							<option value="" selected>All</option>
						<?php foreach ( $locations as $location ) : ?>
							<option value="<?php echo $location->slug; ?>"><?php echo $location->name; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</li>
			<?php endif; ?>

				<li>
					<h6 class="field-title">Keyword</h6>
					<div class="field">
						<input type="text" name="keyword">
					</div>
				</li>

			<?php if ( $languages = get_terms('language') ) : ?>
				<li>
					<h6 class="field-title">Language</h6>
					<div class="field">
					<?php $i = 1; foreach ( $languages as $language ) : ?>
						<div class="sub-field clearfix">
							<label for="language-<?php echo $i; ?>" class="left"><?php echo $language->name; ?></label>
							<input type="checkbox" name="language[]" value="<?php echo $language->slug; ?>" class="right" id="language-<?php echo $i; ?>">
						</div>
					<?php $i++; endforeach; ?>
					</div>
				</li>
			<?php endif; ?>

			<?php if ( $expertise_areas = get_terms('expertise') ) : ?>
				<li>
					<h6 class="field-title">Speciality Subjects</h6>
					<div class="field">
						<select name="expertise">
							<option value="" selected>All</option>
						<?php foreach ( $expertise_areas as $area ) : ?>
							<option value="<?php echo $area->slug; ?>"><?php echo $area->name; ?></option>
						<?php endforeach; ?>
						</select>
					</div>
				</li>
			<?php endif; ?>

				<?php /*<li>
					<h6 class="field-title">Speciality Subjects</h6>
					<div class="field">
						<input type="text" name="speciality_subject">
					</div>
				</li> */ ?>

				<li class="buttons">
					<button type="submit" class="advanced-submit">Search</button>
					<button type="reset" class="advanced-reset">Reset</button>
				</li>
			</ul>
		</div>
	</form>
</aside>
