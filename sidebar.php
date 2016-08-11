<?php
/**
 * The sidebar containing the main widget area.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package CustomTheme
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}

/* calling the function ct_option_colors() here */
ct_option_colors();

?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
