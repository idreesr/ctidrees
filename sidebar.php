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

/* The following code checks which option is selected in the options page */
$options = get_option('ct_options_settings');
/* this if statement checks if the radio button
'light blue' is selected */
if ( isset($options['ct_radio_field']) == 2 ) {
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
elseif ( isset($options['ct_radio_field']) == 3 ) {
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

/* this if statement checks if the 'Hide widgets'
box is checked */
if ( isset($options['ct_checkbox_field']) =='on' ) {
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
