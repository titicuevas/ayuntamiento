<?php
/**
 * The front page template file
 *
 * @package Kindergarten Playgroup
 * @subpackage kindergarten_playgroup
 */

get_header(); ?>

<main id="tp_content" role="main">
	<div class="slider-main-box">
		<?php do_action( 'kindergarten_playgroup_before_slider' ); ?>

		<?php get_template_part( 'template-parts/home/slider' ); ?>
		<?php do_action( 'kindergarten_playgroup_after_slider' ); ?>

		<?php get_template_part( 'template-parts/home/counter' ); ?>
		<?php do_action( 'kindergarten_playgroup_after_counter' ); ?>
	</div>
	
	<?php get_template_part( 'template-parts/home/classes' ); ?>
	<?php do_action( 'kindergarten_playgroup_after_classes' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'kindergarten_playgroup_after_home_content' ); ?>
</main>

<?php get_footer();