<div class="practice-card"
     <?php if ( has_post_thumbnail() ) : ?>style="background:linear-gradient(to bottom, rgba(0,0,0,0.1) 10%, rgba(0,0,0,0.4) 25%, rgba(0,0,0,0.4) 75%, rgba(0,0,0,0.1) 90%), url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'big' ) ?>) center no-repeat; background-size: auto, cover;<?php endif; ?>">
    <a class="practice-card__full-size-anchor" href="<?php echo get_the_permalink(); ?>"></a>
    <div class="practice-card__title">
	    <?php $main_title = get_field( 'hero_main_title' ) ? get_field( 'hero_main_title' ) : get_the_title();?>
		<?php echo smaller_title_text($main_title); ?>
    </div>
</div>