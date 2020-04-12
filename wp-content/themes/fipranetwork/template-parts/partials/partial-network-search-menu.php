<?php $network_regions = get_terms( [ 'taxonomy' => 'network_regions', 'hide_empty' => false ] ); ?>

<?php if ( ! empty( $network_regions ) ) : $count = 0; ?>
    <div class="page-nav-bar__sections">
        <div class="page-nav-bar__section page-nav-bar__section--no-pad">
            <ul class="page-nav-bar__tab-menu">
				<?php foreach ( $network_regions as $region ) : $count ++; ?>
					<?php $units = get_all_units_by_region( $region->term_id ); // get Units assigned to this region ?>
					<?php if ( $units->have_posts() ) : $zoom_regions = ''; ?>
						<?php while ( $units->have_posts() ) : $units->the_post(); ?>
							<?php $zoom_regions .= get_field( 'iso_code' ) . ' '; // put all Units in a space-separated variable ?>
						<?php endwhile;
						wp_reset_postdata(); ?>
						<?php $zoom_regions .= strtoupper(get_field('additional_countries', $region)); // add additional regions to those that should be highlighted on the map ?>
                        <li class="page-nav-bar__tab-menu__item"><a class="page-nav-bar__tab-menu__link"
                                                                    data-sub-menu="#global-network-sub-menu-<?php echo $count; ?>"
                                                                    data-regions="<?php echo trim($zoom_regions); ?>"
                                                                    href="#"><?php echo $region->name; ?></a></li>
					<?php endif; ?>
				<?php endforeach; ?>
            </ul>
        </div>
    </div>


    <div class="page-nav-bar--sub">
        <div class="page-nav-bar--sub__content">
			<?php $count = 0; ?>
			<?php foreach ( $network_regions as $region ) : $count ++; ?>
                <div id="global-network-sub-menu-<?php echo $count; ?>" class="page-nav-bar--sub__menu">
                    <div class="global-network-country-link-group">
						<?php $units = get_all_units_by_region( $region->term_id ); ?>
						<?php if ( $units->have_posts() ) : ?>
							<?php while ( $units->have_posts() ) : $units->the_post(); ?>
                                <a class="global-network-country-link"
                                   href="<?php echo get_the_permalink(); ?>">
                                    <span class="global-network-country-link__flag"
                                          style="background:url(<?php echo get_template_directory_uri(); ?>/img/flags/<?php echo strtolower( get_field( 'iso_code' ) ); ?>.png) center no-repeat;"></span>
									<?php echo get_field('country_name') ? get_field('country_name') : get_the_title(); ?>
                                </a>
							<?php endwhile; ?>
						<?php else : ?>
                            No Units in this region
						<?php endif;
						wp_reset_postdata(); ?>
                    </div>
                </div>
			<?php endforeach; ?>
        </div>
    </div>

<?php endif; ?>