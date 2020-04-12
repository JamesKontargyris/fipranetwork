<div class="case-study-card">
    <div class="case-study-card__border">

        <div class="case-study-card__image">
            <?php if(get_field('case_study_logo')) : // if a logo has been assigned, show that... ?>

                <img src="<?php echo wp_get_attachment_image_src(get_field('case_study_logo'), 'case-study-logo-medium')[0]; ?>" class="case-study-card__logo" alt="Logo">

            <?php else : // otherwise show the featured image, if it exists ?>

                <?php if ( has_post_thumbnail(get_the_ID()) ) : ?>
                    <img src="<?php echo get_the_post_thumbnail_url( get_the_ID(), 'big' ); ?>"
                         alt="<?php echo get_the_title(); ?>"
                         title="<?php echo get_the_title(); ?>">
                <?php endif; ?>

            <?php endif; ?>
        </div>

        <div class="case-study-card__content">
            <div class="case-study-card__headline <?php if(get_field('case_study_logo')) : ?>case-study-card__headline--with-logo<?php endif; ?>">
                <a href="<?php echo get_the_permalink(); ?>"><?php echo get_the_title(); ?></a>
            </div>
        </div>


        <a href="<?php echo get_the_permalink(); ?>" class="case-study-card__full-width-anchor"></a>
    </div>
</div>