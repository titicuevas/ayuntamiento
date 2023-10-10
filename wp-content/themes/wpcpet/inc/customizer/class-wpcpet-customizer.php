<?php
/**
 * WPCpet Customizer Class
 *
 * @package  wpcpet
 * @since    2.0.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPCpet_Customizer' ) ) :

	/**
	 * The WPCpet Customizer class
	 */
	class WPCpet_Customizer {
		/**
		 * Setup class.
		 *
		 * @since 1.0
		 */
		public function __construct() {
			add_action( 'customize_register', array( $this, 'customize_register' ), 10 );
			add_filter( 'body_class', array( $this, 'layout_class' ) );
			add_action( 'wp_enqueue_scripts', array( $this, 'add_customizer_css' ), 130 );
			add_action( 'customize_controls_print_styles', array( $this, 'customizer_custom_control_css' ) );
			add_action( 'customize_register', array( $this, 'edit_default_customizer_settings' ), 99 );
			add_action( 'enqueue_block_assets', array( $this, 'block_editor_customizer_css' ) );
			add_action( 'init', array( $this, 'default_theme_mod_values' ), 10 );
		}

		/**
		 * Returns an array of the desired default WPCpet Options
		 *
		 * @return array
		 */
		public function get_default_setting_values() {
			return apply_filters(
				'wpcpet_setting_default_values',
				$args = array(
					'wpcpet_primary_color'                 => '#EE8B18',
					'wpcpet_heading_color'                 => '#513A1F',
					'wpcpet_text_color'                    => '#7E7D7C',
					'wpcpet_accent_color'                  => '#513A1F',
					'wpcpet_accent_color_hover'            => '#EE8B18',
					'wpcpet_hero_heading_color'            => '#513A1F',
					'wpcpet_hero_text_color'               => '#7E7D7C',
					'wpcpet_header_background_color'       => '#ffffff',
					'wpcpet_header_text_color'             => '#7E7D7C',
					'wpcpet_header_link_color'             => '#513A1F',
					'wpcpet_header_link_color_hover'       => '#EE8B18',
					'wpcpet_submenu_background'            => '#FFEEDD',
					'wpcpet_footer_background_color'       => '#F5F5F5',
					'wpcpet_footer_heading_color'          => '#513A1F',
					'wpcpet_footer_text_color'             => '#7E7D7C',
					'wpcpet_footer_link_color'             => '#7E7D7C',
					'wpcpet_footer_link_hover_color'       => '#EE8B18',
					'wpcpet_button_background_color'       => '#EE8B18',
					'wpcpet_button_background_color_hover' => '#513A1F',
					'wpcpet_button_text_color'             => '#ffffff',
					'wpcpet_button_border_color'           => '#EE8B18',
					'wpcpet_button_alt_background_color'   => '#EE8B18',
					'wpcpet_button_alt_text_color'         => '#ffffff',
					'wpcpet_layout'                        => 'right',
					'background_color'                     => '#ffffff',
				)
			);
		}

		/**
		 * Adds a value to each WPCpet setting if one isn't already present.
		 *
		 * @uses get_default_setting_values()
		 */
		public function default_theme_mod_values() {
			foreach ( $this->get_default_setting_values() as $mod => $val ) {
				add_filter( 'theme_mod_' . $mod, array( $this, 'get_theme_mod_value' ), 10 );
			}
		}

		/**
		 * Get theme mod value.
		 *
		 * @param string $value Theme modification value.
		 *
		 * @return string
		 */
		public function get_theme_mod_value( $value ) {
			$key = substr( current_filter(), 10 );

			$set_theme_mods = get_theme_mods();

			if ( isset( $set_theme_mods[ $key ] ) ) {
				return $value;
			}

			$values = $this->get_default_setting_values();

			return isset( $values[ $key ] ) ? $values[ $key ] : $value;
		}

		/**
		 * Set Customizer setting defaults.
		 * These defaults need to be applied separately as child themes can filter wpcpet_setting_default_values
		 *
		 * @param array $wp_customize the Customizer object.
		 *
		 * @uses   get_default_setting_values()
		 */
		public function edit_default_customizer_settings( $wp_customize ) {
			foreach ( $this->get_default_setting_values() as $mod => $val ) {
				$wp_customize->get_setting( $mod )->default = $val;
			}
		}

		/**
		 * Add postMessage support for site title and description for the Theme Customizer along with several other settings.
		 *
		 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
		 *
		 * @since  1.0.0
		 */
		public function customize_register( $wp_customize ) {
			// Move background color setting alongside background image.
			$wp_customize->get_control( 'background_color' )->section  = 'background_image';
			$wp_customize->get_control( 'background_color' )->priority = 20;

			// Change background image section title & priority.
			$wp_customize->get_section( 'background_image' )->title    = __( 'Background', 'wpcpet' );
			$wp_customize->get_section( 'background_image' )->priority = 30;

			// Change header image section title & priority.
			$wp_customize->get_section( 'header_image' )->title    = __( 'Header', 'wpcpet' );
			$wp_customize->get_section( 'header_image' )->priority = 25;

			// Selective refresh.
			if ( function_exists( 'add_partial' ) ) {
				$wp_customize->get_setting( 'blogname' )->transport        = 'postMessage';
				$wp_customize->get_setting( 'blogdescription' )->transport = 'postMessage';

				$wp_customize->selective_refresh->add_partial(
					'custom_logo',
					array(
						'selector'        => '.site-branding',
						'render_callback' => array( $this, 'get_site_logo' ),
					)
				);

				$wp_customize->selective_refresh->add_partial(
					'blogname',
					array(
						'selector'        => '.site-title.beta a',
						'render_callback' => array( $this, 'get_site_name' ),
					)
				);

				$wp_customize->selective_refresh->add_partial(
					'blogdescription',
					array(
						'selector'        => '.site-description',
						'render_callback' => array( $this, 'get_site_description' ),
					)
				);
			}

			/**
			 * Custom controls
			 */
			require_once dirname( __FILE__ ) . '/class-wpcpet-customizer-control-radio-image.php';

			/**
			 * Add the typography section
			 */
			$wp_customize->add_section(
				'wpcpet_typography',
				array(
					'title'    => __( 'Typography', 'wpcpet' ),
					'priority' => 45,
				)
			);

			/**
			 * Primary color
			 */
			$wp_customize->add_setting(
				'wpcpet_primary_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_primary_color', '#EE8B18' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_primary_color',
					array(
						'label'    => __( 'Primary color', 'wpcpet' ),
						'section'  => 'wpcpet_typography',
						'settings' => 'wpcpet_primary_color',
						'priority' => 20,
					)
				)
			);

			/**
			 * Secondary color
			 */
			$wp_customize->add_setting(
				'wpcpet_submenu_background',
				array(
					'default'           => apply_filters( 'wpcpet_default_submenu_background', '#FFEEDD' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_submenu_background',
					array(
						'label'    => __( 'Submenu Background Color', 'wpcpet' ),
						'section'  => 'wpcpet_typography',
						'settings' => 'wpcpet_submenu_background',
						'priority' => 20,
					)
				)
			);

			/**
			 * Heading color
			 */
			$wp_customize->add_setting(
				'wpcpet_heading_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_heading_color', '#000000' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_heading_color',
					array(
						'label'    => __( 'Heading color', 'wpcpet' ),
						'section'  => 'wpcpet_typography',
						'settings' => 'wpcpet_heading_color',
						'priority' => 20,
					)
				)
			);

			/**
			 * Text Color
			 */
			$wp_customize->add_setting(
				'wpcpet_text_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_text_color', '#43454b' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_text_color',
					array(
						'label'    => __( 'Text color', 'wpcpet' ),
						'section'  => 'wpcpet_typography',
						'settings' => 'wpcpet_text_color',
						'priority' => 30,
					)
				)
			);

			/**
			 * Accent Color
			 */
			$wp_customize->add_setting(
				'wpcpet_accent_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_accent_color', '#000000' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_accent_color',
					array(
						'label'    => __( 'Link / accent color', 'wpcpet' ),
						'section'  => 'wpcpet_typography',
						'settings' => 'wpcpet_accent_color',
						'priority' => 40,
					)
				)
			);

			$wp_customize->add_setting(
				'wpcpet_accent_color_hover',
				array(
					'default'           => apply_filters( 'wpcpet_default_accent_color_hover', '#EE8B18' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_accent_color_hover',
					array(
						'label'    => __( 'Link / accent color hover', 'wpcpet' ),
						'section'  => 'wpcpet_typography',
						'settings' => 'wpcpet_accent_color_hover',
						'priority' => 45,
					)
				)
			);

			/**
			 * Hero Heading Color
			 */
			$wp_customize->add_setting(
				'wpcpet_hero_heading_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_hero_heading_color', '#000000' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_hero_heading_color',
					array(
						'label'    => __( 'Hero heading color', 'wpcpet' ),
						'section'  => 'wpcpet_typography',
						'settings' => 'wpcpet_hero_heading_color',
						'priority' => 50,
					)
				)
			);

			/**
			 * Hero Text Color
			 */
			$wp_customize->add_setting(
				'wpcpet_hero_text_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_hero_text_color', '#000000' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_hero_text_color',
					array(
						'label'    => __( 'Hero text color', 'wpcpet' ),
						'section'  => 'wpcpet_typography',
						'settings' => 'wpcpet_hero_text_color',
						'priority' => 60,
					)
				)
			);

			/**
			 * Header Background
			 */
			$wp_customize->add_setting(
				'wpcpet_header_background_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_header_background_color', '#ffffff' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);


			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_header_background_color',
					array(
						'label'    => __( 'Background color', 'wpcpet' ),
						'section'  => 'header_image',
						'settings' => 'wpcpet_header_background_color',
						'priority' => 15,
					)
				)
			);

			/**
			 * Header text color
			 */
			$wp_customize->add_setting(
				'wpcpet_header_text_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_header_text_color', '#7E7D7C' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_header_text_color',
					array(
						'label'    => __( 'Text color', 'wpcpet' ),
						'section'  => 'header_image',
						'settings' => 'wpcpet_header_text_color',
						'priority' => 20,
					)
				)
			);

			/**
			 * Header link color
			 */
			$wp_customize->add_setting(
				'wpcpet_header_link_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_header_link_color', '#000000' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_header_link_color',
					array(
						'label'    => __( 'Link color', 'wpcpet' ),
						'section'  => 'header_image',
						'settings' => 'wpcpet_header_link_color',
						'priority' => 30,
					)
				)
			);

			/**
			 * Header link color hover
			 */
			$wp_customize->add_setting(
				'wpcpet_header_link_color_hover',
				array(
					'default'           => apply_filters( 'wpcpet_default_header_link_color', '#EE8B18' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_header_link_color_hover',
					array(
						'label'    => __( 'Link color hover', 'wpcpet' ),
						'section'  => 'header_image',
						'settings' => 'wpcpet_header_link_color_hover',
						'priority' => 30,
					)
				)
			);

			/**
			 * Footer section
			 */
			$wp_customize->add_section(
				'wpcpet_footer',
				array(
					'title'       => __( 'Footer', 'wpcpet' ),
					'priority'    => 28,
					'description' => __( 'Customize the look & feel of your website footer.', 'wpcpet' ),
				)
			);

			/**
			 * Footer Background
			 */
			$wp_customize->add_setting(
				'wpcpet_footer_background_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_footer_background_color', '#F5F5F5' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_footer_background_color',
					array(
						'label'    => __( 'Background color', 'wpcpet' ),
						'section'  => 'wpcpet_footer',
						'settings' => 'wpcpet_footer_background_color',
						'priority' => 10,
					)
				)
			);

			/**
			 * Footer heading color
			 */
			$wp_customize->add_setting(
				'wpcpet_footer_heading_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_footer_heading_color', '#ffffff' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_footer_heading_color',
					array(
						'label'    => __( 'Heading color', 'wpcpet' ),
						'section'  => 'wpcpet_footer',
						'settings' => 'wpcpet_footer_heading_color',
						'priority' => 20,
					)
				)
			);

			/**
			 * Footer text color
			 */
			$wp_customize->add_setting(
				'wpcpet_footer_text_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_footer_text_color', '#7E7D7C' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_footer_text_color',
					array(
						'label'    => __( 'Text color', 'wpcpet' ),
						'section'  => 'wpcpet_footer',
						'settings' => 'wpcpet_footer_text_color',
						'priority' => 30,
					)
				)
			);

			/**
			 * Footer link color
			 */
			$wp_customize->add_setting(
				'wpcpet_footer_link_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_footer_link_color', '#7E7D7C' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_footer_link_color',
					array(
						'label'    => __( 'Link color', 'wpcpet' ),
						'section'  => 'wpcpet_footer',
						'settings' => 'wpcpet_footer_link_color',
						'priority' => 40,
					)
				)
			);

			/**
			 * Footer link hover color
			 */
			$wp_customize->add_setting(
				'wpcpet_footer_link_hover_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_footer_link_hover_color', '#513A1F' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_footer_link_hover_color',
					array(
						'label'    => __( 'Footer Link Hover color', 'wpcpet' ),
						'section'  => 'wpcpet_footer',
						'settings' => 'wpcpet_footer_link_hover_color',
						'priority' => 45,
					)
				)
			);

			/**
			 * Footer copyright text
			 */
			$wp_customize->add_setting(
				'wpcpet_footer_copyright_text',
				array(
					'default'           => __( 'Built with WPCpet & WooCommerce', 'wpcpet' ),
					'sanitize_callback' => 'sanitize_text_field',
				)
			);

			$wp_customize->add_control(
				'wpcpet_footer_copyright_text',
				array(
					'label'    => __( 'Copyright', 'wpcpet' ),
					'type'     => 'text',
					'section'  => 'wpcpet_footer',
					'priority' => 50,
				)
			);

			/**
			 * Buttons section
			 */
			$wp_customize->add_section(
				'wpcpet_buttons',
				array(
					'title'       => __( 'Buttons', 'wpcpet' ),
					'priority'    => 45,
					'description' => __( 'Customize the look & feel of your website buttons.', 'wpcpet' ),
				)
			);

			/**
			 * Button background color
			 */
			$wp_customize->add_setting(
				'wpcpet_button_background_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_button_background_color', '#EE8B18' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_button_background_color',
					array(
						'label'    => __( 'Background color', 'wpcpet' ),
						'section'  => 'wpcpet_buttons',
						'settings' => 'wpcpet_button_background_color',
						'priority' => 10,
					)
				)
			);

			/**
			 * Button background color hover
			 */
			$wp_customize->add_setting(
				'wpcpet_button_background_color_hover',
				array(
					'default'           => apply_filters( 'wpcpet_default_button_background_color_hover', '#000000' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_button_background_color_hover',
					array(
						'label'    => __( 'Background color hover', 'wpcpet' ),
						'section'  => 'wpcpet_buttons',
						'settings' => 'wpcpet_button_background_color_hover',
						'priority' => 10,
					)
				)
			);

			/**
			 * Button text color
			 */
			$wp_customize->add_setting(
				'wpcpet_button_text_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_button_text_color', '#ffffff' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_button_text_color',
					array(
						'label'    => __( 'Text color', 'wpcpet' ),
						'section'  => 'wpcpet_buttons',
						'settings' => 'wpcpet_button_text_color',
						'priority' => 20,
					)
				)
			);

			/**
			 * Button text color
			 */
			$wp_customize->add_setting(
				'wpcpet_button_border_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_button_border_color', '#EE8B18' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_button_border_color',
					array(
						'label'    => __( 'Border color', 'wpcpet' ),
						'section'  => 'wpcpet_buttons',
						'settings' => 'wpcpet_button_border_color',
						'priority' => 20,
					)
				)
			);

			/**
			 * Button alt background color
			 */
			$wp_customize->add_setting(
				'wpcpet_button_alt_background_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_button_alt_background_color', '#EE8B18' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_button_alt_background_color',
					array(
						'label'    => __( 'Alternate button background color', 'wpcpet' ),
						'section'  => 'wpcpet_buttons',
						'settings' => 'wpcpet_button_alt_background_color',
						'priority' => 30,
					)
				)
			);

			/**
			 * Button alt text color
			 */
			$wp_customize->add_setting(
				'wpcpet_button_alt_text_color',
				array(
					'default'           => apply_filters( 'wpcpet_default_button_alt_text_color', '#ffffff' ),
					'sanitize_callback' => 'sanitize_hex_color',
				)
			);

			$wp_customize->add_control(
				new WP_Customize_Color_Control(
					$wp_customize,
					'wpcpet_button_alt_text_color',
					array(
						'label'    => __( 'Alternate button text color', 'wpcpet' ),
						'section'  => 'wpcpet_buttons',
						'settings' => 'wpcpet_button_alt_text_color',
						'priority' => 40,
					)
				)
			);

			/**
			 * Layout
			 */
			$wp_customize->add_section(
				'wpcpet_layout',
				array(
					'title'    => __( 'Layout', 'wpcpet' ),
					'priority' => 50,
				)
			);

			$wp_customize->add_setting(
				'wpcpet_layout',
				array(
					'default'           => apply_filters( 'wpcpet_default_layout', $layout = is_rtl() ? 'left' : 'right' ),
					'sanitize_callback' => 'wpcpet_sanitize_choices',
				)
			);
		}

		/**
		 * Get all of the WPCpet theme mods.
		 *
		 * @return array $wpcpet_theme_mods The WPCpet Theme Mods.
		 */
		public function get_theme_mods() {
			$wpcpet_theme_mods = array(
				'background_color'              => wpcpet_get_content_background_color(),
				'accent_color'                  => get_theme_mod( 'wpcpet_accent_color' ),
				'accent_color_hover'            => get_theme_mod( 'wpcpet_accent_color_hover' ),
				'hero_heading_color'            => get_theme_mod( 'wpcpet_hero_heading_color' ),
				'hero_text_color'               => get_theme_mod( 'wpcpet_hero_text_color' ),
				'header_background_color'       => get_theme_mod( 'wpcpet_header_background_color' ),
				'header_link_color'             => get_theme_mod( 'wpcpet_header_link_color' ),
				'header_link_color_hover'       => get_theme_mod( 'wpcpet_header_link_color_hover' ),
				'header_text_color'             => get_theme_mod( 'wpcpet_header_text_color' ),
				'submenu_background'            => get_theme_mod( 'wpcpet_submenu_background' ),
				'footer_background_color'       => get_theme_mod( 'wpcpet_footer_background_color' ),
				'footer_link_color'             => get_theme_mod( 'wpcpet_footer_link_color' ),
				'footer_link_hover_color'       => get_theme_mod( 'wpcpet_footer_link_hover_color' ),
				'footer_heading_color'          => get_theme_mod( 'wpcpet_footer_heading_color' ),
				'footer_text_color'             => get_theme_mod( 'wpcpet_footer_text_color' ),
				'text_color'                    => get_theme_mod( 'wpcpet_text_color' ),
				'heading_color'                 => get_theme_mod( 'wpcpet_heading_color' ),
				'primary_color'                 => get_theme_mod( 'wpcpet_primary_color' ),
				'secondary_color'               => get_theme_mod( 'wpcpet_secondary_color' ),
				'button_background_color'       => get_theme_mod( 'wpcpet_button_background_color' ),
				'button_background_color_hover' => get_theme_mod( 'wpcpet_button_background_color_hover' ),
				'button_text_color'             => get_theme_mod( 'wpcpet_button_text_color' ),
				'button_border_color'           => get_theme_mod( 'wpcpet_button_border_color' ),
				'button_alt_background_color'   => get_theme_mod( 'wpcpet_button_alt_background_color' ),
				'button_alt_text_color'         => get_theme_mod( 'wpcpet_button_alt_text_color' ),
			);

			return apply_filters( 'wpcpet_theme_mods', $wpcpet_theme_mods );
		}

		/**
		 * Get Customizer css.
		 *
		 * @return array $styles the css
		 * @see get_theme_mods()
		 */
		public function get_css() {
			$wpcpet_theme_mods = $this->get_theme_mods();

			$styles = '
                body {
                    --primary:' . $wpcpet_theme_mods['primary_color'] . ';
                    --secondary_color:' . $wpcpet_theme_mods['secondary_color'] . ';
                    --background:' . $wpcpet_theme_mods['background_color'] . ';
                    --accent:' . $wpcpet_theme_mods['accent_color'] . ';
                    --accent_hover:' . $wpcpet_theme_mods['accent_color_hover'] . ';
                    --hero_heading:' . $wpcpet_theme_mods['hero_heading_color'] . ';
                    --hero_text:' . $wpcpet_theme_mods['hero_text_color'] . ';
                    --header_background:' . $wpcpet_theme_mods['header_background_color'] . ';
                    --header_link:' . $wpcpet_theme_mods['header_link_color'] . ';
                    --header_link_hover:' . $wpcpet_theme_mods['header_link_color_hover'] . ';
                    --header_text:' . $wpcpet_theme_mods['header_text_color'] . ';
                    --submenu_background:' . $wpcpet_theme_mods['submenu_background'] . ';
                    --footer_background:' . $wpcpet_theme_mods['footer_background_color'] . ';
                    --footer_link:' . $wpcpet_theme_mods['footer_link_color'] . ';
                    --footer_link_hover:' . $wpcpet_theme_mods['footer_link_hover_color'] . ';
                    --footer_heading:' . $wpcpet_theme_mods['footer_heading_color'] . ';
                    --footer_text:' . $wpcpet_theme_mods['footer_text_color'] . ';
                    --text:' . $wpcpet_theme_mods['text_color'] . ';
                    --heading:' . $wpcpet_theme_mods['heading_color'] . ';
                    --button_background:' . $wpcpet_theme_mods['button_background_color'] . ';
                    --button_background_hover:' . $wpcpet_theme_mods['button_background_color_hover'] . ';
                    --button_text:' . $wpcpet_theme_mods['button_text_color'] . ';
                    --button_border:' . $wpcpet_theme_mods['button_border_color'] . ';
                    --button_alt_background:' . $wpcpet_theme_mods['button_alt_background_color'] . ';
                    --button_alt_text:' . $wpcpet_theme_mods['button_alt_text_color'] . ';
                }';

			return apply_filters( 'wpcpet_customizer_css', $styles );
		}

		/**
		 * Enqueue dynamic colors to use editor blocks.
		 *
		 * @since 2.4.0
		 */
		public function block_editor_customizer_css() {
			$wpcpet_theme_mods = $this->get_theme_mods();

			$styles = '';

			if ( is_admin() ) {
				$styles .= '
				.editor-styles-wrapper {
					background-color: ' . $wpcpet_theme_mods['background_color'] . ';
				}

				.editor-styles-wrapper table:not( .has-background ) th {
					background-color: ' . wpcpet_adjust_color_brightness( $wpcpet_theme_mods['background_color'], - 7 ) . ';
				}

				.editor-styles-wrapper table:not( .has-background ) tbody td {
					background-color: ' . wpcpet_adjust_color_brightness( $wpcpet_theme_mods['background_color'], - 2 ) . ';
				}

				.editor-styles-wrapper table:not( .has-background ) tbody tr:nth-child(2n) td,
				.editor-styles-wrapper fieldset,
				.editor-styles-wrapper fieldset legend {
					background-color: ' . wpcpet_adjust_color_brightness( $wpcpet_theme_mods['background_color'], - 4 ) . ';
				}

				.editor-post-title__block .editor-post-title__input,
				.editor-styles-wrapper h1,
				.editor-styles-wrapper h2,
				.editor-styles-wrapper h3,
				.editor-styles-wrapper h4,
				.editor-styles-wrapper h5,
				.editor-styles-wrapper h6 {
					color: ' . $wpcpet_theme_mods['heading_color'] . ';
				}

				/* WP <=5.3 */
				.editor-styles-wrapper .editor-block-list__block,
				/* WP >=5.4 */
				.editor-styles-wrapper .block-editor-block-list__block {
					color: ' . $wpcpet_theme_mods['text_color'] . ';
				}

				.editor-styles-wrapper a,
				.wp-block-freeform.block-library-rich-text__tinymce a {
					color: ' . $wpcpet_theme_mods['accent_color'] . ';
				}

				.editor-styles-wrapper a:focus,
				.wp-block-freeform.block-library-rich-text__tinymce a:focus {
					outline-color: ' . $wpcpet_theme_mods['accent_color'] . ';
				}

				body.post-type-post .editor-post-title__block::after {
					content: "";
				}';
			}

			wp_add_inline_style( 'wpcpet-gutenberg-blocks', apply_filters( 'wpcpet_gutenberg_block_editor_customizer_css', $styles ) );
		}

		/**
		 * Add CSS in <head> for styles handled by the theme customizer
		 *
		 * @return void
		 * @since 1.0.0
		 */
		public function add_customizer_css() {
			wp_add_inline_style( 'wpcpet-style', $this->get_css() );
		}

		/**
		 * Layout classes
		 * Adds 'right-sidebar' and 'left-sidebar' classes to the body tag
		 *
		 * @param array $classes current body classes.
		 *
		 * @return string[]          modified body classes
		 * @since  1.0.0
		 */
		public function layout_class( $classes ) {
			$left_or_right = get_theme_mod( 'wpcpet_layout' );

			$classes[] = $left_or_right . '-sidebar';

			return $classes;
		}

		/**
		 * Add CSS for custom controls
		 *
		 * This function incorporates CSS from the Kirki Customizer Framework
		 *
		 * The Kirki Customizer Framework, Copyright Aristeides Stathopoulos (@aristath),
		 * is licensed under the terms of the GNU GPL, Version 2 (or later)
		 *
		 * @link https://github.com/reduxframework/kirki/
		 * @since  1.5.0
		 */
		public function customizer_custom_control_css() {
			?>
          <style>
              .customize-control-wpcpet-radio-image input[type=radio] {
                  display: none;
              }

              .customize-control-wpcpet-radio-image label {
                  display: block;
                  width: 48%;
                  float: left;
                  margin-right: 4%;
              }

              .customize-control-wpcpet-radio-image label:nth-of-type(2n) {
                  margin-right: 0;
              }

              .customize-control-wpcpet-radio-image img {
                  opacity: .5;
              }

              .customize-control-wpcpet-radio-image input[type=radio]:checked + label img,
              .customize-control-wpcpet-radio-image img:hover {
                  opacity: 1;
              }

          </style>
			<?php
		}

		/**
		 * Get site logo.
		 *
		 * @return string
		 * @since 2.1.5
		 */
		public function get_site_logo() {
			return wpcpet_site_title_or_logo( false );
		}

		/**
		 * Get site name.
		 *
		 * @return string
		 * @since 2.1.5
		 */
		public function get_site_name() {
			return get_bloginfo( 'name', 'display' );
		}

		/**
		 * Get site description.
		 *
		 * @return string
		 * @since 2.1.5
		 */
		public function get_site_description() {
			return get_bloginfo( 'description', 'display' );
		}
	}

endif;

return new WPCpet_Customizer();
