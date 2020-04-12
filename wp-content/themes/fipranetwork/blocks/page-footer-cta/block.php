<div class="page-footer-cta<?php if(block_value('show-background-diamond') == 'yes') : ?> page-footer-cta--yellow-diamond<?php endif; ?>">
	<div class="page-footer-cta__content float-down-on-scroll">
		<?php if(block_value('title')) : ?>
			<h3 class="page-footer-cta__title"><?php block_field('title'); ?></h3>
		<?php endif; ?>
		<p class="text--center">
			<?php if(block_value('cta-1-url')) : ?>
			    <a href="<?php block_field('cta-1-url') ?>" class="btn btn--<?php block_field('cta-1-button-type') ?> btn--large<?php if(block_value('full-width-buttons')) : ?> btn--full-width<?php endif; ?>"><?php block_field('cta-1-button-text'); ?></a>
			<?php endif; ?>

			<?php if(block_value('cta-2-url')) : ?>
                <a href="<?php block_field('cta-2-url') ?>" class="btn btn--<?php block_field('cta-2-button-type') ?> btn--large<?php if(block_value('full-width-buttons')) : ?> btn--full-width<?php endif; ?>"><?php block_field('cta-2-button-text'); ?></a>
			<?php endif; ?>

			<?php if(block_value('cta-3-url')) : ?>
                <a href="<?php block_field('cta-3-url') ?>" class="btn btn--<?php block_field('cta-3-button-type') ?> btn--large<?php if(block_value('full-width-buttons')) : ?> btn--full-width<?php endif; ?>"><?php block_field('cta-3-button-text'); ?></a>
			<?php endif; ?>
        </p>
	</div>
</div>