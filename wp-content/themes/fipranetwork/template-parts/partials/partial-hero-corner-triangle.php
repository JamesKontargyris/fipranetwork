<div class="page__header">

	<?php if ( has_post_thumbnail() ) : ?>
        <div class="hero-corner-triangle__image-triangle"
             style="background: url(<?php echo get_the_post_thumbnail_url( get_the_ID(), 'big' ); ?>) center no-repeat, rgb(80,122,150); background-size: cover"></div>
	<?php else : ?>
        <div class="hero-corner-triangle__image-triangle" style="background: rgb(80,122,150);"></div>
	<?php endif; ?>
    <div class="hero-corner-triangle__border"></div>
    <div class="hero-corner-triangle__yellow-diamond"></div>

    <div class="content-block">
        <div class="content-block__content <?php if(get_field('titles_section_width') == 'full-width' || ! get_field('titles_section_width')) : ?>content-block__content--no-lr-pad<?php endif; ?> content-block__content--no-b-pad">
			<?php if ( get_field( 'hero_mini_title' ) ) : ?>
                <h6 class="hero__mini-title"><?php echo get_field( 'hero_mini_title' ); ?></h6>
			<?php endif; ?>

	        <?php $main_title =  get_field( 'hero_main_title' ) ? get_field( 'hero_main_title' ) : get_the_title();?>

            <h1 class="hero__main-title <?php echo get_field('hero_main_title_divider_line'); ?>"
			    <?php if ( ! get_field( 'hero_intro' ) ) : ?>style="margin-bottom:0;"<?php endif; ?>><?php echo smaller_title_text($main_title); ?></h1>
			<?php if ( get_field( 'hero_intro' ) ) : ?>
                <div class="hero__intro"><?php echo get_field( 'hero_intro' ); ?></div>
			<?php endif; ?>
        </div>
    </div>

</div>