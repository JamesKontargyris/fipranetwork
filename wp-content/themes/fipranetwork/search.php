<?php
global $wp_query;
$no_results = $wp_query->post_count;
get_header();
?>

    <?php if(has_post_thumbnail(get_page_by_path('search')->ID)) : ?>
        <div class="page__background" style="background:linear-gradient(to bottom, rgba(255,255,255,0), rgba(255,255,255,1)), url(<?php echo get_the_post_thumbnail_url( get_page_by_path('search')->ID, 'banner' ); ?>) center no-repeat; background-size: auto, cover;"></div>
	<?php endif; ?>

    <div class="content-block hero--background-image-fade">
        <div class="content-block__content content-block__content--no-tb-pad">

            <h6 class="hero__mini-title">Search Results</h6>

            <h1 class="style-as-h2 with-line">
	            <?php
	            /* translators: %s: search query. */
	            printf( esc_html__( 'Searching for: %s', 'fipranetwork' ), '<span>' . get_search_query() . '</span>' );
	            ?>
            </h1>

        </div>
    </div>

    <div class="page__body">

        <div class="content-block">
            <div class="content-block__content content-block__content--no-t-pad">
				<?php if ( have_posts() ) : ?>

                    <h4>Found <?php echo $no_results; ?> result<?php echo ($no_results == 1) ? '' : 's' ?></h4>

					<?php
					/* Start the Loop */
					while ( have_posts() ) :
						the_post();
						get_template_part( 'template-parts/content', 'search' );
					endwhile;

					the_posts_navigation();

					?>

				<?php else : ?>
                    <p>Nothing found.</p>
				<?php endif; ?>
            </div>
        </div>

    </div>

<?php
get_footer();
