<?php
global $post;
$post_slug = $post->post_name;

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=0.86, maximum-scale=3.0, minimum-scale=0.86">
    <link rel="profile" href="https://gmpg.org/xfn/11">

    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo get_template_directory_uri(); ?>/img/favicon/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo get_template_directory_uri(); ?>/img/favicon/favicon-16x16.png">
    <link rel="manifest" href="<?php echo get_template_directory_uri(); ?>/img/favicon/site.webmanifest">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/img/favicon/safari-pinned-tab.svg" color="#5bbad5">
    <meta name="msapplication-TileColor" content="#da532c">
    <meta name="theme-color" content="#ffffff">

	<?php wp_head(); ?>
    <script src="https://kit.fontawesome.com/b8267aec36.js" crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?>>

<div class="site__page">

    <nav class="nav--primary">
		<?php
		wp_nav_menu( [
			'theme_location'  => 'primary',
			'depth'           => 2,
			'container_class' => 'nav--primary__menu__container',
			'menu_class'      => 'nav--primary__menu'
		] );
		?>
    </nav>

    <a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'fipranetwork' ); ?></a>

    <header class="site__header">

        <div class="site__header__logo-container">

            <?php if(is_tax('update_type') || is_search()) : // blue logo ?>
            <p class="site__header__logo site__header__logo--blue--desktop site__header__logo--blue--tablet site__header__logo--blue--mobile">FIPRA</p>

            <?php elseif(get_post_type() == 'practice' || get_post_type() == 'unit' || (get_post_type() == 'update' && ! is_tax())) : // white logo ?>
                <p class="site__header__logo site__header__logo--white--desktop site__header__logo--white--tablet site__header__logo--white--mobile">FIPRA</p>

	        <?php else : // colour set in CMS ?>
                <p class="site__header__logo site__header__logo--<?php echo get_field('header_logo_colour')['header_logo_colour_desktop'] ? get_field('header_logo_colour')['header_logo_colour_desktop'] : 'blue'; ?>--desktop site__header__logo--<?php echo get_field('header_logo_colour')['header_logo_colour_tablet'] ? get_field('header_logo_colour')['header_logo_colour_tablet'] : 'blue'; ?>--tablet site__header__logo--<?php echo get_field('header_logo_colour')['header_logo_colour_mobile'] ? get_field('header_logo_colour')['header_logo_colour_mobile'] : 'blue'; ?>--mobile">FIPRA</p>
	        <?php endif; ?>

        </div>

        <div class="site__header__links-container">
            <div class="site__header__links__search-container">
                <div class="site__header__links__search-box-container">
                    <div class="site__header__search-box">
                        <?php get_search_form(); ?>
                        <button class="site__header__search--close"></button>
                    </div>
                </div>

                <?php if(is_tax('update_type') || is_search()) : // blue icon ?>
                <button class="site__header__search--open site__header__search--open--blue--desktop site__header__search--open--blue--tablet site__header__search--open--blue--mobile"></button>

                <?php elseif(get_post_type() == 'practice' || get_post_type() == 'unit' || (get_post_type() == 'update' && ! is_tax())) : // white icon ?>
                    <button class="site__header__search--open site__header__search--open--white--desktop site__header__search--open--white--tablet site__header__search--open--white--mobile"></button>

	            <?php else : // colour set in CMS ?>
                    <button class="site__header__search--open site__header__search--open--<?php echo get_field('header_nav_colour')['header_nav_colour_desktop'] ? get_field('header_nav_colour')['header_nav_colour_desktop'] : 'blue'; ?>--desktop site__header__search--open--<?php echo get_field('header_nav_colour')['header_nav_colour_tablet'] ? get_field('header_nav_colour')['header_nav_colour_tablet'] : 'blue'; ?>--tablet site__header__search--open--<?php echo get_field('header_nav_colour')['header_nav_colour_mobile'] ? get_field('header_nav_colour')['header_nav_colour_mobile'] : 'blue'; ?>--mobile"></button>
	            <?php endif; ?>
            </div>

            <div class="site__header__links__hamburger-container">
                <?php if(is_archive('update_type') || is_search()) : // blue icon ?>
                <button class="hamburger hamburger--blue--desktop hamburger--blue--tablet hamburger--blue--mobile hamburger--collapse toggle--primary-nav">
                      <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                      </span>
                </button>

                <?php elseif(get_post_type() == 'practice' || get_post_type() == 'unit' || (get_post_type() == 'update' && ! is_tax())) : // white icon ?>
                    <button class="hamburger hamburger--white--desktop hamburger--white--tablet hamburger--white--mobile hamburger--collapse toggle--primary-nav">
                      <span class="hamburger-box">
                        <span class="hamburger-inner"></span>
                      </span>
                    </button>

	            <?php else : // colour set in CMS ?>
                    <button class="hamburger hamburger--<?php echo get_field('header_nav_colour')['header_nav_colour_desktop'] ? get_field('header_nav_colour')['header_nav_colour_desktop'] : 'blue'; ?>--desktop hamburger--<?php echo get_field('header_nav_colour')['header_nav_colour_tablet'] ? get_field('header_nav_colour')['header_nav_colour_tablet'] : 'blue'; ?>--tablet hamburger--<?php echo get_field('header_nav_colour')['header_nav_colour_mobile'] ? get_field('header_nav_colour')['header_nav_colour_mobile'] : 'blue'; ?>--mobile hamburger--collapse toggle--primary-nav">
                          <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                          </span>
                    </button>
	            <?php endif; ?>
            </div>
        </div>
    </header>

    <div id="content" class="site-content">
