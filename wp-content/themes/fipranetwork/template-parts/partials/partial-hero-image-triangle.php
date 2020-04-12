<div class="page__header page__header--image-triangle">

    <section class="hero-container hero--image-triangle-container">

        <div class="hero--image-triangle-border"></div>
		<?php if ( has_post_thumbnail() ) : ?>
            <div class="hero--image-triangle"
                 style="background: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'banner-large' ); ?>) center no-repeat; background-size:cover;"></div>
		<?php else : ?>
            <div class="hero--image-triangle"></div>
		<?php endif; ?>

        <div class="hero--image-triangle-overlay"></div>
        <div class="hero--image-triangle-grey-line"></div>
        <div class="hero--image-triangle-secondary-triangle"></div>

        <div class="hero__content hero--image-triangle__content">

			<?php if ( get_field( 'hero_mini_title' ) ) : ?>
                <h6 class="hero__mini-title with-shadow"><?php echo get_field( 'hero_mini_title' ); ?></h6>
			<?php endif; ?>

	        <?php $main_title =  get_field( 'hero_main_title' ) ? get_field( 'hero_main_title' ) : get_the_title();?>

            <h1 class="hero__main-title with-shadow <?php echo get_field('hero_main_title_divider_line'); ?>"><?php echo smaller_title_text($main_title); ?></h1>

			<?php if ( get_field( 'hero_intro' ) ) : ?>
                <div class="hero__intro with-shadow"><?php echo get_field( 'hero_intro' ); ?></div>
			<?php endif; ?>
        </div>

    </section>

	<?php if ( get_field( 'point_of_contact_fipriot' ) ) : ?>
		<?php get_template_part( 'template-parts/partials/partial', 'point-of-contact-bar' ); ?>
	<?php endif; ?>

</div>
