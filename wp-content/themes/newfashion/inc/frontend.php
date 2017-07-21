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

class Newfashion_Frontend extends Newfashion_Framework {

	public function __construct(){

		parent::__construct();
		// Add default Sidebar
		$this->setSidebarDefault();

		// Require Plugin
		$this->initRequirePlugin();
 		/* This theme uses post thumbnails */
		$this->addThemeSupport( 'post-thumbnails' );
		set_post_thumbnail_size( 470, 290, true );
		// Add default posts and comments RSS feed links to head*/
		$this->addThemeSupport( 'automatic-feed-links' );
		$this->addImagesSize( 'newfashion-fullwidth', 1170, 590, true );
		$this->addImagesSize('newfashion-thumbnails-medium', 500, 500, true);
		$this->addImagesSize('newfashion-thumbnails-large', 950, 950, true);		
		$this->addImagesSize('newfashion-protfolio-gallery', 770, 565, true);	
		$this->addImagesSize('newfashion-thumbnails-post', 370, 200, true);	
		$this->addImagesSize('newfashion-thumbnails-brand', 150, 75, true);	
		// Register Post type support
		add_filter('body_class',array($this,'newfashion_wpo_enable_sticky_menu'));

	 	$widget_suport = array( 'twitter','posts','featured_post','top_rate','recent_comment','recent_post','tabs','flickr', 'video', 'socials', 'socials_siderbar');
	 	$this->addWidgetsSuport($widget_suport);

	 	if( NEWFASHION_WPO_PLGTHEMER_ACTIVED ) { 
			/* Post types supported */
			$this->addPostTypeSuport( array( 'brands', 'testimonials', 'portfolio', 'footer', 'megamenu') );
		}
		/* add  post types support as default */
		$this->addThemeSupport( 'post-formats',  array( 'audio', 'aside', 'chat', 'image', 'link', 'quote', 'status', 'video') );
		// $this->loadFrontEndMedia();
		$this->setRTLMode();

		add_theme_support( "title-tag" );
		add_action( 'wp_footer',array($this,'newfashion_wpo_skins_css') );
		remove_theme_support( 'custom-background' );

	}

	/**
	 *
	 */
	public function setRTLMode(){
		if( isset($_GET['is_rtl']) ){  		
			$GLOBALS['text_direction'] = 'rtl';
			global $wp_locale;
 		    $wp_locale->text_direction = "rtl";
		}	
	}
	
	/**
	 *
	 */
	public function newfashion_wpo_skins_css() {
		$config = self::getPageConfig();
		if($config['skins'] && $config['skins'] != 'default'){
			$files = self::newfashion_wpo_get_file_skins($config['skins']);
			if($files)
				foreach($files as $file)
					echo '<link rel= "stylesheet" type="text/css" href="'.NEWFASHION_WPO_THEME_URI.'/css/skins/'.$config['skins'].'/'.$file.'"/>';	
		}
	}
	
	/**
	 *
	 */
	public function newfashion_wpo_get_file_skins($kins){
		$path = NEWFASHION_WPO_THEME_DIR.'/css/skins/'.$kins.'/';
		$file = '.css';
		$files = array();
        $allfiles = glob($path . '*' . $file);
        foreach ($allfiles as $name) {
			$name = basename($name);
            $files[$name] = $name;
        }
        return $files;
	}

	/**
	 *
	 */
	public function newfashion_wpo_enable_sticky_menu($classes){
		if(newfashion_wpo_theme_options('megamenu-is-sticky',false))
			$classes[] = 'main-menu-fixed';
		return $classes;
	}
 
	/**
	 *
	 */
	public function loadFrontEndMedia(){
		// add Javascript and CSS  
 		$this->addScript('newfashion-prettyphoto-js',NEWFASHION_WPO_THEME_URI.'/js/jquery.prettyPhoto.js',array(),false,true);
		$this->addScript('newfashion-owlcaousel-js',NEWFASHION_WPO_THEME_URI.'/js/owl-carousel/owl.carousel.min.js',array(),false,true);
		$this->addStyle('newfashion-owlcaousel-css',NEWFASHION_WPO_THEME_URI.'/js/owl-carousel/owl.carousel.css' );
		$this->addScript('newfashion-masonry-js',NEWFASHION_WPO_THEME_URI.'/js/isotope.pkgd.min.js',array(),false,true);
		$this->addScript('newfashion-main_js',NEWFASHION_WPO_THEME_URI.'/js/main.js',array(),false,true);
		$this->addStyle('newfashion-base-fonticon', NEWFASHION_WPO_THEME_URI.'/css/font-awesome.css' );
		$this->addStyle('newfashion-prettyPhoto', NEWFASHION_WPO_THEME_URI.'/css/prettyPhoto.css' );
		
		/* Canvas */
		$this->addStyle('newfashion-hoverEffectIdeasSet1', NEWFASHION_WPO_THEME_URI.'/css/hoverEffectIdeasSet1.css' );
		$this->addScript('newfashion-modernizr-custom-js',NEWFASHION_WPO_THEME_URI.'/js/modernizr.custom.js',array(),false,true);
		$this->addScript('newfashion-classie-js',NEWFASHION_WPO_THEME_URI.'/js/classie.js',array(),true,true);
		$this->addScript('newfashion-sidebarEffects-js',NEWFASHION_WPO_THEME_URI.'/js/sidebarEffects.js',array(),true,true);
	}

	/**
	 *
	 */
	public function getBlogConfig(){
		$config = array();
		$layout = newfashion_wpo_theme_options('blog-archive-layout');
		if( !empty($layout) )
			$lt = $layout;
		else
			$lt = 'mainright';

		$config = $this->configLayout($lt,$config);
		$config['page_layout']  			= newfashion_wpo_theme_options('blog-single-layout', 'mainright');
		$config['right-sidebar']['widget']	= newfashion_wpo_theme_options('blog-single-right-sidebar', 'sidebar-right');
		$config['left-sidebar']['widget'] 	= newfashion_wpo_theme_options('blog-single-left-sidebar', 'sidebar-left');
		$config['show_breadcrumb'] = newfashion_wpo_theme_options('blog_show-breadcrumb', true);
		return $config;
	}

	//Post Configuration
	public function getPostConfig(){
		global $wp_query;
		$postconfig = get_post_meta($wp_query->get_queried_object_id(),'wpo_postconfig',true);
		$defaults = array(  'config_layout'  	=> false);
		$postconfig = wp_parse_args((array) $postconfig, $defaults);
		$config = array();
		if( $postconfig['config_layout'] ==1){
			$config['page_layout'] 				= $postconfig['page_layout'];
			$config['right-sidebar']['widget']	= $postconfig['right_sidebar'];
			$config['left-sidebar']['widget'] 	= $postconfig['left_sidebar'];
		}else{
			$config['page_layout']  			= newfashion_wpo_theme_options('blog-single-layout', 'mainright');
			$config['right-sidebar']['widget']	= newfashion_wpo_theme_options('blog-single-right-sidebar', 'sidebar-right');
			$config['left-sidebar']['widget'] 	= newfashion_wpo_theme_options('blog-single-left-sidebar', 'sidebar-left');
		}

		if( empty($config))
			$lt = 'fullwidth';
		else
			$lt = $config['page_layout'];
		
		$config = $this->configLayout($lt,$config);

		if( isset($postconfig['audio_link']) && !empty( $postconfig['audio_link'] ) ){
			$config['audio_link']	 = $postconfig['audio_link'];
		}

		if( isset($postconfig['video_link']) && !empty( $postconfig['video_link'] )){
			$config['video_link']	 = $postconfig['video_link'];
		}

		if( isset($postconfig['link_url']) && $postconfig['link_url'] ){
			$config['link_url']	 = $postconfig['link_url'];
			$config['link_title']	 = $postconfig['link_title'];
		}

		if( isset($postconfig['chat_content']) && $postconfig['chat_content'] ){
			$config['chat_content']	 = $postconfig['chat_content'];
		}

		if( isset($postconfig['quote_content']) && $postconfig['quote_content'] ){
			$config['quote_content']	 = $postconfig['quote_content'];
			$config['quote_author']	 = $postconfig['quote_author'];
		}

		$maincontent = array();
		return $config;
	}

	/**
	 *
	 */
	//Portfolio Configuration
	public function getPortfolioConfig(){
		global $wp_query;
		$portconfig = get_post_meta($wp_query->get_queried_object_id(),'wpo_portfolio',true);

		$defaults = array(  'config_layout'  	=> false);
		$postconfig = wp_parse_args((array) $portconfig, $defaults);
		$config = array();
		if( $postconfig['config_layout'] ==1){
			$config['page_layout'] 				= $postconfig['page_layout'];
			$config['right-sidebar']['widget']	= $postconfig['right_sidebar'];
			$config['left-sidebar']['widget'] 	= $postconfig['left_sidebar'];
		}else{
			$config['page_layout']  			= newfashion_wpo_theme_options('portfolio-layout', 'mainright');
			$config['left-sidebar']['widget']	= newfashion_wpo_theme_options('portfolio-left-sidebar', 'sidebar-left');
			$config['right-sidebar']['widget'] 	= newfashion_wpo_theme_options('portfolio-right-sidebar', 'sidebar-right');
		}

		if( empty($config))
			$lt = 'fullwidth';
		else
			$lt = $config['page_layout'];
		
		$config = $this->configLayout($lt,$config);
		return $config;
	}

	// page Configuration
	public function getPageConfig( $post_ID=null ){ 
		global $wp_query;

		if( !$post_ID ){
			$post_ID = $wp_query->get_queried_object_id(); 
		}

		$pageconfig = get_post_meta( $post_ID,'wpo_pageconfig',true);
		$defaults = array(  'page_layout' => 'fullwidth',
                            'right_sidebar' => '' ,
                            'left_sidebar' => '',
                            'showtitle'=>false,
                            'advanced'=>'',
                            'breadcrumb'=>false,
                            'skins' => 'global',
                            'layout' => 'global',
                            'blog_number' => 10,
                            'blog_style' => '',
                            'blog_columns' => 4,
                            'portfolio_number' => 10,
                            'portfolio_style' => '',
                            'portfolio_columns'=>4,
                            'header_skin' => 'global',
                            'footer' => 'global',
                            'background_breadcrumb'=>'global',
                            'footer_skin' => 'global'
        );

		$config = wp_parse_args( (array) $pageconfig, $defaults );
 		$config['advanced'] = get_post_meta( $post_ID, 'wpo_template', TRUE);	
 		$lt = $config['page_layout'] ;
 		$config['right-sidebar']['widget'] = $config['right_sidebar'];
		$config['left-sidebar']['widget'] =  $config['left_sidebar'];
		
 		$config = $this->configLayout( $lt, $config );

		if(is_front_page()) {
			$config['paged'] = (get_query_var('page')) ? get_query_var('page') : 1;
		} else {
			$config['paged'] = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}
		
		return $config;
	}

	//config page shop
	public function getWoocommercePageConfig( $page_id=null ){
		$pageconfig = get_post_meta( $page_id, 'wpo_pageconfig', true );

		$defaults = array(  
			'page_layout'  		=> 'fullwidth',
            'right_sidebar' 	=> '' ,
            'left_sidebar' 		=> '',
            'showtitle' 		=> false,
            'advanced' 			=> '',
            'breadcrumb' 		=> false,
            'layout' 			=> 'global',
            'header_skin' 		=> 'global',
            'footer' 			=> 'global',
            'background_breadcrumb'=>'global',
            'footer_skin' 		=> 'global'
    	);
    	$config = wp_parse_args( (array) $pageconfig, $defaults );
 		$config['advanced'] = get_post_meta( $page_id, 'wpo_template', TRUE);	
 		$lt = $config['page_layout'] ;
 		$config['right-sidebar']['widget'] = $config['right_sidebar'];
		$config['left-sidebar']['widget'] =  $config['left_sidebar'];
		
 		$config = $this->configLayout( $lt, $config );
 		
 		if(is_front_page()) {
			$config['paged'] = (get_query_var('page')) ? get_query_var('page') : 1;
		} else {
			$config['paged'] = (get_query_var('paged')) ? get_query_var('paged') : 1;
		}
		return $config;
	}


	/**
	 *
	 */
	public function newfashion_wpo_body_class_page( $classes ){
		global $wp_query;
		foreach ( $classes as $key => $value ) {
	        if ( $value == 'boxed' || $value == 'default' ) 
	        	unset( $classes[ $key ] );
	    }
	    
		$pageconfig = get_post_meta($wp_query->get_queried_object_id(),'wpo_pageconfig',true);
		if(empty($pageconfig) || !isset( $pageconfig['layout'])) $pageconfig['layout']= 'global';
		if( $pageconfig['layout'] =='global' ){
			$classes[] = newfashion_wpo_theme_options('configlayout');
		}else
			$classes[] = $pageconfig['layout'];
			
	  	return $classes;
	}
 
	/**
	 *
	 */
	private function initRequirePlugin(){


		$this->addRequiredPlugin(array(
			'name'                     => 'WooCommerce', // The plugin name
		    'slug'                     => 'woocommerce', // The plugin slug (typically the folder name)
		    'required'                 => true, // If false, the plugin is only 'recommended' instead of required
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'YITH WooCommerce Zoom Magnifier', // The plugin name
		    'slug'                     => 'yith-woocommerce-zoom-magnifier', // The plugin slug (typically the folder name)
		    'required'                 =>  true
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'MailChimp', // The plugin name
		    'slug'                     => 'mailchimp-for-wp', // The plugin slug (typically the folder name)
		    'required'                 =>  true
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'Contact Form 7', // The plugin name
		    'slug'                     => 'contact-form-7', // The plugin slug (typically the folder name)
		    'required'                 => true, // If false, the plugin is only 'recommended' instead of required
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'WPBakery Visual Composer', // The plugin name
		    'slug'                     => 'js_composer', // The plugin slug (typically the folder name)
		    'required'                 => true,
		    'source'				   => 'http://www.wpopal.com/thememods/js_composer.zip' 
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'Revolution Slider', // The plugin name
            'slug'                     => 'revslider', // The plugin slug (typically the folder name)
            'required'                 => true ,
            'source'				   => 'http://www.wpopal.com/thememods/revslider.zip'
		));

		$this->addRequiredPlugin(array(
			'name'                     => 'WPO Themer Plugin', // The plugin name
		    'slug'                     => 'wpothemer', // The plugin slug (typically the folder name)
		    'required'                 =>  true,
		    'source'				   => 'http://wpopal.com/thememods/wpothemer.zip'
		));
	}

	//override
	public function configLayout($layout,$config=array()){
		switch ($layout) {
			// Two Sidebar
			case 'leftmainright':
				$config['left-sidebar']['show'] 	= true;
				$config['left-sidebar']['class'] 	='col-md-3';
				$config['right-sidebar']['class']	='col-md-3';
				$config['right-sidebar']['show'] 	= true;
				$config['main']['class'] 		='col-xs-12 col-md-6';
				break;
			//One Sidebar Right
			case 'mainright':
				$config['left-sidebar']['show'] 	= false;
				$config['right-sidebar']['show'] 	= true;
				$config['main']['class']  		='col-xs-12 col-md-9 no-sidebar-left';
				$config['right-sidebar']['class'] 	='col-xs-12 col-md-3';
				break;
			// One Sidebar Left
			case 'leftmain':
				$config['left-sidebar']['show'] 	= true;
				$config['right-sidebar']['show'] 	= false;
				$config['left-sidebar']['class'] 	='col-xs-12 col-md-3';
				$config['main']['class'] 		='col-xs-12 col-md-9 no-sidebar-right';
				break;

			// Fullwidth
			default:
				$config['left-sidebar']['show'] 	= false;
				$config['right-sidebar']['show'] 	= false;
				$config['main']['class'] 			='col-xs-12 no-sidebar';
				break;
		}
		
		return $config;
	}


   /**
	*
	*/
	private function setSidebarDefault(){
		$this->addSidebar('sidebar-default',
			array(
				'name'          => __( 'Sidebar Default', 'newfashion'),
				'id'            => 'sidebar-default',
				'description'   => __( 'Appears on posts and pages in the sidebar.', 'newfashion'),
				'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		$this->addSidebar('intro-landingpage',
			array(
				'name'			 => __('Sidebar Intro Landingpage', 'newfashion'),
				'id'				 => 'intro-landingpage',
				'description'   => __( 'Appears on intro slider in the sidebar (use on header intro landingpage).', 'newfashion'),
				'before_widget' => '<aside id="%1$s" class="widget space-0 clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>', 
			));
			
			$this->addSidebar('info-topbar',
			array(
				'name'			 => __('Info topbar', 'newfashion'),
				'id'				 => 'info-topbar',
				'description'   => __( 'Appears on intro slider in the topbar.', 'newfashion'),
				'before_widget' => '<aside id="%1$s" class="widget space-0 clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>', 
			));	

		$this->addSidebar('social-header',
			array(
				'name'          => __( 'Social Header', 'newfashion'),
				'id'            => 'social-header',
				'description'   => __( 'Appears on posts and pages in the sidebar.', 'newfashion'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));	
			
		$this->addSidebar('sidebar-left',
			array(
				'name'          => __( 'Left Sidebar', 'newfashion'),
				'id'            => 'sidebar-left',
				'description'   => __( 'Appears on posts and pages in the sidebar.', 'newfashion'),
				'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		$this->addSidebar('sidebar-right',
			array(
				'name'          => __( 'Right Sidebar', 'newfashion'),
				'id'            => 'sidebar-right',
				'description'   => __( 'Appears on posts and pages in the sidebar.', 'newfashion'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
 
			$this->addSidebar('blog-sidebar-left',
			array(
				'name'          => __( 'Blog Left Sidebar', 'newfashion'),
				'id'            => 'blog-sidebar-left',
				'description'   => __( 'Appears on posts and pages in the sidebar.', 'newfashion'),
				'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title">',
				'after_title'   => '</span></h3>',
			));

			$this->addSidebar('blog-sidebar-right',
			array(
				'name'          => __( 'Blog Right Sidebar', 'newfashion'),
				'id'            => 'blog-sidebar-right',
				'description'   => __( 'Appears on posts and pages in the sidebar.', 'newfashion'),
				'before_widget' => '<aside id="%1$s" class="widget  clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));

		$this->addSidebar('footer-1',
			array(
				'name'          => __( 'Footer 1', 'newfashion'),
				'id'            => 'footer-1',
				'description'   => __( 'Appears in the footer section of the site.', 'newfashion'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		$this->addSidebar('footer-2',
			array(
				'name'          => __( 'Footer 2', 'newfashion'),
				'id'            => 'footer-2',
				'description'   => __( 'Appears in the footer section of the site.', 'newfashion'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		$this->addSidebar('footer-3',
			array(
				'name'          => __( 'Footer 3', 'newfashion'),
				'id'            => 'footer-3',
				'description'   => __( 'Appears in the footer section of the site.', 'newfashion'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
		$this->addSidebar('footer-4',
			array(
				'name'          => __( 'Footer 4', 'newfashion'),
				'id'            => 'footer-4',
				'description'   => __( 'Appears in the footer section of the site.', 'newfashion'),
				'before_widget' => '<aside id="%1$s" class="widget clearfix %2$s">',
				'after_widget'  => '</aside>',
				'before_title'  => '<h3 class="widget-title"><span>',
				'after_title'   => '</span></h3>',
			));
	}

	/**
	 *
	 */
	public function getHeaderLayout(){
		global $wp_query;
	    $layout = get_post_meta($wp_query->get_queried_object_id(),'wpo_pageconfig',true);

	    if( !isset($layout['header_skin']) || isset( $layout['header_skin'] ) && $layout['header_skin'] =='global' )
			return newfashion_wpo_theme_options('headerlayout','');
		else
			return $layout['header_skin'];
	}
}
?>