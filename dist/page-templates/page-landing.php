<?php
/**
 * Template Name: Custom Landing Page
 *
 * Template for displaying a page without sidebar even if a sidebar widget is published.
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

get_header();
$container = get_theme_mod( 'understrap_container_type' );

if ( is_front_page() ) {
	get_template_part( 'global-templates/hero' );
}

$wrapper_id = 'full-width-page-wrapper';
if ( is_page_template( 'page-templates/page-landing.php' ) ) {
	$wrapper_id = 'no-title-page-wrapper';
}
?>

<div class="wrapper bg-light" id="<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?>">

	<div class="<?php echo esc_attr( $container ); ?> px-0" id="content">

		<div class="row">

			<div class="content-area col-sm-12" id="primary">

				<main class="site-main bg-transparent" id="main" role="main">

					<?php
					while ( have_posts() ) {
						the_post();

						// the_content( );

					}
					?>

					<?php

					// now ACF rows - Flexible Content
					if ( have_rows('content_rows')) :

						// loop through rows
						while (have_rows('content_rows')) : the_row();

						get_template_part( 'row-templates/row', get_row_layout() );

					// end loop
					endwhile;

				else :
					// do something...
				endif;


					?>

				</main>

			</div><!-- #primary -->

		</div><!-- .row -->

	</div><!-- #content -->

</div><!-- #<?php echo $wrapper_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- ok. ?> -->

<?php
get_footer();
