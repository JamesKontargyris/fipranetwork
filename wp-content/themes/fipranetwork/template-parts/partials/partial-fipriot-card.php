<?php $full_name = get_field( 'first_name' ) . ' ' . get_field( 'last_name' ); ?>

<div class="fipriot-card">
    <div class="fipriot-card__photo">
        <a href="<?php echo get_the_permalink(); ?>">
			<?php if ( has_post_thumbnail() ) : ?>
                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'profile-small' ); ?>"
                     alt="<?php echo $full_name; ?>">
			<?php else : ?>
                <img src="<?php echo get_template_directory_uri(); ?>/img/fipriot-photo-placeholder.png"
                     alt="<?php echo $full_name; ?>">
			<?php endif; ?>
        </a>
    </div>
    <div class="fipriot-card__info">

        <div class="fipriot-card__name"><a href="<?php echo get_the_permalink(); ?>"><?php echo $full_name; ?></a></div>

		<?php if ( get_field( 'is_special_adviser' ) == 'yes' ) : ?>
            <div class="fipriot-card__position"><?php echo get_field( 'special_adviser_expertise' ); ?></div>
		<?php else : ?>
			<?php if ( get_field( 'position' ) ) : ?>
                <div class="fipriot-card__position"><?php echo get_field( 'position' ); ?></div>
			<?php endif; ?>
		<?php endif; ?>

		<?php
		$practice_areas        = get_field( 'practice_areas' ) ? get_field( 'practice_areas' ) : [];
		$custom_practice_areas = get_field( 'custom_practice_areas' ) ? get_field( 'custom_practice_areas' ) : [];
		$no_of_practice_areas  = count( $practice_areas ) + count( $custom_practice_areas );
		?>

		<?php if ( $practice_areas || $custom_practice_areas ) : ?>
            <div class="fipriot-card__meta">
                <strong>Practice area<?php if ( $no_of_practice_areas != 1 ) {
						echo 's';
					} ?>:</strong>
				<?php if ( $practice_areas ) : ?>
					<?php foreach ( $practice_areas as $practice_area ) : ?>
                        <span class="semi-colon-list__list-item"><a
                           href="<?php echo get_the_permalink( $practice_area->ID ); ?>"><?php echo get_field( 'hero_main_title', $practice_area->ID ) ? get_field( 'hero_main_title', $practice_area->ID ) : get_the_title( $practice_area->ID ); ?></a></span>
					<?php endforeach; ?>
				<?php endif; ?>

				<?php if ( $custom_practice_areas ) : ?>
					<?php foreach ( $custom_practice_areas as $custom_practice_area ) : ?>
						<?php if ( $custom_practice_area['custom_practice_area_link'] ) : ?>
                <span class="semi-colon-list__list-item"><a
                            href="<?php echo get_the_permalink( $custom_practice_area['custom_practice_area_link'] ); ?>"><?php echo $custom_practice_area['custom_practice_area_name']; ?></a></span>
						<?php else : ?>
                            <span class="semi-colon-list__list-item"><?php echo $custom_practice_area['custom_practice_area_name']; ?></span>
						<?php endif; ?>
					<?php endforeach; ?>
				<?php endif; ?>
            </div>
		<?php endif; ?>

    </div>

	<?php if ( get_field( 'is_special_adviser' ) != 'yes' ) : ?>

        <div class="fipriot-card__contact-links">

			<?php if ( get_field( 'telephone' ) ) : ?>
                <div class="fipriot-card__contact-links__tel-number">
					<?php if ( get_field( 'telephone' ) ) : echo get_field( 'telephone' ); endif; ?>
                </div>
			<?php endif; ?>

            <div class="fipriot-card__contact-links__buttons">

				<?php if ( get_field( 'twitter' ) ) : ?>
                    <a href="<?php echo get_field( 'twitter' ); ?>" target="_blank"
                       class="fipriot-card__contact-links__button fipriot-card__contact-links__button--twitter">Twitter</a>
				<?php endif; ?>

				<?php if ( get_field( 'LinkedIn' ) ) : ?>
                    <a href="<?php echo get_field( 'LinkedIn' ); ?>" target="_blank"
                       class="fipriot-card__contact-links__button fipriot-card__contact-links__button--linkedin">LinkedIn</a>
				<?php endif; ?>

                <a href="mailto:<?php echo get_field( 'email' ); ?>"
                   class="fipriot-card__contact-links__button fipriot-card__contact-links__button--email">Email</a>

            </div>

        </div>

	<?php endif; ?>
</div>