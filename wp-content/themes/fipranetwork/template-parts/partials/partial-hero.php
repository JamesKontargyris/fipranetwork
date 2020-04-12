<?php

if(get_field('hero_type')) {

	switch(get_field('hero_type')) {
		case 'standard':
			get_template_part('template-parts/partials/partial', 'hero-standard');
			break;
		case 'corner-triangle':
			get_template_part('template-parts/partials/partial', 'hero-corner-triangle');
			break;
		case 'image-triangle':
			get_template_part('template-parts/partials/partial', 'hero-image-triangle');
			break;
		case 'image-bar':
			get_template_part('template-parts/partials/partial', 'hero-image-bar');
			break;
		case 'background-image-fade':
			get_template_part('template-parts/partials/partial', 'hero-background-image-fade');
			break;
		case 'diamond-overlay':
			get_template_part('template-parts/partials/partial', 'hero-diamond-overlay');
			break;
	}
}
