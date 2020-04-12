<?php if ( has_post_thumbnail() ) : $post_thumbnail = get_the_post_thumbnail_url( get_the_ID(), 'banner' ); ?>
<?php else : $post_thumbnail = get_template_directory_uri() . '/img/update-generic-thumb.jpg'; ?>
<?php endif; ?>


<div class="page__header page__header--image-bar">

	<section class="hero hero--image-bar hero--news-story" style="background: linear-gradient(to bottom, rgba(34,34,34, 0.5) 20%, rgba(34,34,34, 0.7) 100%), url(<?php echo $post_thumbnail ?>) center no-repeat, rgb(80,122,150); background-size:auto, cover, auto;">

		<div class="hero--image-bar-yellow-diamond parallax--foreground-down"></div>

		<div class="hero--image-bar__content-container hero--news-story__content-container">
			<div class="hero__content hero--image-bar__content hero--news-story__content parallax--foreground-up">
				<h6 class="hero__mini-title"><?php echo get_field( 'update_type' )->name; ?></h6>
				<h1 class="hero__main-title"><?php echo get_the_title(); ?></h1>
				<p class="hero__intro"><?php echo get_the_date( 'l, j F Y' ); ?></p>
			</div>
		</div>
	</section>

</div>

<div class="page__body page__body--bg-pattern">

	<section class="content-block">
		<div class="content-block__content content-block__content--no-b-pad">
			<?php the_content(); ?>
		</div>
	</section>

	<div class="page-footer-cta">
		<div class="page-footer-cta__content float-down-on-scroll">
			<p class="text--center">
				<a href="/updates" class="btn btn--secondary btn--large btn--left-arrow">Back to Updates</a></p>
		</div>
	</div>



</div>