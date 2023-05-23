<?php
/**
 * Partial template for content in page.php
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<article <?php post_class('col-sm-8 offset-sm-2'); ?> id="post-<?php the_ID(); ?>">

	<?php
	if ( ! is_page_template( 'page-templates/page-landing.php' ) ) {
		the_title(
			'<header class="entry-header pt-5"><h1 class="entry-title">',
			'</h1></header><!-- .entry-header -->'
		);
	}

	echo get_the_post_thumbnail( $post->ID, 'large' );
	?>

	<div class="entry-content">

		<?php
		the_content();
		understrap_link_pages();
		?>

	</div><!-- .entry-content -->

	<footer class="entry-footer">

		<?php understrap_edit_post_link(); ?>

	</footer><!-- .entry-footer -->

</article><!-- #post-<?php the_ID(); ?> -->
