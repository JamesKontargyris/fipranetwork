<?php
/**
 * fipranetwork functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package fipranetwork
 */


if ( ! function_exists( 'fipranetwork_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function fipranetwork_setup() {
		/*
		 * Make theme available for translation.
		 * Translations can be filed in the /languages/ directory.
		 * If you're building a theme based on fipranetwork, use a find and replace
		 * to change 'fipranetwork' to the name of your theme in all the template files.
		 */
		load_theme_textdomain( 'fipranetwork', get_template_directory() . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );

		/*
		 * Enable support for Post Thumbnails on posts and pages.
		 *
		 * @link https://developer.wordpress.org/themes/functionality/featured-images-post-thumbnails/
		 */
		add_theme_support( 'post-thumbnails' );

		/*
		 * Enable support for responsive embed blocks
		 */
		add_theme_support( 'responsive-embeds' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'fipranetwork' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'fipranetwork_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/**
		 * Add support for core custom logo.
		 *
		 * @link https://codex.wordpress.org/Theme_Logo
		 */
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
	}
endif;
add_action( 'after_setup_theme', 'fipranetwork_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function fipranetwork_content_width() {
	// This variable is intended to be overruled from themes.
	// Open WPCS issue: {@link https://github.com/WordPress-Coding-Standards/WordPress-Coding-Standards/issues/1043}.
	// phpcs:ignore WordPress.NamingConventions.PrefixAllGlobals.NonPrefixedVariableFound
	$GLOBALS['content_width'] = apply_filters( 'fipranetwork_content_width', 640 );
}
add_action( 'after_setup_theme', 'fipranetwork_content_width', 0 );

/**
 * Sets up support for editor styles and imports them.
 */
function editor_styles_setup() {
	// Add support for editor styles.
	add_theme_support( 'editor-styles' );

	// Enqueue editor styles.
	add_editor_style( 'admin-style.css' );
}
add_action( 'after_setup_theme', 'editor_styles_setup' );

/**
 * Register widget area.
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function fipranetwork_widgets_init() {

	register_sidebar( array(
		'name'          => esc_html__( 'Updates Sidebar', 'fipranetwork' ),
		'id'            => 'updates_sidebar',
		'description'   => esc_html__( 'Add widgets to the Updates landing page sidebar here.', 'fipranetwork' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 1', 'fipranetwork' ),
		'id'            => 'footer_col_1',
		'description'   => esc_html__( 'Add widgets to the first (site info) footer column here.', 'fipranetwork' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 2', 'fipranetwork' ),
		'id'            => 'footer_col_2',
		'description'   => esc_html__( 'Add widgets to the second footer column here.', 'fipranetwork' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 3', 'fipranetwork' ),
		'id'            => 'footer_col_3',
		'description'   => esc_html__( 'Add widgets to the third footer column here.', 'fipranetwork' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	register_sidebar( array(
		'name'          => esc_html__( 'Footer Column 4', 'fipranetwork' ),
		'id'            => 'footer_col_4',
		'description'   => esc_html__( 'Add widgets to the fourth footer column here.', 'fipranetwork' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h5 class="widget-title">',
		'after_title'   => '</h5>',
	) );

	add_image_size('banner', 1500, 1000, true);
	add_image_size('banner-large', 2000, 1300, true);
	add_image_size('big', 900, 600, true);
	add_image_size('medium', 600, 400, true);
	add_image_size('small', 400, 300, true);
	add_image_size('news-story-card', 900, 600, true);
	add_image_size('profile-small', 160, 160, true);
	add_image_size('profile-large', 320, 320, true);
	add_image_size('featured-quote', 170, 170, true);
	add_image_size('case-study-diamond', 400, 450, true);
	add_image_size('language-flag', 400, 400, true);
	add_image_size('resource', 130);
	add_image_size('case-study-logo-small', 80);
	add_image_size('case-study-logo-medium', 150);
	add_image_size('case-study-logo-large', 200);
}
add_action( 'widgets_init', 'fipranetwork_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function fipranetwork_scripts() {
	wp_enqueue_style( 'fipranetwork-slick-default', '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.css' );
	wp_enqueue_style( 'fipranetwork-slick-theme', '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick-theme.css' );
	wp_enqueue_style( 'fipranetwork-jvectormap', get_template_directory_uri() . '/js/jvectormap/jquery-jvectormap-2.0.3.css' );
	wp_enqueue_style( 'fipranetwork-tooltipster', get_template_directory_uri() . '/js/tooltipster/css/tooltipster.bundle.min.css' );
	wp_enqueue_style( 'fipranetwork-style', get_stylesheet_uri() );

	wp_enqueue_script( 'fipranetwork-jquery', 'https://code.jquery.com/jquery-3.4.1.min.js', array(), '20190731', true );
	wp_enqueue_script( 'fipranetwork-google-maps-js', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyCJGButmCUf5ad-H9x55KHfd-sZVm_yd6Q', array(), '20190825', true );
	wp_enqueue_script( 'fipranetwork-slick-js', '//cdn.jsdelivr.net/gh/kenwheeler/slick@1.8.1/slick/slick.min.js', array(), '20190802', true );
	wp_enqueue_script( 'fipranetwork-paroller-js', get_template_directory_uri() . '/js/paroller/jquery.paroller.min.js', array(), '20190802', true );
	wp_enqueue_script( 'fipranetwork-match-height-js', get_template_directory_uri() . '/js/match-height/jquery.matchHeight-min.js', array(), '20190805', true );
	wp_enqueue_script( 'fipranetwork-sticky-kit-js', get_template_directory_uri() . '/js/sticky-kit/jquery.sticky-kit.min.js', array(), '20190804', true );
	wp_enqueue_script( 'fipranetwork-jvectormap-js', get_template_directory_uri() . '/js/jvectormap/jquery-jvectormap-2.0.3.min.js', array(), '20190907', true );
	wp_enqueue_script( 'fipranetwork-jvectormap-world-map-js', get_template_directory_uri() . '/js/jvectormap/jquery-jvectormap-world-mill.js', array(), '20190907', true );
	wp_enqueue_script( 'fipranetwork-tooltipster-js', get_template_directory_uri() . '/js/tooltipster/js/tooltipster.bundle.min.js', array(), '20190804', true );
	wp_enqueue_script( 'fipranetwork-gsap-tweenlite-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TweenMax.min.js', array(), '20190806', true );
	wp_enqueue_script( 'fipranetwork-gsap-timelinemax-js', 'https://cdnjs.cloudflare.com/ajax/libs/gsap/2.1.3/TimelineMax.min.js', array(), '20190806', true );
	wp_enqueue_script( 'fipranetwork-scrollmagic-js', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/ScrollMagic.min.js', array(), '20190802', true );
	wp_enqueue_script( 'fipranetwork-scrollmagic-gsap-plugin-js', 'https://cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/animation.gsap.min.js', array(), '20190806', true );
	wp_enqueue_script( 'fipranetwork-scrollmagic-debug-js', '//cdnjs.cloudflare.com/ajax/libs/ScrollMagic/2.0.7/plugins/debug.addIndicators.min.js', array(), '20190802', true );
	wp_enqueue_script( 'fipranetwork-functions-js', get_template_directory_uri() . '/js/functions.js', array(), '20190731', true );
	wp_enqueue_script( 'fipranetwork-navigation-js', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );
	wp_enqueue_script( 'fipranetwork-match-height-init-js', get_template_directory_uri() . '/js/match-height.js', array(), '20190805', true );

	wp_enqueue_script( 'fipranetwork-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );
	wp_enqueue_script( 'fipranetwork-slick-init-js', get_template_directory_uri() . '/js/slick.js', array(), '20190802', true );
	wp_enqueue_script( 'fipranetwork-nav-js', get_template_directory_uri() . '/js/nav.js', array(), '20190731', true );
	wp_enqueue_script( 'fipranetwork-sticky-js', get_template_directory_uri() . '/js/sticky.js', array(), '20190804', true );
	wp_enqueue_script( 'fipranetwork-parallax-js', get_template_directory_uri() . '/js/parallax.js', array(), '20190802', true );
	wp_enqueue_script( 'fipranetwork-scrollmagic-scenes-js', get_template_directory_uri() . '/js/scrollmagic-scenes.js', array(), '20190802', true );
	wp_enqueue_script( 'fipranetwork-site-js', get_template_directory_uri() . '/js/site.js', array(), '20190809', true );
	wp_enqueue_script( 'fipranetwork-acf-google-maps-js', get_template_directory_uri() . '/js/acf-google-maps.js', array(), '20190825', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'fipranetwork_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
if ( defined( 'JETPACK__VERSION' ) ) {
	require get_template_directory() . '/inc/jetpack.php';
}

// Register Google Maps API key with ACF
function my_acf_init() {

	acf_update_setting('google_api_key', 'AIzaSyCJGButmCUf5ad-H9x55KHfd-sZVm_yd6Q');
}

add_action('acf/init', 'my_acf_init');

