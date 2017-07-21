<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */

$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

$_id = newshopping_makeid();
$_count = 0;
$args = array(
	'post_type' => 'testimonial',
	'posts_per_page' => '10',
	'post_status' => 'publish',
);

$query = new WP_Query($args);
?>

<div class="widget wpo-testimonial <?php echo esc_attr($skin).' '.esc_attr($el_class); ?>">
	<?php if($query->have_posts()){ ?>
		<?php if($title!=''){ ?>
			<h3 class="widget-title visual-title <?php echo esc_attr($alignment); ?>">
				<?php if($subtitle!=''): ?><span class="sub-title"><?php echo trim($subtitle); ?></span><br/><?php endif;?>
				<span><?php echo trim($title); ?></span>
			</h3>
		<?php } ?>
 
			<!-- Skin 1 -->
			<div id="carousel-<?php echo esc_attr($_id); ?>" class="widget-content text-center owl-carousel-play" data-ride="owlcarousel">
					<div class="owl-carousel " data-slide="<?php echo esc_attr($number); ?>" data-pagination="false" data-navigation="true">
					<?php  $_count=0; while($query->have_posts()):$query->the_post(); ?>
						<!-- Wrapper for slides -->
						<div class="item">
							<?php  get_template_part( 'vc_templates/testimonials/testimonials', $skin ); ?>
						</div>
						<?php $_count++; ?>
					<?php endwhile; ?>
					<?php wp_reset_postdata(); ?>
				</div>
				  <?php if( $_count>$number){ ?>
	            <div class="carousel-controls carousel-controls-v4">
	                <a class="left carousel-control" href="#post-slide-<?php the_ID(); ?>" data-slide="prev">
	                        <i class="fa fa-angle-left"></i>
	                </a>
	                <a class="right carousel-control" href="#post-slide-<?php the_ID(); ?>" data-slide="next">
	                        <i class="fa fa-angle-right"></i>
	                </a>
	            </div>    
	        <?php } ?>
        
			</div>
	<?php } ?>
</div>