<?php $fipriot_id = get_field('point_of_contact_fipriot')[0]; ?>

<?php if($fipriot_id) : ?>

    <section class="point-of-contact-bar">
        <div class="point-of-contact-bar-container">
            <div class="point-of-contact-bar__content <?php if(has_post_thumbnail($fipriot_id)) : ?>point-of-contact-bar__content--with-photo<?php endif; ?>">
                <?php if(has_post_thumbnail($fipriot_id)) : ?>
                    <div class="point-of-contact-bar__photo">
                        <a href="<?php echo get_the_permalink($fipriot_id); ?>"><img src="<?php echo get_the_post_thumbnail_url($fipriot_id, 'profile-small') ?>" alt="<?php echo get_field('first_name', $fipriot_id) . ' ' . get_field('last_name', $fipriot_id); ?>"></a>
                    </div>
                <?php endif; ?>
                <div class="point-of-contact-bar__title">Point of Contact</div>
                <div class="point-of-contact-bar__name"><?php echo get_field('first_name', $fipriot_id) . ' ' . get_field('last_name', $fipriot_id); ?></div>

                <?php if(get_field('point_of_contact_position')) : ?>
                    <div class="point-of-contact-bar__role"><?php echo get_field('point_of_contact_position'); ?></div>
                <?php elseif(! get_field('point_of_contact_position') && get_field('position', $fipriot_id)) : ?>
                    <div class="point-of-contact-bar__role"><?php echo get_field('position', $fipriot_id); ?></div>
                <?php endif; ?>
                    <div class="point-of-contact-bar__contact-info">

                        <?php if(get_field('telephone', $fipriot_id)) : ?>
                            <div class="point-of-contact-bar__contact-info--telephone">
	                            <?php echo get_field('telephone', $fipriot_id); ?>
                            </div>
                        <?php endif; ?>

	                    <?php if(get_field('email', $fipriot_id)) : ?>
                            <div class="point-of-contact-bar__contact-info--email">
			                    <?php echo hide_email(get_field('email', $fipriot_id)); ?>
                            </div>
	                    <?php endif; ?>

                        <div class="point-of-contact-bar__contact-info--profile">
                            <a href="<?php echo get_the_permalink($fipriot_id); ?>">Profile</a>
                        </div>

                    </div>


            </div>
        </div>
    </section>

<?php endif; ?>