<?php 
if ( ! isset( $content_width ) ) {
	$content_width = 660;
}
add_theme_support('post-thumbnails'); 
add_theme_support('menus');
add_theme_support( "title-tag" );
add_theme_support( 'automatic-feed-links' );

$backgroundDefaults = array(
	'default-color'          => '',
	'default-image'          => '',
	'wp-head-callback'       => '_custom_background_cb',
	'admin-head-callback'    => '',
	'admin-preview-callback' => ''
);

add_theme_support( 'custom-header' );

add_theme_support( 'custom-background' );

// Register Theme Features
function custom_theme_features()  {
 global $wp_version;

 // Add theme support for Custom Background
  $background_args = array(
  'default-color'          => '',
  'default-image'          => get_template_directory_uri() . '',
  'wp-head-callback'       => '_custom_background_cb',
  'admin-head-callback'    => '',
  'admin-preview-callback' => '',
 );

  add_theme_support( 'custom-background', $background_args );

}

// Hook into the 'after_setup_theme' action
// add_action( 'after_setup_theme', 'custom_theme_features' );

function my_theme_add_editor_styles() {
    add_editor_style( 'custom-editor-style.css' );
}
add_action( 'admin_init', 'my_theme_add_editor_styles' );

//Replace wordpress default [...] with read more link
function new_excerpt_more( $more ) {
	return '... <a class="read-more" href="'. get_permalink( get_the_ID() ) . '">' . __('Read More', 'wordpressmaster') . '</a>';
}
add_filter( 'excerpt_more', 'new_excerpt_more' );

// Obscure login screen error messages
function wpfme_login_obscure(){ return '<strong>Sorry</strong>: User name or password is incorrect!';}
add_filter( 'login_errors', 'wpfme_login_obscure' );

//custom excerpt length
function wpfme_custom_excerpt_length( $length ) {
	//the amount of words to return
	return 40;
}
add_filter( 'excerpt_length', 'wpfme_custom_excerpt_length');

// Remove the version number of WP
// Warning - this info is also available in the readme.html file in your root directory - delete this file!
remove_action('wp_head', 'wp_generator');

// Custom CSS for the login page
// Create wp-login.css in your theme folder
function wpfme_loginCSS() {
	echo '<link rel="stylesheet" type="text/css" href="'.get_template_directory_uri().'/css/wp-login.css"/>';
}
add_action('login_head', 'wpfme_loginCSS');

//TinyMCE text editor
function all_tinymce( $args ) {
	$args['wordpress_adv_hidden'] = false;
	
	return $args;
}
add_filter( 'tiny_mce_before_init', 'all_tinymce' );

//default image anchor to none
function wpb_imagelink_setup() {
	$image_set = get_option( 'image_default_link_type' );
	
	if ($image_set !== 'none') {
		update_option('image_default_link_type', 'none');
	}
}
add_action('admin_init', 'wpb_imagelink_setup', 10);

// prepare your theme for the menu
add_action( 'after_setup_theme', 'wordpressmaster_setup' );

if ( ! function_exists( 'wordpressmaster_setup' ) ):
    function wordpressmaster_setup() {  
        register_nav_menu( 'primary', __( 'Primary navigation', 'wordpressmaster' ) );
    } endif;

// Register custom navigation walker
require_once('wp_bootstrap_navwalker.php');

// add sidebar menu widget
function wordpressmaster_widgets_init() {
	register_sidebar( array(
		'name'			=> __( 'Main Sidebar', 'wordpressmaster' ),
		'id'			=> 'main-sidebar',
		'description'	=> 'Default sidebar',
		'before_widget'	=> '',
		'after_widget'	=> '',
		'before_title'	=> '',
		'after_title'	=> '',
	) );
}
add_action( 'widgets_init', 'wordpressmaster_widgets_init');

// add google analytics to header
add_action('wp_header', 'add_googleanalytics'); 

// add for theme options
require_once ( get_stylesheet_directory() . '/theme-options.php' );

function sa_layout_view() {
	global $sa_options;
	$settings = get_option( 'sa_options', $sa_options );
	
	if( $settings['layout_view'] == 'fluid' ) : ?>

		<style type="text/css">
			#wrapper {
				width: 94%;
				max-width:1140px;
				min-width:940px;
			}
			#branding, #branding img, #access, #main, #colophon {
				width:100%;
			}
		</style>

	<?php endif;
}

add_action( 'wp_head', 'sa_layout_view' );

function my_mce4_options( $init ) {
$default_colours = '
	"000000", "Black",
	"993300", "Burnt orange",
	"333300", "Dark olive",
	"003300", "Dark green",
	"003366", "Dark azure",
	"000080", "Navy Blue",
	"333399", "Indigo",
	"333333", "Very dark gray",
	"800000", "Maroon",
	"FF6600", "Orange",
	"808000", "Olive",
	"008000", "Green",
	"008080", "Teal",
	"0000FF", "Blue",
	"666699", "Grayish blue",
	"808080", "Gray",
	"FF0000", "Red",
	"FF9900", "Amber",
	"99CC00", "Yellow green",
	"339966", "Sea green",
	"33CCCC", "Turquoise",
	"3366FF", "Royal blue",
	"800080", "Purple",
	"999999", "Medium gray",
	"FF00FF", "Magenta",
	"FFCC00", "Gold",
	"FFFF00", "Yellow",
	"00FF00", "Lime",
	"00FFFF", "Aqua",
	"00CCFF", "Sky blue",
	"993366", "Brown",
	"C0C0C0", "Silver",
	"FF99CC", "Pink",
	"FFCC99", "Peach",
	"FFFF99", "Light yellow",
	"CCFFCC", "Pale green",
	"CCFFFF", "Pale cyan",
	"99CCFF", "Light sky blue",
	"CC99FF", "Plum",
	"FFFFFF", "White"
	';
$custom_colours = '
	"b51218", "Yoga Red",
	"c2e772", "Yoga Lime",
	"a376b6", "Yoga Purple"
	';
$init['textcolor_map'] = '['.$default_colours.','.$custom_colours.']';
$init['textcolor_rows'] = 6; // expand colour grid to 6 rows
return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');

// Enable font size & font family selects in the editor
if ( ! function_exists( 'wpex_mce_buttons' ) ) {
	function wpex_mce_buttons( $buttons ) {
		array_unshift( $buttons, 'fontselect' ); // Add Font Select
		array_unshift( $buttons, 'fontsizeselect' ); // Add Font Size Select
		return $buttons;
	}
}
add_filter( 'mce_buttons_2', 'wpex_mce_buttons' );

// Customize mce editor font sizes
if ( ! function_exists( 'wpex_mce_text_sizes' ) ) {
	function wpex_mce_text_sizes( $initArray ){
		$initArray['fontsize_formats'] = "9px 10px 12px 13px 14px 16px 18px 21px 24px 28px 32px 36px";
		return $initArray;
	}
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_text_sizes' );

// Add custom Fonts to the Fonts list
if ( ! function_exists( 'wpex_mce_google_fonts_array' ) ) {
	function wpex_mce_google_fonts_array( $initArray ) {
	    $initArray['font_formats'] = 'Zurich=zurichcondensed;Sketch=sketch_blockbold;Futura=futura_t_otregular;FuturaBold=futura_urw_extra_boldregular;';
            return $initArray;
	}
}
add_filter( 'tiny_mce_before_init', 'wpex_mce_google_fonts_array' );

?>