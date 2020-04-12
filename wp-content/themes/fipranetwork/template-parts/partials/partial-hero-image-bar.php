<div class="page__header page__header--image-bar">

	<section class="hero hero--image-bar" style="background: linear-gradient(to bottom, rgba(34, 34, 34, 0.5) 15%, rgba(34, 34, 34, 0.3) 70%), <?php if(has_post_thumbnail()) : ?> url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'banner' ); ?>) center no-repeat,<?php endif; ?> rgb(124, 196, 172);<?php if(has_post_thumbnail()) : ?> background-size:auto, cover, auto; <?php  endif; ?>">

		<div class="hero--image-bar__content-container">
			<div class="hero__content hero--image-bar__content">

				<?php if(get_field('hero_mini_title')) : ?>
					<h6 class="hero__mini-title with-shadow"><?php echo get_field('hero_mini_title'); ?></h6>
				<?php endif; ?>

				<?php $main_title =  get_field( 'hero_main_title' ) ? get_field( 'hero_main_title' ) : get_the_title();?>

				<h1 class="hero__main-title with-shadow <?php echo get_field('hero_main_title_divider_line'); ?>"><?php echo smaller_title_text($main_title); ?></h1>

				<?php if(get_field('hero_intro')) : ?>
					<div class="hero__intro with-shadow"><?php echo get_field('hero_intro'); ?></div>
				<?php endif; ?>

			</div>
		</div>

	</section>

</div>