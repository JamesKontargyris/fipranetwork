<div class="fipriot-profile__header <?php if ( has_post_thumbnail() ) : ?>fipriot-profile__header--with-photo<?php endif; ?>">

    <div class="fipriot-profile__titles">

		<?php if ( has_post_thumbnail() ) : ?>
            <div class="fipriot-profile__photo">
                <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'profile-large' ); ?>"
                     alt="<?php echo $full_name; ?>">
            </div>
		<?php endif; ?>

        <h1 class="fipriot-profile__name"><?php echo get_field( 'first_name' ) . ' ' . get_field( 'last_name' ); ?></h1>

		<?php if ( get_field( 'is_special_adviser' ) == 'yes' ) : ?>
            <div class="fipriot-profile__position">Special Advisor
                - <?php echo get_field( 'special_adviser_expertise' ); ?></div>
		<?php else : ?>
			<?php if ( get_field( 'position' ) ) : ?>
                <div class="fipriot-profile__position"><?php echo get_field( 'position' ); ?></div>
			<?php endif; ?>
		<?php endif; ?>

    </div>

    <div class="fipriot-profile__titles-divider"></div>

    <div class="fipriot-profile__meta">

        <div class="fipriot-profile__contact-details">

			<?php if ( get_field( 'telephone' ) ) : ?>
                <div class="fipriot-profile__contact-details--telephone">
					<?php echo get_field( 'telephone', $fipriot_id ); ?>
                </div>
			<?php endif; ?>

			<?php if ( get_field( 'email' ) ) : ?>
                <div class="fipriot-profile__contact-details--email">
					<?php echo hide_email( get_field( 'email', $fipriot_id ) ); ?>
                </div>
			<?php endif; ?>

        </div>

        <div class="fipriot-profile__contact-buttons">

			<?php if ( get_field( 'twitter' ) ) : ?>
                <a href="<?php echo get_field( 'twitter' ); ?>" target="_blank"
                   class="fipriot-profile__contact-button fipriot-profile__contact-button--twitter"
                   title="Follow on Twitter">Twitter</a>
			<?php endif; ?>

			<?php if ( get_field( 'linkedin' ) ) : ?>
                <a href="<?php echo get_field( 'linkedin' ); ?>" target="_blank"
                   class="fipriot-profile__contact-button fipriot-profile__contact-button--linkedin"
                   title="Connect on LinkedIn">LinkedIn</a>
			<?php endif; ?>

        </div>
    </div>

</div>


<div class="page__body fipriot-profile">

    <div class="content-block">
        <div class="content-block__content">

			<?php echo get_field( 'bio' ); ?>

			<?php if ( get_field( 'languages' ) ) : ?>
                <div class="info-box-container">
                    <div class="info-box__group">
                        <div class="info-box <?php if ( get_field( 'practice_areas' ) || get_field( 'custom_practice_areas' ) ) : ?>fipriot-profile__info-box--languages<?php endif; ?>">
                            <div class="info-box__title">Language<?php if ( get_field( 'languages' ) != 1 ) {
									echo 's';
								} ?> Spoken
                            </div>
                            <div class="fipriot-profile__languages">
								<?php foreach ( get_field( 'languages' ) as $language ) : $language = get_term( $language ); ?>
                                    <div class="fipriot-profile__language <?php if ( get_field( 'practice_areas' ) || get_field( 'custom_practice_areas' ) ) : ?>fipriot-profile__language--3-to-row<?php else : ?>fipriot-profile__language--5-to-row<?php endif; ?>">
										<?php if ( get_field( 'flag', $language ) ) : ?><img
                                            src="<?php echo get_field( 'flag', $language )['url']; ?>"
                                            alt=""><?php endif; ?> <?php echo $language->name; ?>
                                    </div>
								<?php endforeach; ?>
                            </div>
                        </div>

						<?php
						$practice_areas        = get_field( 'practice_areas' ) ? get_field( 'practice_areas' ) : [];
						$custom_practice_areas = get_field( 'custom_practice_areas' ) ? get_field( 'custom_practice_areas' ) : [];
						$no_of_practice_areas  = count( $practice_areas ) + count( $custom_practice_areas );
						?>

						<?php if ( $practice_areas || $custom_practice_areas ) : ?>
                            <div class="info-box fipriot-profile__info-box--practice-areas">
                                <div class="info-box__title">Practice Area<?php if ( $no_of_practice_areas != 1 ) {
										echo 's';
									} ?></div>
                                <p class="no-pad no-margin">
									<?php if ( $practice_areas ) : ?>
										<?php foreach ( $practice_areas as $practice_area ) : ?>
                                            <a class="comma-list__list-item"
                                               href="<?php echo get_the_permalink( $practice_area->ID ); ?>"><?php echo get_field( 'hero_main_title', $practice_area->ID ) ? get_field( 'hero_main_title', $practice_area->ID ) : get_the_title( $practice_area->ID ); ?></a>
										<?php endforeach; ?>
									<?php endif; ?>

									<?php if ( $custom_practice_areas ) : ?>
										<?php foreach ( $custom_practice_areas as $custom_practice_area ) : ?>
											<?php if ( $custom_practice_area['custom_practice_area_link'] ) : ?>
                                                <a class="comma-list__list-item"
                                                   href="<?php echo get_the_permalink( $custom_practice_area['custom_practice_area_link'] ); ?>"><?php echo $custom_practice_area['custom_practice_area_name']; ?></a>
											<?php else : ?>
                                                <span class="comma-list__list-item"><?php echo $custom_practice_area['custom_practice_area_name']; ?></span>
											<?php endif; ?>
										<?php endforeach; ?>
									<?php endif; ?>
                                </p>
                            </div>
						<?php endif; ?>
                    </div>
                </div>
			<?php endif; ?>
			<?php if ( $unit_info = get_fipriots_unit( get_the_ID() ) ) : ?>
                <p class="text--center"><a href="<?php echo $unit_info['permalink']; ?>"
                                           class="btn btn--primary btn--left-arrow"><?php echo $unit_info['name']; ?></a></p>
			<?php endif; ?>

        </div>
    </div>

	<?php get_template_part( 'template-parts/partials/partial', 'feature-quote' ); ?>

</div>