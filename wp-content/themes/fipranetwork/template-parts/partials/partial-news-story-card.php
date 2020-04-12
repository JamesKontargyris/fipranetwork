<div class="news-story-card">
	<div class="news-story-card__image">
		<a href="<?php echo get_the_permalink(); ?>">
			<?php if ( has_post_thumbnail() ) : ?>
				<img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'news-story-card' ); ?>"
				     alt="<?php echo get_the_title(); ?>"
				     title="<?php echo get_the_title(); ?>">
			<?php else : ?>
				<img src="<?php echo get_template_directory_uri(); ?>/img/update-generic-thumb.jpg"
				     alt="<?php echo get_the_title(); ?>"
				     title="<?php echo get_the_title(); ?>">
			<?php endif; ?>
		</a>
	</div>

	<div class="news-story-card__content">
		<div class="news-story-card__category"
		     style="background:url(<?php echo get_field( 'icon', 'term_' . get_field( 'update_type' )->term_id ); ?>) left center no-repeat;  background-size:2rem;<?php if ( $text_colour = get_field( 'text_colour', 'term_' . get_field( 'update_type' )->term_id ) ) : ?> color: #<?php echo $text_colour; ?>;<?php endif; ?>">
			<?php echo get_field( 'update_type' )->name; ?>
		</div>
		<h5 class="news-story-card__headline">
			<a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
		</h5>
		<div class="news-story-card__meta"><?php echo get_the_date( 'l, j F Y' ); ?></div>
	</div>
</div>