<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Kindergarten Playgroup
 * @subpackage kindergarten_playgroup
 */

?>
<article class="col-lg-4 col-md-4">
	<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<div class="page-box">
	        <div class="box-image">
	            <?php the_post_thumbnail();  ?>
	        </div>
		    <div class="box-content">
		    	<h4><a href="<?php echo esc_url( get_permalink() ); ?>" title="<?php the_title_attribute(); ?>"><?php the_title();?></a></h4>
		        <div class="box-info">
	        	<?php if(get_theme_mod('kindergarten_playgroup_remove_date',true) != ''){ ?>
					<i class="far fa-calendar-alt"></i><span class="entry-date"><?php echo get_the_date( 'j F, Y' ); ?></span>
				<?php }?>
				<?php if(get_theme_mod('kindergarten_playgroup_remove_author',true) != ''){ ?>
					<i class="fas fa-user"></i><span class="entry-author"><?php the_author(); ?></span>
				<?php }?>
				<?php if(get_theme_mod('kindergarten_playgroup_remove_comments',true) != ''){ ?>
					<i class="fas fa-comments"></i><span class="entry-comments"><?php comments_number( __('0 Comments','kindergarten-playgroup'), __('0 Comments','kindergarten-playgroup'), __('% Comments','kindergarten-playgroup') ); ?></span>
				<?php }?>
            </div>
	        <p><?php echo wp_trim_words( get_the_content(), get_theme_mod('kindergarten_playgroup_excerpt_count',35 ));?></p>
	        <?php if(get_theme_mod('kindergarten_playgroup_remove_read_button',true) != ''){ ?>
	            <div class="readmore-btn">
	                <a href="<?php echo esc_url( get_permalink() );?>" class="blogbutton-small" title="<?php esc_attr_e( 'Read More', 'kindergarten-playgroup' ); ?>"><?php echo esc_html(get_theme_mod('kindergarten_playgroup_read_more_text',__('Read More','kindergarten-playgroup')));?></a>
	            </div>
	        <?php }?>
		    </div>
		    <div class="clearfix"></div>
		</div>
	</div>
</article>