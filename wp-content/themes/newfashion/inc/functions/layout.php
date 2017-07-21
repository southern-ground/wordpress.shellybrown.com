<?php 
/**
 * Theme function
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <opalwordpress@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */	

	/**
	 *  Hook to render tags for start of wrapping content
	 */
	function newfashion_wpo_layout_breadcrumbs_render(){
		global $newfashion_config; 
		if( is_front_page() ){
			return ;
		}
		$customize_image = get_header_image();
		$style = '';

		if( isset($newfashion_config['background_breadcrumb']) ){
			switch ( $newfashion_config['background_breadcrumb']) {
				case 'bg_image':{
					if( isset( $newfashion_config['image_breadcrumb'] ) && !empty( $newfashion_config['image_breadcrumb'] ))
						$style = 'background-image: url('.esc_url_raw( $newfashion_config['image_breadcrumb'] ).');';
					break;
				}
				case 'bg_color':{
					if( isset( $newfashion_config['bg_color']) && !empty( $newfashion_config['bg_color']))
						$style = 'background-color:'.esc_attr( $newfashion_config['bg_color'] );
					break;
				}
				case 'global':{
					if( isset( $customize_image) && !empty( $customize_image)){
						$style = "background: url('".esc_url_raw( $customize_image )."') no-repeat center center #f9f9f9";
					}else{
						$style="background: url('".get_template_directory_uri()."/images/bg-cart.jpg') no-repeat center center #f9f9f9";
					}break;
				}

				default:
					$style="background: url('".get_template_directory_uri()."/images/bg-cart.jpg') no-repeat center center #f9f9f9";
					break;
			}
		}elseif( isset( $customize_image) && !empty( $customize_image)) {
					$style="background: url('".esc_url_raw( $customize_image )."') no-repeat center center #f6f6f6";
		}else{
			$style="background: url('".get_template_directory_uri()."/images/bg-cart.jpg') no-repeat center center #f9f9f9";
		}
		?>
	    <div class="wpo-breadcrumbs" style="<?php echo ($style);?>">
	        <?php newfashion_breadcrumb(); ?>
	    </div>
 	<?php 
	}

	add_action( 'newfashion_wpo_layout_breadcrumbs_render', 'newfashion_wpo_layout_breadcrumbs_render' );
	/**
	 *
	 */
	function newfashion_wpo_layout_template_before(){
		global $newfashion_config; 
	?>
		
		<section id="wpo-mainbody" class="wpo-mainbody default-template clearfix">
	  		<div class="container<?php if( isset($newfashion_config['layout'])&&$newfashion_config['layout']=='fullwidth') { ?>-fuild<?php } ?>">
	      	<div class="container-inner">
	        		<div class="row">
	          		<?php get_sidebar( 'left' );  ?>
			        <!-- MAIN CONTENT -->
			        <div id="wpo-content" class="<?php echo esc_attr( $newfashion_config['main']['class'] ); ?>">
			            <div class="wpo-content">

	<?php }  
	add_action( 'newfashion_wpo_layout_template_before', 'newfashion_wpo_layout_template_before' );


	/**
	 *  Hook to render tags for close of wrapping content
	 */
	function newfashion_wpo_layout_template_after(){
		global $newfashion_config; 
	?>	
				         	</div>
			            </div>
			          <!-- //MAIN CONTENT -->
			          <?php get_sidebar( 'right' );  ?>
			         </div>
			   </div>
		   </div>
		</section>

	<?php }

	add_action( 'newfashion_wpo_layout_template_after', 'newfashion_wpo_layout_template_after' );

?>