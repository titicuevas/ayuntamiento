<?php
/**
 * Template part for displaying page content in page.php
 *
 * @package Kindergarten Playgroup
 * @subpackage kindergarten_playgroup
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
	</header>
	<div class="entry-content">
		<?php
			the_post_thumbnail();

			the_content();

			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'kindergarten-playgroup' ),
				'after'  => '</div>',
			) );
		?>
	</div>
</div>