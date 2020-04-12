<div class="page__header page__header--image-triangle">

	<?php get_template_part('template-parts/partials/partial', 'hero-image-triangle'); ?>

    <div class="scroll-down-indicator hide--desktop"></div>

</div>

<div class="page__body page__body--bg-white">

	<section class="content-block">
		<div class="content-block__content">
			<?php the_content(); ?>
		</div>
	</section>

	<?php if(get_field('office_address')) : ?>

        <section class="content-block--full-width">
            <div class="content-block__content content-block__content--full-width content-block__content--no-t-pad">
                <h3 class="with-line text--center float-down-on-scroll">Location</h3>
                <?php $location = get_field('google_map'); ?>
                <div class="location-map-bar-container">

                    <address class="location-map-bar__address<?php if( ! empty($location)) : ?> location-map-bar__address--with-map<?php endif; ?>">
                        <img src="<?php echo get_template_directory_uri(); ?>/img/icon-location-pin-white.svg" alt="" class="location-map-bar__address__pin-icon"> <strong><?php echo get_the_title(); ?></strong><br>
                        <?php echo nl2br(get_field('office_address')); ?>
                    </address>

                    <?php



                    if( !empty($location) ):
                        ?>
                        <div class="location-map">
                            <div class="marker" data-lat="<?php echo $location['lat']; ?>" data-lng="<?php echo $location['lng']; ?>"></div>
                        </div>
                    <?php endif; ?>

                </div>
            </div>

        </section>

	<?php endif; ?>

	<?php get_template_part('template-parts/partials/partial', 'feature-quote'); ?>

	<?php get_template_part('template-parts/partials/partial', 'network-search-menu-bar'); ?>
</div>