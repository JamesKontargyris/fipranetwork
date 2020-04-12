<div class="small-feature<?php if(block_value('layout') == 'image-right') : ?> small-feature--reversed<?php endif; ?>">

	<?php if(block_value('image')) : $image_id = block_value('image'); ?>
		<div class="small-feature__image">
            <img src="<?php echo wp_get_attachment_url( $image_id, 'full' ); ?>" alt="">
        </div>
	<?php endif; ?>

	<div class="small-feature__content">

		<div class="small-feature__titles float-down-on-scroll">

			<?php if(block_value('mini-title')) : ?>
				<div class="small-feature__mini-title"><?php block_field('mini-title'); ?></div>
			<?php endif; ?>

			<?php if(block_value('main-title')) : ?>
				<h3 class="small-feature__main-title"><?php block_field('main-title'); ?></h3>
			<?php endif; ?>

		</div>

		<?php if(block_value('description')) : ?>
			<div class="small-feature__description float-down-on-scroll">
				<?php block_field('description'); ?>
			</div>
		<?php endif; ?>

	</div>

</div>