<?php
/**
 * Template part for displaying slider section
 *
 * @package Kindergarten Playgroup
 * @subpackage kindergarten_playgroup
 */

?>
<?php $static_image= get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'kindergarten_playgroup_slider_arrows') != '') { ?>

<section id="slider">
  <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <?php $kindergarten_playgroup_slide_pages = array();
      for ( $kindergarten_playgroup_count = 1; $kindergarten_playgroup_count <= 3; $kindergarten_playgroup_count++ ) {
        $kindergarten_playgroup_mod = intval( get_theme_mod( 'kindergarten_playgroup_slider_page' . $kindergarten_playgroup_count ));
        if ( 'page-none-selected' != $kindergarten_playgroup_mod ) {
          $kindergarten_playgroup_slide_pages[] = $kindergarten_playgroup_mod;
        }
      }
      if( !empty($kindergarten_playgroup_slide_pages) ) :
        $kindergarten_playgroup_args = array(
          'post_type' => 'page',
          'post__in' => $kindergarten_playgroup_slide_pages,
          'orderby' => 'post__in'
        );
        $kindergarten_playgroup_query = new WP_Query( $kindergarten_playgroup_args );
        if ( $kindergarten_playgroup_query->have_posts() ) :
          $kindergarten_playgroup_i = 1;
    ?>
    <div class="carousel-inner" role="listbox">
      <?php  while ( $kindergarten_playgroup_query->have_posts() ) : $kindergarten_playgroup_query->the_post(); ?>
        <div <?php if($kindergarten_playgroup_i == 1){echo 'class="carousel-item active"';} else{ echo 'class="carousel-item"';}?>>
         <?php if(has_post_thumbnail()){ ?>
            <img src="<?php echo (the_post_thumbnail_url('full')); ?>"/>
            <?php }else {echo ('<img src="'.$static_image.'">'); } ?>
          <div class="carousel-caption">
            <div class="inner_carousel">
              <h2><?php the_title(); ?></h2>
              <p><?php echo wp_trim_words( get_the_content(),15 );?></p>            
                <?php if( get_theme_mod( 'kindergarten_playgroup_slider_button',true) != '' || get_theme_mod( 'kindergarten_playgroup_slider_buttom_mob',true) != '') { ?>
              <div class="more-btn">
                <a href="<?php the_permalink(); ?>"><?php esc_html_e('Book Appointment','kindergarten-playgroup'); ?></a>
              </div>
            <?php } ?>           
            </div>
          </div>
        </div>
      <?php $kindergarten_playgroup_i++; endwhile;
      wp_reset_postdata();?>
    </div>
    <?php else : ?>
        <div class="no-postfound"></div>
      <?php endif;
    endif;?>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
    </a>
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>
