<?php if ( $practices = get_practices() ) : ?>
	<div class="content-block">
		<div class="content-block__content content-block__content--no-lr-pad content-block__content--no-t-pad">
			<div class="practice-card-group">
				<?php while ( $practices->have_posts() ) : $practices->the_post(); ?>
					<?php get_template_part('template-parts/partials/partial', 'practice-card'); ?>
				<?php endwhile;
				wp_reset_postdata(); ?>
			</div>
		</div>
	</div>
<?php endif; ?>