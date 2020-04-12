<?php
/**
 * The template for displaying all pages
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fipranetwork
 */

get_header();
?>

<?php get_template_part( 'template-parts/partials/partial', 'hero' ); ?>

<div class="page__body">

	<?php get_template_part( 'template-parts/partials/partial', 'network-search-menu-overlap' ); ?>

    <div class="content-block">
        <div class="content-block__content content-block__content--full-width">
			<?php if ( get_field( 'interactive_map_section_title' ) ) : ?>
                <h2 class="with-line text--center"><?php echo get_field( 'interactive_map_section_title' ); ?></h2>
			<?php endif; ?>
			<?php if ( get_field( 'interactive_map_intro_text' ) ) : ?>
                <div class="text--center"><?php echo get_field( 'interactive_map_intro_text' ); ?></div>
			<?php endif; ?>
            <div class="network-map"></div>
        </div>
    </div>


</div>

<?php
get_footer(); ?>

<script>
    (function () {
        // Interactive network map
        var colored_countries = {},
            urls = {};

		<?php if(have_rows( 'interactive_map_countries' )) : $country_codes = ''; ?>
		<?php while(have_rows( 'interactive_map_countries' )) : the_row(); ?>
		<?php $country_codes .= "'" . strtoupper( get_sub_field( 'iso_code' ) ) . "',"; ?>
        colored_countries.<?php echo strtoupper( get_sub_field( 'iso_code' ) ); ?> = '#7CC4AC';
        urls.<?php echo strtoupper( get_sub_field( 'iso_code' ) ); ?> = '<?php echo get_sub_field( 'link' ); ?>';
		<?php endwhile; ?>

        var enabledRegions = [<?php echo $country_codes ?>];

        $('.network-map').vectorMap(
            {
                map: 'world_mill',
                regionsSelectable: false,
                selectedRegions: enabledRegions,
                panOnDrag: false,
                zoomOnScroll: false,
                zoomButtons : false,
                backgroundColor: '#ebf9ff',
                regionStyle: {
                    initial: {
                        fill: '#d4d4d4'
                    },
                    selected: {
                        fill: '#7CC4AC'
                    }
                },
                onRegionClick: function (event, code) {
                    if (enabledRegions.indexOf(code) === -1) {
                        // Not an Enabled Region
                        event.preventDefault();
                    } else {
                        // Enabled Region. Find URL and go there, if the map has been activated for interaction.
                        if (urls[code] != null && $('.network-map').hasClass('is-interactive')) {
                            window.location.href = urls[code]; // if a URL exists in urls for the clicked code, go to that URL
                        }
                    }
                },
                onRegionOver: function (event, code) {
                    if (enabledRegions.indexOf(code) === -1 || ! $('.network-map').hasClass('is-interactive')) {
                        event.preventDefault();
                    }
                },
                onRegionTipShow: function (event, tip, code) {
                    if(enabledRegions.indexOf(code) === -1 || ! $('.network-map').hasClass('is-interactive')) {
                        event.preventDefault();
                    }
                }
            });
		<?php endif; ?>
    })();
</script>
