<?php
/**
 * CustomTheme functions and definitions.
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package CustomTheme
 */

if ( ! function_exists( 'ct_setup' ) ) :
/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */
function ct_setup() {
	/*
	 * Make theme available for translation.
	 * Translations can be filed in the /languages/ directory.
	 * If you're building a theme based on CustomTheme, use a find and replace
	 * to change 'ct' to the name of your theme in all the template files.
	 */
	load_theme_textdomain( 'ct', get_template_directory() . '/languages' );

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

	// This theme uses wp_nav_menu() in one location.
	register_nav_menus( array(
		'primary' => esc_html__( 'Primary', 'ct' ),
	) );

	// This registers a footer menu
	register_nav_menus( array( 'secondary'=>'Footer Menu' ) );

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
	add_theme_support( 'custom-background', apply_filters( 'ct_custom_background_args', array(
		'default-color' => 'ffffff',
		'default-image' => '',
	) ) );
}
endif;
add_action( 'after_setup_theme', 'ct_setup' );

/* This function creates a custom post type called ct_featured */
function create_post_type() {
	register_post_type( 'ct_featured',
	    array(
	      'labels' => array(
	        'name' => __( 'Featured' ),
	        'singular_name' => __( 'Featured' )
	      ),
	      'public' => true,
	      'has_archive' => true,
	    )
	  );
}
add_action( 'init', 'create_post_type' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 * @global int $content_width
 */
function ct_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'ct_content_width', 640 );
}
add_action( 'after_setup_theme', 'ct_content_width', 0 );

/**
 * Register widget area (including sidebar widgets and footer widgets).
 *
 * @link https://developer.wordpress.org/themes/functionality/sidebars/#registering-a-sidebar
 */
function ct_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Sidebar', 'ct' ),
		'id'            => 'sidebar-1',
		'description'   => esc_html__( 'Add widgets here.', 'ct' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );
	// this registers one footer widget area
	register_sidebar( array(
		'name'          => esc_html__( 'First Footer Widget', 'ct' ),
		'id'            => 'footer-sidebar-1',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="foot-widget-title">',
		'after_title'   => '</h2>',
	) );
	// this registerrs a second footer widget area
	register_sidebar( array(
		'name'          => esc_html__( 'Second Footer Widget', 'ct' ),
		'id'            => 'footer-sidebar-2',
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget'  => '</aside>',
		'before_title'  => '<h2 class="foot-widget-title">',
		'after_title'   => '</h2>',
	) );
}
add_action( 'widgets_init', 'ct_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function ct_scripts() {
	wp_enqueue_style( 'ct-style', get_stylesheet_uri() );

	wp_enqueue_script( 'ct-navigation', get_template_directory_uri() . '/js/navigation.js', array(), '20151215', true );

	wp_enqueue_script( 'ct-skip-link-focus-fix', get_template_directory_uri() . '/js/skip-link-focus-fix.js', array(), '20151215', true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	/* Enqueuing the Google font stylesheet */
	wp_enqueue_style( 'ct-google-fonts', 'https://fonts.googleapis.com/css?family=Old+Standard+TT:400,700,400italic', false );

	/* Enqueuing JQuery and FlexSlider Scripts */
    wp_enqueue_script( 'jquery' );

    wp_enqueue_script( 'flexslider', get_template_directory_uri() . '/js/jquery.flexslider-min.js', array('jquery') );

    wp_enqueue_script( 'flexslider-init', get_template_directory_uri() . '/js/flexslider-init.js', array('jquery') );
    /* Enqueuing Flexslider css file */
    wp_enqueue_style( 'flexslider', get_template_directory_uri() . '/css/flexslider.css' );
 
}
add_action( 'wp_enqueue_scripts', 'ct_scripts' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/inc/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Custom functions that act independently of the theme templates.
 */
require get_template_directory() . '/inc/extras.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Load Jetpack compatibility file.
 */
require get_template_directory() . '/inc/jetpack.php';

// Call the file that controls the theme options
require get_template_directory() . '/inc/options.php';

/**
 * Changes the main font face on the site based off what is selected in the Options page
 */
function ct_options_fonts() {
	/* The following code checks which option is selected in the options page */
	$options = get_option( 'ct_options_settings' );

	if ( isset($options['ct_select_field']) ) {
		/* $selected refers to the item in the select box that is selected */
		$selected = $options['ct_select_field'];
		/* this if statement checks if the Arial Narrow item (1) is selected */
		if ($selected == 1) {
			/* if it is selected, then it changes the main font face
			on the site to Arial Narrow */
			?> <style type="text/css">
					body,
					button,
					input,
					select,
					textarea {
						font-family: "Arial Narrow", Arial, sans-serif;
					}
				</style>
		<?php
		}
		/* this elseif statement checks if the Geneva item (2) is selected */
		elseif ($selected == 2) {
			/* if it is selected, then it changes the main font face
			on the site to Geneva */
			?> <style type="text/css">
					body,
					button,
					input,
					select,
					textarea {
						font-family: Geneva, Tahoma, Verdana, sans-serif;
					}
				</style>
		<?php
		}
		/* this elseif statement checks if the Garamond item (3) is selected */
		elseif ($selected == 3) {
			/* if it is selected, then it changes the main font face
			on the site to Garamond */
			?> <style type="text/css">
					body,
					button,
					input,
					select,
					textarea {
						font-family: Garamond, Baskerville, "Baskerville Old Face", "Hoefler Text", "Times New Roman", serif;
						font-size: 1.05em;
					}
				</style>
		<?php
		}
	}
}

/**
 * Changes the background color of the sidebar and the page/post titles
 * based off what is selected in the Options page
 */
function ct_option_colors() {
	/* The following code checks which option is selected in the options page */
	$options = get_option('ct_options_settings');
	
	if ( isset($options['ct_radio_field']) ) {
		$selected = $options['ct_radio_field'];
		/* this if statement checks if the radio button
		'light blue' is selected */
		if ($selected == 2) {
			/* if it is selected, then it changes the background
			color of page/post titles and the sidebar to a light blue */
			?> <style type="text/css">
					.widget-area {
						background-color: #bfd4d9;
					}

					.entry-title {
						background-color: #bfd4d9;
					}
				</style>
			<?php	
		}

		/* this elseif statement checks if the radio button
		'no color' is selected */
		elseif ($selected == 3 ) {
			/* if it is selected, then it changes the background
			color of page/post titles and the sidebar to transparent */
			?> <style type="text/css">
					.widget-area {
						background-color: transparent;
					}

					.entry-title {
						background-color: transparent;
					}
				</style>
		<?php
		}
		
		/* this code runs if the radio button
		'default' is selected */
		else {
			/* it then changes the background color of page/post
			titles and the sidebar to the original color of a warm yellow */
			?> <style type="text/css">
					.widget-area {
						background-color: #eac67a;
					}

					.entry-title {
						background-color: #eac67a;
					}
				</style>
		<?php
		}	
	}
}

/**
 * Changes the background color of the page/post titles
 * based off what is selected in the Options page
 */
function ct_option_title_colors() {
	/* The following code checks which option is selected in the options page */
	$options = get_option('ct_options_settings');
	
	if ( isset($options['ct_radio_field']) ) {
		$selected = $options['ct_radio_field'];
		/* this if statement checks if the radio button
		'light blue' is selected */
		if ($selected == 2) {
			/* if it is selected, then it changes the background
			color of page/post titles to a light blue */
			?> <style type="text/css">
					.entry-title {
						background-color: #bfd4d9;
					}
				</style>
			<?php	
		}

		/* this elseif statement checks if the radio button
		'no color' is selected */
		elseif ($selected == 3 ) {
			/* if it is selected, then it changes the background
			color of page/post titles to transparent */
			?> <style type="text/css">
					.entry-title {
						background-color: transparent;
					}
				</style>
		<?php
		}
		
		/* this code runs if the radio button
		'default' is selected */
		else {
			/* it then changes the background color of page/post
			titles to the original color of a warm yellow */
			?> <style type="text/css">
					.entry-title {
						background-color: #eac67a;
					}
				</style>
		<?php
		}	
	}
}
