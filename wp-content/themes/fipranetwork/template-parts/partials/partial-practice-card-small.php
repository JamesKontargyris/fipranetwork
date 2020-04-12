<div class="practice-card  practice-card--small"
     <?php if ( has_post_thumbnail() ) : ?>style="background:linear-gradient(to bottom, rgba(0,0,0,0.4) 0, rgba(0,0,0,0.1) 100%), url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'big' ) ?>) center no-repeat; background-size: auto, cover;<?php endif; ?>">
    <a class="practice-card__full-size-anchor" href="<?php echo get_the_permalink(); ?>"></a>
    <div class="practice-card__title">
		<?php echo get_field( 'hero_main_title' ) ? get_field( 'hero_main_title' ) : get_the_title(); ?>
    </div>
</div>