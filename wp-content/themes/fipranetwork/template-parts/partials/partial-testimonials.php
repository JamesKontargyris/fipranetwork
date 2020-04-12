<?php if ( get_field( 'testimonials' ) ) : $count = 0; ?>
	<?php foreach ( get_field( 'testimonials' ) as $testimonial ): $count ++; endforeach; // to get the total number of testimonials  ?>
    <section class="content-block content-block--full-width testimonials">
        <div class="content-block__content">
            <h3 class="with-line text--center float-down-on-scroll">
                Testimonial<?php echo $count == 1 ? '' : 's'; ?></h3>
            <div class="testimonial-group testimonial-group--slider">
				<?php foreach ( get_field( 'testimonials' ) as $post ) : setup_postdata( $post ); ?>
                    <div class="testimonial">
                        <div class="testimonial__quote">&quot;<?php echo wp_strip_all_tags( get_the_content() ); ?>
                            &quot;
                        </div>
                        <div class="testimonial__citation"><?php echo get_field( 'citation' ); ?></div>
                    </div>
				<?php endforeach;
				wp_reset_postdata(); ?>
            </div>
			<?php if ( $count > 1 ) : ?>
                <div class="testimonial__nav">
                    <button class="testimonial--slider-prev">Previous</button>
                    <button class="testimonial--slider-next">Next</button>
                </div>
			<?php endif; ?>
        </div>
    </section>
<?php endif; ?>