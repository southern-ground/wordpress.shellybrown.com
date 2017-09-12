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

if( !defined('TEXTDOMAIN') ){

	$themename = get_option( 'stylesheet' ); 
	$themename = preg_replace("/\W/", "_", strtolower($themename) );
	define( 'TEXTDOMAIN', $themename );
}

define( 'NEWFASHION_WPO_THEME_DIR', get_template_directory() );
define( 'WPO_THEME_DIR', get_template_directory() );
define( 'WPO_THEME_INC_DIR', NEWFASHION_WPO_THEME_DIR.'/inc/' );

define( 'NEWFASHION_WPO_THEME_INC_DIR', NEWFASHION_WPO_THEME_DIR.'/inc/' );
define( 'NEWFASHION_WPO_THEME_CSS_DIR', NEWFASHION_WPO_THEME_DIR.'/css/' );

define( 'NEWFASHION_WPO_THEME_URI', get_template_directory_uri() );

define( 'NEWFASHION_WPO_THEME_NAME', 'newfashion' );
define( 'NEWFASHION_WPO_THEME_VERSION', '1.0' );

define( 'NEWFASHION_WPO_WOOCOMMERCE_ACTIVED', 	   in_array( 'woocommerce/woocommerce.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
define( 'NEWFASHION_WPO_VISUAL_COMPOSER_ACTIVED', in_array( 'js_composer/js_composer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) ); 
define( 'NEWFASHION_WPO_EVENT_ACTIVED', 		   in_array( 'the-events-calendar/the-events-calendar.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
define( 'NEWFASHION_WPO_PLGTHEMER_ACTIVED', 	   in_array( 'wpothemer/wpothemer.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );
define( 'NEWFASHION_WPO_MAILCHIMP_ACTIVED', in_array( 'mailchimp-for-wp/mailchimp-for-wp.php', apply_filters( 'active_plugins', get_option( 'active_plugins' ) ) ) );

/*
 * Include list of files from Opal Framework.
 */ 
require_once( NEWFASHION_WPO_THEME_DIR . '/inc/loader.php' );
/* 
 * Localization
 */ 
$lang = NEWFASHION_WPO_THEME_DIR . '/languages' ;
load_theme_textdomain( 'newfashion', $lang );

/*
 * Create & start up instance of framework in application.
 */

/// include list of functions to process logics of worpdress not support 3rd-plugins.
newfashion_includes(  NEWFASHION_WPO_THEME_INC_DIR . '/functions/*.php' );

/**
 * Theme Customizer
 */	
newfashion_includes(  NEWFASHION_WPO_THEME_INC_DIR . '/customizer/*.php' );

/// WooCommerce specified functions
if( NEWFASHION_WPO_WOOCOMMERCE_ACTIVED  ) {
    require_once( NEWFASHION_WPO_THEME_INC_DIR . 'woocommerce/woocommerce.php' );
}

/**
 * Startup theme application
 *  
 */
$newfashionEngine = new Newfashion_Frontend();


// Add List of Menu Group
$newfashionEngine->addMenu('mainmenu','Main Menu');
$newfashionEngine->init();


 /**
  * load global and logic css , file in first
  */
function newfashion_load_base_frontend_cssjs(){
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ){
  		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script("jquery");
	/*  add scripts files  */

	// wp_enqueue_script('newfashion-base_bootstrap_js',NEWFASHION_WPO_THEME_URI.'/js/bootstrap.min.js');

    wp_enqueue_style( 'theme-style', get_stylesheet_uri() );
	 

	$currentSkin = str_replace( '.css','',newfashion_wpo_theme_options('skin','default') );
	// Check RTL
	if( is_rtl() ){
		if( file_exists(NEWFASHION_WPO_THEME_CSS_DIR.'skins/'.$currentSkin.'/bootstrap-rtl.css') ){
			// wp_enqueue_style( 'newfashion-bootstrap-rtl-'.$currentSkin, NEWFASHION_WPO_THEME_URI.'/css/skins/'.$currentSkin.'/bootstrap-rtl.css' );
		}else {
			// wp_enqueue_style( 'newfashion-bootstrap-rtl-default',NEWFASHION_WPO_THEME_URI.'/css/bootstrap-rtl.css' );
		}
	}else{
		if( file_exists(NEWFASHION_WPO_THEME_CSS_DIR.'skins/'.$currentSkin.'/bootstrap.css') ){
			// wp_enqueue_style( 'newfashion-bootstrap-'.$currentSkin, NEWFASHION_WPO_THEME_URI.'/css/skins/'.$currentSkin.'/bootstrap.css' );
		}else {
			// wp_enqueue_style( 'newfashion-bootstrap-default', NEWFASHION_WPO_THEME_URI.'/css/bootstrap.css' );
		}
	}

	if( $currentSkin == 'template' || empty($currentSkin) || $currentSkin == 'default' ){
		wp_enqueue_style( 'newfashion-template-default',NEWFASHION_WPO_THEME_URI.'/css/template.css' );
	}else {
		wp_enqueue_style('newfashion-template-'.$currentSkin,NEWFASHION_WPO_THEME_URI.'/css/skins/'.$currentSkin.'/template.css' );
	}
	
	/* add styles files */
	if( is_rtl() ){
		wp_enqueue_style('newfashion-style-rtl',NEWFASHION_WPO_THEME_URI.'/css/rtl/template.css');
	}

	if( newfashion_wpo_theme_options('customize-theme','') && newfashion_wpo_theme_options('customize-theme','') != 'nouse' ){		 
		wp_enqueue_style('newfashion-customize-style',WPO_FRAMEWORK_CUSTOMZIME_STYLE_URI.newfashion_wpo_theme_options('customize-theme').'.css');
	}
}
add_action( 'wp_enqueue_scripts', 'newfashion_load_base_frontend_cssjs' , 1 );

/**
 * Load javascript for template
 */ 
function newfashion_load_frontend_js(){
	// add Javascript and CSS  
	wp_enqueue_script('newfashion-prettyphoto-js',NEWFASHION_WPO_THEME_URI.'/js/jquery.prettyPhoto.js',array(),false,true);
	wp_enqueue_script('newfashion-owlcaousel-js',NEWFASHION_WPO_THEME_URI.'/js/owl-carousel/owl.carousel.min.js',array(),false,true);
	 
	wp_enqueue_script('newfashion-masonry-js',NEWFASHION_WPO_THEME_URI.'/js/isotope.pkgd.min.js',array(),false,true);
	wp_enqueue_script('newfashion-main_js',NEWFASHION_WPO_THEME_URI.'/js/main.js',array(),false,true);
 
	wp_enqueue_script('newfashion-modernizr-custom-js',NEWFASHION_WPO_THEME_URI.'/js/modernizr.custom.js',array(),false,true);
	wp_enqueue_script('newfashion-classie-js',NEWFASHION_WPO_THEME_URI.'/js/classie.js',array(),true,true);
	wp_enqueue_script('newfashion-sidebarEffects-js',NEWFASHION_WPO_THEME_URI.'/js/sidebarEffects.js',array(),true,true);
}

add_action( 'wp_enqueue_scripts', 'newfashion_load_frontend_js', 3 );

/**
 * load css file for template
 */ 
function newfashion_load_frontend_css(){
	// add Javascript and CSS  
 
	wp_enqueue_style('newfashion-owlcaousel',NEWFASHION_WPO_THEME_URI.'/js/owl-carousel/owl.carousel.css' );
	 
	wp_enqueue_style('newfashion-base-fonticon', NEWFASHION_WPO_THEME_URI.'/css/font-awesome.css' );
	wp_enqueue_style('newfashion-prettyphoto', NEWFASHION_WPO_THEME_URI.'/css/prettyPhoto.css' );
	
	/* Canvas */
	wp_enqueue_style('newfashion-hover-effect-ideasset1', NEWFASHION_WPO_THEME_URI.'/css/hoverEffectIdeasSet1.css' );
 
}
add_action( 'wp_enqueue_scripts', 'newfashion_load_frontend_css', 2 );