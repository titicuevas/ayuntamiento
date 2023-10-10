<?php

	$kindergarten_playgroup_tp_theme_css = "";

//body-layout
$kindergarten_playgroup_theme_lay = get_theme_mod( 'kindergarten_playgroup_tp_body_layout_settings','Full');
if($kindergarten_playgroup_theme_lay == 'Container'){
$kindergarten_playgroup_tp_theme_css .='body{';
	$kindergarten_playgroup_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
$kindergarten_playgroup_tp_theme_css .='}';
$kindergarten_playgroup_tp_theme_css .='.page-template-front-page .menubar{';
	$kindergarten_playgroup_tp_theme_css .='position: static;';
$kindergarten_playgroup_tp_theme_css .='}';
$kindergarten_playgroup_tp_theme_css .='.scrolled{';
	$kindergarten_playgroup_tp_theme_css .='width: auto; left:0; right:0;';
$kindergarten_playgroup_tp_theme_css .='}';
}else if($kindergarten_playgroup_theme_lay == 'Container Fluid'){
$kindergarten_playgroup_tp_theme_css .='body{';
	$kindergarten_playgroup_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
$kindergarten_playgroup_tp_theme_css .='}';
$kindergarten_playgroup_tp_theme_css .='.page-template-front-page .menubar{';
	$kindergarten_playgroup_tp_theme_css .='width: 99%';
$kindergarten_playgroup_tp_theme_css .='}';
$kindergarten_playgroup_tp_theme_css .='.scrolled{';
	$kindergarten_playgroup_tp_theme_css .='width: auto; left:0; right:0;';
$kindergarten_playgroup_tp_theme_css .='}';
}else if($kindergarten_playgroup_theme_lay == 'Full'){
$kindergarten_playgroup_tp_theme_css .='body{';
	$kindergarten_playgroup_tp_theme_css .='max-width: 100%;';
$kindergarten_playgroup_tp_theme_css .='}';
}

//scrol-top
$kindergarten_playgroup_scroll_position = get_theme_mod( 'kindergarten_playgroup_scroll_top_position','Right');
if($kindergarten_playgroup_scroll_position == 'Right'){
$kindergarten_playgroup_tp_theme_css .='#return-to-top{';
    $kindergarten_playgroup_tp_theme_css .='right: 20px;';
$kindergarten_playgroup_tp_theme_css .='}';
}else if($kindergarten_playgroup_scroll_position == 'Left'){
$kindergarten_playgroup_tp_theme_css .='#return-to-top{';
    $kindergarten_playgroup_tp_theme_css .='left: 20px;';
$kindergarten_playgroup_tp_theme_css .='}';
}else if($kindergarten_playgroup_scroll_position == 'Center'){
$kindergarten_playgroup_tp_theme_css .='#return-to-top{';
    $kindergarten_playgroup_tp_theme_css .='right: 50%;left: 50%;';
$kindergarten_playgroup_tp_theme_css .='}';
}


// site title font size option
$kindergarten_playgroup_site_title_font_size = get_theme_mod('kindergarten_playgroup_site_title_font_size', 25);{
$kindergarten_playgroup_tp_theme_css .='.logo h1 , .logo p a{';
	$kindergarten_playgroup_tp_theme_css .='font-size: '.esc_attr($kindergarten_playgroup_site_title_font_size).'px;';
$kindergarten_playgroup_tp_theme_css .='}';
}

//site tagline font size option
$kindergarten_playgroup_site_tagline_font_size = get_theme_mod('kindergarten_playgroup_site_tagline_font_size', 15);{
$kindergarten_playgroup_tp_theme_css .='.logo p{';
	$kindergarten_playgroup_tp_theme_css .='font-size: '.esc_attr($kindergarten_playgroup_site_tagline_font_size).'px;';
$kindergarten_playgroup_tp_theme_css .='}';
}

//return to header mobile				
$kindergarten_playgroup_return_to_header_mob = get_theme_mod( 'kindergarten_playgroup_return_to_header_mob',false);
if($kindergarten_playgroup_return_to_header_mob == true && get_theme_mod( 'kindergarten_playgroup_return_to_header',true) != true){
$kindergarten_playgroup_tp_theme_css .='.return-to-header{';
	$kindergarten_playgroup_tp_theme_css .='display:none;';
$kindergarten_playgroup_tp_theme_css .='} ';
}
if($kindergarten_playgroup_return_to_header_mob == true){
$kindergarten_playgroup_tp_theme_css .='@media screen and (max-width:575px) {';
$kindergarten_playgroup_tp_theme_css .='.return-to-header{';
	$kindergarten_playgroup_tp_theme_css .='display:block;';
$kindergarten_playgroup_tp_theme_css .='} }';
}else if($kindergarten_playgroup_return_to_header_mob == false){
$kindergarten_playgroup_tp_theme_css .='@media screen and (max-width:575px){';
$kindergarten_playgroup_tp_theme_css .='.return-to-header{';
	$kindergarten_playgroup_tp_theme_css .='display:none;';
$kindergarten_playgroup_tp_theme_css .='} }';
}

//slider mobile	
$kindergarten_playgroup_slider_buttom_mob = get_theme_mod( 'kindergarten_playgroup_slider_buttom_mob',true);
if($kindergarten_playgroup_slider_buttom_mob == true && get_theme_mod( 'kindergarten_playgroup_slider_button',true) != true){
$kindergarten_playgroup_tp_theme_css .='#slider .more-btn{';
	$kindergarten_playgroup_tp_theme_css .='display:none;';
$kindergarten_playgroup_tp_theme_css .='} ';
}
if($kindergarten_playgroup_slider_buttom_mob == true){
$kindergarten_playgroup_tp_theme_css .='@media screen and (max-width:575px) {';
$kindergarten_playgroup_tp_theme_css .='#slider .more-btn{';
	$kindergarten_playgroup_tp_theme_css .='display:block;';
$kindergarten_playgroup_tp_theme_css .='} }';
}else if($kindergarten_playgroup_slider_buttom_mob == false){
$kindergarten_playgroup_tp_theme_css .='@media screen and (max-width:575px){';
$kindergarten_playgroup_tp_theme_css .='#slider .more-btn{';
	$kindergarten_playgroup_tp_theme_css .='display:none;';
$kindergarten_playgroup_tp_theme_css .='} }';
}

//footer image
$kindergarten_playgroup_footer_widget_image = get_theme_mod('kindergarten_playgroup_footer_widget_image');
if($kindergarten_playgroup_footer_widget_image != false){
$kindergarten_playgroup_tp_theme_css .='#footer{';
	$kindergarten_playgroup_tp_theme_css .='background: url('.esc_attr($kindergarten_playgroup_footer_widget_image).');';
$kindergarten_playgroup_tp_theme_css .='}';
}

// related product
$kindergarten_playgroup_related_product = get_theme_mod('kindergarten_playgroup_related_product',true);
if($kindergarten_playgroup_related_product == false){
$kindergarten_playgroup_tp_theme_css .='.related.products{';
	$kindergarten_playgroup_tp_theme_css .='display: none;';
$kindergarten_playgroup_tp_theme_css .='}';
}

//menu font size
$kindergarten_playgroup_menu_font_size = get_theme_mod('kindergarten_playgroup_menu_font_size', 12);{
$kindergarten_playgroup_tp_theme_css .='.main-navigation a{';
	$kindergarten_playgroup_tp_theme_css .='font-size: '.esc_attr($kindergarten_playgroup_menu_font_size).'px;';
$kindergarten_playgroup_tp_theme_css .='}';
}

// menu text tranform
$kindergarten_playgroup_menu_text_tranform = get_theme_mod( 'kindergarten_playgroup_menu_text_tranform','Capitalize');
if($kindergarten_playgroup_menu_text_tranform == 'Uppercase'){
$kindergarten_playgroup_tp_theme_css .='.main-navigation a {';
	$kindergarten_playgroup_tp_theme_css .='text-transform: uppercase;';
$kindergarten_playgroup_tp_theme_css .='}';
}else if($kindergarten_playgroup_menu_text_tranform == 'Lowercase'){
$kindergarten_playgroup_tp_theme_css .='.main-navigation a {';
	$kindergarten_playgroup_tp_theme_css .='text-transform: lowercase;';
$kindergarten_playgroup_tp_theme_css .='}';
}
else if($kindergarten_playgroup_menu_text_tranform == 'Capitalize'){
$kindergarten_playgroup_tp_theme_css .='.main-navigation a {';
	$kindergarten_playgroup_tp_theme_css .='text-transform: capitalize;';
$kindergarten_playgroup_tp_theme_css .='}';
}