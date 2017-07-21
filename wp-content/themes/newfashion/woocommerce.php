<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     Opal  Team <opalwordpressl@gmail.com >
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http:/wpopal.com
 * @support  http://wpopal.com
 */
global $newfashion_config;
get_header( newfashion_wpo_theme_options('headerlayout', '') );

if( is_shop() ){	
	$page_id = get_option( 'woocommerce_shop_page_id' );
	$newfashion_config = $newfashionEngine->getWoocommercePageConfig( $page_id );
	wc_get_template( 'archive-product.php' , array( 'config' => $newfashion_config ) );
}elseif(is_single()){
	$newfashion_config = $newfashionEngine->configLayout(newfashion_wpo_theme_options('woocommerce-single-layout','fullwidth'));
	
	$newfashion_config['left-sidebar']['widget'] = ($newfashion_config['left-sidebar']['show']) ? newfashion_wpo_theme_options('woocommerce-single-left-sidebar', 'sidebar-left'): false;
	$newfashion_config['right-sidebar']['widget'] = ($newfashion_config['right-sidebar']['show']) ? newfashion_wpo_theme_options('woocommerce-single-right-sidebar', 'sidebar-right'): false;
	
	wc_get_template( 'single-product.php' , array( 'config'=>$newfashion_config ) );
}else{
	$newfashion_config = $newfashionEngine->configLayout(newfashion_wpo_theme_options('woocommerce-archive-layout','fullwidth'));
	
	$newfashion_config['left-sidebar']['widget'] = ($newfashion_config['left-sidebar']['show']) ? newfashion_wpo_theme_options('woocommerce-archive-left-sidebar', 'sidebar-left'): false;
	$newfashion_config['right-sidebar']['widget'] = ($newfashion_config['right-sidebar']['show']) ? newfashion_wpo_theme_options('woocommerce-archive-right-sidebar', 'sidebar-right'): false;

	wc_get_template( 'archive-product.php' , array( 'config' => $newfashion_config ) );
}

get_footer( );