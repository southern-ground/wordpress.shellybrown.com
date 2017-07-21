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

if(NEWFASHION_WPO_WOOCOMMERCE_ACTIVED){

	/**
	 * Apply filter to change templates of minibask button following header layout
	 */
	function newfashion_wpo_minibasket_template( $template ){
		global $post, $newfashionEngine; 

		if( is_object($newfashionEngine) ){ 
			$layout = $newfashionEngine->getHeaderLayout($post->ID) ;
	 		if( $layout == 'absolute'){
	 			$template = 'mini-cart-button-v2';
	 		}
	 	}		
		return $template; 
	}

	add_filter( 'newfashion_wpo_minibasket_template', 'newfashion_wpo_minibasket_template' );
	/**
	 * add social share in product detail at bottom
	 */
 
	/**
	 * Change style for tab styles
	 */
	function newfashion_woocommerce_single_product_tab_class( $value ){
		return  $value;
	}
	add_filter( 'newfashion_woocommerce_single_product_tab_class', 'newfashion_woocommerce_single_product_tab_class' );


	/**
	 * Change style for accordions styles
	 */
	function newfashion_woocommerce_single_product_accordion_class( $value ){
		return  $value;
	}
	add_filter( 'newfashion_woocommerce_single_product_accordion_class', 'newfashion_woocommerce_single_product_accordion_class' );
 
}