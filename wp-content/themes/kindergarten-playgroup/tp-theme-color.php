<?php

$kindergarten_playgroup_tp_theme_css = '';

//theme color
$kindergarten_playgroup_tp_color_option = get_theme_mod('kindergarten_playgroup_tp_color_option');

if($kindergarten_playgroup_tp_color_option != false){
$kindergarten_playgroup_tp_theme_css .=' button[type="submit"], .top-header,.main-navigation .menu > ul > li.highlight,.readmore-btn a,.more-btn a,.box:before,.box:after,a.added_to_cart.wc-forward,.woocommerce #respond input#submit, .woocommerce a.button, .woocommerce button.button, .woocommerce input.button,.woocommerce #respond input#submit.alt, .woocommerce a.button.alt, .woocommerce button.button.alt, .woocommerce input.button.alt,a.added_to_cart.wc-forward,.page-numbers,.prev.page-numbers,.next.page-numbers,span.meta-nav,#theme-sidebar button[type="submit"],#footer button[type="submit"],#comments input[type="submit"],a.register-btn , .main-navigation ul ul{';
$kindergarten_playgroup_tp_theme_css .='background-color: '.esc_attr($kindergarten_playgroup_tp_color_option).';';
$kindergarten_playgroup_tp_theme_css .='}';
}
if($kindergarten_playgroup_tp_color_option != false){
$kindergarten_playgroup_tp_theme_css .='.logo a,a,#theme-sidebar .textwidget a,#footer .textwidget a,.comment-body a,.entry-content a,.entry-summary a,#theme-sidebar h3,.woocommerce-message::before, .media-links i, .main-navigation a:hover, .main-navigation .current_page_item > a, .main-navigation .current-menu-item > a, .main-navigation .current_page_ancestor > a, h1, h2, h3, h4, h5, h6 , h2.woocommerce-loop-product__title, .woocommerce div.product .product_title , .woocommerce ul.products li.product .price, .woocommerce div.product p.price, .woocommerce div.product span.price {';
$kindergarten_playgroup_tp_theme_css .='color: '.esc_attr($kindergarten_playgroup_tp_color_option).';';
$kindergarten_playgroup_tp_theme_css .='}';
}
if($kindergarten_playgroup_tp_color_option != false){
$kindergarten_playgroup_tp_theme_css .='.woocommerce-message {';
$kindergarten_playgroup_tp_theme_css .='border-top-color: '.esc_attr($kindergarten_playgroup_tp_color_option).';';
$kindergarten_playgroup_tp_theme_css .='}';
}
//hover color
$kindergarten_playgroup_tp_color_option_link = get_theme_mod('kindergarten_playgroup_tp_color_option_link');

if($kindergarten_playgroup_tp_color_option_link != false){
$kindergarten_playgroup_tp_theme_css .='.prev.page-numbers:focus, .prev.page-numbers:hover, .next.page-numbers:focus, .next.page-numbers:hover, .readmore-btn a:hover,span.meta-nav:hover, #comments input[type="submit"]:hover,.woocommerce #respond input#submit:hover, .woocommerce a.button:hover, .woocommerce button.button:hover, .woocommerce input.button:hover, .woocommerce #respond input#submit.alt:hover, .woocommerce a.button.alt:hover, .woocommerce button.button.alt:hover, .woocommerce input.button.alt:hover, #footer button[type="submit"]:hover,#theme-sidebar .tagcloud a:hover, #theme-sidebar button[type="submit"]:hover,.book-tkt-btn a.register-btn:hover,.more-btn a:hover,a.register-btn:hover, .media-links i:hover{';
	$kindergarten_playgroup_tp_theme_css .='background: '.esc_attr($kindergarten_playgroup_tp_color_option_link).';';
$kindergarten_playgroup_tp_theme_css .='}';
}
if($kindergarten_playgroup_tp_color_option_link != false){
$kindergarten_playgroup_tp_theme_css .='a:hover,#theme-sidebar a:hover,.main-navigation a:hover {';
	$kindergarten_playgroup_tp_theme_css .='color: '.esc_attr($kindergarten_playgroup_tp_color_option_link).';';
$kindergarten_playgroup_tp_theme_css .='}';
}
if($kindergarten_playgroup_tp_color_option_link != false){
$kindergarten_playgroup_tp_theme_css .='#footer .tagcloud a:hover{';
	$kindergarten_playgroup_tp_theme_css .='border-color: '.esc_attr($kindergarten_playgroup_tp_color_option_link).';';
$kindergarten_playgroup_tp_theme_css .='}';
}

// //Secoundary  color

$kindergarten_playgroup_tp_Secoundary_color_option_link = get_theme_mod('kindergarten_playgroup_tp_Secoundary_color_option_link');
if($kindergarten_playgroup_tp_Secoundary_color_option_link != false){
$kindergarten_playgroup_tp_theme_css .='#slider .carousel-control-prev-icon:hover, #slider .carousel-control-next-icon:hover{';
	$kindergarten_playgroup_tp_theme_css .='background-color: '.esc_attr($kindergarten_playgroup_tp_Secoundary_color_option_link).';';
$kindergarten_playgroup_tp_theme_css .='}';
}

$kindergarten_playgroup_tp_secoundary_color_option = get_theme_mod('kindergarten_playgroup_tp_secoundary_color_option');

if($kindergarten_playgroup_tp_secoundary_color_option != false){
$kindergarten_playgroup_tp_theme_css .=' #slider .carousel-control-prev-icon, #slider .carousel-control-next-icon, .color2 ,.color1 , #demo_class h6,.site-info {';
$kindergarten_playgroup_tp_theme_css .='background: '.esc_attr($kindergarten_playgroup_tp_secoundary_color_option).';';
$kindergarten_playgroup_tp_theme_css .='}';
}


//preloader

$kindergarten_playgroup_tp_preloader_color1_option = get_theme_mod('kindergarten_playgroup_tp_preloader_color1_option');
$kindergarten_playgroup_tp_preloader_color2_option = get_theme_mod('kindergarten_playgroup_tp_preloader_color2_option');
$kindergarten_playgroup_tp_preloader_bg_color_option = get_theme_mod('kindergarten_playgroup_tp_preloader_bg_color_option');

if($kindergarten_playgroup_tp_preloader_color1_option != false){
$kindergarten_playgroup_tp_theme_css .='.center1{';
	$kindergarten_playgroup_tp_theme_css .='border-color: '.esc_attr($kindergarten_playgroup_tp_preloader_color1_option).' !important;';
$kindergarten_playgroup_tp_theme_css .='}';
}
if($kindergarten_playgroup_tp_preloader_color1_option != false){
$kindergarten_playgroup_tp_theme_css .='.center1 .ring::before{';
	$kindergarten_playgroup_tp_theme_css .='background: '.esc_attr($kindergarten_playgroup_tp_preloader_color1_option).' !important;';
$kindergarten_playgroup_tp_theme_css .='}';
}
if($kindergarten_playgroup_tp_preloader_color2_option != false){
$kindergarten_playgroup_tp_theme_css .='.center2{';
	$kindergarten_playgroup_tp_theme_css .='border-color: '.esc_attr($kindergarten_playgroup_tp_preloader_color2_option).' !important;';
$kindergarten_playgroup_tp_theme_css .='}';
}
if($kindergarten_playgroup_tp_preloader_color2_option != false){
$kindergarten_playgroup_tp_theme_css .='.center2 .ring::before{';
	$kindergarten_playgroup_tp_theme_css .='background: '.esc_attr($kindergarten_playgroup_tp_preloader_color2_option).' !important;';
$kindergarten_playgroup_tp_theme_css .='}';
}
if($kindergarten_playgroup_tp_preloader_bg_color_option != false){
$kindergarten_playgroup_tp_theme_css .='.loader{';
	$kindergarten_playgroup_tp_theme_css .='background: '.esc_attr($kindergarten_playgroup_tp_preloader_bg_color_option).';';
$kindergarten_playgroup_tp_theme_css .='}';
}

// footer-bg-color
$kindergarten_playgroup_tp_footer_bg_color_option = get_theme_mod('kindergarten_playgroup_tp_footer_bg_color_option');

if($kindergarten_playgroup_tp_footer_bg_color_option != false){
$kindergarten_playgroup_tp_theme_css .='#footer{';
	$kindergarten_playgroup_tp_theme_css .='background: '.esc_attr($kindergarten_playgroup_tp_footer_bg_color_option).' !important;';
$kindergarten_playgroup_tp_theme_css .='}';
}