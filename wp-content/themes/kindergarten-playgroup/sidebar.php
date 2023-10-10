<?php
/**
 * The sidebar containing the main widget area
 *
 * @package Kindergarten Playgroup
 * @subpackage kindergarten_playgroup
 */
?>

<aside id="theme-sidebar" class="widget-area" role="complementary" aria-label="<?php esc_attr_e( 'Blog Sidebar', 'kindergarten-playgroup' ); ?>">
	<?php dynamic_sidebar( 'sidebar-1' ); ?>
</aside>