<?php get_template_part( 'template-parts/partials/partial', 'hero-diamond-overlay' ); ?>

<?php get_template_part( 'template-parts/partials/partial', 'scroll-down-indicator' ); ?>

<div class="page__body">

    <nav class="page-nav-bar">
		<?php if ( get_field( 'assigned_to_practices' ) ) : $no_of_practices = count( get_field( 'assigned_to_practices' ) ); ?>
            <div class="page-nav-bar__section page-nav-bar__section--one-third">
                <span class="page-nav-bar__section__title"><?php echo ( $no_of_practices == 1 ) ? 'Practice' : 'Practices'; ?></span>
				<?php foreach ( get_field( 'assigned_to_practices' ) as $post ) : setup_postdata( $post ); ?>
                    <a class="page-nav-bar__link"
                       href="<?php echo get_the_permalink(); ?>"><?php echo get_field( 'hero_main_title' ) ? get_field( 'hero_main_title' ) : get_the_title(); ?></a>
				<?php endforeach;
				wp_reset_postdata(); ?>
            </div>
		<?php endif; ?>
        <div class="page-nav-bar__section page-nav-bar__section--two-thirds">
            <span class="page-nav-bar__section__title">Jump to</span>
            <a class="page-nav-bar__link scroll-to-target" href="#thechallenge">The Challenge</a>
            <a class="page-nav-bar__link scroll-to-target" href="#thefipraapproach">The FIPRA Approach</a>
            <a class="page-nav-bar__link scroll-to-target" href="#theoutcomes">The Outcome</a>

			<?php if ( get_field( 'show_resources' ) == 'yes' ) : ?>
                <a class="page-nav-bar__link scroll-to-target"
                   href="#resources"><?php echo get_field( 'resources_section_title' ); ?></a>
			<?php endif; ?>
        </div>
    </nav>

	<?php if ( get_field( 'pre_case_study_content' ) ) : ?>
        <section class="content-block">
            <div class="content-block__content">
				<?php the_field( 'pre_case_study_content' ); ?>
            </div>
        </section>
	<?php endif; ?>

	<?php if ( get_field( 'the_challenge' ) ) : ?>
        <section id="thechallenge" class="content-block">
            <div class="content-block__content">
                <h2 class="with-line text--dark-blue float-down-on-scroll"><span
                            class="text--heading-regular">The</span> Challenge</h2>
				<?php the_field( 'the_challenge' ); ?>
            </div>
        </section>
	<?php endif; ?>

	<?php if ( get_field( 'the_fipra_approach' ) ) : ?>
        <section id="thefipraapproach" class="content-block content-block--full-width content-block--highlight-dark">
            <div class="content-block__content--container">
                <div class="content-block__content">
                    <h2 class="with-line text--white float-down-on-scroll"><span
                                class="text--heading-regular">The</span> FIPRA Approach</h2>
					<?php the_field( 'the_fipra_approach' ); ?>
                </div>
            </div>
        </section>
	<?php endif; ?>

    <section id="theoutcomes" class="content-block">
        <div class="content-block__content">
            <h2 class="with-line text--dark-blue float-down-on-scroll"><span
                        class="text--heading-regular">The</span> Outcome</h2>
			<?php the_field( 'the_outcomes' ); ?>
        </div>
    </section>

	<?php if ( get_field( 'post_case_study_content' ) ) : ?>
        <section class="content-block">
            <div class="content-block__content">
				<?php the_field( 'post_case_study_content' ); ?>
            </div>
        </section>
	<?php endif; ?>

	<?php get_template_part( 'template-parts/partials/partial', 'feature-quote' ); ?>

	<?php if ( get_field( 'show_resources' ) == 'yes' ) : ?>

        <section id="resources" class="content-block <?php if ( get_field( 'display_feature_quote' ) != 'yes' ) : ?>content-block--highlight-light<?php endif; ?>">
            <div class="content-block__content">
                <h2 class="with-line with-line--white text--dark-blue float-down-on-scroll"><?php echo get_field( 'resources_section_title' ); ?></h2>

				<?php while ( have_rows( 'resources' ) ) : the_row(); ?>

                    <div class="resource">
                        <div class="resource__thumbnail">
							<?php if ( get_sub_field( 'resource_thumbnail' ) ) : ?>
                                <img src="<?php echo get_sub_field( 'resource_thumbnail' )['sizes']['resource']; ?>" alt="<?php echo get_sub_field( 'resource_title' ); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="resource__details">
                            <div class="resource__title"><?php echo get_sub_field( 'resource_title' ); ?></div>

							<?php if ( get_sub_field( 'resource_info' ) ) : ?>
                                <div class="resource__meta"><?php echo get_sub_field( 'resource_info' ); ?></div>
							<?php endif; ?>

							<?php if ( get_sub_field( 'resource_description' ) ) : ?>
                                <div class="resource__description"><?php echo get_sub_field( 'resource_description' ); ?></div>
							<?php endif; ?>

							<?php if ( have_rows( 'resource_links' ) ) : ?>
                                <div class="resource__links">
									<?php while ( have_rows( 'resource_links' ) ) : the_row(); ?>

										<?php if ( get_sub_field( 'link_to' ) == 'url' ) : ?>

                                            <a href="<?php echo get_sub_field( 'url' ) ?>"
                                               class="btn btn--<?php echo get_sub_field( 'button_type' ); ?> btn--small"
											   <?php if ( get_sub_field( 'open_in_new_window' ) == 'yes' ) : ?>target="_blank"<?php endif; ?>><?php echo get_sub_field( 'button_text' ); ?></a>

										<?php elseif ( get_sub_field( 'link_to' ) == 'file' ) : ?>

                                            <a href="<?php echo get_sub_field( 'file' )['url'] ?>"
                                               class="btn btn--<?php echo get_sub_field( 'button_type' ); ?> btn--small"
											   <?php if ( get_sub_field( 'open_in_new_window' ) == 'yes' ) : ?>target="_blank"<?php endif; ?>
											   <?php if ( get_sub_field( 'force_download' ) == 'yes' ) : ?>download<?php endif; ?>><?php echo get_sub_field( 'button_text' ); ?></a>

										<?php endif; ?>

									<?php endwhile; ?>
                                </div>
							<?php endif; ?>
                        </div>
                    </div>

				<?php endwhile; ?>

            </div>
        </section>

	<?php endif; ?>

    <div class="unstick"></div>

    <div class="page-footer-cta">
        <div class="page-footer-cta__content float-down-on-scroll no-pad--top">
            <p class="text--center">
                <a href="/case-studies" class="btn btn--secondary btn--large btn--left-arrow">More case studies</a></p>
        </div>
    </div>

</div>