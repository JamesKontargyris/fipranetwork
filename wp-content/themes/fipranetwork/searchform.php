<form action="/" method="get" class="search-form">
	<span class="screen-reader-text"><?php echo _x( 'Search for:', 'label' ) ?></span>
	<input type="text" name="s" class="search-field" id="search" placeholder="Search..." value="<?php the_search_query(); ?>" />
	<input type="submit" name="submit" value="Search" />
</form>