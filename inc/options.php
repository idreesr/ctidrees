<?php

function ct_add_submenu() {

	add_submenu_page( 'themes.php', 'Custom Theme Options Page',
	 'Theme Options', 'manage_options', 'theme_options', 'theme_options_page');
}
add_action( 'admin_menu', 'ct_add_submenu' );

function ct_settings_init() { 
	register_setting( 'theme_options', 'ct_options_settings' );

	add_settings_section(
		'ct_options_page_section', // the id
		'Custom Theme Options', // the section title
		'ct_options_page_section_callback', //$callback (function defined below)
		'theme_options' // page (matches menu_slug set in add_submenu_page)
	);

	function ct_options_page_section_callback() { 
		echo 'This section allows the user to customize some aspects of this theme.';
	}

	// adding radio buttons
	add_settings_field( 
		'ct_radio_field', 
		'Choose a custom sidebar and page/post title color', 
		'ct_radio_field_render', 
		'theme_options', 
		'ct_options_page_section'  
	);

	function ct_radio_field_render() { 
		$options = get_option( 'ct_options_settings' );
		?>
		<input type="radio" name="ct_options_settings[ct_radio_field]" <?php if (isset($options['ct_radio_field'])) checked( $options['ct_radio_field'], 1 ); ?> value="1" /> <label>(Default) Warm Yellow</label><br />
		<input type="radio" name="ct_options_settings[ct_radio_field]" <?php if (isset($options['ct_radio_field'])) checked( $options['ct_radio_field'], 2 ); ?> value="2" /> <label>Light Blue</label><br />
		<input type="radio" name="ct_options_settings[ct_radio_field]" <?php if (isset($options['ct_radio_field'])) checked( $options['ct_radio_field'], 3 ); ?> value="3" /> <label>No Color</label>
		<?php
	}

	// adding check box
	add_settings_field( 
		'ct_checkbox_field', 
		'Check if you want to hide widgets from appearing on your site', 
		'ct_checkbox_field_render', 
		'theme_options', 
		'ct_options_page_section'  
	);

	function ct_checkbox_field_render() { 
		$options = get_option( 'ct_options_settings' );
	?>
		<input type="checkbox" name="ct_options_settings[ct_checkbox_field]" <?php if (isset($options['ct_checkbox_field'])) checked( 'on', ($options['ct_checkbox_field']) ) ; ?> value="on" />
		<label>Hide widgets</label> 
		<?php	
	}

	// adding select box
	add_settings_field( 
		'ct_select_field', 
		'Choose a main font for your site from the dropdown', 
		'ct_select_field_render', 
		'theme_options', 
		'ct_options_page_section'  
	);

	function ct_select_field_render() { 
		$options = get_option( 'ct_options_settings' );
		?>
		<select name="ct_options_settings[ct_select_field]">
			<option value="1" <?php if (isset($options['ct_select_field'])) selected( $options['ct_select_field'], 1 ); ?>>Arial Narrow</option>
			<option value="2" <?php if (isset($options['ct_select_field'])) selected( $options['ct_select_field'], 2 ); ?>>Geneva</option>
			<option value="3" <?php if (isset($options['ct_select_field'])) selected( $options['ct_select_field'], 3 ); ?>>Garamond</option>
			<option value="4" <?php if (isset($options['ct_select_field'])) selected( $options['ct_select_field'], 4 ); ?>>(Default) Franklin Gothic</option>
		</select>
	<?php
	}

	function theme_options_page() { 
		?>
		<form action="options.php" method="post">
			<h2>Custom Theme Options Page </h2>
			<?php
			settings_fields( 'theme_options' );
			do_settings_sections( 'theme_options' );
			submit_button();
			?>
		</form>
		<?php
	}


}

add_action( 'admin_init', 'ct_settings_init' );

?>