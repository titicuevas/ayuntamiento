<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package wpcpet
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<?php
	/**
	 * Functions hooked in to wpcpet_page add_action
	 *
	 * @see wpcpet_page_header          - 10
	 * @see wpcpet_page_content         - 20
	 */
	do_action( 'wpcpet_page' );
	?>
</article><!-- #post-## -->
