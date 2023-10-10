<?php
/**
 * Template part for displaying classes section
 *
 * @package Kindergarten Playgroup
 * @subpackage kindergarten_playgroup
 */

?>

<div id="demo_class" class="py-5">
  <div class="container">
    <?php if( get_theme_mod( 'kindergarten_playgroup_demo_short_heading' ) != '' ) { ?>
      <h6><?php echo esc_html( get_theme_mod( 'kindergarten_playgroup_demo_short_heading','' ) ); ?></h3>
    <?php } ?>
    <?php if( get_theme_mod( 'kindergarten_playgroup_demo_heading' ) != '' ) { ?>
      <h3><?php echo esc_html( get_theme_mod( 'kindergarten_playgroup_demo_heading','' ) ); ?></h3>
    <?php } ?>
    <div class="row mt-5">
      <?php
        $post_category = get_theme_mod('kindergarten_playgroup_demo_section_category');
        if($post_category){
          $page_query = new WP_Query(array( 'category_name' => esc_html( $post_category ,'kindergarten-playgroup')));?>
          <?php while( $page_query->have_posts() ) : $page_query->the_post(); ?>
            <div class="col-lg-3 col-md-6 col-sm-6">
              <div class="service-detail">
                <div class="demo-img">
                  <?php if(has_post_thumbnail()) { ?><?php the_post_thumbnail(); ?><?php } ?>
                    <?php if( get_post_meta($post->ID, 'kindergarten_playgroup_video', true) ) {?>
                      <button class="v-btn" data-videos-url="<?php echo esc_url(get_post_meta($post->ID,'kindergarten_playgroup_video',true)); ?>" type="button" data-bs-toggle="modal" data-bs-target="#myModal">
                        <i class="fas fa-play"></i>
                      </button>
                    <?php } ?>
                    <!-- Modal -->
                      <div id="myModal" class="modal fade" role="dialog">
                        <div class="modal-dialog modal-dialog-centered">
                          <!-- Modal content-->
                          <div class="modal-content">
                            <div class="video-wrapper">
                              <embed width="100%" id="video_url" height="345" src="">
                              </embed>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"><?php echo esc_html('Close','kindergarten-playgroup'); ?></button>
                            </div>
                          </div>
                        </div>
                      </div>
                </div>
                <div class="demo-box mb-4">
                      <?php if( get_post_meta($post->ID, 'kindergarten_playgroup_age_criteria', true) ) {?>
                     <span class="age-criteria"><span class="head-color"><?php esc_html_e( 'Age: ', 'kindergarten-playgroup' ); ?></span><?php echo esc_html(get_post_meta($post->ID,'kindergarten_playgroup_age_criteria',true)); ?><span>
                   <?php }?>
                   <?php if( get_post_meta($post->ID, 'kindergarten_playgroup_timmings', true) ) {?>
                     <span class="timming"><span class="head-color"><?php esc_html_e( 'Time: ', 'kindergarten-playgroup' ); ?></span><?php echo esc_html(get_post_meta($post->ID,'kindergarten_playgroup_timmings',true)); ?></span>
                   <?php }?>           
                   <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
                   <p class="mb-0"><?php echo wp_trim_words( get_the_content(),12 );?></p>
                   <?php if( get_post_meta($post->ID, 'kindergarten_playgroup_price', true) ) {?>
                     <span class="course_price"><?php esc_html_e( '$', 'kindergarten-playgroup' ); ?><?php echo esc_html(get_post_meta($post->ID,'kindergarten_playgroup_price',true)); ?></span>
                   <?php }?>
                </div>
                </div>
            </div>
          <?php endwhile;
          wp_reset_postdata();
        }
      ?>
    </div>
  </div>
</div>

