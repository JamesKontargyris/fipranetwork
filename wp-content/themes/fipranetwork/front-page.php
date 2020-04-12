<?php get_header(); ?>


<?php while ( have_posts() ) : the_post(); ?>


    <div class="page__header page__header--diamond-overlay">

        <section class="hero hero--home hero--diamond-overlay"
                 style="background: <?php if ( has_post_thumbnail() ) : ?> url(<?php echo get_the_post_thumbnail_url(get_the_ID(), 'banner' ); ?>) center no-repeat,<?php endif; ?> #7CC4AC; <?php if ( has_post_thumbnail() ) : ?> background-size:cover, auto !important; <?php endif; ?>">

            <div class="hero--diamond-overlay__content-container">
                <div class="hero__content hero--diamond-overlay__content float-down-on-scroll">
					<?php if ( get_field( 'hero_mini_title' ) ) : ?>
                        <h6 class="hero__mini-title"><?php echo get_field( 'hero_mini_title' ); ?></h6>
					<?php endif; ?>

                    <h1 class="hero__main-title <?php echo get_field( 'hero_main_title_divider_line' ); ?>"><?php echo get_field( 'hero_main_title' ) ? get_field( 'hero_main_title' ) : get_the_title(); ?></h1>

					<?php if ( get_field( 'hero_intro' ) ) : ?>
                        <div class="hero__intro"><?php echo get_field( 'hero_intro' ); ?></div>
					<?php endif; ?>

					<?php if ( have_rows( 'home_links' ) ) : ?>
                        <div class="hero__button-group">
							<?php while ( have_rows( 'home_links' ) ) : the_row(); ?>
                                <a class="btn btn--<?php echo get_sub_field('button_type'); ?>" href="<?php echo get_the_permalink(get_sub_field('link_to')); ?>"><?php echo get_sub_field('button_text'); ?></a>
                            <?php endwhile; wp_reset_postdata(); ?>
                        </div>
					<?php endif; ?>

                </div>
            </div>

        </section>

	    <?php get_template_part('template-parts/partials/partial', 'scroll-down-indicator-check'); ?>
    </div>

<?php endwhile; ?>

<?php
get_footer();
