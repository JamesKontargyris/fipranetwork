<?php
// Get the latest update
$feature_update = get_updates( 1 );
// Get the next six updates after the latest update
$recent_updates = get_updates( 6, 1 );
// Get all updates after the first seven
$older_updates = get_updates( 9999, 7 );

get_header();
?>

    <div class="page__background"
         style="background:linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1)), url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'banner' ); ?>) center no-repeat; background-size: auto, cover;"></div>

    <div class="content-block hero--background-image-fade">
        <div class="content-block__content content-block__content--no-lr-pad content-block__content--no-tb-pad position--relative">
            <h1 class="hero__main-title <?php echo get_field( 'hero_main_title_divider_line' ); ?>">Updates</h1>
			<?php get_template_part( 'template-parts/partials/partial', 'updates-filter-list' ); ?>
        </div>
    </div>

    <div class="page__body">

    <div class="content-block">
        <div class="content-block__content content-block__content--no-lr-pad content-block__content--no-tb-pad">

			<?php if ( ! $feature_update->have_posts() and ! $recent_updates->have_posts() ) : ?>
                <p>No updates at this time.</p>
			<?php endif; ?>

			<?php if ( $feature_update->have_posts() ) : ?>

				<?php while ( $feature_update->have_posts() ) : $feature_update->the_post(); ?>

					<?php get_template_part( 'template-parts/partials/partial', 'news-story-card-feature' ); ?>

				<?php endwhile;
				wp_reset_postdata(); ?>

			<?php endif; ?>

			<?php if ( $recent_updates->have_posts() ) : ?>

            <div class="container--no-pad">

                <div class="news-story-card-group news-story-card-group--with-sidebar">

		            <?php while ( $recent_updates->have_posts() ) : $recent_updates->the_post(); ?>

			            <?php get_template_part( 'template-parts/partials/partial', 'news-story-card' ); ?>

		            <?php endwhile;
		            wp_reset_postdata(); ?>

                </div>

                <div class="news-story-card-group-sidebar">
	                <?php if ( is_active_sidebar( 'updates_sidebar' ) ) : ?>
		                <?php dynamic_sidebar( 'updates_sidebar' ); ?>
	                <?php endif; ?>
                </div>

            </div>


			<?php endif; ?>

            <div class="older-updates">
				<?php if ( $older_updates->have_posts() ) : ?>

                    <a href="#" class="btn btn--secondary btn--full-width older-updates__trigger">View older updates</a>

                    <div class="news-story-card-group news-story-card-group--older-updates">

						<?php while ( $older_updates->have_posts() ) : $older_updates->the_post(); ?>

							<?php get_template_part( 'template-parts/partials/partial', 'news-story-card' ); ?>

						<?php endwhile;
						wp_reset_postdata(); ?>

                    </div>

				<?php endif; ?>
            </div>

        </div>

    </div>

<?php
get_footer();
