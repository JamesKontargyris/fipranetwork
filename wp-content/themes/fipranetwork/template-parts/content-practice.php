<?php get_template_part( 'template-parts/partials/partial', 'hero-image-triangle' ); ?>

<?php get_template_part( 'template-parts/partials/partial', 'scroll-down-indicator' ); ?>

<div class="page__body">

    <section class="content-block">
        <div class="content-block__content">
			<?php the_content(); ?>
        </div>
    </section>

	<?php $case_studies = get_case_studies_for_practice_page( get_the_ID() ); ?>
	<?php if ( $case_studies->have_posts() ) : ?>

        <section class="content-block case-study-menu">
            <div class="case-study-menu__bg-bar"></div>
            <div class="content-block__content content-block__content--full-width content-block__content--no-t-pad">
                <h3 class="with-line text--center float-down-on-scroll"><?php if ( $case_studies->found_posts == 1 ) : ?>Case Study<?php else : ?>Case Studies<?php endif; ?></h3>

                <div class="case-study-menu__items case-study-menu--slider case-study-menu--<?php echo $case_studies->found_posts; ?>-items"
                     data-slick='{"initialSlide": <?php if ( $case_studies->found_posts == 3 ) : ?>1<?php elseif ( $case_studies->found_posts == 4 || $case_studies->found_posts == 5 ) : ?>2<?php else : ?>0<?php endif; ?>}'>

					<?php while ( $case_studies->have_posts() ) : $case_studies->the_post(); ?>
                        <div class="case-study-menu__item"
                             style="background:linear-gradient(to bottom, rgba(0,0,0,0.3) 20%, rgba(0,0,0,0.1) 70%)<?php if ( has_post_thumbnail() ) : ?>, url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'case-study-diamond'); ?>) top center no-repeat; background-size:auto, 40rem 45rem<?php endif; ?>;">
                            <div class="case-study-menu__item__yellow-diamond"></div>
                            <a class="case-study-menu__item__full-size-anchor"
                               href="<?php echo get_the_permalink(); ?>"></a>
                            <div class="case-study-menu__item__content">
                                <div class="case-study-menu__item__title"><?php echo get_the_title(); ?></div>
                                <div class="case-study-menu__item__more-link"><a
                                            href="<?php echo get_the_permalink(); ?>">More</a></div>
                            </div>
                        </div>

					<?php endwhile;
					wp_reset_postdata(); ?>
                </div>

				<?php if ( get_all_case_studies_by_practice_not_on_practice_page( get_the_ID() )->have_posts() ) : ?>
                    <div class="case-study-menu__cta">
                        <a href="/case-studies" class="btn btn--secondary btn--large">More case studies</a>
                    </div>
				<?php endif; ?>
            </div>

        </section>
	<?php endif; ?>

	<?php get_template_part( 'template-parts/partials/partial', 'feature-quote' ); ?>

	<?php get_template_part( 'template-parts/partials/partial', 'testimonials' ); ?>

	<?php if ( get_field( 'page_footer_content' ) ) : ?>

        <section class="content-block">
            <div class="content-block__content <?php if ( get_field( 'testimonials' ) ) : ?>content-block__content--no-t-pad<?php else : ?>content-block__content--flat<?php endif; ?>">
				<?php echo get_field( 'page_footer_content' ); ?>
            </div>
        </section>

	<?php endif; ?>

	<?php get_template_part( 'template-parts/partials/partial', 'practice-card-carousel' ); ?>


</div>