<?php
/**
 * WPCpet engine room
 *
 * @package wpcpet
 */

/**
 * Assign the WPCpet version to a var
 */
$wpcpet_theme   = wp_get_theme( 'wpcpet' );
$wpcpet_version = $wpcpet_theme['Version'];

/**
 * Set the content width based on the theme's design and stylesheet.
 */
if ( ! isset( $content_width ) ) {
	$content_width = 980; /* pixels */
}

$wpcpet = (object) array(
	'version'    => $wpcpet_version,
	'main'       => require 'inc/class-wpcpet.php',
	'customizer' => require 'inc/customizer/class-wpcpet-customizer.php',
);

require 'inc/wpcpet-functions.php';
require 'inc/wpcpet-template-hooks.php';
require 'inc/wpcpet-template-functions.php';
require 'inc/wpcpet-notice.php';
require 'inc/wordpress-shims.php';

if ( wpcpet_is_woo_activated() ) {
	$wpcpet->woocommerce = require 'inc/woocommerce/class-wpcpet-woocommerce.php';

	require 'inc/woocommerce/wpcpet-woocommerce-template-hooks.php';
	require 'inc/woocommerce/wpcpet-woocommerce-template-functions.php';
	require 'inc/woocommerce/wpcpet-woocommerce-functions.php';
}
