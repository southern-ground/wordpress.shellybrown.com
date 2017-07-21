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

$alignment = '';;
$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );


$_id = newshopping_makeid();
$args = array(
	'post_type' => 'brands',
	'posts_per_page'=>$number
);
$loop = new WP_Query($args);

if ( $loop->have_posts() ) : ?>
<?php
	$_count = 1;
	$columns_count = 6;
	 
?>
	<div class="widget widget-brand-logo <?php echo (($el_class!='')?' '.$el_class:''); ?>">
		<?php if(!empty($title)){ ?>
			<h3 class="widget-title visual-title <?php echo esc_attr($alignment); ?>">
				<?php if($icon!=''){ ?>
					<i class="fa <?php echo esc_attr($icon); ?>"></i>
				<?php } ?>
				<span class="sub-title"><?php echo trim($subtitle); ?></span><br/>
				<span><?php echo trim($title); ?></span>
				<?php if(trim($descript)!=''){ ?>
		            <span class="widget-desc">
		                <?php echo trim($descript); ?>
		            </span>
		        <?php } ?>
			</h3>
		<?php } ?>

		<div class="widget-content">
			<div class="widget-brands-inner owl-carousel-play" id="productcarouse-<?php echo esc_attr($_id); ?>" data-ride="carousel">
				
				<div class="owl-carousel" data-slide="<?php echo esc_attr($item_row);?>"  data-singleItem="true" data-navigation="true" data-pagination="false">
				<?php while ( $loop->have_posts() ) : $loop->the_post();?>
					<?php   echo '<div class="item">'; ?>
						<?php
							$meta = get_post_meta(get_the_ID(),'wpo_brandconfig',true);
							$link = isset($meta['brand_link']) ? $meta['brand_link'] : '#';
						?>
						<!-- Product Item -->
						<div class="item-brand text-center">
							<a href="<?php echo esc_url($link); ?>" target="_blank">
								<?php the_post_thumbnail( 'brand-logo' ); ?>
							</a>
						</div>
						<!-- End Product Item -->

					<?php  echo '</div>'; ?>
					<?php $_count++; ?>
				<?php endwhile; ?>
				<?php wp_reset_postdata(); ?>
				</div>
			</div>
		</div>

	</div>
<?php endif; ?>