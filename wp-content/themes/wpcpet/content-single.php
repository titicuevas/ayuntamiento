<?php
/**
 * Template used to display post content on single pages.
 *
 * @package wpcpet
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	do_action( 'wpcpet_single_post_top' );

	/**
	 * Functions hooked into wpcpet_single_post add_action
	 *
	 * @see wpcpet_post_header          - 10
	 * @see wpcpet_post_content         - 30
	 */
	do_action( 'wpcpet_single_post' );

	/**
	 * Functions hooked in to wpcpet_single_post_bottom action
	 *
	 * @see wpcpet_post_nav         - 10
	 * @see wpcpet_display_comments - 20
	 */
	do_action( 'wpcpet_single_post_bottom' );
	?>

</article><!-- #post-## -->
