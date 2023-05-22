
<?php
/**
 * Post rendering content according to caller of get_template_part
 *
 * @package Understrap
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;
?>

<main class="site-main" id="main" role="main">

    <?php 
        $args = array(
            'post_type'      => 'post',
            'orderby'        => 'date',
            'order'          => 'DESC',
            'posts_per_page' => 6,
            'category_name'  => 'frontpage',
            'paged'          => get_query_var('paged'),
            'post_parent'    => $parent,
        ); 

        $q = new WP_Query($args);

        $displayed_posts = array(); // Initialize an empty array to hold displayed post IDs

        if ( $q->have_posts() ) { 
            while ( $q->have_posts() ) {
                $q->the_post();
                $displayed_posts[] = get_the_ID(); // Add displayed post ID to the array
                ?>
                <article <?php post_class('card'); ?> id="post-<?php the_ID(); ?>">
                    <?php echo get_the_post_thumbnail( $post->ID, 'large', array('class' => 'card-img-top') ); ?>

                    <header class="entry-header card-body">
                        <?php
                        the_title(
                            sprintf( '<h2 class="entry-title card-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ),
                            '</a></h2>'
                        );
                        ?>

                        <?php if ( 'post' === get_post_type() ) : ?>

                            <div class="entry-meta">
                                <?php understrap_posted_on(); ?>
                            </div><!-- .entry-meta -->

                        <?php endif; ?>

                    </header><!-- .entry-header -->

                    <div class="entry-content card-body">

                        <?php
                        the_excerpt();
                        understrap_link_pages();
                        ?>

                    </div><!-- .entry-content -->

                    <footer class="entry-footer card-footer">

                        <?php understrap_entry_footer(); ?>

                    </footer><!-- .entry-footer -->

                </article><!-- #post-<?php the_ID(); ?> -->
                <?php
            }
            wp_reset_postdata(); // Reset post data
        }
    ?>

</main>






