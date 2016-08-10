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

/* The following code checks which option is selected in the options page */
$my_options = get_option('ct_options_settings');


/* this if statement checks if the 'Hide widgets'
box is checked */
if ( isset($my_options['ct_checkbox_field']) =='on' ) {
	/* if it is checked, then it hides the sidebar widgets */
	?> <style type="text/css">
			.widget-area {
				display: none;
			}
		</style>
<?php
}

?>

<aside id="secondary" class="widget-area" role="complementary">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside><!-- #secondary -->
