<?php
/**
 * Template part for displaying results in search pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package fipranetwork
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <div class="search-result">
            <p class="search-result__title">
                <a href="<?php echo esc_url(get_permalink()); ?>">
	                <?php
	                    switch (get_post_type()) {

                            case 'case_study':
                                echo 'Case study: ';
                                break;

		                    case 'unit':
			                    echo 'Network Unit: ';
			                    break;

		                    case 'update':
			                    echo 'Update: ';
			                    break;

		                    case 'fipriot':
			                    echo 'Profile: ';
			                    break;

		                    case 'team':
			                    echo 'Team: ';
			                    break;

		                    case 'practice':
			                    echo 'Practice area: ';
			                    break;

                        }

	                    ?>
	                <?php if ( get_field( 'hero_main_title' ) ) : echo get_field('hero_main_title'); ?>
	                <?php else : the_title();?>
	                <?php endif; ?>
                </a>
            </p>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
