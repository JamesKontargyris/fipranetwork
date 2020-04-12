<div class="page__header page__header--diamond-overlay">

	<section class="hero hero--diamond-overlay" style="background: linear-gradient(to bottom, rgba(40,47,111, 0.3) 0, rgba(40,47,111, 0.3) 100%), <?php if(has_post_thumbnail()) : ?> url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'banner' ); ?>) center no-repeat,<?php endif; ?> rgb(80,122,150); <?php if(has_post_thumbnail()) : ?> background-size:auto, cover, auto; <?php  endif; ?>">

		<div class="hero--diamond-overlay__content-container">
			<div class="hero__content hero--diamond-overlay__content">
				<?php if(get_post_type() == 'case_study') : ?>
                    <h6 class="hero__mini-title">Case Study</h6>
				<?php elseif(get_field('hero_mini_title')) : ?>
                    <h6 class="hero__mini-title"><?php echo get_field('hero_mini_title'); ?></h6>
				<?php endif; ?>

				<?php $main_title =  get_field( 'hero_main_title' ) ? get_field( 'hero_main_title' ) : get_the_title();?>

                <h1 class="hero__main-title <?php echo get_field('hero_main_title_divider_line'); if(strlen($main_title) > 80) : ?>hero__main-title--small<?php endif; ?>"><?php echo smaller_title_text($main_title); ?></h1>

				<?php if(get_field('hero_intro')) : ?>
					<div class="hero__intro"><?php echo get_field('hero_intro'); ?></div>
				<?php endif; ?>

				<?php if(get_field('case_study_logo')) : ?>
                    <img src="<?php echo wp_get_attachment_image_src(get_field('case_study_logo'), 'case-study-logo-large')[0]; ?>" alt="Logo">
				<?php endif; ?>

			</div>
		</div>

	</section>

</div>