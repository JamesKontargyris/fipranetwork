<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package fipranetwork
 */

?>
</div><!-- #content -->

<footer class="site__footer">
    <div class="site__footer__container">
        <div class="footer__col">
			<?php if ( is_active_sidebar( 'footer_col_1' ) ) : ?>
				<?php dynamic_sidebar( 'footer_col_1' ); ?>
			<?php endif; ?>
        </div>
        <div class="footer__col">
			<?php if ( is_active_sidebar( 'footer_col_2' ) ) : ?>
				<?php dynamic_sidebar( 'footer_col_2' ); ?>
			<?php endif; ?>
        </div>
        <div class="footer__col">
			<?php if ( is_active_sidebar( 'footer_col_3' ) ) : ?>
				<?php dynamic_sidebar( 'footer_col_3' ); ?>
			<?php endif; ?>
        </div>
        <div class="footer__col">
			<?php if ( is_active_sidebar( 'footer_col_4' ) ) : ?>
				<?php dynamic_sidebar( 'footer_col_4' ); ?>
			<?php endif; ?>
        </div>
    </div>
</footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
