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
if(!class_exists('Newfashion_Framework')){

abstract class Newfashion_Framework {

	/**
	 * @var String $themeName
	 *
	 * @access public
	 */
	protected $themeName='wpbase';

	/**
	 * @var Array $options
	 *
	 * @access protected
	 */
	protected $options=array();

	/**
	 * @var Array $menu
	 *
	 * @access protected
	 */
	protected $menus=array();

	/**
	 * @var string $sidebars
	 *
	 * @access protected
	 */
	protected $sidebars = array();

	/**
	 * @var Array $shortcodes
	 *
	 * @access protected
	 */
	protected $shortcodes = array();

	/**
	 * @var Array $images
	 *
	 * @access protected
	 */
	protected $imagesSize = array();

	/**
	 * @var Array $requiredPlugins
	 *
	 * @access protected
	 */
	protected $requiredPlugins = array();

	/**
	 * @var Array $scripts storing list of javascript files
	 *
	 * @access protected
	 */
	protected $scripts = array();

	/**
	 * @var Array $styles storing list of stylesheets files
	 *
	 * @access protected
	 */

	protected $styles = array();

	protected $themesSupports = array();

	protected $widgets = array();

	protected $posttype = array();

	/**
	 * constructor
	 */
	public function __construct(){
		$themename = get_option( 'stylesheet' );
        $themename = preg_replace("/\W/", "_", strtolower($themename) );

		$this->themeName = $themename;
		 
		if ( ! isset( $content_width ) ) $content_width = 900;
	}


	/**
	 *
	 */
	public function addImagesSize( $name=null, $width=0,$height=0,$crop=false){
		if($name!=null){
			$this->imagesSize[$name] = array('width'=>$width,'height'=>$height,'crop'=>$crop);
		}
	}

	/**
	 * Register  list of widgets supported inside framework
	 */
	public function addWidgetsSuport( $widgets=array()){
		if( is_array($widgets) ){
			$this->widgets = $widgets;
		}
	}

	/**
	 * Register  list of widgets supported inside framework
	 */
	public function addPostTypeSuport( $posttype=array()){
		if( is_array($posttype) ){
			$this->posttype = $posttype;
		}
	}

	/**
	 *
	 */
	public function setPostThumbnailSize($width=0,$height=0,$crop=false){
		set_post_thumbnail_size($width,$height,$crop);
	}

	/**
	 *
	 */
	public function addMenu( $location, $description  ){
		$this->menus[$location] = $description;
	}

	/**
	 *
	 */
	public function addRequiredPlugin( $required ){
		$this->requiredPlugins[] = $required;
	}

	/**
	 *
	 */
	public function addSidebar($key,$sidebar){
		if(is_array($sidebar)) { 
			$this->sidebars[$key] = $sidebar;
		}
	}


	/**
	 *
	 */
	public function addThemeSupport( $support, $default=null ){
		$this->themesSupports[$support] = $default;
	}

	/**
	 *
	 */
	public function addScript( $key, $src,$deps=array(),$ver=false,$in_footer=false){
		$this->scripts[$key] = array($src,$deps,$ver,$in_footer);
	}

	public function removeScript( $key ){
		if( isset($this->scripts[$key]) ){
			unset( $this->scripts[$key] );
			return true;
		}
		return false;
	}

	public function addStyle( $key, $url, $deps=array(),$ver=false,$media='all'){
		$this->styles[$key] = array($url,$deps,$ver,$media);
	}

	public function removeStyle( $key ){
		if( isset($this->styles[$key]) ){
			unset( $this->styles[$key] );
			return true;
		}
		return false;
	}

	/**
	 *
	 */
	public function getThemeSupport( $support ){
		return isset($this->themesSupports[$support])?$this->themesSupports[$support]:null;
	}

	public function init(){
	 
		$this->initFrontEndActions();
		$this->initPostType();
		$this->initWidgets();
	}

	public function initScript(){
		foreach( $this->scripts as $key => $file ) {
			wp_register_script( $key, $file[0], $file[1], $file[2], $file[3] );
			wp_enqueue_script( $key );
		}
	}


 
	/**
	 * Initial FrontEnd Actions
	 */
	public function initFrontEndActions(){
	 
		/// add_action('wp_enqueue_scripts', array( $this, 'initScripts' ) );		
		add_action('wp_head',array($this,'initCustomCode'),99);
		add_action('wp_head',array($this,'checkHTML5'),100);

		add_action('after_setup_theme',array($this,'initSetup'));
		add_action('widgets_init', array($this,'initSidebars'));
		add_action('tgmpa_register',array($this,'initRequiredPlugin') );
		 
	}
 
	/**
	 * Initial Search Filter
	 */
	public function searchFilter($query) {
	    if (isset($_GET['s']) && empty($_GET['s']) && $query->is_main_query()){
	        $query->is_search = true;
	        $query->is_home = false;
	    }
		return $query;
	}

	public function removeThumbnailDimensions( $html, $post_id, $post_image_id ) {
		$html = preg_replace( '/(width|height)=\"\d*\"\s/', "", $html );
		return $html;
	}

 
	/**
	 * Initial Custom Code
	 */
	public function initCustomCode(){
		if(function_exists('newfashion_wpo_theme_options')){
			echo ( $this->renderCode(newfashion_wpo_theme_options('snippet-close-body',''),newfashion_wpo_theme_options('snippet-js-body','')) );
		}
	}

	private function renderCode($css,$js){
		$str ='';
		if($css!=''){
			$str.='
			<style type="text/css">
				'.$css.'
			</style>';
		}
		if($js!=''){
			$str.='
			<script type="text/javascript">
				'.esc_js( $js ).';
			</script>
			';
		}
		$str = htmlspecialchars_decode($str);
		return $str;
	}

	/**
	 * Initial Sidebars
	 */
	public function initSetup(){
		 
		$this->initThemeSupport();
		$this->initRegisterMenu();
		$this->initImageSize();
		$this->setPostThumbnailSize();
	}

	/**
	 * Initial Shortcode Actions
	 */
	public function initShortcodes(){
		$shortcodes = glob( WPO_FRAMEWORK_SHORTCODE.'*.php' );
		foreach($shortcodes as $sc){
			require_once($sc);
		}
	}



	/**
	 * Initial Widgets Actions
	 */
	public function initWidgets( ){
		foreach( $this->widgets as $wg ){
			$wg = WPO_FRAMEWORK_WIDGETS.$wg.'.php';
			if( is_file($wg) ){
				require_once($wg);
			}
		}
	}

	/**
	 * Initial Post type Actions
	 */
	public function initPostType(){
		foreach( $this->posttype as $pt ){
			$pt = WPO_FRAMEWORK_POSTTYPE.$pt.'.php';
			if( is_file($pt) ){
				require_once($pt);
			}
		}
	}

	/**
	 * Initial FrontEnd Actions
	 */
	public function initRequiredPlugin(){  
		if(count($this->requiredPlugins)>0){
			tgmpa( $this->requiredPlugins  );
		}
	}


	/**
	 * Initial Sidebars
	 */
	public function initSidebars(){
		foreach ($this->sidebars as $key => $sidebar) {
			register_sidebar($sidebar);
		}
	}

	public function initImageSize(){
		foreach ($this->imagesSize as $key => $image) {
			add_image_size($key,$image['width'],$image['height'],$image['crop']);
		}
	}

	/**
	 * Initial Theme Support
	 */
	private function initThemeSupport(){
		add_theme_support( 'automatic-feed-links' );
		foreach ($this->themesSupports as $key => $value) {
			if($value!=null){
				add_theme_support($key,$value);
			}
			else{
				add_theme_support($key);
			}
		}
	}

	/**
	 * Initial Register Menu
	 */
	public function initRegisterMenu(){
		//register_nav_menu('wpo_megamenu','Megamenu');
		foreach ($this->menus as $key => $menu) {
			register_nav_menu( $key, $menu);
		}
	}

 

	public function checkHTML5(){  
		?>
		<!--[if lt IE 9]>
		    <script src="<?php echo WPO_FRAMEWORK_STYLE_URI; ?>js/html5.js"></script>
		    <script src="<?php echo WPO_FRAMEWORK_STYLE_URI; ?>js/respond.js"></script>
		<![endif]-->
		<?php
	}
}
}
?>