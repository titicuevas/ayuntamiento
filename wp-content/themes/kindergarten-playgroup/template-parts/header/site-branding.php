<?php
/*
* Display Logo and nav
*/
?>

<?php
$kindergarten_playgroup_sticky = get_theme_mod('kindergarten_playgroup_sticky');
    $kindergarten_playgroup_data_sticky = "false";
    if ($kindergarten_playgroup_sticky) {
    $kindergarten_playgroup_data_sticky = "true";
    }
    global $wp_customize;
?>

<div class="headerbox py-2 <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($kindergarten_playgroup_data_sticky); ?>">
  <div class="container">
    <div class="row">
      <div class="col-lg-2 col-md-3 col-sm-3 align-self-center col-9">
        <?php $kindergarten_playgroup_logo_settings = get_theme_mod( 'kindergarten_playgroup_logo_settings','Different Line');
        if($kindergarten_playgroup_logo_settings == 'Different Line'){ ?>
          <div class="logo mb-md-0">
            <?php if( has_custom_logo() ) kindergarten_playgroup_the_custom_logo(); ?>
            <?php if(get_theme_mod('kindergarten_playgroup_site_title',true) != ''){ ?>
              <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
            <?php }?>
            <?php $description = get_bloginfo( 'description', 'display' );
            if ( $description || is_customize_preview() ) : ?>
              <?php if(get_theme_mod('kindergarten_playgroup_site_tagline',true) != ''){ ?>
                <p class="site-description mb-0"><?php echo esc_html($description); ?></p>
              <?php }?>
            <?php endif; ?>
          </div>
        <?php }else if($kindergarten_playgroup_logo_settings == 'Same Line'){ ?>
          <div class="logo logo-same-line mb-md-0">
            <div class="row">
              <div class="col-lg-5 col-md-5 align-self-md-center">
                <?php if( has_custom_logo() ) kindergarten_playgroup_the_custom_logo(); ?>
              </div>
              <div class="col-lg-7 col-md-7 align-self-md-center">
                <?php if(get_theme_mod('kindergarten_playgroup_site_title',true) != ''){ ?>
                  <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                <?php }?>
                <?php $description = get_bloginfo( 'description', 'display' );
                if ( $description || is_customize_preview() ) : ?>
                  <?php if(get_theme_mod('kindergarten_playgroup_site_tagline',true) != ''){ ?>
                    <p class="site-description mb-0"><?php echo esc_html($description); ?></p>
                  <?php }?>
                <?php endif; ?>
              </div>
            </div>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-5 col-md-2 col-sm-2 col-3 align-self-center">
        <?php
          get_template_part( 'template-parts/navigation/site', 'nav' );
        ?>
      </div>
      <div class="col-lg-2 col-md-4 col-sm-4 align-self-center text-center text-md-right">
        <?php if( get_theme_mod( 'Kindergarten_Playgroup_header_button_link' ) != '' || get_theme_mod( 'Kindergarten_Playgroup_header_button' ) != '') { ?>
          <div class="more-btnn">
            <a href="<?php echo esc_url( get_theme_mod( 'Kindergarten_Playgroup_header_button_link','' ) ); ?>" class="register-btn"><?php echo esc_html( get_theme_mod( 'Kindergarten_Playgroup_header_button','' ) ); ?></a>
          </div>
        <?php } ?>
      </div>
      <div class="col-lg-3 col-md-3 col-sm-3 align-self-center align-self-center">
        <div class="media-links text-center text-md-right text-lg-right">
           <?php                 
            $kindergarten_playgroup_header_fb_new_tab = esc_attr(get_theme_mod('kindergarten_playgroup_header_fb_new_tab','true'));
            $kindergarten_playgroup_header_twt_new_tab = esc_attr(get_theme_mod('kindergarten_playgroup_header_twt_new_tab','true'));
            $kindergarten_playgroup_header_ins_new_tab = esc_attr(get_theme_mod('kindergarten_playgroup_header_ins_new_tab','true'));
            $kindergarten_playgroup_header_ut_new_tab = esc_attr(get_theme_mod('kindergarten_playgroup_header_ut_new_tab','true'));
            ?>
          <?php if( get_theme_mod( 'kindergarten_playgroup_facebook_url' ) != '' || get_theme_mod( 'kindergarten_playgroup_twitter_url' ) != '' || get_theme_mod( 'kindergarten_playgroup_instagram_url' ) != '' || get_theme_mod( 'kindergarten_playgroup_youtube_url' ) != '' ) { ?>
            <?php if( get_theme_mod( 'kindergarten_playgroup_facebook_url' ) != '') { ?>
              <a <?php if($kindergarten_playgroup_header_fb_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'kindergarten_playgroup_facebook_url','' ) ); ?>"><i class="fab fa-facebook-f mr-2"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'kindergarten_playgroup_twitter_url' ) != '') { ?>
              <a <?php if($kindergarten_playgroup_header_twt_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'kindergarten_playgroup_twitter_url','' ) ); ?>"><i class="fab fa-twitter mr-2"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'kindergarten_playgroup_instagram_url' ) != '') { ?>
              <a <?php if($kindergarten_playgroup_header_ins_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'kindergarten_playgroup_instagram_url','' ) ); ?>"><i class="fab fa-instagram mr-2"></i></a>
            <?php } ?>
            <?php if( get_theme_mod( 'kindergarten_playgroup_youtube_url' ) != '') { ?>
              <a <?php if($kindergarten_playgroup_header_ut_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'kindergarten_playgroup_youtube_url','' ) ); ?>"><i class="fab fa-youtube mr-2"></i></a>
            <?php } ?>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>
