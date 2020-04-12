<?php if ( get_field( 'display_feature_quote' ) == 'yes' ) : ?>
    <section class="feature-quote">
        <div class="trigger"></div>
        <div class="feature-quote__content-container">
            <div class="feature-quote__content">
                <div class="feature-quote__quote visible-on-scroll <?php if ( ! get_field( 'hide_quote_marks' ) ) : ?>feature-quote__quote--with-quote-marks<?php endif; ?>">
                    <p><?php echo nl2br( get_field( 'quote' ) ); ?></p>
                </div>

				<?php if ( get_field( 'quote_has_citation' ) ) : ?>
                    <div class="feature-quote__citation-container">
						<?php $fipriot_id = get_field( 'citation_fipriot' )[0]; ?>
						<?php if ( has_post_thumbnail( $fipriot_id ) ) : ?>
                            <div class="feature-quote__citation__photo"><img
                                        src="<?php echo get_the_post_thumbnail_url( $fipriot_id, 'featured-quote' ); ?>"
                                        alt="<?php echo get_field( 'first_name', $fipriot_id ) . ' ' . get_field( 'last_name', $fipriot_id ); ?>">
                            </div>
						<?php endif; ?>
                        <div class="feature-quote__citation">
                            <div class="feature-quote__citation__name"><?php echo get_field( 'first_name', $fipriot_id ) . ' ' . get_field( 'last_name', $fipriot_id ); ?></div>
							<?php if ( get_field( 'citation_position' ) ) : ?>
                                <div class="feature-quote__citation__role"><?php echo get_field( 'citation_position' ); ?></div>
							<?php elseif ( ! get_field( 'citation_position' ) && get_field( 'position', $fipriot_id ) ) : ?>
                                <div class="feature-quote__citation__role"><?php echo get_field( 'position', $fipriot_id ); ?></div>
							<?php endif; ?>

                            <div class="feature-quote__contact-info">

								<?php if ( get_field( 'telephone', $fipriot_id ) ) : ?>
                                    <div class="feature-quote__contact-info--telephone">
										<?php echo get_field( 'telephone', $fipriot_id ); ?>
                                    </div>
								<?php endif; ?>

								<?php if ( get_field( 'email', $fipriot_id ) ) : ?>
                                    <div class="feature-quote__contact-info--email">
										<?php echo hide_email( get_field( 'email', $fipriot_id ) ); ?>
                                    </div>
								<?php endif; ?>

                                <div class="feature-quote__contact-info--profile">
                                    <a href="<?php echo get_the_permalink( $fipriot_id ); ?>">Profile</a>
                                </div>

                            </div>

                        </div>
                    </div>
				<?php endif; ?>
            </div>
        </div>
    </section>
<?php endif; ?>