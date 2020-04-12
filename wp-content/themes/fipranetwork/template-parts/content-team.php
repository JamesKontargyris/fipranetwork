<?php get_template_part('template-parts/partials/partial', 'hero-background-image-fade'); ?>

<div class="page__body">

    <div class="content-block">
        <div class="content-block__content content-block__content--no-lr-pad content-block__content--no-tb-pad">
			<?php if ( have_rows( 'team_group' ) ) : ?>

				<?php if(get_field('display_navigation') == 'yes') : ?>

                    <?php if(count(get_field('team_group')) > 1 ) : // there is more than one team group so show page nav bar ?>
                        <nav class="page-nav-bar page-nav-bar--no-top-margin">
                            <div class="page-nav-bar__section">
                                <span class="page-nav-bar__section__title">Jump to</span>
                                <?php foreach(get_field('team_group') as $team_group) : $team_name_anchor = strtolower(str_replace(' ', '', remove_symbols($team_group['team_group_title']))); ?>
                                <a class="page-nav-bar__link scroll-to-target" href="#<?php echo $team_name_anchor ?>"><?php echo $team_group['team_group_title']; ?></a>
                                <?php endforeach; ?>
                            </div>
                        </nav>
                    <?php endif; ?>

                <?php endif; ?>


				<?php while ( have_rows( 'team_group' ) ) :
					the_row(); ?>

                    <div class="team-group" id="<?php echo strtolower(str_replace(' ', '', remove_symbols(get_sub_field('team_group_title')))); ?>">

                        <h2 class="with-line"><?php the_sub_field( 'team_group_title' ); ?></h2>

						<?php
						$fipriots = get_sub_field( 'team_group_fipriots' );

						if ( $fipriots ) :
							?>

                            <div class="fipriot-card-group">

								<?php foreach ( $fipriots as $post ) : // MUST be called $post ?>
									<?php setup_postdata( $post ); ?>

									<?php if(get_post_status() == 'publish') : // make sure the Fipriot profile has been published ?>
									    <?php get_template_part( 'template-parts/partials/partial', 'fipriot-card' ); ?>
	                                <?php endif; ?>

								<?php endforeach;
								wp_reset_postdata(); ?>

                            </div>

						<?php endif; ?>

                    </div>

				<?php endwhile; ?>

			<?php endif; ?>

        </div>
    </div>

	<?php get_template_part('template-parts/partials/partial', 'feature-quote'); ?>

</div>