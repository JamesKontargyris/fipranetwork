<?php
/*
Plugin Name: Site Plugin for FIPRA Network website
Description: Site specific code changes for fipranetwork.com
*/
$path = $_SERVER['DOCUMENT_ROOT'];

require_once( $path . '/vendor/autoload.php' ); // Composer dependencies
require_once( 'inc/helper-functions.php' ); // Helper functions
require_once( 'inc/twitter.php' ); // Twitter stuff
require_once( 'inc/widgets/widget-tweets.php' ); // Tweets widget

// Enable the use of shortcodes within widgets.
add_filter( 'widget_text', 'do_shortcode' );

// Create a shortcode that can reference the template directory uri
// Assign the tag for our shortcode and identify the function that will run.
add_shortcode( 'template_directory_uri', 'include_template_directory_uri' );

// Define function
function include_template_directory_uri() {
	return get_template_directory_uri();
}


// Create a shortcode that can include the current year
// Assign the tag for our shortcode and identify the function that will run.
add_shortcode( 'current_year', 'include_current_year' );

// Define function
function include_current_year() {
	return date( 'Y' );
}

function get_case_studies( $count = 1, $offset = 0, $ignore_ids = [], $random = false ) {
	$args = [
		'post_status'    => 'publish',
		'post_type'      => 'case_study',
		'posts_per_page' => $count,
		'post__not_in'   => $ignore_ids,
		'offset'         => $offset,
	];

	if ( $random ) {
		$args['orderby'] = 'rand';
	}

	return new WP_Query( $args );
}

function get_teams( $count = 9999, $offset = 0, $ignore_ids = [], $random = false ) {
	$args = [
		'post_status'    => 'publish',
		'post_type'      => 'team',
		'posts_per_page' => $count,
		'post__not_in'   => $ignore_ids,
		'offset'         => $offset,
	];

	if ( $random ) {
		$args['orderby'] = 'rand';
	}

	return new WP_Query( $args );
}

function get_units( $count = 9999, $offset = 0, $ignore_ids = [], $random = false ) {
	$args = [
		'post_status'    => 'publish',
		'post_type'      => 'unit',
		'posts_per_page' => $count,
		'post__not_in'   => $ignore_ids,
		'offset'         => $offset,
	];

	if ( $random ) {
		$args['orderby'] = 'rand';
	}

	return new WP_Query( $args );
}

// Get all case studies assigned to a practice
function get_all_case_studies_by_practice( $practice_id = null ) {

	if ( $practice_id ) {

		$args = [
			'post_status'    => 'publish',
			'post_type'      => 'case_study',
			'posts_per_page' => '9999',
			'meta_query'     => [
				[
					'key'     => 'assigned_to_practices',
					'value'   => '"' . $practice_id . '"',
					'compare' => 'LIKE'
				],
			]
		];

		return new WP_Query( $args );

		wp_reset_postdata();

	} else {
		return false;
	}
}

// Get all case studies assigned to a practice
function get_all_case_studies_by_practice_not_on_practice_page( $practice_id = null ) {

	if ( $practice_id ) {

		$args = [
			'post_status'    => 'publish',
			'post_type'      => 'case_study',
			'posts_per_page' => '9999',
			'meta_query'     => [
				[
					'key'     => 'assigned_to_practices',
					'value'   => '"' . $practice_id . '"',
					'compare' => 'LIKE',
				],
				[
					'key'     => 'display_on_practice_page',
					'value'   => '0',
					'compare' => '=',
				]
			]
		];

		return new WP_Query( $args );

		wp_reset_postdata();

	} else {
		return false;
	}
}

// Get all case studies assigned to a practice that are set to be visible on the practice page
function get_case_studies_for_practice_page( $practice_id = null ) {

	if ( $practice_id ) {

		$args = [
			'post_status'    => 'publish',
			'post_type'      => 'case_study',
			'posts_per_page' => '9999',
			'meta_query'     => [
				[
					'key'     => 'assigned_to_practices',
					'value'   => '"' . $practice_id . '"',
					'compare' => 'LIKE'
				],
				[
					'key'     => 'display_on_practice_page',
					'value'   => true,
					'compare' => '='
				]
			]
		];

		return new WP_Query( $args );

		wp_reset_postdata();

	} else {
		return false;
	}
}

// Get the first team that a Fipriot belongs to
function get_fipriots_team( $fipriot_id = null ) {

	if ( $fipriot_id ) {

		$teams = get_teams();

		if ( $teams->have_posts() ) {
			while ( $teams->have_posts() ) {
				$teams->the_post();

				if ( have_rows( 'team_group' ) ) {
					while ( have_rows( 'team_group' ) ) {
						the_row();
						$fipriots = get_sub_field( 'team_group_fipriots' );

						if ( $fipriots ) {
							foreach ( $fipriots as $fipriot ) { // MUST be called $post
								if ( $fipriot == $fipriot_id ) {
									$results['permalink'] = get_the_permalink();
									$results['name']      = get_the_title();

									return $results;
								}
							}
						}
					}
				}
			}
		}
	}

	return false;
}

// Get the first Unit that a Fipriot belongs to
function get_fipriots_unit( $fipriot_id = null ) {

	if ( $fipriot_id ) {

		$units = get_units();

		if ( $units->have_posts() ) {
			while ( $units->have_posts() ) {
				$units->the_post();

				$fipriots = get_field( 'point_of_contact_fipriot' );

				if ( $fipriots ) {
					foreach ( $fipriots as $fipriot ) {
						if ( $fipriot == $fipriot_id ) {
							$results['permalink'] = get_the_permalink();
							$results['name']      = get_the_title();

							return $results;
						}
					}
				}
			}
		}
	}

	return false;
}

// Get the Network Units assigned to a Network Region
function get_all_units_by_region( $region_id = null ) {

	if ( $region_id ) {

		$args = [
			'post_status'    => 'publish',
			'post_type'      => 'unit',
			'posts_per_page' => 9999,
			'meta_key'       => 'country_name',
			'orderby'        => 'meta_value',
			'order'          => 'ASC',
			'tax_query'      => [
				[
					'taxonomy' => 'network_regions',
					'field'    => 'term_id',
					'terms'    => $region_id
				],
			]
		];

		return new WP_Query( $args );
	}

	return false;
}

// Get all practice areas
function get_practices( $count = 9999, $offset = 0, $ignore_ids = [], $random = false ) {

	$args = [
		'post_status'    => 'publish',
		'post_type'      => 'practice',
		'posts_per_page' => $count,
		'post__not_in'   => $ignore_ids,
		'offset'         => $offset,
//		'orderby'        => 'title', // switch on to order by title, otherwise order by back-end manual order
//		'order'          => 'ASC'
	];

	if ( $random ) {
		$args['orderby'] = 'rand';
	}

	return new WP_Query( $args );
}

// Get all updates in chronological order
function get_updates( $count = 9999, $offset = 0, $ignore_ids = [], $random = false ) {

	$args = [
		'post_status'    => 'publish',
		'post_type'      => 'update',
		'posts_per_page' => $count,
		'post__not_in'   => $ignore_ids,
		'offset'         => $offset,
		'orderby'        => 'date',
		'order'          => 'DESC'
	];

	if ( $random ) {
		$args['orderby'] = 'rand';
	}

	return new WP_Query( $args );
}

// Get all updates in chronological order
function get_updates_by_type( $type = '', $count = 9999, $offset = 0, $ignore_ids = [], $random = false ) {

	$args = [
		'post_status'    => 'publish',
		'post_type'      => 'update',
		'posts_per_page' => $count,
		'post__not_in'   => $ignore_ids,
		'offset'         => $offset,
		'orderby'        => 'date',
		'order'          => 'DESC',
		'tax_query'      => [
			[
				'taxonomy' => 'update_type',
				'field'    => 'slug',
				'terms'    => $type
			]

		]
	];

	if ( $random ) {
		$args['orderby'] = 'rand';
	}

	return new WP_Query( $args );
}

// Obfuscate email addresses
function hide_email( $email ) {
	$character_set = '+-.0123456789@ABCDEFGHIJKLMNOPQRSTUVWXYZ_abcdefghijklmnopqrstuvwxyz';

	$key         = str_shuffle( $character_set );
	$cipher_text = '';
	$id          = 'e' . rand( 1, 999999999 );

	for ( $i = 0; $i < strlen( $email ); $i += 1 ) {
		$cipher_text .= $key[ strpos( $character_set, $email[ $i ] ) ];
	}

	$script = 'var a="' . $key . '";var b=a.split("").sort().join("");var c="' . $cipher_text . '";var d="";';

	$script .= 'for(var e=0;e<c.length;e++)d+=b.charAt(a.indexOf(c.charAt(e)));';

	$script .= 'document.getElementById("' . $id . '").innerHTML="<a href=\\"mailto:"+d+"\\">"+d+"</a>"';

	$script = "eval(\"" . str_replace( array( "\\", '"' ), array( "\\\\", '\"' ), $script ) . "\")";

	$script = '<script type="text/javascript">/*<![CDATA[*/' . $script . '/*]]>*/</script>';

	return '<span id="' . $id . '">[javascript protected email address]</span>' . $script;

}

// Upscale images where they are smaller than the thumbnail size
function binary_thumbnail_upscale( $default, $orig_w, $orig_h, $new_w, $new_h, $crop ) {
	if ( ! $crop ) {
		return null;
	}
	$aspect_ratio = $orig_w / $orig_h;
	$size_ratio   = max( $new_w / $orig_w, $new_h / $orig_h );
	$crop_w       = round( $new_w / $size_ratio );
	$crop_h       = round( $new_h / $size_ratio );
	$s_x          = floor( ( $orig_w - $crop_w ) / 2 );
	$s_y          = floor( ( $orig_h - $crop_h ) / 2 );

	return array( 0, 0, (int) $s_x, (int) $s_y, (int) $new_w, (int) $new_h, (int) $crop_w, (int) $crop_h );
}

add_filter( 'image_resize_dimensions', 'binary_thumbnail_upscale', 10, 6 );

// Allow sections of titles to be made smaller using [[]] around them
function convert_title( $m ) {
	return "<br><span class='text--reduced-size'>" . $m[1] . "</span>";
}

function smaller_title_text( $string ) {
	$pattern = "~\[\[(.*)\]\]~U";
	$string  = preg_replace_callback(
		$pattern,
		"convert_title",
		$string
	);

	return $string;
}

/**
 * Disable SSL verification during the image import process.
 *
 * This helps to overcome the "cURL error 60: SSL certificate problem: unable to get local issuer certificate" error.
 *
 * @param array $args
 * @param Datafeedr_Image_Importer $image_importer
 *
 * @return array Updated $args array
 */
function mycode_set_sslverify_to_false( $args, $image_importer ) {
	$args['sslverify'] = false;

	return $args;
}

add_filter( 'datafeedr_image_importer/set_response/args', 'mycode_set_sslverify_to_false', 20, 2 );