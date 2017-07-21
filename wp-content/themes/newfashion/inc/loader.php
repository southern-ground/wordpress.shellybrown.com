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
  * @website  http://www.wpopal.com
  * @support  http://www.wpopal.com/support/forum.html
  */
if( !defined("NEWFASHION_WPO_THEME_DIR") ){
    define( 'NEWFASHION_WPO_THEME_DIR', get_template_directory() );
    define( 'NEWFASHION_WPO_THEME_URI', get_template_directory_uri() );
}

define( 'WPO_FRAMEWORK_PATH', NEWFASHION_WPO_THEME_DIR . '/inc/core/' ); 
define( 'WPO_FRAMEWORK_PATH1', NEWFASHION_WPO_THEME_DIR . '/inc/' ); 
define( 'WPO_FRAMEWORK_LANGUAGE', WPO_FRAMEWORK_PATH.'language' );
define( 'WPO_FRAMEWORK_POSTTYPE', ABSPATH.'wp-content/plugins/wpothemer/posttypes/' );
define( 'WPO_FRAMEWORK_WIDGETS', WPO_FRAMEWORK_PATH.'widgets/' );

define( 'WPO_FRAMEWORK_TEMPLATES', NEWFASHION_WPO_THEME_DIR.'/templates/' ); 
define( 'WPO_FRAMEWORK_WOOCOMMERCE_WIDGETS', NEWFASHION_WPO_THEME_DIR.'/woocommerce/widgets/' );
define( 'WPO_FRAMEWORK_TEMPLATES_PAGEBUILDER', NEWFASHION_WPO_THEME_DIR.'/vc_templates/' );
define( 'WPO_FRAMEWORK_ADMIN_TEMPLATE_PATH', NEWFASHION_WPO_THEME_DIR . '/inc/core/admin/templates/' );
define( 'WPO_FRAMEWORK_PLUGINS', NEWFASHION_WPO_THEME_DIR.'/inc/plugins/' );
define( 'WPO_FRAMEWORK_XMLPATH', NEWFASHION_WPO_THEME_DIR.'/customize/' );
define( 'WPO_FRAMEWORK_CUSTOMZIME_STYLE', WPO_FRAMEWORK_XMLPATH.'assets/' );

// URI
define( 'WPO_FRAMEWORK_CUSTOMZIME_STYLE_URI', NEWFASHION_WPO_THEME_URI.'/css/customize/' );

define( 'WPO_FRAMEWORK_ADMIN_STYLE_URI', NEWFASHION_WPO_THEME_URI.'/inc/assets/' );
define( 'WPO_FRAMEWORK_ADMIN_IMAGE_URI', WPO_FRAMEWORK_ADMIN_STYLE_URI.'images/' );
define( 'WPO_FRAMEWORK_STYLE_URI', NEWFASHION_WPO_THEME_URI.'/inc/assets/' );  

require_once ( WPO_FRAMEWORK_PATH . 'classes/plugin-activation.php' ); 

require_once ( WPO_FRAMEWORK_PATH . 'classes/metabox.php' );
require_once ( WPO_FRAMEWORK_PATH . 'classes/widget.php' ); 
require_once ( WPO_FRAMEWORK_PATH . 'classes/framework.php' );

/**
 * Megamenu Libs
 */
require_once ( WPO_FRAMEWORK_PATH . 'classes/navwalker.php' );
require_once ( WPO_FRAMEWORK_PATH . 'classes/offcanvas-menu.php' );

require_once ( WPO_FRAMEWORK_PATH . 'functions/functions.php');
require_once ( WPO_FRAMEWORK_PATH . 'functions/function-import.php');

require_once( NEWFASHION_WPO_THEME_INC_DIR . 'frontend.php' );

newfashion_includes(  WPO_FRAMEWORK_PATH1 . '/classes/*.php' );
if( is_admin() ) {
   require_once( NEWFASHION_WPO_THEME_INC_DIR . 'backend.php' );
}