<?php
/**
 * The template for displaying the homepage.
 *
 * This page template will display any functions hooked into the `homepage` action.
 * By default this includes a variety of product displays and the page content itself. To change the order or toggle these components
 * use the Homepage Control plugin.
 * https://wordpress.org/plugins/homepage-control/
 *
 * Template name: Homepage
 *
 * @package wpcpet
 */

get_header(); ?>

  <div id="primary" class="content-area">
    <main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) :
			the_post();

			do_action( 'wpcpet_page_before' );

			get_template_part( 'content', 'page' );

			/**
			 * Functions hooked in to wpcpet_page_after action
			 *
			 * @see wpcpet_display_comments - 10
			 */
			do_action( 'wpcpet_page_after' );

		endwhile; // End of the loop.
		?>

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
