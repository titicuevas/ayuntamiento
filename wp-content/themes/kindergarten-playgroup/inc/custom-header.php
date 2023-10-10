<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Kindergarten Playgroup
 * @subpackage kindergarten_playgroup
 */

function kindergarten_playgroup_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'kindergarten_playgroup_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'flex-height'			 => true,
		'flex-width'			 => true,
		'wp-head-callback'       => 'kindergarten_playgroup_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'kindergarten_playgroup_custom_header_setup' );

if ( ! function_exists( 'kindergarten_playgroup_header_style' ) ) :
add_action( 'wp_enqueue_scripts', 'kindergarten_playgroup_header_style' );
function kindergarten_playgroup_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .headerbox{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-position: center top !important;
			background-size: cover;
		}";
	   	wp_add_inline_style( 'kindergarten-playgroup-style', $custom_css );
	endif;
}
endif;
