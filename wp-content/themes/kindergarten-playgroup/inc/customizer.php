<?php
/**
 * Kindergarten Playgroup: Customizer
 *
 * @package Kindergarten Playgroup
 * @subpackage kindergarten_playgroup
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function kindergarten_playgroup_customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/range-slider-control.php');

	// Register the custom control type.
$wp_customize->register_control_type( 'Kindergarten_Playgroup_Toggle_Control' );

	//add home page setting pannel
	$wp_customize->add_panel( 'kindergarten_playgroup_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'kindergarten-playgroup' ),
	    'description' => __( 'Description of what this panel does.', 'kindergarten-playgroup' ),
	) );

	//Sidebar Position
	$wp_customize->add_section('kindergarten_playgroup_tp_general_settings',array(
        'title' => __('TP General Option', 'kindergarten-playgroup'),
        'priority' => 1,
        'panel' => 'kindergarten_playgroup_panel_id'
    ) );

 	$wp_customize->add_setting('kindergarten_playgroup_tp_body_layout_settings',array(
		'default' => 'Full',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_choices'
	));


 	$wp_customize->add_control('kindergarten_playgroup_tp_body_layout_settings',array(
		'type' => 'radio',
		'label'     => __('Body Layout Setting', 'kindergarten-playgroup'),
		'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'kindergarten-playgroup'),
		'section' => 'kindergarten_playgroup_tp_general_settings',
		'choices' => array(
		'Full' => __('Full','kindergarten-playgroup'),
		'Container' => __('Container','kindergarten-playgroup'),
		'Container Fluid' => __('Container Fluid','kindergarten-playgroup')
		),
	) );

   // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('kindergarten_playgroup_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'kindergarten_playgroup_sanitize_choices'
	));
	$wp_customize->add_control('kindergarten_playgroup_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Theme Sidebar Position', 'kindergarten-playgroup'),
     'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'kindergarten-playgroup'),
     'section' => 'kindergarten_playgroup_tp_general_settings',
     'choices' => array(
         'full' => __('Full','kindergarten-playgroup'),
         'left' => __('Left','kindergarten-playgroup'),
         'right' => __('Right','kindergarten-playgroup'),
         'three-column' => __('Three Columns','kindergarten-playgroup'),
         'four-column' => __('Four Columns','kindergarten-playgroup'),
         'grid' => __('Grid Layout','kindergarten-playgroup')
     ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('kindergarten_playgroup_sidebar_page_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'kindergarten_playgroup_sanitize_choices'
	));
	$wp_customize->add_control('kindergarten_playgroup_sidebar_page_layout',array(
     'type' => 'radio',
     'label'     => __('Page Sidebar Position', 'kindergarten-playgroup'),
     'description'   => __('This option work for pages.', 'kindergarten-playgroup'),
     'section' => 'kindergarten_playgroup_tp_general_settings',
     'choices' => array(
         'full' => __('Full','kindergarten-playgroup'),
         'left' => __('Left','kindergarten-playgroup'),
         'right' => __('Right','kindergarten-playgroup')
     ),
	) );

	$wp_customize->add_setting( 'kindergarten_playgroup_sticky', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_sticky', array(
		'label'       => esc_html__( 'Show / Hide Sticky Header', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_sticky',
	) ) );


	$wp_customize->add_section('_mobile_media_option',array(
		'title'         => __('Mobile Rkindergarten_playgroupesponsive media', 'kindergarten-playgroup'),
		'priority' => 13,
		'panel' => 'kindergarten_playgroup_panel_id'
	) );

	$wp_customize->add_setting( 'kindergarten_playgroup_return_to_header_mob', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_return_to_header_mob',
	) ) );

	$wp_customize->add_setting( 'kindergarten_playgroup_slider_buttom_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_slider_buttom_mob',
	) ) );

	$wp_customize->add_section('kindergarten_playgroup_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'kindergarten-playgroup'),
		'priority' => 12,
		'panel' => 'kindergarten_playgroup_panel_id'
	) );

	$wp_customize->add_setting( 'kindergarten_playgroup_return_to_header_mob', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_return_to_header_mob',
	) ) );

	$wp_customize->add_setting( 'kindergarten_playgroup_slider_buttom_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_slider_buttom_mob',
	) ) );


	//TP Color Option
	$wp_customize->add_section('kindergarten_playgroup_color_option',array(
     'title'         => __('TP Color Option', 'kindergarten-playgroup'),
     'priority' => 2,
     'panel' => 'kindergarten_playgroup_panel_id'
    ) );

	$wp_customize->add_setting( 'kindergarten_playgroup_tp_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kindergarten_playgroup_tp_color_option', array(
	    'description' => __('It will change the complete theme color in one click.', 'kindergarten-playgroup'),
	    'section' => 'kindergarten_playgroup_color_option',
	    'settings' => 'kindergarten_playgroup_tp_color_option',
  	)));

  	$wp_customize->add_setting( 'kindergarten_playgroup_tp_color_option_link', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kindergarten_playgroup_tp_color_option_link', array(
	    'description' => __('It will change the complete theme hover link color in one click.', 'kindergarten-playgroup'),
	    'section' => 'kindergarten_playgroup_color_option',
	    'settings' => 'kindergarten_playgroup_tp_color_option_link',
  	)));

  	$wp_customize->add_setting( 'kindergarten_playgroup_tp_secoundary_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kindergarten_playgroup_tp_secoundary_color_option', array(
	    'description' => __('It will change the complete Secoundary theme color in one click.', 'kindergarten-playgroup'),
	    'section' => 'kindergarten_playgroup_color_option',
	    'settings' => 'kindergarten_playgroup_tp_secoundary_color_option',
  	)));

  	$wp_customize->add_setting( 'kindergarten_playgroup_tp_Secoundary_color_option_link', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kindergarten_playgroup_tp_Secoundary_color_option_link', array(
	    'description' => __('It will change the complete theme hover link color in one click.', 'kindergarten-playgroup'),
	    'section' => 'kindergarten_playgroup_color_option',
	    'settings' => 'kindergarten_playgroup_tp_Secoundary_color_option_link',
  	)));

  	//MENU TYPOGRAPHY
	$wp_customize->add_section( 'kindergarten_playgroup_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'kindergarten-playgroup' ),
    	'priority' => 5,
		'panel' => 'kindergarten_playgroup_panel_id'
	) );

	$wp_customize->add_setting('kindergarten_playgroup_menu_text_tranform',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_choices'
 	));
 	$wp_customize->add_control('kindergarten_playgroup_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','kindergarten-playgroup'),
		'section' => 'kindergarten_playgroup_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','kindergarten-playgroup'),
		   'Lowercase' => __('Lowercase','kindergarten-playgroup'),
		   'Capitalize' => __('Capitalize','kindergarten-playgroup'),
		),
	) );


	$wp_customize->add_setting('kindergarten_playgroup_menu_font_size', array(
	'default' => 12,
    'sanitize_callback' => 'kindergarten_playgroup_sanitize_number_range',
	));

	$wp_customize->add_control(new Kindergarten_Playgroup_Range_Slider($wp_customize, 'kindergarten_playgroup_menu_font_size', array(
    'section' => 'kindergarten_playgroup_menu_typography',
    'label' => esc_html__('Font Size', 'kindergarten-playgroup'),
    'input_attrs' => array(
        'min' => 0,
        'max' => 20,
        'step' => 1
    )
	)));

	//TP Blog Option
	$wp_customize->add_section('kindergarten_playgroup_blog_option',array(
		'title' => __('TP Blog Option', 'kindergarten-playgroup'),
		'priority' => 4,
		'panel' => 'kindergarten_playgroup_panel_id'
	) );

	$wp_customize->add_setting( 'kindergarten_playgroup_remove_date', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_remove_date', array(
		'label'       => esc_html__( 'Show / Hide Date Option', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_blog_option',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_remove_date',
	) ) );

  
	$wp_customize->add_setting( 'kindergarten_playgroup_remove_author', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_remove_author', array(
		'label'       => esc_html__( 'Show / Hide Author Option', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_blog_option',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_remove_author',
	) ) );

	$wp_customize->add_setting( 'kindergarten_playgroup_remove_comments', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_remove_comments', array(
		'label'       => esc_html__( 'Show / Hide Comment Option', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_blog_option',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_remove_comments',
	) ) );

	$wp_customize->add_setting( 'kindergarten_playgroup_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_blog_option',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_remove_tags',
	) ) );

	$wp_customize->add_setting( 'kindergarten_playgroup_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_blog_option',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_remove_read_button',
	) ) );

    $wp_customize->add_setting('kindergarten_playgroup_read_more_text',array(
		'default'=> __('Read More','kindergarten-playgroup'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('kindergarten_playgroup_read_more_text',array(
		'label'	=> __('Edit Button Text','kindergarten-playgroup'),
		'section'=> 'kindergarten_playgroup_blog_option',
		'type'=> 'text'
	));

	$wp_customize->add_setting( 'kindergarten_playgroup_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'kindergarten_playgroup_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'kindergarten_playgroup_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );

	//TP Preloader Option
	$wp_customize->add_section('kindergarten_playgroup_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'kindergarten-playgroup'),
		'priority' => 3,
		'panel' => 'kindergarten_playgroup_panel_id'
	) );

	$wp_customize->add_setting( 'kindergarten_playgroup_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_preloader_show_hide',
	) ) );

	$wp_customize->add_setting( 'kindergarten_playgroup_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kindergarten_playgroup_tp_preloader_color1_option', array(
			'label'     => __('Preloader First Ring Color', 'kindergarten-playgroup'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'kindergarten-playgroup'),
	    'section' => 'kindergarten_playgroup_prelaoder_option',
	    'settings' => 'kindergarten_playgroup_tp_preloader_color1_option',
  	)));

  	$wp_customize->add_setting( 'kindergarten_playgroup_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kindergarten_playgroup_tp_preloader_color2_option', array(
			'label'     => __('Preloader Second Ring Color', 'kindergarten-playgroup'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'kindergarten-playgroup'),
	    'section' => 'kindergarten_playgroup_prelaoder_option',
	    'settings' => 'kindergarten_playgroup_tp_preloader_color2_option',
  	)));

  	$wp_customize->add_setting( 'kindergarten_playgroup_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kindergarten_playgroup_tp_preloader_bg_color_option', array(
			'label'     => __('Preloader Background Color', 'kindergarten-playgroup'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'kindergarten-playgroup'),
	    'section' => 'kindergarten_playgroup_prelaoder_option',
	    'settings' => 'kindergarten_playgroup_tp_preloader_bg_color_option',
  	)));

	// Top Bar
	$wp_customize->add_section( 'kindergarten_playgroup_topbar', array(
    	'title'      => __( 'Header Details', 'kindergarten-playgroup' ),
    	'priority' => 5,
    	'description' => __( 'Add your contact details', 'kindergarten-playgroup' ),
		'panel' => 'kindergarten_playgroup_panel_id'
	) );

	$wp_customize->add_setting('Kindergarten_Playgroup_header_button',array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('Kindergarten_Playgroup_header_button',array(
			'label'	=> __('Add Button Text','kindergarten-playgroup'),
			'section'=> 'kindergarten_playgroup_topbar',
			'type'=> 'text'
		));

		$wp_customize->add_setting('Kindergarten_Playgroup_header_button_link',array(
			'default'=> '',
			'sanitize_callback'	=> 'esc_url_raw'
		));
		$wp_customize->add_control('Kindergarten_Playgroup_header_button_link',array(
			'label'	=> __('Add Button URL','kindergarten-playgroup'),
			'section'=> 'kindergarten_playgroup_topbar',
			'type'=> 'url'
		));
		
		// Social Media
	$wp_customize->add_section( 'kindergarten_playgroup_social_media', array(
    	'title'      => __( 'Social Media Links', 'kindergarten-playgroup' ),
    	'priority' => 6,
    	'description' => __( 'Add your Social Links', 'kindergarten-playgroup' ),
		'panel' => 'kindergarten_playgroup_panel_id'
	) );

	$wp_customize->add_setting( 'kindergarten_playgroup_header_fb_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_header_fb_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_social_media',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_header_fb_new_tab',
	) ) );

	$wp_customize->add_setting('kindergarten_playgroup_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('kindergarten_playgroup_facebook_url',array(
		'label'	=> __('Facebook Link','kindergarten-playgroup'),
		'section'=> 'kindergarten_playgroup_social_media',
		'type'=> 'url'
	));
	$wp_customize->selective_refresh->add_partial( 'kindergarten_playgroup_facebook_url', array(
		'selector' => '.media-links a',
		'render_callback' => 'kindergarten_playgroup_customize_partial_kindergarten_playgroup_facebook_url',
	) );

	$wp_customize->add_setting( 'kindergarten_playgroup_header_twt_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_header_twt_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_social_media',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_header_twt_new_tab',
	) ) );

	$wp_customize->add_setting('kindergarten_playgroup_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('kindergarten_playgroup_twitter_url',array(
		'label'	=> __('Twitter Link','kindergarten-playgroup'),
		'section'=> 'kindergarten_playgroup_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting( 'kindergarten_playgroup_header_ins_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_header_ins_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_social_media',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_header_ins_new_tab',
	) ) );

	$wp_customize->add_setting('kindergarten_playgroup_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('kindergarten_playgroup_instagram_url',array(
		'label'	=> __('Instagram Link','kindergarten-playgroup'),
		'section'=> 'kindergarten_playgroup_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting( 'kindergarten_playgroup_header_ut_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_header_ut_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_social_media',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_header_ut_new_tab',
	) ) );

	$wp_customize->add_setting('kindergarten_playgroup_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('kindergarten_playgroup_youtube_url',array(
		'label'	=> __('YouTube Link','kindergarten-playgroup'),
		'section'=> 'kindergarten_playgroup_social_media',
		'type'=> 'url'
	));


	//home page slider
	$wp_customize->add_section( 'kindergarten_playgroup_slider_section' , array(
    	'title'      => __( 'Slider Section', 'kindergarten-playgroup' ),
    	'priority' => 6,
		'panel' => 'kindergarten_playgroup_panel_id'
	) );

	$wp_customize->add_setting( 'kindergarten_playgroup_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_slider_section',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_slider_arrows',
	) ) );

	for ( $count = 1; $count <= 3; $count++ ) {

		$wp_customize->add_setting( 'kindergarten_playgroup_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'kindergarten_playgroup_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'kindergarten_playgroup_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'kindergarten-playgroup' ),
			'description' => __('Image Size ( 1835 x 700 ) px','kindergarten-playgroup'),
			'section'  => 'kindergarten_playgroup_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}

	// Counter Section
	$wp_customize->add_section( 'kindergarten_playgroup_timing', array(
    	'title'      => __( 'Counter Section', 'kindergarten-playgroup' ),
    	'priority' => 6,
		'panel' => 'kindergarten_playgroup_panel_id'
	) );

	for ( $i = 1; $i <= 3; $i++ ) {

		$wp_customize->add_setting('kindergarten_playgroup_counter_icon'.$i,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('kindergarten_playgroup_counter_icon'.$i,array(
			'label'	=> __('Add icon ','kindergarten-playgroup').$i,
			'section'=> 'kindergarten_playgroup_timing',
			'type'=> 'text'
		));

		$wp_customize->add_setting('kindergarten_playgroup_counter_title'.$i,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('kindergarten_playgroup_counter_title'.$i,array(
			'label'	=> __('Add Title ','kindergarten-playgroup').$i,
			'section'=> 'kindergarten_playgroup_timing',
			'type'=> 'text'
		));

		$wp_customize->add_setting('kindergarten_playgroup_counter_text'.$i,array(
			'default'=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('kindergarten_playgroup_counter_text'.$i,array(
			'label'	=> __('Add Text ','kindergarten-playgroup').$i,
			'section'=> 'kindergarten_playgroup_timing',
			'type'=> 'text'
		));

	}

	//home page demo
	$wp_customize->add_section( 'kindergarten_playgroup_demo_section' , array(
    	'title'      => __( 'Classes Section', 'kindergarten-playgroup' ),
    	'priority' => 7,
		'panel' => 'kindergarten_playgroup_panel_id'
	) );

	$wp_customize->add_setting('kindergarten_playgroup_demo_short_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('kindergarten_playgroup_demo_short_heading',array(
		'label'	=> __('Add short Heading','kindergarten-playgroup'),
		'section'=> 'kindergarten_playgroup_demo_section',
		'type'=> 'text'
	));

	$wp_customize->add_setting('kindergarten_playgroup_demo_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('kindergarten_playgroup_demo_heading',array(
		'label'	=> __('Add Heading','kindergarten-playgroup'),
		'section'=> 'kindergarten_playgroup_demo_section',
		'type'=> 'text'
	));

	$kindergarten_playgroup_categories = get_categories();
	$cats = array();
	$i = 0;
	$kindergarten_playgroup_offer_cat[]= 'select';
	foreach($kindergarten_playgroup_categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$kindergarten_playgroup_offer_cat[$category->slug] = $category->name;
	}

	$wp_customize->add_setting('kindergarten_playgroup_demo_section_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_choices',
	));
	$wp_customize->add_control('kindergarten_playgroup_demo_section_category',array(
		'type'    => 'select',
		'choices' => $kindergarten_playgroup_offer_cat,
		'label' => __('Select Category','kindergarten-playgroup'),
		'section' => 'kindergarten_playgroup_demo_section',
	));

	//footer
	$wp_customize->add_section('kindergarten_playgroup_footer_section',array(
		'title'	=> __('Footer Text','kindergarten-playgroup'),
		'description'	=> __('Add copyright text.','kindergarten-playgroup'),
		'priority' =>10,
		'panel' => 'kindergarten_playgroup_panel_id'
	));

	$wp_customize->add_setting('kindergarten_playgroup_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('kindergarten_playgroup_footer_text',array(
		'label'	=> __('Copyright Text','kindergarten-playgroup'),
		'section'	=> 'kindergarten_playgroup_footer_section',
		'type'		=> 'text'
	));

		$wp_customize->add_setting( 'kindergarten_playgroup_tp_footer_bg_color_option', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kindergarten_playgroup_tp_footer_bg_color_option', array(
			'label'     => __('Footer Widget Background Color', 'kindergarten-playgroup'),
			'description' => __('It will change the complete footer widget backgorund color.', 'kindergarten-playgroup'),
			'section' => 'kindergarten_playgroup_footer_section',
			'settings' => 'kindergarten_playgroup_tp_footer_bg_color_option',
	)));
	
	$wp_customize->add_setting('kindergarten_playgroup_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'kindergarten_playgroup_footer_widget_image',array(
    'label' => __('Footer Widget Background Image','kindergarten-playgroup'),
    'section' => 'kindergarten_playgroup_footer_section'
	)));

	$wp_customize->add_setting( 'kindergarten_playgroup_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'kindergarten-playgroup' ),
		'section'     => 'kindergarten_playgroup_footer_section',
		'type'        => 'toggle',
		'settings'    => 'kindergarten_playgroup_return_to_header',
	) ) );

	// Add Settings and Controls for Scroll top
	$wp_customize->add_setting('kindergarten_playgroup_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'kindergarten_playgroup_sanitize_choices'
	));
	$wp_customize->add_control('kindergarten_playgroup_scroll_top_position',array(
     'type' => 'radio',
     'label'     => __('Scroll to top Position', 'kindergarten-playgroup'),
     'description'   => __('This option work for scroll to top', 'kindergarten-playgroup'),
     'section' => 'kindergarten_playgroup_footer_section',
     'choices' => array(
         'Right' => __('Right','kindergarten-playgroup'),
         'Left' => __('Left','kindergarten-playgroup'),
         'Center' => __('Center','kindergarten-playgroup')
     ),
	) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'kindergarten_playgroup_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'kindergarten_playgroup_customize_partial_blogdescription',
	) );

		$wp_customize->add_setting( 'kindergarten_playgroup_site_title_text', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	 ) );
	 $wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_site_title_text', array(
		 'label'       => esc_html__( 'Show / Hide Site Title', 'kindergarten-playgroup' ),
		 'section'     => 'title_tagline',
		 'type'        => 'toggle',
		 'settings'    => 'kindergarten_playgroup_site_title_text',
	 ) ) );

		$wp_customize->add_setting('kindergarten_playgroup_site_title_font_size',array(
			'default'	=> 25,
			'sanitize_callback'	=> 'kindergarten_playgroup_sanitize_number_absint'
		));
		$wp_customize->add_control('kindergarten_playgroup_site_title_font_size',array(
			'label'	=> __('Site Title Font Size in PX','kindergarten-playgroup'),
			'section'	=> 'title_tagline',
			'setting'	=> 'kindergarten_playgroup_site_title_font_size',
			'type'	=> 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 80,
			),
		));

		$wp_customize->add_setting( 'kindergarten_playgroup_tagline_text', array(
		 'default'           => false,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
	 ) );
	 $wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_tagline_text', array(
		 'label'       => esc_html__( 'Show / Hide Site Tagline', 'kindergarten-playgroup' ),
		 'section'     => 'title_tagline',
		 'type'        => 'toggle',
		 'settings'    => 'kindergarten_playgroup_tagline_text',
	 ) ) );

		// logo site tagline size
		$wp_customize->add_setting('kindergarten_playgroup_site_tagline_font_size',array(
			'default'	=> 15,
			'sanitize_callback'	=> 'kindergarten_playgroup_sanitize_number_absint'
		));
		$wp_customize->add_control('kindergarten_playgroup_site_tagline_font_size',array(
			'label'	=> __('Site Tagline Font Size in PX','kindergarten-playgroup'),
			'section'	=> 'title_tagline',
			'setting'	=> 'kindergarten_playgroup_site_tagline_font_size',
			'type'	=> 'number',
			'input_attrs' => array(
				'step'             => 1,
				'min'              => 0,
				'max'              => 50,
			),
		));

    $wp_customize->add_setting('kindergarten_playgroup_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'kindergarten_playgroup_sanitize_number_absint'
	));
	 $wp_customize->add_control('kindergarten_playgroup_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','kindergarten-playgroup'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('kindergarten_playgroup_logo_settings',array(
		'default' => 'Different Line',
		'sanitize_callback' => 'kindergarten_playgroup_sanitize_choices'
	));
   $wp_customize->add_control('kindergarten_playgroup_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'kindergarten-playgroup'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'kindergarten-playgroup'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','kindergarten-playgroup'),
            'Same Line' => __('Same Line','kindergarten-playgroup')
        ),
	) );

	$wp_customize->add_setting('kindergarten_playgroup_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'kindergarten_playgroup_sanitize_number_absint'
	));
	$wp_customize->add_control('kindergarten_playgroup_per_columns',array(
		'label'	=> __('Product Per Row','kindergarten-playgroup'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

	$wp_customize->add_setting('kindergarten_playgroup_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'kindergarten_playgroup_sanitize_number_absint'
	));
	$wp_customize->add_control('kindergarten_playgroup_product_per_page',array(
		'label'	=> __('Product Per Page','kindergarten-playgroup'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));

    
	$wp_customize->add_setting( 'kindergarten_playgroup_product_sidebar', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_product_sidebar', array(
			'label'       => esc_html__( 'Show / Hide Shop page sidebar', 'kindergarten-playgroup' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'kindergarten_playgroup_product_sidebar',
		) ) );

   
    $wp_customize->add_setting( 'kindergarten_playgroup_single_product_sidebar', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_single_product_sidebar', array(
			'label'       => esc_html__( 'Show / Hide Product page sidebar', 'kindergarten-playgroup' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'kindergarten_playgroup_single_product_sidebar',
		) ) );

    $wp_customize->add_setting( 'kindergarten_playgroup_related_product', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'kindergarten_playgroup_sanitize_checkbox',
		) );
		$wp_customize->add_control( new Kindergarten_Playgroup_Toggle_Control( $wp_customize, 'kindergarten_playgroup_related_product', array(
			'label'       => esc_html__( 'Show / Hide related product', 'kindergarten-playgroup' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'kindergarten_playgroup_related_product',
		) ) );
}
add_action( 'customize_register', 'kindergarten_playgroup_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Kindergarten Playgroup 1.0
 * @see kindergarten_playgroup_customize_register()
 *
 * @return void
 */
function kindergarten_playgroup_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Kindergarten Playgroup 1.0
 * @see kindergarten_playgroup_customize_register()
 *
 * @return void
 */
function kindergarten_playgroup_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'KINDERGARTEN_PLAYGROUP_PRO_THEME_NAME' ) ) {
	define( 'KINDERGARTEN_PLAYGROUP_PRO_THEME_NAME', esc_html__( 'Kindergarten Playgroup Pro', 'kindergarten-playgroup' ));
}
if ( ! defined( 'KINDERGARTEN_PLAYGROUP_PRO_THEME_URL' ) ) {
	define( 'KINDERGARTEN_PLAYGROUP_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/playgroup-wordpress-theme/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Kindergarten_Playgroup_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Kindergarten_Playgroup_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Kindergarten_Playgroup_Customize_Section_Pro(
				$manager,
				'kindergarten_playgroup_section_pro',
				array(
					'priority'   => 9,
					'title'    => KINDERGARTEN_PLAYGROUP_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'kindergarten-playgroup' ),
					'pro_url'  => esc_url( KINDERGARTEN_PLAYGROUP_PRO_THEME_URL, 'kindergarten-playgroup' ),
				)
			)
		);

		$manager->add_section(
			new Kindergarten_Playgroup_Customize_Section_Pro(
				$manager,
				'kindergarten_playgroup_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'kindergarten-playgroup' ),
					'pro_text' => esc_html__( 'Click Here', 'kindergarten-playgroup' ),
					'pro_url'  => esc_url( KINDERGARTEN_PLAYGROUP_DOCS_URL, 'kindergarten-playgroup'),
				)
			)
		);	
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'kindergarten-playgroup-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'kindergarten-playgroup-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Kindergarten_Playgroup_Customize::get_instance();
