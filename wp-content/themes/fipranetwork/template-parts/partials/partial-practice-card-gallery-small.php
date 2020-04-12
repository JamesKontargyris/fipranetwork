<?php

$ignore_id = 0;
if(get_post_type() == 'practice') { // we are on a practice page so ignore the current practice area in the results
    $ignore_id = get_the_ID();
}
$practices = get_practices(9999, 0, [$ignore_id]);
?>

<?php if ($practices->have_posts()) : ?>
    <div class="content-block">
        <div class="content-block__content content-block__content--no-lr-pad">
            <h3 class="with-line text--center float-down-on-scroll">Our Services</h3>
            <div class="practice-card-group">
				<?php while ( $practices->have_posts() ) : $practices->the_post(); ?>
					<?php get_template_part( 'template-parts/partials/partial', 'practice-card-small' ); ?>
				<?php endwhile;
				wp_reset_postdata(); ?>
            </div>
        </div>
    </div>
<?php endif; ?>