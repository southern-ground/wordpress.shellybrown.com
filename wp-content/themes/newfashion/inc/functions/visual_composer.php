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
 * Create variant objects to modify and proccess actions of only theme.
 */  
if( NEWFASHION_WPO_VISUAL_COMPOSER_ACTIVED ){
		
		/** 
		 * Replace pagebuilder columns and rows class by bootstrap classes
		 */
		function newfashion_wpo_change_bootstrap_class( $class_string,$tag ){
			if ($tag=='vc_row' || $tag=='vc_row_inner') {
				$class_string = str_replace('vc_row-fluid', 'row', $class_string);
				$class_string = str_replace('wpb_row ', '', $class_string);
			}
			if ($tag=='vc_column' || $tag=='vc_column_inner') {
				$class_string = preg_replace('/vc_span(\d{1,2})/', 'col-md-$1', $class_string);
				$class_string = preg_replace('/vc_hidden-(\w)/', 'hidden-$1', $class_string);
				$class_string = preg_replace('/vc_col-(\w)/', 'col-$1', $class_string);
				$class_string = str_replace('wpb_column', '', $class_string);
				$class_string = str_replace('column_container', '', $class_string);
			}
			return $class_string;
		}
		add_filter( 'vc_shortcodes_css_class', 'newfashion_wpo_change_bootstrap_class',10,2);

		/** 
		 * Add vc parameters 
		 */
		function newfashion_wpo_add_vc_params(){
			
			/**
			 * add new params for row
			 */
			vc_add_param( 'vc_row', array(
			    "type" => "checkbox",
			    "heading" => __("Parallax", 'newfashion'),
			    "param_name" => "parallax",
			    "value" => array(
			        'Yes, please' => true
			    )
			));

			vc_add_param( 'vc_row_inner', array(
			    "type" => "checkbox",
			    "heading" => __("Parallax", 'newfashion'),
			    "param_name" => "parallax",
			    "value" => array(
			        'Yes, please' => true
			    )
			));

			 vc_add_param( 'vc_row', array(
			     "type" => "dropdown",
			     "heading" => __("Is Boxed", 'newfashion'),
			     "param_name" => "isfullwidth",
			     "value" => array(
			     				__('Yes, Boxed', 'newfashion') => '1',
			     				__('No, Wide', 'newfashion') => '0'
			     			)
			));

			 vc_add_param( 'vc_row_inner', array(
			     "type" => "checkbox",
			     "heading" => __("Is Boxed", 'newfashion'),
			     "param_name" => "isfullwidth",
			     "value" => array(
			     		__('Yes, please', 'newfashion') => true,
			     	)
			));

			vc_add_param( 'vc_row', array(
			    "type" => "textfield",
			    "heading" => __("Icon", 'newfashion'),
			    "param_name" => "icon",
			    "value" => '',
				'description'	=> __( 'This support display icon from FontAwsome, Please click', 'newfashion' )
								. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank">'
								. __( 'here to see the list', 'newfashion' ) . '</a>'
			));
		}
		add_action('init','newfashion_wpo_add_vc_params',100);

		/**
		 * auto add footer type in visual composer
		 */
		function newfashion_set_visual_composer_post_type(){

			if($options = get_option('wpb_js_content_types')){
				$check = true;
			foreach ($options as $key => $value) {
				if($value=='footer'){  
					$check=false;
				}
			}
			if($check)
				$options[] = 'footer';
			}else{
				$options = array('page','footer');
			}

			update_option( 'wpb_js_content_types',$options );
		}
		add_action('init','newfashion_set_visual_composer_post_type',100);

		vc_add_shortcode_param('wpo_datepicker', 'newfashion_wpo_datepicker_settings_field', get_template_directory_uri().'/inc/assets/js/datepicker.js');
		function newfashion_wpo_datepicker_settings_field( $settings, $value ) {
			
			wp_enqueue_script( 'jquery-ui-datepicker' );
			
			return '<div class="wpo_datetimepicker_block">'             
							.'<input id="wpo_datepicker" name="' . esc_attr( $settings['param_name'] ) . '" class="wpb_vc_param_value wpb-textinput ' .              
							esc_attr( $settings['param_name'] ) . ' ' .              
							esc_attr( $settings['type'] ) . '_field" type="text" value="' . esc_attr( $value ) . '" />
	                </div>';
		}

		/**
		 * auto add footer type in visual composer
		 */
		function newfashion_wpo_load_vc_widgets(){ 
			newfashion_includes(  NEWFASHION_WPO_THEME_INC_DIR . '/vc/class/*.php' );
			newfashion_includes(  NEWFASHION_WPO_THEME_INC_DIR . '/vc/*.php' );
		}

		add_action('init','newfashion_wpo_load_vc_widgets',100);
}
?>