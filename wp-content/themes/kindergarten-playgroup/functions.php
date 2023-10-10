<?php
/**
 * Kindergarten Playgroup functions and definitions
 *
 * @package Kindergarten Playgroup
 * @subpackage kindergarten_playgroup
 */

function kindergarten_playgroup_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'kindergarten-playgroup-featured-image', 2000, 1200, true );
	add_image_size( 'kindergarten-playgroup-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'    => __( 'Primary Menu', 'kindergarten-playgroup' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-width'	=> true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', kindergarten_playgroup_fonts_url() ) );
}
add_action( 'after_setup_theme', 'kindergarten_playgroup_setup' );

/**
 * Register custom fonts.
 */
function kindergarten_playgroup_fonts_url(){
	$font_url = '';
	$font_family = array();
	$font_family[] = 'Outfit:wght@100;200;300;400;500;600;700;800;900';
	$font_family[] = 'Inter:wght@100;200;300;400;500;600;700;800;900';
	$query_args = array(
		'family'	=> rawurlencode(implode('|',$font_family)),
	);
	$font_url = add_query_arg($query_args,'//fonts.googleapis.com/css');
	return $font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $fonts_url ) );
}

/**
 * Register widget area.
 */
function kindergarten_playgroup_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'kindergarten-playgroup' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'kindergarten-playgroup' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'kindergarten-playgroup' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'kindergarten-playgroup' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'kindergarten-playgroup' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'kindergarten-playgroup' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'kindergarten-playgroup' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'kindergarten-playgroup' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'kindergarten-playgroup' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'kindergarten-playgroup' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'kindergarten-playgroup' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'kindergarten-playgroup' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'kindergarten-playgroup' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'kindergarten-playgroup' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'kindergarten_playgroup_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function kindergarten_playgroup_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'kindergarten-playgroup-fonts', kindergarten_playgroup_fonts_url(), array(), null );

	// Bootstrap
	wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	//Bootstrap.min.css
	wp_enqueue_style( 'bootstrap-style', get_template_directory_uri().'/assets/css/bootstrap.min.css' );

	// Theme stylesheet.
	wp_enqueue_style( 'kindergarten-playgroup-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-theme-color.php' );
	wp_add_inline_style( 'kindergarten-playgroup-style',$kindergarten_playgroup_tp_theme_css );
	require get_parent_theme_file_path( '/tp-body-width-layout.php' );
	wp_add_inline_style( 'kindergarten-playgroup-style',$kindergarten_playgroup_tp_theme_css );

	// Theme block stylesheet.
	wp_enqueue_style( 'kindergarten-playgroup-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'kindergarten-playgroup-style' ), '1.0' );

	// Fontawesome
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/assets/css/fontawesome-all.css' ) );

	wp_enqueue_script( 'bootstrap-js', get_theme_file_uri( '/assets/js/bootstrap.js' ), array( 'jquery' ), true );

	wp_enqueue_script( 'kindergarten-playgroup-custom-scripts',( get_template_directory_uri() ) . '/assets/js/kindergarten-playgroup-custom.js', array('jquery'), true);

	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js',array('jquery'),'',true);

	wp_enqueue_script( 'kindergarten-playgroup-focus-nav',( get_template_directory_uri() ) . '/assets/js/focus-nav.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'kindergarten_playgroup_scripts' );

//Admin Enqueue for Admin
function kindergarten_playgroup_admin_enqueue_scripts(){
	wp_enqueue_style('kindergarten-playgroup-admin-style', esc_url( get_template_directory_uri() ) . '/assets/css/admin.css');
	wp_enqueue_script( 'kindergarten-playgroup-custom-scripts', esc_url( get_template_directory_uri() ). '/assets/js/custom.js', array('jquery'), true);
}
add_action( 'admin_enqueue_scripts', 'kindergarten_playgroup_admin_enqueue_scripts' );

function kindergarten_playgroup_activation_notice() { ?>
    <div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="kindergarten-playgroup-getting-started-notice clearfix">
            <div class="kindergarten-playgroup-theme-notice-content">
                <h2 class="kindergarten-playgroup-notice-h2">
                    <?php
                printf(
                /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                    esc_html__( 'Welcome! Thank you for choosing %1$s!', 'kindergarten-playgroup' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                ?>
                </h2>

                <p class="plugin-install-notice"><?php echo sprintf(__('Click here to get started with the theme set-up.', 'kindergarten-playgroup')) ?></p>

                <a class="kindergarten-playgroup-btn-get-started button button-primary button-hero kindergarten-playgroup-button-padding" href="<?php echo esc_url( admin_url( 'themes.php?page=kindergarten-playgroup-about' )); ?>" ><?php esc_html_e( 'Get started', 'kindergarten-playgroup' ) ?></a><span class="kindergarten-playgroup-push-down">
                <?php
                    /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                    printf(
                        'or %1$sCustomize theme%2$s</a></span>',
                        '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                        '</a>'
                    );
                ?>
            </div>
        </div>
    </div>
<?php }

add_action( 'admin_notices', 'kindergarten_playgroup_activation_notice' );

define('KINDERGARTEN_PLAYGROUP_CREDIT',__('https://www.themespride.com/themes/free-Kindergarten-wordpress-theme/','kindergarten-playgroup') );
if ( ! function_exists( 'kindergarten_playgroup_credit' ) ) {
	function kindergarten_playgroup_credit(){
		echo "<a href=".esc_url(KINDERGARTEN_PLAYGROUP_CREDIT)." target='_blank'>".esc_html__('Kindergarten WordPress Theme','kindergarten-playgroup')."</a>";
	}
}

/*radio button sanitization*/
function kindergarten_playgroup_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

/* Excerpt Limit Begin */
function kindergarten_playgroup_string_limit_words($string, $word_limit) {
	$words = explode(' ', $string, ($word_limit + 1));
	if(count($words) > $word_limit)
	array_pop($words);
	return implode(' ', $words);
}

function kindergarten_playgroup_sanitize_dropdown_pages( $page_id, $setting ) {
  // Ensure $input is an absolute integer.
  $page_id = absint( $page_id );
  // If $page_id is an ID of a published page, return it; otherwise, return the default.
  return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}

// Change number or products per row to 3
add_filter('loop_shop_columns', 'kindergarten_playgroup_loop_columns');
if (!function_exists('kindergarten_playgroup_loop_columns')) {
	function kindergarten_playgroup_loop_columns() {
		$columns = get_theme_mod( 'kindergarten_playgroup_per_columns', 3 );
		return $columns;
	}
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'kindergarten_playgroup_per_page', 20 );
function kindergarten_playgroup_per_page( $cols ) {
  	$cols = get_theme_mod( 'kindergarten_playgroup_product_per_page', 9 );
	return $cols;
}

function kindergarten_playgroup_sanitize_number_range( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

function kindergarten_playgroup_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function kindergarten_playgroup_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function kindergarten_playgroup_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template','kindergarten_playgroup_front_page_template' );


/**
 * Logo Custamization.
 */

function kindergarten_playgroup_logo_width(){

	$kindergarten_playgroup_logo_width   = get_theme_mod( 'kindergarten_playgroup_logo_width', 150 );

	echo "<style type='text/css' media='all'>"; ?>
		img.custom-logo{
		    width: <?php echo absint( $kindergarten_playgroup_logo_width ); ?>px;
		    max-width: 100%;
		}
	<?php echo "</style>";
}

add_action( 'wp_head', 'kindergarten_playgroup_logo_width' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Load Theme Web File
 */
require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * Load Theme About Page
 */
require get_parent_theme_file_path( '/inc/about-theme.php' );
/**
 * Load toggle control
 */
require get_parent_theme_file_path( '/inc/customize-control-toggle.php' );


// offer Meta
function kindergarten_playgroup_bn_custom_meta_offer() {
    add_meta_box( 'bn_meta', __( 'Classes Details', 'kindergarten-playgroup' ), 'kindergarten_playgroup_meta_callback_detail_offer', 'post', 'normal', 'high' );
}
/* Hook things in for admin*/
if (is_admin()){
  add_action('admin_menu', 'kindergarten_playgroup_bn_custom_meta_offer');
}

function kindergarten_playgroup_meta_callback_detail_offer( $post ) {
    wp_nonce_field( basename( __FILE__ ), 'kindergarten_playgroup_offer_trip_meta_nonce' );
    $bn_stored_meta = get_post_meta( $post->ID );
    $kindergarten_playgroup_age_criteria = get_post_meta( $post->ID, 'kindergarten_playgroup_age_criteria', true );
    $kindergarten_playgroup_timmings = get_post_meta( $post->ID, 'kindergarten_playgroup_timmings', true );
	$kindergarten_playgroup_price = get_post_meta( $post->ID, 'kindergarten_playgroup_price', true );
	$kindergarten_playgroup_video = get_post_meta( $post->ID, 'kindergarten_playgroup_video', true );
    ?>
    <div id="testimonials_custom_stuff">
        <table id="list">
            <tbody id="the-list" data-wp-lists="list:meta">
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Age Criteria', 'kindergarten-playgroup' ); ?>
                    </td>
                    <td class="left">
                        <input type="text" name="kindergarten_playgroup_age_criteria" id="kindergarten_playgroup_age_criteria" value="<?php echo esc_attr($kindergarten_playgroup_age_criteria); ?>" />
                    </td>
                </tr>
                <tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Timmings', 'kindergarten-playgroup' ); ?>
                    </td>
                    <td class="left">
                        <input type="text" name="kindergarten_playgroup_timmings" id="kindergarten_playgroup_timmings" value="<?php echo esc_attr($kindergarten_playgroup_timmings); ?>" />
                    </td>
                </tr>
								<tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Price', 'kindergarten-playgroup' ); ?>
                    </td>
                    <td class="left">
                        <input type="text" name="kindergarten_playgroup_price" id="kindergarten_playgroup_price" value="<?php echo esc_attr($kindergarten_playgroup_price); ?>" />
                    </td>
                </tr>
								<tr id="meta-8">
                    <td class="left">
                        <?php esc_html_e( 'Video URL', 'kindergarten-playgroup' )?>
                    </td>
                    <td class="left">
                        <input type="text" name="kindergarten_playgroup_video" id="kindergarten_playgroup_video" value="<?php echo esc_attr($kindergarten_playgroup_video); ?>" />
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <?php
}

/* Saves the custom meta input */
function kindergarten_playgroup_bn_metadesig_save( $post_id ) {
    if (!isset($_POST['kindergarten_playgroup_offer_trip_meta_nonce']) || !wp_verify_nonce( strip_tags( wp_unslash( $_POST['kindergarten_playgroup_offer_trip_meta_nonce']) ), basename(__FILE__))) {
        return;
    }

    if (!current_user_can('edit_post', $post_id)) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
        return;
    }

    // Save sqlite_create_aggregate
    if( isset( $_POST[ 'kindergarten_playgroup_age_criteria' ] ) ) {
        update_post_meta( $post_id, 'kindergarten_playgroup_age_criteria', strip_tags( wp_unslash( $_POST[ 'kindergarten_playgroup_age_criteria' ]) ) );
    }
    // Save Timmings
    if( isset( $_POST[ 'kindergarten_playgroup_timmings' ] ) ) {
        update_post_meta( $post_id, 'kindergarten_playgroup_timmings', strip_tags( wp_unslash( $_POST[ 'kindergarten_playgroup_timmings' ]) ) );
    }
		// Save Price
    if( isset( $_POST[ 'kindergarten_playgroup_price' ] ) ) {
        update_post_meta( $post_id, 'kindergarten_playgroup_price', strip_tags( wp_unslash( $_POST[ 'kindergarten_playgroup_price' ]) ) );
    }
		// Save Price
    if( isset( $_POST[ 'kindergarten_playgroup_video' ] ) ) {
        update_post_meta( $post_id, 'kindergarten_playgroup_video', strip_tags( wp_unslash( $_POST[ 'kindergarten_playgroup_video' ]) ) );
    }
}
add_action( 'save_post', 'kindergarten_playgroup_bn_metadesig_save' );
