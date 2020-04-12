<?php
// Get all practices in alphabetical order
$practices = get_practices();

get_header();
?>

    <div class="page__background"
         style="background:linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1)), url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'banner' ); ?>) center no-repeat; background-size: auto, cover;"></div>

    <div class="content-block hero--background-image-fade">
        <div class="content-block__content content-block__content--no-lr-pad content-block__content--no-tb-pad position--relative">
            <h1 class="hero__main-title <?php echo get_field('hero_main_title_divider_line'); ?>">Case Studies</h1>
        </div>
    </div>

    <div class="page__body">

    <div class="content-block">
        <div class="content-block__content content-block__content--no-tb-pad content-block__content--no-lr-pad">

            <div class="filter-list">
                <div class="filter-list__title filter-list__trigger filter-list__trigger--down-arrow">Practice Areas</div>
                <div class="filter-list__content filter-list__reveal">
			        <?php while ( $practices->have_posts() ) : $practices->the_post(); ?>

						<?php // $case_studies = get_all_case_studies_by_practice( get_the_ID() ); ?>
						<?php $case_studies = get_all_case_studies_by_practice_not_on_practice_page( get_the_ID() ); ?>

						<?php if ( $case_studies->have_posts() ) : ?>
                            <a href="#<?php echo classify_string(get_the_title()); ?>"
                               class="btn btn--primary btn--rounded btn--x-small scroll-to-target"><?php echo get_field( 'hero_main_title' ) ? get_field( 'hero_main_title' ) : get_the_title(); ?></a>
				        <?php endif; ?>
			        <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </div>

        </div>
    </div>


    <div class="content-block">
        <div class="content-block__content content-block__content--no-lr-pad content-block__content--no-tb-pad">

			<?php $cs_count = 0;
			if ( $practices->have_posts() ) : ?>

				<?php while ( $practices->have_posts() ) : $practices->the_post(); ?>

					<?php $case_studies = get_all_case_studies_by_practice_not_on_practice_page( get_the_ID() ); ?>

					<?php if ( $case_studies->have_posts() ) : ?>

                        <div class="case-study-card-group">

                            <h3 class="case-study-card-group__title"
                                id="<?php echo classify_string( get_the_title() ); ?>">
								<?php echo get_field( 'hero_main_title' ) ? get_field( 'hero_main_title' ) : get_the_title(); ?>
                            </h3>

							<?php while ( $case_studies->have_posts() ) : $case_studies->the_post();
								$cs_count ++; ?>

								<?php get_template_part( 'template-parts/partials/partial', 'case-study-card' ); ?>

							<?php endwhile;
							wp_reset_postdata(); ?>

                        </div>

					<?php endif; ?>

				<?php endwhile;
				wp_reset_postdata(); ?>

			<?php endif; ?>

			<?php if ( ! $cs_count ) : ?>

                No case studies found.

			<?php endif; ?>

        </div>

    </div>

<?php
get_footer();
