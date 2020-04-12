<div class="large-feature<?php if(block_value('layout') == 'image-left') : ?> large-feature--reversed<?php endif; ?>">

	<?php if(block_value('image')) : $image_id = block_value('image'); ?>
		<div class="large-feature__image"
	     style="background:url(<?php echo wp_get_attachment_url( $image_id, 'full' ); ?>) no-repeat;"></div>
	<?php endif; ?>

	<div class="large-feature__content">

		<div class="large-feature__titles float-down-on-scroll">

			<?php if(block_value('mini-title')) : ?>
				<div class="large-feature__mini-title"><?php block_field('mini-title'); ?></div>
			<?php endif; ?>

			<?php if(block_value('main-title')) : ?>
				<h3 class="large-feature__main-title"><?php block_field('main-title'); ?></h3>
			<?php endif; ?>

		</div>

		<?php if(block_value('description')) : ?>
			<div class="large-feature__description float-down-on-scroll">
				<?php block_field('description'); ?>
			</div>
		<?php endif; ?>

	</div>

</div>