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
<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'template-parts/partials/partial', 'hero' ); ?>

    <div class="page__body">

	    <?php get_template_part('template-parts/partials/partial', 'scroll-down-indicator-check'); ?>

        <div class="content-block">
            <div class="content-block__content <?php if ( get_field( 'hero_type' ) == 'corner-triangle' || get_field( 'hero_type' ) == 'background-image-fade' ) : ?>content-block__content--flat<?php endif; ?>">
				<?php the_content(); ?>
            </div>
        </div>

	    <?php get_template_part('template-parts/partials/partial', 'feature-quote'); ?>

		<?php get_template_part( 'template-parts/partials/partial', 'testimonials' ); ?>

    </div>

<?php endwhile; ?>


<?php
get_footer();