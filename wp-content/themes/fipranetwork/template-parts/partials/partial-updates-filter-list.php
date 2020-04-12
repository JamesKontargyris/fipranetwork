<?php
$update_types = get_terms( [
	'taxonomy'   => 'update_type',
	'hide_empty' => true
] );
?>

<?php if ( $update_types ) : ?>
    <div class="filter-list">
        <div class="filter-list__title filter-list__trigger filter-list__trigger--down-arrow">Categories</div>
        <div class="filter-list__content filter-list__reveal">
			<?php if ( is_tax( 'update_type' ) ) : ?>
                <a href="<?php echo get_the_permalink( get_page_by_path( 'updates' ) ) ?>"
                   class="btn btn--primary btn--rounded btn--x-small">All</a>
			<?php endif; ?>
			<?php

			foreach ( $update_types as $update_type ) :
				if ( get_queried_object()->term_id != $update_type->term_id ) :?>
                    <a href="<?php echo get_term_link( $update_type->term_id ); ?>"
                       class="btn btn--primary btn--rounded btn--x-small"><?php echo $update_type->name; ?></a>
				<?php endif; ?>
			<?php endforeach; ?>
        </div>
    </div>
<?php endif; ?>