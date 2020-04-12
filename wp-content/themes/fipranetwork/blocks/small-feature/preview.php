<div class="small-feature--editor-preview">

	<?php if(block_value('image')) : $image_id = block_value('image'); ?>
		<img src="<?php echo wp_get_attachment_url( $image_id, 'small' ); ?>" alt="Image">
	<?php endif; ?>

	<div class="small-feature__content">

		<div class="small-feature__titles">

			<?php if(block_value('mini-title')) : ?>
				<div class="small-feature__mini-title"><?php block_field('mini-title'); ?></div>
			<?php endif; ?>

			<?php if(block_value('main-title')) : ?>
				<h3 class="small-feature__main-title"><?php block_field('main-title'); ?></h3>
			<?php endif; ?>

		</div>

		<?php if(block_value('description')) : ?>
			<div class="small-feature__description">
				<?php block_field('description'); ?>
			</div>
		<?php endif; ?>

	</div>

	<p><em><?php if(block_value('layout') == 'image-left') : ?>Image left, text right<?php else : ?>Text left, image right<?php endif; ?></em></p>

</div>