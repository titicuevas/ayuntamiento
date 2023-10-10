<?php
/**
 * WPCpet template functions.
 *
 * @package wpcpet
 */

if ( ! function_exists( 'wpcpet_display_comments' ) ) {
	/**
	 * WPCpet display comments
	 *
	 * @since  1.0.0
	 */
	function wpcpet_display_comments() {
		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || 0 !== intval( get_comments_number() ) ) :
			comments_template();
		endif;
	}
}

// Move Comment Field To Bottom
function wpcpet_move_comment_field_to_bottom( $fields ) {
	$comment_field = $fields['comment'];
	$cookies_field = $fields['cookies'];
	unset( $fields['comment'] );
	unset( $fields['cookies'] );
	$fields['comment'] = $comment_field;
	$fields['cookies'] = $cookies_field;

	return $fields;
}

add_filter( 'comment_form_fields', 'wpcpet_move_comment_field_to_bottom' );

if ( ! function_exists( 'wpcpet_comment' ) ) {
	/**
	 * WPCpet comment template
	 *
	 * @param array $comment the comment array.
	 * @param array $args the comment args.
	 * @param int $depth the comment depth.
	 *
	 * @since 1.0.0
	 */
	function wpcpet_comment( $comment, $args, $depth ) {
		if ( 'div' === $args['style'] ) {
			$tag       = 'div';
			$add_below = 'comment';
		} else {
			$tag       = 'li';
			$add_below = 'div-comment';
		}
		?>
      <<?php echo esc_attr( $tag ); ?><?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID(); ?>">
      <div class="comment-body">
      <div class="comment-meta commentmetadata">
        <div class="comment-author vcard">
			<?php echo get_avatar( $comment, 128 ); ?>
			<?php printf( wp_kses_post( '<cite class="fn">%s</cite>', 'wpcpet' ), get_comment_author_link() ); ?>
        </div>
		  <?php if ( '0' === $comment->comment_approved ) : ?>
            <em
              class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'wpcpet' ); ?></em>
            <br />
		  <?php endif; ?>

        <a href="<?php echo esc_url( htmlspecialchars( get_comment_link( $comment->comment_ID ) ) ); ?>"
           class="comment-date">
			<?php echo '<time datetime="' . esc_attr( get_comment_date( 'c' ) ) . '">' . esc_html( get_comment_date() ) . '</time>'; ?>
        </a>
      </div>
		<?php if ( 'div' !== $args['style'] ) : ?>
      <div id="div-comment-<?php comment_ID(); ?>" class="comment-content">
	<?php endif; ?>
      <div class="comment-text">
		  <?php comment_text(); ?>
      </div>
      <div class="reply">
		  <?php
		  comment_reply_link( array_merge( $args, array(
			  'add_below' => $add_below,
			  'depth'     => $depth,
			  'max_depth' => $args['max_depth'],
		  ) ) );
		  ?>
		  <?php edit_comment_link( __( 'Edit', 'wpcpet' ), '  ', '' ); ?>
      </div>
      </div>
		<?php if ( 'div' !== $args['style'] ) : ?>
        </div>
		<?php endif; ?>
		<?php
	}
}

if ( ! function_exists( 'wpcpet_footer_widgets' ) ) {
	/**
	 * Display the footer widget regions.
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function wpcpet_footer_widgets() {
		$rows    = intval( apply_filters( 'wpcpet_footer_widget_rows', 1 ) );
		$regions = intval( apply_filters( 'wpcpet_footer_widget_columns', 4 ) );

		for ( $row = 1; $row <= $rows; $row ++ ) :

			// Defines the number of active columns in this footer row.
			for ( $region = $regions; 0 < $region; $region -- ) {
				if ( is_active_sidebar( 'footer-' . esc_attr( $region + $regions * ( $row - 1 ) ) ) ) {
					$columns = $region;
					break;
				}
			}

			if ( isset( $columns ) ) :
				?>
              <div
                class=<?php echo '"footer-widgets row-' . esc_attr( $row ) . ' col-' . esc_attr( $columns ) . ' fix"'; ?>>
				  <?php
				  for ( $column = 1; $column <= $columns; $column ++ ) :
					  $footer_n = $column + $regions * ( $row - 1 );

					  if ( is_active_sidebar( 'footer-' . esc_attr( $footer_n ) ) ) :
						  ?>
                        <div class="block footer-widget-<?php echo esc_attr( $column ); ?>">
							<?php dynamic_sidebar( 'footer-' . esc_attr( $footer_n ) ); ?>
                        </div>
					  <?php
					  endif;
				  endfor;
				  ?>
              </div><!-- .footer-widgets.row-<?php echo esc_attr( $row ); ?> -->
				<?php
				unset( $columns );
			endif;
		endfor;
	}
}

if ( ! function_exists( 'wpcpet_credit' ) ) {
	/**
	 * Display the theme credit
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function wpcpet_credit() {
		$copyright_text = get_theme_mod( 'wpcpet_footer_copyright_text' );
		?>
      <div class="site-info">
		  <?php if ( ! empty( $copyright_text ) ) { ?>
			  <?php echo wp_kses_post( $copyright_text ); ?>
		  <?php } ?>
      </div><!-- .site-info -->
		<?php
	}
}

if ( ! function_exists( 'wpcpet_site_branding' ) ) {
	/**
	 * Site branding wrapper and display
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function wpcpet_site_branding() {
		?>
      <div class="site-branding">
		  <?php wpcpet_site_title_or_logo(); ?>
      </div>
		<?php
	}
}

if ( ! function_exists( 'wpcpet_site_title_or_logo' ) ) {
	/**
	 * Display the site title or logo
	 *
	 * @param bool $echo Echo the string or return it.
	 *
	 * @return string
	 * @since 2.1.0
	 */
	function wpcpet_site_title_or_logo( $echo = true ) {
		if ( function_exists( 'the_custom_logo' ) && has_custom_logo() ) {
			$logo = get_custom_logo();
			$html = is_home() ? '<h1 class="logo">' . $logo . '</h1>' : $logo;
		} else {
			$tag = is_home() ? 'h1' : 'div';

			$html = '<' . esc_attr( $tag ) . ' class="beta site-title"><a href="' . esc_url( home_url( '/' ) ) . '" rel="home">' . esc_html( get_bloginfo( 'name' ) ) . '</a></' . esc_attr( $tag ) . '>';

			if ( '' !== get_bloginfo( 'description' ) ) {
				$html .= '<p class="site-description">' . esc_html( get_bloginfo( 'description', 'display' ) ) . '</p>';
			}
		}

		if ( ! $echo ) {
			return $html;
		}

		echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}

if ( ! function_exists( 'wpcpet_primary_navigation' ) ) {
	/**
	 * Display Primary Navigation
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function wpcpet_primary_navigation() {
		?>
      <nav id="site-navigation" class="main-navigation" role="navigation"
           aria-label="<?php esc_attr_e( 'Primary Navigation', 'wpcpet' ); ?>">
		  <?php
		  wp_nav_menu( array(
			  'theme_location'  => 'primary',
			  'container_class' => 'primary-navigation',
		  ) );
		  ?>
      </nav><!-- #site-navigation -->
		<?php
	}
}

if ( ! function_exists( 'wpcpet_handheld_navigation_button' ) ) {
	/**
	 * Display Handheld Navigation Button
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function wpcpet_handheld_navigation_button() {
		?>
      <button class="menu-toggle" aria-controls="site-navigation" aria-expanded="false">
			<span><span
          class="screen-reader-text"><?php echo esc_html( apply_filters( 'wpcpet_menu_toggle_text', __( 'Menu', 'wpcpet' ) ) ); ?></span></span>
      </button>
		<?php
	}
}

if ( ! function_exists( 'wpcpet_handheld_navigation' ) ) {
	/**
	 * Display Handheld Navigation
	 *
	 * @return void
	 * @since  1.0.0
	 */
	function wpcpet_handheld_navigation() {
		?>
      <nav id="site-navigation-handheld" class="main-navigation handheld-nav" role="navigation"
           aria-label="<?php esc_attr_e( 'Handheld Navigation', 'wpcpet' ); ?>">
		  <?php
		  wp_nav_menu( array(
			  'theme_location'  => 'handheld',
			  'container_class' => 'handheld-navigation',
		  ) );
		  ?>
      </nav><!-- #site-navigation -->
		<?php
	}
}

if ( ! function_exists( 'wpcpet_title_bar_open' ) ) {
	/**
	 * Title open
	 *
	 * @return void
	 * @since  1.0.0
	 */

	function wpcpet_title_bar_open() {
		if ( is_front_page() || is_404() ) {
			return;
		}
		$title_bar_classes = "wpcpet-title-bar";
		if ( is_single() || is_singular( 'product' ) ) {
			$title_bar_classes .= " no-page-title";
		}
		?>
      <div class="<?php echo esc_attr( $title_bar_classes ) ?>">
      <div class="inner">
		<?php
	}
}

if ( ! function_exists( 'wpcpet_title_bar_close' ) ) {
	/**
	 * Title close
	 *
	 * @return void
	 * @since  1.0.0
	 */

	function wpcpet_title_bar_close() {
		if ( is_front_page() || is_404() ) {
			return;
		}
		?>
      </div>
      </div>
		<?php
	}
}

if ( ! function_exists( 'wpcpet_page_title' ) ) {
	/**
	 * Page title
	 *
	 * @return void
	 * @since  1.0.0
	 */

	function wpcpet_page_title() {
		if ( is_front_page() || is_single() || is_singular( 'product' ) || is_404() ) {
			return;
		}

		if ( is_category() || is_tax() ) {
			$title = esc_html__( 'Category: ', 'wpcpet' ) . single_cat_title( '', false );
		} elseif ( is_home() ) {
			$title = esc_html__( 'Blog', 'wpcpet' );
		} elseif ( is_tag() ) {
			$title = esc_html__( 'Tag: ', 'wpcpet' ) . single_tag_title( '', false );
		} elseif ( is_author() ) {
			$title = esc_html__( 'Author: ', 'wpcpet' ) . '<span class="vcard">' . get_the_author() . '</span>';
		} elseif ( is_year() ) {
			$title = esc_html__( 'Year: ', 'wpcpet' ) . get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'wpcpet' ) );
		} elseif ( is_month() ) {
			$title = esc_html__( 'Month: ', 'wpcpet' ) . get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'wpcpet' ) );
		} elseif ( is_day() ) {
			$title = esc_html__( 'Day: ', 'wpcpet' ) . get_the_date( esc_html_x( 'F j, Y', 'daily archives date format', 'wpcpet' ) );
		} elseif ( is_post_type_archive() ) {
			if ( function_exists( 'is_shop' ) && is_shop() ) {
				$title = esc_html__( 'Our Shop', 'wpcpet' );
			} else {
				$title = sprintf( esc_html__( 'Archives: %s', 'wpcpet' ), post_type_archive_title( '', false ) );
			}
		} elseif ( is_search() ) {
			$title = sprintf( esc_html__( 'Search Results for: "%s"', 'wpcpet' ), get_search_query() );
		} else {
			$title = get_the_title();
		}
		?>
      <h1 class="wpcpet-page-title">
		  <?php echo wp_kses( $title, array(
			  'span' => array(
				  'class' => array(),
			  ),
		  ) ); ?>
      </h1>
		<?php
	}
}

if ( ! function_exists( 'wpcpet_skip_links' ) ) {
	/**
	 * Skip links
	 *
	 * @return void
	 * @since  1.4.1
	 */
	function wpcpet_skip_links() {
		?>
      <a class="skip-link screen-reader-text"
         href="#site-navigation"><?php esc_html_e( 'Skip to navigation', 'wpcpet' ); ?></a>
      <a class="skip-link screen-reader-text"
         href="#content"><?php esc_html_e( 'Skip to content', 'wpcpet' ); ?></a>
		<?php
	}
}

if ( ! function_exists( 'wpcpet_page_header' ) ) {
	/**
	 * Display the page header
	 *
	 * @since 1.0.0
	 */
	function wpcpet_page_header() {
		if ( is_front_page() && is_page_template( 'template-fullwidth.php' ) ) {
			return;
		}
		?>
      <header class="entry-header">
		  <?php
		  wpcpet_post_thumbnail( 'full' );
		  ?>
      </header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'wpcpet_page_content' ) ) {
	/**
	 * Display the post content
	 *
	 * @since 1.0.0
	 */
	function wpcpet_page_content() {
		?>
      <div class="entry-content">
		  <?php the_content(); ?>
		  <?php
		  wp_link_pages( array(
			  'before' => '<div class="page-links">' . __( 'Pages:', 'wpcpet' ),
			  'after'  => '</div>',
		  ) );
		  ?>
      </div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'wpcpet_post_header' ) ) {
	/**
	 * Display the post header with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function wpcpet_post_header() {
		?>
      <header class="entry-header">
		  <?php

		  /**
		   * Functions hooked in to wpcpet_post_header_before action.
		   *
		   */
		  do_action( 'wpcpet_post_header_before' );

		  if ( is_single() ) {
			  the_title( '<h1 class="entry-title">', '</h1>' );
		  } else {
			  the_title( sprintf( '<h2 class="alpha entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' );
		  }

		  /**
		   * Functions hooked in to wpcpet_post_header_after action.
		   *
		   * @see wpcpet_post_meta - 10
		   */

		  do_action( 'wpcpet_post_header_after' );
		  ?>
      </header><!-- .entry-header -->
		<?php
	}
}

if ( ! function_exists( 'wpcpet_post_content' ) ) {
	/**
	 * Display the post content with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function wpcpet_post_content() {
		?>
      <div class="entry-content">
		  <?php

		  /**
		   * Functions hooked in to wpcpet_post_content_before action.
		   *
		   * @see wpcpet_post_thumbnail - 10
		   */
		  do_action( 'wpcpet_post_content_before' );

		  the_content();

		  do_action( 'wpcpet_post_content_after' );

		  wp_link_pages( array(
			  'before' => '<div class="page-links">' . __( 'Pages:', 'wpcpet' ),
			  'after'  => '</div>',
		  ) );
		  ?>
      </div><!-- .entry-content -->
		<?php
	}
}

if ( ! function_exists( 'wpcpet_post_excerpt' ) ) {
	/**
	 * Display the post excerpt with a link to the single post
	 *
	 * @since 1.0.0
	 */
	function wpcpet_post_excerpt() {
		?>
      <div class="entry-excerpt">
		  <?php

		  /**
		   * Functions hooked in to wpcpet_post_excerpt_before action.
		   *
		   * @see wpcpet_post_thumbnail - 10
		   */
		  do_action( 'wpcpet_post_excerpt_before' );

		  the_excerpt();

		  do_action( 'wpcpet_post_excerpt_after' );

		  wp_link_pages( array(
			  'before' => '<div class="page-links">' . __( 'Pages:', 'wpcpet' ),
			  'after'  => '</div>',
		  ) );
		  ?>
      </div><!-- .entry-excerpt -->
		<?php
	}
}

if ( ! function_exists( 'wpcpet_post_meta' ) ) {
	/**
	 * Display the post meta
	 *
	 * @since 1.0.0
	 */
	function wpcpet_post_meta() {
		if ( 'post' !== get_post_type() ) {
			return;
		}

		// Posted on.
		$time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';

		if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
			$time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
		}

		$time_string = sprintf( $time_string, esc_attr( get_the_date( 'c' ) ), esc_html( get_the_date() ), esc_attr( get_the_modified_date( 'c' ) ), esc_html( get_the_modified_date() ) );

		$posted_on = '
			<span class="posted-on">' . /* translators: %s: post date */
		             sprintf( '<span class="screen-reader-text">' . __( 'Posted on', 'wpcpet' ) . '</span>%s', $time_string ) . '</span>';

		// Categories.
		$categories_list = get_the_category_list( __( ', ', 'wpcpet' ) );

		if ( $categories_list ) {
			$categories_list = sprintf( '<span class="post-categories"><span class="screen-reader-text">%1$s</span>%2$s</span>', esc_html( _n( 'Category:', 'Categories:', count( get_the_category() ), 'wpcpet' ) ), wp_kses_post( $categories_list ) );
		}

		echo wp_kses( sprintf( '%1$s %2$s', $posted_on, $categories_list ), array(
			'span' => array(
				'class' => array(),
			),
			'a'    => array(
				'href'  => array(),
				'title' => array(),
				'rel'   => array(),
			),
			'time' => array(
				'datetime' => array(),
				'class'    => array(),
			),
		) );
	}
}

if ( ! function_exists( 'wpcpet_edit_post_link' ) ) {
	/**
	 * Display the edit link
	 *
	 * @since 2.5.0
	 */
	function wpcpet_edit_post_link() {
		edit_post_link( sprintf( wp_kses( /* translators: %s: Name of current post. Only visible to screen readers */ __( 'Edit <span class="screen-reader-text">%s</span>', 'wpcpet' ), array(
			'span' => array(
				'class' => array(),
			),
		) ), get_the_title() ), '<div class="edit-link">', '</div>' );
	}
}

if ( ! function_exists( 'wpcpet_post_taxonomy' ) ) {
	/**
	 * Display the post taxonomies
	 *
	 * @since 2.4.0
	 */
	function wpcpet_post_taxonomy() {
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'wpcpet' ) );

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'wpcpet' ) );
		?>

      <aside class="entry-taxonomy">
		  <?php if ( $categories_list ) : ?>
            <div class="cat-links">
				<?php echo esc_html( _n( 'Category:', 'Categories:', count( get_the_category() ), 'wpcpet' ) ); ?><?php echo wp_kses_post( $categories_list ); ?>
            </div>
		  <?php endif; ?>

		  <?php if ( $tags_list ) : ?>
            <div class="tags-links">
				<?php echo esc_html( _n( 'Tag:', 'Tags:', count( get_the_tags() ), 'wpcpet' ) ); ?><?php echo wp_kses_post( $tags_list ); ?>
            </div>
		  <?php endif; ?>
      </aside>

		<?php
	}
}

if ( ! function_exists( 'wpcpet_paging_nav' ) ) {
	/**
	 * Display navigation to next/previous set of posts when applicable.
	 */
	function wpcpet_paging_nav() {
		global $wp_query;

		$args = array(
			'type'      => 'list',
			'next_text' => '<span class="screen-reader-text">' . _x( 'Next', 'Next post', 'wpcpet' ) . '</span>',
			'prev_text' => '<span class="screen-reader-text">' . _x( 'Previous', 'Previous post', 'wpcpet' ) . '</span>',
		);

		the_posts_pagination( $args );
	}
}

if ( ! function_exists( 'wpcpet_post_nav' ) ) {
	/**
	 * Display navigation to next/previous post when applicable.
	 */
	function wpcpet_post_nav() {
		$args = array(
			'next_text' => '<span class="screen-reader-text">' . esc_html__( 'Next post:', 'wpcpet' ) . ' </span>%title',
			'prev_text' => '<span class="screen-reader-text">' . esc_html__( 'Previous post:', 'wpcpet' ) . ' </span>%title',
		);
		the_post_navigation( $args );
	}
}

if ( ! function_exists( 'wpcpet_get_sidebar' ) ) {
	/**
	 * Display wpcpet sidebar
	 *
	 * @uses  get_sidebar()
	 * @since 1.0.0
	 */
	function wpcpet_get_sidebar() {
		get_sidebar();
	}
}

if ( ! function_exists( 'wpcpet_post_thumbnail' ) ) {
	/**
	 * Display post thumbnail
	 *
	 * @param string $size the post thumbnail size.
	 *
	 * @uses  has_post_thumbnail()
	 * @uses  the_post_thumbnail
	 * @var          $size thumbnail size. thumbnail|medium|large|full|$custom
	 * @since 1.5.0
	 */
	function wpcpet_post_thumbnail( $size = 'full' ) {
		if ( has_post_thumbnail() ) {
			the_post_thumbnail( $size );
		}
	}
}

if ( ! function_exists( 'wpcpet_header_container' ) ) {
	/**
	 * The header container
	 */
	function wpcpet_header_container() {
		echo '<div class="col-full header-wrap">';
	}
}

if ( ! function_exists( 'wpcpet_header_container_close' ) ) {
	/**
	 * The header container close
	 */
	function wpcpet_header_container_close() {
		echo '</div>';
	}
}

if ( ! function_exists( 'wpcpet_header_row' ) ) {
	/**
	 * The header row
	 */
	function wpcpet_header_row() {
		echo '<div class="header-row">';
	}
}

if ( ! function_exists( 'wpcpet_header_row_close' ) ) {
	/**
	 * The header row close
	 */
	function wpcpet_header_row_close() {
		echo '</div>';
	}
}

if ( ! function_exists( 'wpcpet_header_left_open' ) ) {
	/**
	 * The header left open
	 */
	function wpcpet_header_left_open() {
		echo '<div class="header-left">';
	}
}

if ( ! function_exists( 'wpcpet_header_left_close' ) ) {
	/**
	 * The header left close
	 */
	function wpcpet_header_left_close() {
		echo '</div>';
	}
}

if ( ! function_exists( 'wpcpet_header_right_open' ) ) {
	/**
	 * The header right open
	 */
	function wpcpet_header_right_open() {
		echo '<div class="header-right">';
	}
}

if ( ! function_exists( 'wpcpet_header_right_close' ) ) {
	/**
	 * The header right close
	 */
	function wpcpet_header_right_close() {
		echo '</div>';
	}
}
