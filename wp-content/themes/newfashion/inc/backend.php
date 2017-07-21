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
	class Newshopping_Backend {

		public function init(){
			global $pagenow; 

			add_action('wp_head',array($this,'initAjaxUrl'),15);
			add_action( 'admin_enqueue_scripts', array( $this, 'initScripts' ) );

			
			$this->makeCustomMetaBoxs();
			if (  isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) { 
				add_action( 'init', array($this, 'installSample' ), 1 );
			}

			$this->initAjaxAdmin();
			$this->setup();
		}

		public function installSample(){
			if( file_exists(NEWFASHION_WPO_THEME_DIR.'/sample/config.txt') ){
				$file = new WP_Filesystem_Direct( array() );				
				$content = $file->get_contents( NEWFASHION_WPO_THEME_DIR.'/sample/config.txt' );
				$data = @unserialize( trim($content) );
				if( is_array($data) ){ 
					update_option("newfashion_wpo_theme_options",$data);
 				}
			}
		}

		public function setup(){
			global $pagenow; 

			if ( is_admin() && isset($_GET['activated'] ) && $pagenow == 'themes.php' ) {
			  $menus = get_terms( 'nav_menu', array( 'hide_empty' => true ) ); 
			  $locations = get_theme_mod('nav_menu_locations');
			  if(!$locations['mainmenu'] && isset($menus[0]->term_id)){
			    $locations['mainmenu'] = $menus[0]->term_id;
			  }
			  set_theme_mod( 'nav_menu_locations', $locations );
			}
		}
		
		/**
		 * Initial Ajax Url
		 */
		public function initAjaxUrl() {
		?>
			<script type="text/javascript">
				var ajaxurl = '<?php echo esc_js( admin_url('admin-ajax.php') ); ?>';
			</script>
			<?php
		}

		public function initAjaxAdmin(){
			add_action( 'wp_ajax_wpo_post_embed', array($this,'initAjaxPostEmbed') );
			add_action( 'wp_ajax_wpo_video_popup', array($this,'ajax_Video_Popup') );
			add_action( 'wp_ajax_nopriv_wpo_video_popup', array($this,'ajax_Video_Popup') );
		}

		public function initAjaxPostEmbed(){
			if ( !$_REQUEST['oembed_url'] )
				die();
			// sanitize our search string
			global $wp_embed;
			$oembed_string = sanitize_text_field( $_REQUEST['oembed_url'] );
			$oembed_url = esc_url( $oembed_string );
			$check_embed = wp_oembed_get(  $oembed_url  );
			if($check_embed==false){
				$check = false;
				$result ='not found';
			}else{
				$check = true;
				$result = $check_embed;
			}
			echo json_encode( array( 'check' => $check,'video'=>$result ) );
			die();
		}

		public function ajax_Video_Popup(){
			$postconfig = get_post_meta($_POST['id'],'wpo_portfolio',true);
		    $content = wp_oembed_get($postconfig['video_link']);
		    echo '<div class="video-responsive">'. $content.'</div>';
			die();
		}
		
		/**
		 *
		 */
		public function initScripts(){
			global $wp_scripts;
			$jquery_version = isset( $wp_scripts->registered['jquery-ui-core']->ver ) ? $wp_scripts->registered['jquery-ui-core']->ver : '1.9.2';
			wp_enqueue_style( 'newfashion-jquery-ui-style', '//code.jquery.com/ui/' . $jquery_version . '/themes/smoothness/jquery-ui.css', array(), $jquery_version ); 
			wp_enqueue_style( 'newfashion-admin_meta_css', WPO_FRAMEWORK_ADMIN_STYLE_URI.'css/meta.css');
			wp_enqueue_style( 'newfashion-admin_style_css', WPO_FRAMEWORK_ADMIN_STYLE_URI.'css/admin.css');
			wp_enqueue_style('newfashion-base-fonticon', NEWFASHION_WPO_THEME_URI.'/css/font-awesome.css' );
			wp_enqueue_script('newfashion-option_framework_js', WPO_FRAMEWORK_ADMIN_STYLE_URI.'js/admin_plugins.js');
			wp_enqueue_style('newfashion-base-fonticon', NEWFASHION_WPO_THEME_URI.'/css/font-awesome.css' );
			wp_enqueue_script('newfashion-option_metabox_js', WPO_FRAMEWORK_ADMIN_STYLE_URI.'js/metabox.js');

		}

		/**
		 *
		 */
		public function makeCustomMetaBoxs(){
			$path = NEWFASHION_WPO_THEME_INC_DIR   . 'metabox_templates/';
		
		 	//Post setting
		 	new Newfashion_MetaBox(array(
				'id'       => 'wpo_postconfig',
				'title'    => __('Post Configuration' , 'newfashion'),
				'types'    => array('post'),
				'priority' => 'high',
				'template' => $path . 'post.php'
			));

			//Post setting
		 	new Newfashion_MetaBox(array(
				'id'       => 'wpo_brandconfig',
				'title'    => __('Brands Configuration', 'newfashion'),
				'types'    => array('brands'),
				'priority' => 'high',
				'template' => $path . 'brands.php'
			));
		  	
			/*
			 * Page Setting.
			 */
			$aa = new Newfashion_MetaBox(array(
				'id'       => 'wpo_pageconfig',
				'title'    => __('Page Configuration', 'newfashion'),
				'types'    => array('page'),
				'priority' => 'high',
				'template' => $path . 'page.php',
			));

			new Newfashion_MetaBox(array(
				'id'       => 'wpo_portfolio',
				'title'    => __('Portfolio Options', 'newfashion'),
				'types'    => array('portfolio'),
				'priority' => 'high',
				'template' => $path . 'portfolio.php',
			));

		}
		
	}

   	/** create instance of Backend */
    $backend = new Newshopping_Backend();
    $backend->init();