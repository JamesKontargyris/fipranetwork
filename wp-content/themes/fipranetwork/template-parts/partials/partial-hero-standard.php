<div class="page__header hero--standard">

    <div class="content-block">
        <div class="content-block__content <?php if(get_field('titles_section_width') == 'full-width' || ! get_field('titles_section_width')) : ?>content-block__content--no-lr-pad<?php endif; ?> content-block__content--no-tb-pad">
			<?php if ( get_field( 'hero_mini_title' ) ) : ?>
                <h6 class="hero__mini-title"><?php echo get_field( 'hero_mini_title' ); ?></h6>
			<?php endif; ?>

	        <?php $main_title =  get_field( 'hero_main_title' ) ? get_field( 'hero_main_title' ) : get_the_title();?>

            <h1 class="hero__main-title <?php echo get_field('hero_main_title_divider_line'); ?>"><?php echo smaller_title_text($main_title); ?></h1>
			<?php if ( get_field( 'hero_intro' ) ) : ?>
                <div class="hero__intro"><?php echo get_field( 'hero_intro' ); ?></div>
			<?php endif; ?>
        </div>
    </div>

</div>