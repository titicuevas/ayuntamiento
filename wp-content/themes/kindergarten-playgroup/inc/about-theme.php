<?php
/**
 * Kindergarten Playgroup Theme Page
 *
 * @package Kindergarten Playgroup
 */

function kindergarten_playgroup_admin_scripts() {
	wp_dequeue_script('kindergarten-playgroup-custom-scripts');
}
add_action( 'admin_enqueue_scripts', 'kindergarten_playgroup_admin_scripts' );

if ( ! defined( 'KINDERGARTEN_PLAYGROUP_FREE_THEME_URL' ) ) {
	define( 'KINDERGARTEN_PLAYGROUP_FREE_THEME_URL', 'https://www.themespride.com/themes/free-Kindergarten-wordpress-theme/' );
}
if ( ! defined( 'KINDERGARTEN_PLAYGROUP_PRO_THEME_URL' ) ) {
	define( 'KINDERGARTEN_PLAYGROUP_PRO_THEME_URL', 'https://www.themespride.com/themes/playgroup-wordpress-theme/' );
}
if ( ! defined( 'KINDERGARTEN_PLAYGROUP_DEMO_THEME_URL' ) ) {
	define( 'KINDERGARTEN_PLAYGROUP_DEMO_THEME_URL', 'https://www.themespride.com/kindergarten-playgroup-pro/' );
}
if ( ! defined( 'KINDERGARTEN_PLAYGROUP_DOCS_THEME_URL' ) ) {
    define( 'KINDERGARTEN_PLAYGROUP_DOCS_THEME_URL', 'https://www.themespride.com/demo/docs/kindergarten-playgroup/' );
}
if ( ! defined( 'KINDERGARTEN_PLAYGROUP_DOCS_URL' ) ) {
    define( 'KINDERGARTEN_PLAYGROUP_DOCS_URL', 'https://www.themespride.com/demo/docs/kindergarten-playgroup/' );
}
if ( ! defined( 'KINDERGARTEN_PLAYGROUP_RATE_THEME_URL' ) ) {
    define( 'KINDERGARTEN_PLAYGROUP_RATE_THEME_URL', 'https://wordpress.org/support/theme/kindergarten-playgroup/reviews/#new-post' );
}
if ( ! defined( 'KINDERGARTEN_PLAYGROUP_CHANGELOG_THEME_URL' ) ) {
    define( 'KINDERGARTEN_PLAYGROUP_CHANGELOG_THEME_URL', get_template_directory() . '/readme.txt' );
}
if ( ! defined( 'KINDERGARTEN_PLAYGROUP_SUPPORT_THEME_URL' ) ) {
    define( 'KINDERGARTEN_PLAYGROUP_SUPPORT_THEME_URL', 'https://wordpress.org/support/theme/kindergarten-playgroup/' );
}

/**
 * Add theme page
 */
function kindergarten_playgroup_menu() {
	add_theme_page( esc_html__( 'About Theme', 'kindergarten-playgroup' ), esc_html__( 'About Theme', 'kindergarten-playgroup' ), 'edit_theme_options', 'kindergarten-playgroup-about', 'kindergarten_playgroup_about_display' );
}
add_action( 'admin_menu', 'kindergarten_playgroup_menu' );

/**
 * Display About page
 */
function kindergarten_playgroup_about_display() {
	$kindergarten_playgroup_theme = wp_get_theme();
	?>
	<div class="wrap about-wrap full-width-layout">
		<h1><?php echo esc_html( $kindergarten_playgroup_theme ); ?></h1>
		<div class="about-theme">
			<div class="theme-description">
				<p class="about-text">
					<?php
					// Remove last sentence of description.
					$kindergarten_playgroup_description = explode( '. ', $kindergarten_playgroup_theme->get( 'Description' ) );

					array_pop( $kindergarten_playgroup_description );

					$kindergarten_playgroup_description = implode( '. ', $kindergarten_playgroup_description );

					echo esc_html( $kindergarten_playgroup_description . '.' );
				?></p>
				<p class="actions">
					<a href="<?php echo esc_url( KINDERGARTEN_PLAYGROUP_FREE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Info', 'kindergarten-playgroup' ); ?></a>

					<a href="<?php echo esc_url( KINDERGARTEN_PLAYGROUP_DEMO_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'View Demo', 'kindergarten-playgroup' ); ?></a>

					<a href="<?php echo esc_url( KINDERGARTEN_PLAYGROUP_DOCS_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Theme Instructions', 'kindergarten-playgroup' ); ?></a>

					<a href="<?php echo esc_url( KINDERGARTEN_PLAYGROUP_RATE_THEME_URL ); ?>" class="button button-secondary" target="_blank"><?php esc_html_e( 'Rate this theme', 'kindergarten-playgroup' ); ?></a>

					<a href="<?php echo esc_url( KINDERGARTEN_PLAYGROUP_PRO_THEME_URL ); ?>" class="green button button-secondary" target="_blank"><?php esc_html_e( 'Upgrade to pro', 'kindergarten-playgroup' ); ?></a>
				</p>
			</div>

			<div class="theme-screenshot">
				<img src="<?php echo esc_url( $kindergarten_playgroup_theme->get_screenshot() ); ?>" />
			</div>

		</div>

		<nav class="nav-tab-wrapper wp-clearfix" aria-label="<?php esc_attr_e( 'Secondary menu', 'kindergarten-playgroup' ); ?>">
			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'kindergarten-playgroup-about' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['page'] ) && 'kindergarten-playgroup-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'About', 'kindergarten-playgroup' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'kindergarten-playgroup-about', 'tab' => 'free_vs_pro' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Compare free Vs Pro', 'kindergarten-playgroup' ); ?></a>

			<a href="<?php echo esc_url( admin_url( add_query_arg( array( 'page' => 'kindergarten-playgroup-about', 'tab' => 'changelog' ), 'themes.php' ) ) ); ?>" class="nav-tab<?php echo ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) ?' nav-tab-active' : ''; ?>"><?php esc_html_e( 'Changelog', 'kindergarten-playgroup' ); ?></a>
		</nav>

		<?php
			kindergarten_playgroup_main_screen();

			kindergarten_playgroup_changelog_screen();

			kindergarten_playgroup_free_vs_pro();
		?>

		<div class="return-to-dashboard">
			<?php if ( current_user_can( 'update_core' ) && isset( $_GET['updated'] ) ) : ?>
				<a href="<?php echo esc_url( self_admin_url( 'update-core.php' ) ); ?>">
					<?php is_multisite() ? esc_html_e( 'Return to Updates', 'kindergarten-playgroup' ) : esc_html_e( 'Return to Dashboard &rarr; Updates', 'kindergarten-playgroup' ); ?>
				</a> |
			<?php endif; ?>
			<a href="<?php echo esc_url( self_admin_url() ); ?>"><?php is_blog_admin() ? esc_html_e( 'Go to Dashboard &rarr; Home', 'kindergarten-playgroup' ) : esc_html_e( 'Go to Dashboard', 'kindergarten-playgroup' ); ?></a>
		</div>
	</div>
	<?php
}

/**
 * Output the main about screen.
 */
function kindergarten_playgroup_main_screen() {
	if ( isset( $_GET['page'] ) && 'kindergarten-playgroup-about' === $_GET['page'] && ! isset( $_GET['tab'] ) ) {
	?>
		<div class="feature-section two-col">
			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Theme Customizer', 'kindergarten-playgroup' ); ?></h2>
				<p><?php esc_html_e( 'All Theme Options are available via Customize screen.', 'kindergarten-playgroup' ) ?></p>
				<p><a href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" class="button button-primary"><?php esc_html_e( 'Customize', 'kindergarten-playgroup' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Got theme support question?', 'kindergarten-playgroup' ); ?></h2>
				<p><?php esc_html_e( 'Get genuine support from genuine people. Whether it\'s customization or compatibility, our seasoned developers deliver tailored solutions to your queries.', 'kindergarten-playgroup' ) ?></p>
				<p><a href="<?php echo esc_url( KINDERGARTEN_PLAYGROUP_SUPPORT_THEME_URL ); ?>" class="button button-primary"><?php esc_html_e( 'Support Forum', 'kindergarten-playgroup' ); ?></a></p>
			</div>

			<div class="col card">
				<h2 class="title"><?php esc_html_e( 'Upgrade To Premium With Straight 20% OFF.', 'kindergarten-playgroup' ); ?></h2>
				<p><?php esc_html_e( 'Get our amazing WordPress theme with exclusive 20% off use the coupon', 'kindergarten-playgroup' ) ?>"<input type="text" value="GETPro20" id="myInput">".</p>
				<button class="button button-primary" onclick="kindergarten_playgroup_text_copyied()"><?php esc_html_e( 'GETPro20', 'kindergarten-playgroup' ); ?></button>
			</div>
		</div>
	<?php
	}
}

/**
 * Output the changelog screen.
 */
function kindergarten_playgroup_changelog_screen() {
	if ( isset( $_GET['tab'] ) && 'changelog' === $_GET['tab'] ) {
		global $wp_filesystem;
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View changelog below:', 'kindergarten-playgroup' ); ?></p>

			<?php
				$changelog_file = apply_filters( 'kindergarten_playgroup_changelog_file', KINDERGARTEN_PLAYGROUP_CHANGELOG_THEME_URL );

				// Check if the changelog file exists and is readable.
				if ( $changelog_file && is_readable( $changelog_file ) ) {
					WP_Filesystem();
					$changelog = $wp_filesystem->get_contents( $changelog_file );
					$changelog_list = kindergarten_playgroup_parse_changelog( $changelog );

					echo wp_kses_post( $changelog_list );
				}
			?>
		</div>
	<?php
	}
}

/**
 * Parse changelog from readme file.
 * @param  string $content
 * @return string
 */
function kindergarten_playgroup_parse_changelog( $content ) {
	// Explode content with ==  to juse separate main content to array of headings.
	$content = explode ( '== ', $content );

	$changelog_isolated = '';

	// Get element with 'Changelog ==' as starting string, i.e isolate changelog.
	foreach ( $content as $key => $value ) {
		if (strpos( $value, 'Changelog ==') === 0) {
	    	$changelog_isolated = str_replace( 'Changelog ==', '', $value );
	    }
	}

	// Now Explode $changelog_isolated to manupulate it to add html elements.
	$changelog_array = explode( '= ', $changelog_isolated );

	// Unset first element as it is empty.
	unset( $changelog_array[0] );

	$changelog = '<pre class="changelog">';

	foreach ( $changelog_array as $value) {
		// Replace all enter (\n) elements with </span><span> , opening and closing span will be added in next process.
		$value = preg_replace( '/\n+/', '</span><span>', $value );

		// Add openinf and closing div and span, only first span element will have heading class.
		$value = '<div class="block"><span class="heading">= ' . $value . '</span></div>';

		// Remove empty <span></span> element which newr formed at the end.
		$changelog .= str_replace( '<span></span>', '', $value );
	}

	$changelog .= '</pre>';

	return wp_kses_post( $changelog );
}

/**
 * Import Demo data for theme using catch themes demo import plugin
 */
function kindergarten_playgroup_free_vs_pro() {
	if ( isset( $_GET['tab'] ) && 'free_vs_pro' === $_GET['tab'] ) {
	?>
		<div class="wrap about-wrap">

			<p class="about-description"><?php esc_html_e( 'View Free vs Pro Table below:', 'kindergarten-playgroup' ); ?></p>
			<div class="vs-theme-table">
				<table>
					<thead>
						<tr><th scope="col"></th>
							<th class="head" scope="col"><?php esc_html_e( 'Free Theme', 'kindergarten-playgroup' ); ?></th>
							<th class="head" scope="col"><?php esc_html_e( 'Pro Theme', 'kindergarten-playgroup' ); ?></th>
						</tr>
					</thead>
					<tbody>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><span><?php esc_html_e( 'Theme Demo Set Up', 'kindergarten-playgroup' ); ?></span></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Templates, Color options and Fonts', 'kindergarten-playgroup' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Included Demo Content', 'kindergarten-playgroup' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Section Ordering', 'kindergarten-playgroup' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Multiple Sections', 'kindergarten-playgroup' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Additional Plugins', 'kindergarten-playgroup' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Premium Technical Support', 'kindergarten-playgroup' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Access to Support Forums', 'kindergarten-playgroup' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Free updates', 'kindergarten-playgroup' ); ?></td>
							<td><span class="dashicons dashicons-no-alt"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Unlimited Domains', 'kindergarten-playgroup' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Responsive Design', 'kindergarten-playgroup' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td headers="features" class="feature"><?php esc_html_e( 'Live Customizer', 'kindergarten-playgroup' ); ?></td>
							<td><span class="dashicons dashicons-saved"></span></td>
							<td><span class="dashicons dashicons-saved"></span></td>
						</tr>
						<tr class="odd" scope="row">
							<td class="feature feature--empty"></td>
							<td class="feature feature--empty"></td>
							<td headers="comp-2" class="td-btn-2"><a class="sidebar-button single-btn" href="<?php echo esc_url(KINDERGARTEN_PLAYGROUP_PRO_THEME_URL);?>"><?php esc_html_e( 'Go for Premium', 'kindergarten-playgroup' ); ?></a></td>
						</tr>
					</tbody>
				</table>
			</div>
		</div>
	<?php
	}
}
