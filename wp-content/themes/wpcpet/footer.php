<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after
 *
 * @package wpcpet
 */

?>

</div><!-- .col-full -->
</div><!-- #content -->

<?php do_action( 'wpcpet_before_footer' ); ?>

<?php if ( ! is_404() ) { ?>
  <footer id="colophon" class="site-footer" role="contentinfo">
    <div class="col-full">

		<?php
		/**
		 * Functions hooked in to wpcpet_footer action
		 *
		 * @see wpcpet_footer_widgets - 10
		 * @see wpcpet_credit         - 20
		 */
		do_action( 'wpcpet_footer' );
		?>

    </div><!-- .col-full -->
  </footer><!-- #colophon -->
<?php } ?>

<?php do_action( 'wpcpet_after_footer' ); ?>

</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
