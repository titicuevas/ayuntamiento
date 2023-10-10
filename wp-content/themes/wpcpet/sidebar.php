<?php
/**
 * The sidebar containing the main widget area.
 *
 * @package wpcpet
 */

if ( ! wpcpet_is_active_sidebar() ) {
	return;
}
?>

<div id="secondary" class="widget-area" role="complementary">
	<?php
	if ( wpcpet_is_woo_activated() && is_woocommerce() ) {
		dynamic_sidebar( 'sidebar-shop' );
	} else {
		dynamic_sidebar( 'sidebar' );
	}
	?>
</div><!-- #secondary -->
