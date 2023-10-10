<?php
/**
 * WPCpet WooCommerce hooks
 *
 * @package wpcpet
 */

/**
 * Layout
 *
 * @see  wpcpet_before_content()
 * @see  wpcpet_after_content()
 * @see  woocommerce_breadcrumb()
 * @see  wpcpet_shop_messages()
 */
remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20 );
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10 );
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10 );
remove_action( 'woocommerce_sidebar', 'woocommerce_get_sidebar', 10 );

add_action( 'woocommerce_before_main_content', 'wpcpet_before_content', 10 );
add_action( 'woocommerce_after_main_content', 'wpcpet_after_content', 10 );
add_action( 'wpcpet_content_top', 'wpcpet_shop_messages', 15 );
add_action( 'woocommerce_before_shop_loop', 'wpcpet_show_category_list', 5 );
add_action( 'woocommerce_before_shop_loop', 'wpcpet_sorting_wrapper', 9 );
add_action( 'woocommerce_before_shop_loop', 'wpcpet_button_grid_list_layout', 30 );
add_action( 'woocommerce_before_shop_loop', 'wpcpet_sorting_wrapper_close', 31 );

/**
 * Products
 *
 * @see wpcpet_edit_post_link()
 * @see wpcpet_upsell_display()
 */
remove_action( 'woocommerce_before_single_product_summary', 'woocommerce_show_product_sale_flash', 10 );
remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );
remove_action( 'woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15 );
remove_action( 'woocommerce_after_shop_loop_item_title', 'woocommerce_template_loop_rating', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 5 );
remove_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10 );

add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_rating', 5 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_template_single_title', 9 );
add_action( 'woocommerce_before_shop_loop_item_title', 'woocommerce_template_loop_rating', 15 );
add_action( 'woocommerce_single_product_summary', 'woocommerce_show_product_sale_flash', 4 );
add_action( 'woocommerce_shop_loop_item_title', 'woocommerce_template_loop_product_link_close', - 1 );
add_action( 'woocommerce_before_shop_loop_item_title', 'wpcpet_product_label_stock', 9 );
add_action( 'woocommerce_after_shop_loop_item_title', 'wpcpet_woocommerce_get_product_description', 15 );
add_action( 'woocommerce_single_product_summary', 'wpcpet_edit_post_link', 60 );
add_action( 'woocommerce_after_single_product_summary', 'wpcpet_upsell_display', 15 );
add_action( 'woocommerce_after_add_to_cart_button', 'wpcpet_wishlist_button', 20 );
add_action( 'woocommerce_after_add_to_cart_button', 'wpcpet_compare_button', 25 );

/**
 * WPC plugins compatible
 */
// WPC Smart Wishlist
add_filter( 'woosw_button_position_single', '__return_false' );
add_filter( 'woosw_button_position_archive', function () {
	return 'after_add_to_cart';
} );
add_filter( 'woosw_color_default', function () {
	return '#63A86D';
}, 10 );

// WPC Smart Quick View
add_filter( 'woosq_button_position', function () {
	return 'after_add_to_cart';
} );

// WPC Smart Compare
add_filter( 'woosc_button_position_single', '__return_false' );
add_filter( 'woosc_button_position_archive', function () {
	return 'after_add_to_cart';
} );
add_filter( 'woosc_bar_bg_color_default', function () {
	return '#7E7D7C';
}, 10 );
add_filter( 'woosc_bar_btn_color_default', function () {
	return '#63A86D';
}, 10 );

/**
 * Header
 *
 * @see wpcpet_header_search()
 * @see wpcpet_header_account()
 * @see wpcpet_header_wishlist()
 * @see wpcpet_header_cart()
 */
add_action( 'wpcpet_header', 'wpcpet_header_search', 15 );
add_action( 'wpcpet_header', 'wpcpet_header_account', 25 );
add_action( 'wpcpet_header', 'wpcpet_header_compare', 27 );
add_action( 'wpcpet_header', 'wpcpet_header_wishlist', 29 );
add_action( 'wpcpet_header', 'wpcpet_header_cart', 30 );

/**
 * Cart fragment
 *
 * @see wpcpet_cart_link_fragment()
 */
add_filter( 'woocommerce_add_to_cart_fragments', 'wpcpet_cart_link_fragment' );

/**
 * Removing the title on the WooCommerce archive pages
 */
add_filter( 'woocommerce_show_page_title', '__return_null' );
