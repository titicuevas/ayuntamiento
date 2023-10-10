<?php
/**
 * Template part for displaying counter section
 *
 * @package Kindergarten Playgroup
 * @subpackage kindergarten_playgroup
 */

?>

<?php if( get_theme_mod( 'kindergarten_playgroup_counter_icon1' ) != '' || get_theme_mod( 'kindergarten_playgroup_counter_title1' ) != '' || get_theme_mod( 'kindergarten_playgroup_counter_text1' ) != ''|| get_theme_mod( 'color2' ) != '' || get_theme_mod( 'kindergarten_playgroup_counter_icon1' ) != '' || get_theme_mod( 'kindergarten_playgroup_counter_title2' ) != '' || get_theme_mod( 'kindergarten_playgroup_counter_text2' ) != '' || get_theme_mod( 'kindergarten_playgroup_counter_icon3' ) != '' || get_theme_mod( 'kindergarten_playgroup_counter_title3' ) != '' || get_theme_mod( 'kindergarten_playgroup_counter_text3' ) != '') { ?>

<div id="counter" class="text-center">
  <div class="row m-0">
    <div class="col-xl-5 col-lg-12 col-md-12 col-sm-12">
    </div>
    <div class="col-xl-7 col-lg-12 col-md-12 col-sm-12 counter-box">
      <div class="row">
        <div class="col-lg-4 col-md-4 col-sm-4 color1">
          <?php if( get_theme_mod( 'kindergarten_playgroup_counter_icon1' ) != '' ) { ?>
            <i class="<?php echo esc_attr( get_theme_mod( 'kindergarten_playgroup_counter_icon1','' ) ); ?>"></i>
          <?php } ?>
          <?php if( get_theme_mod( 'kindergarten_playgroup_counter_title1' ) != '' ) { ?>
            <h5><?php echo esc_html( get_theme_mod( 'kindergarten_playgroup_counter_title1','' ) ); ?></h5>
          <?php } ?>
          <?php if( get_theme_mod( 'kindergarten_playgroup_counter_text1' ) != '' ) { ?>
            <p><?php echo esc_html( get_theme_mod( 'kindergarten_playgroup_counter_text1','' ) ); ?></p>
          <?php } ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 color1 color2">
          <?php if( get_theme_mod( 'kindergarten_playgroup_counter_icon2' ) != '' ) { ?>
            <i class="<?php echo esc_attr( get_theme_mod( 'kindergarten_playgroup_counter_icon2','' ) ); ?>"></i>
          <?php } ?>
          <?php if( get_theme_mod( 'kindergarten_playgroup_counter_title2' ) != '' ) { ?>
            <h5><?php echo esc_html( get_theme_mod( 'kindergarten_playgroup_counter_title2','' ) ); ?></h5>
          <?php } ?>
          <?php if( get_theme_mod( 'kindergarten_playgroup_counter_text2' ) != '' ) { ?>
            <p><?php echo esc_html( get_theme_mod( 'kindergarten_playgroup_counter_text2','' ) ); ?></p>
          <?php } ?>
        </div>
        <div class="col-lg-4 col-md-4 col-sm-4 color1">
          <?php if( get_theme_mod( 'kindergarten_playgroup_counter_icon3' ) != '' ) { ?>
            <i class="<?php echo esc_attr( get_theme_mod( 'kindergarten_playgroup_counter_icon3','' ) ); ?>"></i>
          <?php } ?>
          <?php if( get_theme_mod( 'kindergarten_playgroup_counter_title3' ) != '' ) { ?>
            <h5><?php echo esc_html( get_theme_mod( 'kindergarten_playgroup_counter_title3','' ) ); ?></h5>
          <?php } ?>
          <?php if( get_theme_mod( 'kindergarten_playgroup_counter_text3' ) != '' ) { ?>
            <p><?php echo esc_html( get_theme_mod( 'kindergarten_playgroup_counter_text3','' ) ); ?></p>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>

<?php } ?>
