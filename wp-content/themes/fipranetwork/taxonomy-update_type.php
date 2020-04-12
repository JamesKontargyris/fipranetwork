<?php
// Get the current term
$type = get_queried_object();
// Get updates assigned to this taxonomy term
$filtered_updates = get_updates_by_type($type->slug);

get_header();
?>

    <div class="page__background"
         style="background:linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1)), url(<?php echo get_the_post_thumbnail_url( get_page_by_path( 'updates' ), 'banner' ); ?>) center no-repeat; background-size: auto, cover;"></div>

    <div class="content-block hero--background-image-fade">
        <div class="content-block__content content-block__content--no-lr-pad content-block__content--no-tb-pad position--relative">
            <h1 class="hero__main-title with-line">Updates</h1>
            <h3 class="margin--extra-bottom">Showing updates tagged &quot;<?php echo $type->name; ?>&quot;</h3>
			<?php get_template_part( 'template-parts/partials/partial', 'updates-filter-list' ); ?>
        </div>
    </div>

    <div class="page__body">

    <div class="content-block">
        <div class="content-block__content content-block__content--no-lr-pad content-block__content--no-tb-pad">


			<?php if ( $filtered_updates->have_posts() ) : ?>

                <div class="news-story-card-group">

					<?php while ( $filtered_updates->have_posts() ) : $filtered_updates->the_post(); ?>

						<?php get_template_part( 'template-parts/partials/partial', 'news-story-card' ); ?>

					<?php endwhile;
					wp_reset_postdata(); ?>

                </div>

			<?php endif; ?>

        </div>

    </div>

<?php
get_footer();
