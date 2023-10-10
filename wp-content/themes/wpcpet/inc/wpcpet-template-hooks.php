<?php
/**
 * WPCpet hooks
 *
 * @package wpcpet
 */

/**
 * General
 *
 * @see  wpcpet_get_sidebar()
 */

add_action( 'wpcpet_sidebar', 'wpcpet_get_sidebar', 10 );

/**
 * Header
 *
 * @see  wpcpet_skip_links()
 * @see  wpcpet_secondary_navigation()
 * @see  wpcpet_site_branding()
 * @see  wpcpet_primary_navigation()
 */
add_action( 'wpcpet_header', 'wpcpet_header_container', 0 );
add_action( 'wpcpet_header', 'wpcpet_header_row', 1 );
add_action( 'wpcpet_header', 'wpcpet_header_left_open', 2 );
add_action( 'wpcpet_header', 'wpcpet_skip_links', 5 );
add_action( 'wpcpet_header', 'wpcpet_handheld_navigation_button', 10 );
add_action( 'wpcpet_header', 'wpcpet_header_left_close', 16 );
add_action( 'wpcpet_header', 'wpcpet_site_branding', 20 );
add_action( 'wpcpet_header', 'wpcpet_header_right_open', 21 );
add_action( 'wpcpet_header', 'wpcpet_header_right_close', 36 );
add_action( 'wpcpet_header', 'wpcpet_header_row_close', 41 );
add_action( 'wpcpet_header', 'wpcpet_header_row', 70 );
add_action( 'wpcpet_header', 'wpcpet_handheld_navigation', 75 );
add_action( 'wpcpet_header', 'wpcpet_header_row_close', 79 );
add_action( 'wpcpet_header', 'wpcpet_header_row', 105 );
add_action( 'wpcpet_header', 'wpcpet_primary_navigation', 110 );
add_action( 'wpcpet_header', 'wpcpet_header_row_close', 115 );
add_action( 'wpcpet_header', 'wpcpet_header_container_close', 120 );

/**
 * Before Content
 *
 * @see  woocommerce_breadcrumb()
 * @see  wpcpet_page_title()
 */
add_action( 'wpcpet_before_content', 'wpcpet_title_bar_open', 10 );
add_action( 'wpcpet_before_content', 'wpcpet_page_title', 11 );
if ( wpcpet_is_woo_activated() ) {
	add_action( 'wpcpet_before_content', 'woocommerce_breadcrumb', 12 );
}
add_action( 'wpcpet_before_content', 'wpcpet_title_bar_close', 13 );

/**
 * Footer
 *
 * @see  wpcpet_footer_widgets()
 * @see  wpcpet_credit()
 */
add_action( 'wpcpet_footer', 'wpcpet_footer_widgets', 10 );
add_action( 'wpcpet_footer', 'wpcpet_credit', 20 );


/**
 * Posts
 *
 * @see  wpcpet_post_header()
 * @see  wpcpet_post_meta()
 * @see  wpcpet_post_content()
 * @see  wpcpet_paging_nav()
 * @see  wpcpet_single_post_header()
 * @see  wpcpet_post_nav()
 * @see  wpcpet_display_comments()
 */
add_action( 'wpcpet_post_header_before', 'wpcpet_post_meta', 5 );
add_action( 'wpcpet_loop_post', 'wpcpet_post_header', 10 );
add_action( 'wpcpet_loop_post', 'wpcpet_post_excerpt', 30 );
add_action( 'wpcpet_loop_after', 'wpcpet_paging_nav', 10 );
add_action( 'wpcpet_single_post', 'wpcpet_post_header', 10 );
add_action( 'wpcpet_single_post', 'wpcpet_post_content', 30 );
add_action( 'wpcpet_single_post_bottom', 'wpcpet_edit_post_link', 5 );
add_action( 'wpcpet_single_post_bottom', 'wpcpet_display_comments', 20 );
add_action( 'wpcpet_post_content_before', 'wpcpet_post_thumbnail', 10 );
add_action( 'wpcpet_post_excerpt_before', 'wpcpet_post_thumbnail', 10 );

/**
 * Pages
 *
 * @see  wpcpet_page_header()
 * @see  wpcpet_page_content()
 * @see  wpcpet_display_comments()
 */
add_action( 'wpcpet_page', 'wpcpet_page_header', 10 );
add_action( 'wpcpet_page', 'wpcpet_page_content', 20 );
add_action( 'wpcpet_page', 'wpcpet_edit_post_link', 30 );
add_action( 'wpcpet_page_after', 'wpcpet_display_comments', 10 );

