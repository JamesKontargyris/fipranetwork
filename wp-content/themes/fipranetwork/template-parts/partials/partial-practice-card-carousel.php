<?php
//$ignore_id = 0;
//if(get_post_type() == 'practice') { // we are on a practice page so ignore the current practice area in the results
//	$ignore_id = get_the_ID();
//}
$practices = get_practices();
?>

<?php if ($practices->have_posts()) : ?>
    <div class="content-block">
        <div class="content-block__content content-block__content--full-width<?php if(get_field('testimonials')) : ?> content-block__content--no-t-pad<?php endif; ?>">
            <h3 class="with-line text--center float-down-on-scroll">Our Services</h3>
            <div class="practice-card-container">
                <div class="practice-card-group practice-card-group--slider">
		            <?php while ( $practices->have_posts() ) : $practices->the_post(); ?>
			            <?php get_template_part( 'template-parts/partials/partial', 'practice-card-slider' ); ?>
		            <?php endwhile;
		            wp_reset_postdata(); ?>
                </div>
                <div class="slider-buttons-container">
                    <button class="slider--prev practice-card-group--slider--prev">Previous</button>
                    <button class="slider--next practice-card-group--slider--next">Next</button>
                </div>
            </div>
        </div>
    </div>
<?php endif; ?>