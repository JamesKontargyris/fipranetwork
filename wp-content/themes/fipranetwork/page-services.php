<?php get_header(); ?>

<?php while ( have_posts() ) : the_post(); ?>

	<?php get_template_part( 'template-parts/partials/partial', 'hero' ); ?>

    <div class="page__body">

		<?php if ( get_the_content() ) : ?>
            <div class="content-block">
                <div class="content-block__content">
					<?php the_content(); ?>
                </div>
            </div>
		<?php endif; ?>

	    <?php get_template_part('template-parts/partials/partial', 'practice-card-gallery'); ?>

    </div>

<?php endwhile; ?>

<?php get_footer(); ?>