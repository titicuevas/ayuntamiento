<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package wpcpet
 */

get_header(); ?>

  <div id="primary" class="content-area">

    <main id="main" class="site-main" role="main">

      <div class="error-404 not-found">
        <div class="page-content">
          <header class="page-header">
            <h1 class="error-heading"><?php echo esc_html__( '404', 'wpcpet' ); ?></h1>
            <div
              class="error-desc"><?php esc_html_e( 'Oops! That page can&rsquo;t be found.', 'wpcpet' ); ?></div>
            <a href="<?php echo esc_url( home_url( '/' ) ); ?>"
               class="button error-btn">
              <span><?php esc_html_e( 'Go to Homepage', 'wpcpet' ); ?></span>
            </a>
          </header><!-- .page-header -->
        </div><!-- .page-content -->
      </div><!-- .error-404 -->

    </main><!-- #main -->
  </div><!-- #primary -->

<?php
get_footer();
