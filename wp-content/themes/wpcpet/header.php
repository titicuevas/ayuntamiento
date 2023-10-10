<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package wpcpet
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="profile" href="//gmpg.org/xfn/11">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<?php wp_body_open(); ?>

<?php do_action( 'wpcpet_before_site' ); ?>

<div id="page" class="hfeed site">
	<?php do_action( 'wpcpet_before_header' ); ?>

  <header id="masthead" class="site-header" role="banner" style="<?php wpcpet_header_styles(); ?>">

	  <?php
	  do_action( 'wpcpet_header' );
	  /**
	   * Functions hooked into wpcpet_header action
	   *
	   * @see wpcpet_header_container                 - 0
	   * @see wpcpet_header_row                       - 1
	   * @see wpcpet_skip_links                       - 5
	   * @see wpcpet_handheld_navigation_button       - 10
	   * @see wpcpet_header_search                    - 15
	   * @see wpcpet_site_branding                    - 20
	   * @see wpcpet_header_account                   - 25
	   * @see wpcpet_header_wishlist                  - 28
	   * @see wpcpet_header_cart                      - 30
	   * @see wpcpet_header_row_close                 - 41
	   * @see wpcpet_header_row                       - 70
	   * @see wpcpet_handheld_navigation              - 75
	   * @see wpcpet_header_row_close                 - 79
	   * @see wpcpet_header_container_close           - 99
	   * @see wpcpet_primary_navigation               - 110
	   *
	   */
	  ?>

  </header><!-- #masthead -->

	<?php
	/**
	 * Functions hooked in to wpcpet_before_content
	 *
	 * @see woocommerce_breadcrumb - 10
	 */
	do_action( 'wpcpet_before_content' );
	?>

  <div id="content" class="site-content" tabindex="-1">
    <div class="col-full">

<?php
do_action( 'wpcpet_content_top' );

