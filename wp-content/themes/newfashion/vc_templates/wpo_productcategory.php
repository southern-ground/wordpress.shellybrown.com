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

switch ($columns_count) {
	case '4':
		$class_column='col-sm-3 col-md-3 col-sm-12 col-xs-12';
		break;
	case '3':
		$class_column='col-lg-4 col-md-4 col-sm-12 col-xs-12';
		break;
	case '2':
		$class_column='col-lg-6 col-md-6 col-sm-12 col-xs-12';
		break;
	case '1':
		$class_column='';
		break;
	default:
		$class_column='col-lg-4 col-md-4 col-sm-12 col-xs-12';
		break;
}

$_id = newshopping_makeid();
if($category=='') return;
$_count = 1;
$image_attributes = wp_get_attachment_image_src( $image_cat,'full' );

$data = newfashion_woocommerce_query('',$number,$category);
if($el_class!=''){?>
	<div class="<?php echo esc_attr($el_class); ?>">
<?php }
if($box_layout=='banner_left'){ 

	echo '<div class="row no-margin box_banner_left">';		
		echo '<div class="col-lg-2 col-md-2 no-padding banner_left hidden-sm hidden-xs">';
			if($title!=''){ ?>
				<h3 class="widget-title visual-title">
					<span class="sub-title"><?php echo trim($subtitle); ?></span><br/>
					<span><?php echo trim($title); ?></span>
				</h3>		
			<?php }
			if($title!=''){ ?>
				<?php
				if($image_attributes!=''){	
					echo '<img src="' .$image_attributes[0] . '" alt="'. $title .'" width="' . $image_attributes[1] . '" height="' . $image_attributes[2] . '" />';
				}
				?>		
			<?php }
		echo '</div>';
		echo '<div class="col-lg-10 col-md-10 col-sm-12 col-xs-12 no-padding">';
			
			if($title!=''){ ?>
				<h3 class="widget-title visual-title hidden-lg hidden-md">
					<span class="sub-title"><?php echo trim($subtitle); ?></span><br/>
					<span><?php echo trim($title); ?></span>
				</h3>		
			<?php } 
			
			if ( $data->have_posts() ) :?>
				<div class="woocommerce <?php echo esc_attr( $product_style ); ?>">
					<div class="widget-content <?php echo esc_attr($style); ?>">
						<?php wc_get_template( 'widget-products/'.$style.'.php' , array( 'loop'=>$data,'columns_count'=>$columns_count,'class_column'=>$class_column,'posts_per_page'=>$number ) ); ?>
					</div>
				</div>	
			<?php endif;
		echo '</div>';
	echo '</div>';
} else{
	if($title!=''){ ?>
		<h3 class="widget-title visual-title">
			<?php if($subtitle!=''): ?><span class="sub-title"><?php echo trim($subtitle); ?></span><br/><?php endif;?>
			<span><?php echo trim($title); ?></span>
		</h3>		
	<?php }
	
	if ( $data->have_posts() ) :?>
		<div class="woocommerce <?php echo esc_attr( $product_style );  ?>">
			<div class="widget-content <?php echo esc_attr($style); ?>">
				<?php wc_get_template( 'widget-products/'.$style.'.php' , array( 'loop'=>$data,'columns_count'=>$columns_count,'class_column'=>$class_column,'posts_per_page'=>$number ) ); ?>
			</div>
		</div>	
	<?php endif;
}
if($el_class!=''){?>
	</div>
<?php }