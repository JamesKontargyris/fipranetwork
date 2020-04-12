<div class="page__background" style="background:linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1)), url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'banner' ); ?>) center no-repeat; background-size: auto, cover;"></div>

<div class="content-block hero--background-image-fade">
	<div class="content-block__content <?php if(get_field('titles_section_width') == 'full-width' || ! get_field('titles_section_width')) : ?>content-block__content--no-lr-pad<?php endif; ?> content-block__content--no-tb-pad">

		<?php if(get_field('hero_mini_title')) : ?>
			<h6 class="hero__mini-title"><?php echo get_field('hero_mini_title'); ?></h6>
		<?php endif; ?>

		<?php $main_title =  get_field( 'hero_main_title' ) ? get_field( 'hero_main_title' ) : get_the_title();?>

		<h1 class="hero__main-title <?php echo get_field('hero_main_title_divider_line'); ?>"><?php echo smaller_title_text($main_title); ?></h1>

		<?php if(get_field('hero_intro')) : ?>
			<div class="hero__intro"><?php echo get_field('hero_intro'); ?></div>
		<?php endif; ?>

	</div>
</div>