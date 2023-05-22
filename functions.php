<?php
/**
 * Understrap Child Theme functions and definitions
 *
 * @package UnderstrapChild
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;



/**
 * Removes the parent themes stylesheet and scripts from inc/enqueue.php
 */
function understrap_remove_scripts() {
	wp_dequeue_style( 'understrap-styles' );
	wp_deregister_style( 'understrap-styles' );

	wp_dequeue_script( 'understrap-scripts' );
	wp_deregister_script( 'understrap-scripts' );
}
add_action( 'wp_enqueue_scripts', 'understrap_remove_scripts', 20 );



/**
 * Enqueue our stylesheet and javascript file
 */
function theme_enqueue_styles() {

	// Get the theme data.
	$the_theme     = wp_get_theme();
	$theme_version = $the_theme->get( 'Version' );

	$suffix = defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ? '' : '.min';
	// Grab asset urls.
	$theme_styles  = "/css/child-theme{$suffix}.css";
	$theme_scripts = "/js/child-theme{$suffix}.js";
	
	$css_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_styles );

	wp_enqueue_style( 'child-understrap-styles', get_stylesheet_directory_uri() . $theme_styles, array(), $css_version );
	wp_enqueue_script( 'jquery' );
	
	$js_version = $theme_version . '.' . filemtime( get_stylesheet_directory() . $theme_scripts );
	
	wp_enqueue_script( 'child-understrap-scripts', get_stylesheet_directory_uri() . $theme_scripts, array(), $js_version, true );
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );



/**
 * Load the child theme's text domain
 */
function add_child_theme_textdomain() {
	load_child_theme_textdomain( 'understrap-child', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'add_child_theme_textdomain' );



/**
 * Overrides the theme_mod to default to Bootstrap 5
 *
 * This function uses the `theme_mod_{$name}` hook and
 * can be duplicated to override other theme settings.
 *
 * @return string
 */
function understrap_default_bootstrap_version() {
	return 'bootstrap5';
}
add_filter( 'theme_mod_understrap_bootstrap_version', 'understrap_default_bootstrap_version', 20 );



/**
 * Loads javascript for showing customizer warning dialog.
 */
function understrap_child_customize_controls_js() {
	wp_enqueue_script(
		'understrap_child_customizer',
		get_stylesheet_directory_uri() . '/js/customizer-controls.js',
		array( 'customize-preview' ),
		'20130508',
		true
	);
}
add_action( 'customize_controls_enqueue_scripts', 'understrap_child_customize_controls_js' );



// Adds custom logo to the login page:
function wpdev_filter_login_head() {

	if ( has_custom_logo() ) :

		$image = wp_get_attachment_image_src( get_theme_mod( 'custom_logo' ), 'full' );
		?>
		<style type="text/css">
			.login h1 a {
				background-image: url(<?php echo esc_url( $image[0] ); ?>);
				-webkit-background-size: <?php echo absint( $image[1] )?>px;
				background-size: <?php echo absint( $image[1] ) ?>px;
				height: <?php echo absint( $image[2] ) ?>px;
				width: <?php echo absint( $image[1] ) ?>px;
			}
		</style>
		<?php
	endif;
}

add_action( 'login_head', 'wpdev_filter_login_head', 100 );


// replaces the link to wordpress.org with your homepage link.
function new_wp_login_url() {
	return home_url();
}
add_filter('login_headerurl', 'new_wp_login_url');



/**
 * Changes "site-info" for Understrap to a boilerplate copyright.
 * Also adds Log In and Log Out links.
 */
function remove_parent_functions() {
    remove_action( 'understrap_site_info', 'understrap_add_site_info' );
    add_action( 'understrap_site_info', 'understrap_add_site_child_info' );
}
add_action( 'init', 'remove_parent_functions', 15 );

function understrap_add_site_child_info() {
	$current_year = date('Y'); // Get the current year
	echo '<div class="container">
	<footer class="py-0 my-0">
	  <ul class="nav justify-content-center border-bottom border-primary pb-3 mb-3">
		<li class="nav-item"><a href="' . site_url( ) . '" class="nav-link px-2 text-muted">Home</a></li>
		<li class="nav-item"><a href="' . site_url( ) . '/tools" class="nav-link px-2 text-muted">Tools</a></li>
		<li class="nav-item"><a href="' . site_url( ) . '/about" class="nav-link px-2 text-muted">About</a></li>
		<li class="nav-item"><a href="' . site_url( ) . '/contact" class="nav-link px-2 text-muted">Contact</a></li>
	  </ul>
	  <div class="text-center text-muted">Site developed by Fraser Wilkinson • ' . '&copy;' . $current_year . ' <a href="' . get_bloginfo( 'wpurl' ) . '">' . get_bloginfo( 'name' ) . '</a></div>
	</footer>
  </div>';

}


// require_once get_theme_file_path( 'inc/child-custom-post-types.php' );

