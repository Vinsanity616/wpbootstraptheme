<?php

// Default options values
$sa_options = array(
	'header_facebook' => get_bloginfo('name'),
	'header_twitter' => get_bloginfo('name'),
	'header_google_plus' => get_bloginfo('name'),
	'header_linkedin' => get_bloginfo('name'),
	'header_pinterest' => get_bloginfo('name'),
	'header_youtube' => get_bloginfo('name')
);

if ( is_admin() ) : // Load only if we are viewing an admin page

function sa_register_settings() {
	// Register settings and call sanitation functions
	register_setting( 'sa_theme_options', 'sa_options', 'sa_validate_options' );
}

add_action( 'admin_init', 'sa_register_settings' );

// Store categories in array
$sa_categories[0] = array(
	'value' => 0,
	'label' => ''
);
$sa_cats = get_categories(); $i = 1;
foreach( $sa_cats as $sa_cat ) :
	$sa_categories[$sa_cat->cat_ID] = array(
		'value' => $sa_cat->cat_ID,
		'label' => $sa_cat->cat_name
	);
	$i++;
endforeach;

// Store layouts views in array
$sa_layouts = array(
	'fixed' => array(
		'value' => 'fixed',
		'label' => 'Fixed Layout'
	),
	'fluid' => array(
		'value' => 'fluid',
		'label' => 'Fluid Layout'
	),
);

function sa_theme_options() {
	// Add theme options page to the addmin menu
	add_theme_page( 'Theme Options', 'Theme Options', 'edit_theme_options', 'theme_options', 'sa_theme_options_page' );
}

add_action( 'admin_menu', 'sa_theme_options' );

// Function to generate options page
function sa_theme_options_page() {
	global $sa_options, $sa_categories, $sa_layouts;

	if ( ! isset( $_REQUEST['updated'] ) )
		$_REQUEST['updated'] = false; // This checks whether the form has just been submitted. ?>

	<div class="wrap">

	<?php echo "<h2>" . wp_get_theme() . __( ' Theme Options', 'wordpressmaster' ) . "</h2>";
	// This shows the page's name and an icon if one has been provided ?>

	<?php if ( false !== $_REQUEST['updated'] ) : ?>
	<div class="updated fade"><p><strong><?php _e( 'Options saved', 'wordpressmaster' ); ?></strong></p></div>
	<?php endif; // If the form has just been submitted, this shows the notification ?>

	<form method="post" action="options.php">

	<?php $settings = get_option( 'sa_options', $sa_options ); ?>
	
	<?php settings_fields( 'sa_theme_options' );
	/* This function outputs some hidden fields required by the form,
	including a nonce, a unique number used to ensure the form has been submitted from the admin page
	and not somewhere else, very important for security */ ?>

	<table class="form-table"><!-- Grab a hot cup of coffee, yes we're using tables! -->

	<tr valign="top"><th scope="row"><label for="header_facebook">Facebook URL</label></th>
	<td>
	<input id="header_facebook" name="sa_options[header_facebook]" type="text" value="<?php echo do_shortcode($settings['header_facebook']); ?>" />
	</td>
	</tr>

	<tr valign="top"><th scope="row"><label for="header_twitter">Twitter URL</label></th>
	<td>
	<input id="header_twitter" name="sa_options[header_twitter]" type="text" value="<?php  echo do_shortcode($settings['header_twitter']); ?>" />
	</td>
	</tr>

	<tr valign="top"><th scope="row"><label for="header_google_plus">Google Plus URL</label></th>
	<td>
	<input id="header_google_plus" name="sa_options[header_google_plus]" type="text" value="<?php  echo do_shortcode($settings['header_google_plus']); ?>" />
	</td>
	</tr>

	<tr valign="top"><th scope="row"><label for="header_linkedin">Linkedin URL</label></th>
	<td>
	<input id="header_linkedin" name="sa_options[header_linkedin]" type="text" value="<?php  echo do_shortcode($settings['header_linkedin']); ?>" />
	</td>
	</tr>

	<tr valign="top"><th scope="row"><label for="header_pinterest">Pinterest URL</label></th>
	<td>
	<input id="header_pinterest" name="sa_options[header_pinterest]" type="text" value="<?php  echo do_shortcode($settings['header_pinterest']); ?>" />
	</td>
	</tr>

	<tr valign="top"><th scope="row"><label for="header_youtube">YouTube URL</label></th>
	<td>
	<input id="header_youtube" name="sa_options[header_youtube]" type="text" value="<?php  echo do_shortcode($settings['header_youtube']); ?>" />
	</td>
	</tr>

	</table>

	<p class="submit"><input type="submit" class="button-primary" value="Save Options" /></p>

	</form>

	</div>

	<?php
}

function sa_validate_options( $input ) {
	global $sa_options, $sa_categories, $sa_layouts;

	$settings = get_option( 'sa_options', $sa_options );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['header_facebook'] = wp_filter_nohtml_kses( $input['header_facebook'] );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['header_twitter'] = wp_filter_nohtml_kses( $input['header_twitter'] );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['header_google_plus'] = wp_filter_nohtml_kses( $input['header_google_plus'] );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['header_linkedin'] = wp_filter_nohtml_kses( $input['header_linkedin'] );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['header_pinterest'] = wp_filter_nohtml_kses( $input['header_pinterest'] );
	
	// We strip all tags from the text field, to avoid vulnerablilties like XSS
	$input['header_youtube'] = wp_filter_nohtml_kses( $input['header_youtube'] );
	
	return $input;
}

endif;  // EndIf is_admin()