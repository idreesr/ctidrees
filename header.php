<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CustomTheme
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<!-- Placing the Google Font here -->	
<link href='https://fonts.googleapis.com/css?family=Old+Standard+TT:400,700,400italic' rel='stylesheet' type='text/css'>	
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content', 'ct' ); ?></a>
	<?php
		// adding code for the announcement option on the options page 
		$options = get_option( 'ct_options_settings' );
		if ( isset($options['ct_text_field']) ) {
			$text = $options['ct_text_field'];
			// this if statement checks to see that something has been entered
			// into the text box and if it has, it displays that text on the page
			if ($text != "") {
				echo $options['ct_text_field'] .'<br />';
			}
		}
	?>
	<header id="masthead" class="site-header" role="banner">
		<div class="site-branding">
				<!-- Made site title consisent for all pages -->
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			<?php

			$description = get_bloginfo( 'description', 'display' );
			if ( $description || is_customize_preview() ) : ?>
				<p class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></p>
			<?php
			endif; ?>
		</div><!-- .site-branding -->

		<nav id="site-navigation" class="main-navigation" role="navigation">
			<button class="menu-toggle" aria-controls="primary-menu" aria-expanded="false"><?php esc_html_e( 'Menu', 'ct' ); ?></button>
			<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
		</nav><!-- #site-navigation -->
	</header><!-- #masthead -->

	<!-- calls ct_options_fonts() function -->
	<?php
		ct_options_fonts();

	?>

	<div id="content" class="site-content">
