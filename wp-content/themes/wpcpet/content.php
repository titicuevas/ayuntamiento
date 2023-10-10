<?php
/**
 * Template used to display post content.
 *
 * @package wpcpet
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php
	/**
	 * Functions hooked in to wpcpet_loop_post action.
	 *
	 * @see wpcpet_post_header          - 10
	 * @see wpcpet_post_excerpt         - 30
	 * @see wpcpet_post_taxonomy        - 40
	 */
	do_action( 'wpcpet_loop_post' );
	?>

</article><!-- #post-## -->
