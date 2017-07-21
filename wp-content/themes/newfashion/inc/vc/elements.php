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

/**
 * Call To Action
 */	
	 
vc_update_shortcode_param( 'vc_cta_button2', array(
	'type' => 'dropdown',
	'heading' => __( 'Button Style Color', 'newfashion' ),
	'param_name' => 'color',
	'prioryty' => 1,
	'value' => array(
		__( 'Default', 'newfashion' ) => 'btn-default',
		__( 'Primary', 'newfashion' ) => 'btn-primary',
		__( 'Danger', 'newfashion' ) => 'btn-danger',
		__( 'Success', 'newfashion' ) => 'btn-success',
		__( 'Info', 'newfashion' ) => 'btn-info',
		__( 'Warning', 'newfashion' ) => 'btn-warning',

		__( 'Outline Primary', 'newfashion' ) => 'btn-outline btn-primary',
		__( 'Outline Danger', 'newfashion' ) => 'btn-outline btn-danger',
		__( 'Outline Success', 'newfashion' ) => 'btn-outline btn-success',
		__( 'Outline Info', 'newfashion' ) => 'btn-outline btn-info',
		__( 'Outline Warning', 'newfashion' ) => 'btn-outline btn-warning',

		__( 'Inverse Primary', 'newfashion' ) => 'btn-inverse btn-primary',
		__( 'Inverse Danger', 'newfashion' ) => 'btn-inverse btn-danger',
		__( 'Inverse Success', 'newfashion' ) => 'btn-inverse btn-success',
		__( 'Inverse Info', 'newfashion' ) => 'btn-inverse btn-info',
		__( 'Inverse  Warning', 'newfashion' ) => 'btn-inverse btn-warning',
	)
));

vc_update_shortcode_param('vc_cta_button2', array(
   'type' => 'dropdown',
   'heading' => __( 'Heading Style', 'newfashion' ),
   'param_name' => 'heading_style',
   'prioryty' => 2,
   'value' => array(
   	__('Default', 'newfashion')	=> 'default',
      __( 'Version 1', 'newfashion' ) => 'v1',
      __( 'Version 2', 'newfashion' ) => 'v2',
      __( 'Version 3', 'newfashion' ) => 'v3',
		__( 'Version 4', 'newfashion' ) => 'v4',
		__( 'Version 5', 'newfashion' ) => 'v5',
		__( 'Version 6', 'newfashion' ) => 'v6',
		__( 'Version 7', 'newfashion' ) => 'v7',
		__( 'Version 8', 'newfashion' ) => 'v8',
		__( 'Version 9', 'newfashion' ) => 'v9',
		__( 'Version 10', 'newfashion' ) => 'v10',
		__( 'Version 11', 'newfashion' ) => 'v11',
		__( 'Version 12', 'newfashion' ) => 'v12',
		__( 'Version 13', 'newfashion' ) => 'v13',
    )
));

vc_update_shortcode_param( 'vc_cta_button2', array(
	'type' => 'dropdown',
	'heading' => __( 'CTA Style', 'newfashion' ),
	'param_name' => 'style',
	'prioryty' => 1,
	'value' => array(
		__( 'Version 1', 'newfashion' ) => '1',
		__( 'Version 2', 'newfashion' ) => '2',
		__( 'Version 3', 'newfashion' ) => '4',
		__( 'Version Light Style 1', 'newfashion' ) => '1 light-style ',
		__( 'Version Light Style 2', 'newfashion' ) => '3 light-style ',
		__( 'Version Light Style 4', 'newfashion' ) => '4 light-style '
	
	)
));

vc_update_shortcode_param( 'vc_cta_button2', array(
	'type' => 'dropdown',
	'heading' => __( 'Button Radius Style', 'newfashion' ),
	'param_name' => 'btn_style',
	'prioryty' => 1,
	'value' => array(
		__( 'None', 'newfashion' ) => '',
		__( 'Radius 50%', 'newfashion' ) => '',
	 	__( 'Radius 1x', 'newfashion' ) => 'radius-1x',
	 	__( 'Radius 2x', 'newfashion' ) => 'radius-2x',
	 	__( 'Radius 3x', 'newfashion' ) => 'radius-3x',
	 	__( 'Radius 4x', 'newfashion' ) => 'radius-4x',
		__( 'Radius 5x', 'newfashion' ) => 'radius-5x',
		__( 'Radius 6x', 'newfashion' ) => 'radius-6x',
	
	)
));

//Accordions
vc_update_shortcode_param( 'vc_accordion', array(
	'type' => 'dropdown',
	'heading' => __( 'Style', 'newfashion' ),
	'param_name' => 'style',
	'prioryty' => 1,
	'value' => array(
		__( 'Style 1', 'newfashion' ) => 'style-1',
		__( 'Style 2', 'newfashion' ) => 'style-2',
	)
));

//Accordions
vc_update_shortcode_param( 'vc_toggle', array(
	'type' => 'dropdown',
	'heading' => __( 'Skin', 'newfashion' ),
	'param_name' => 'skin',
	'prioryty' => 1,
	'value' => array(
		__( 'Skin 1', 'newfashion' ) => '',
		__( 'Style 2', 'newfashion' ) => 'style-2',
	)
));

//Tabs
vc_update_shortcode_param( 'vc_tabs', array(
	'type' => 'dropdown',
	'heading' => __( 'Style', 'newfashion' ),
	'param_name' => 'style',
	'prioryty' => 1,
	'value' => array(
		__( 'Default', 'newfashion' ) => '',
		__( 'Style 1', 'newfashion' ) => 'style-1',
		__( 'Style 2', 'newfashion' ) => 'style-2',
	)
));

//Tab
vc_update_shortcode_param( 'vc_tab', array(
	'type' => 'textfield',
	'heading' => __( 'Icon', 'newfashion' ),
	'param_name' => 'icon',
	'prioryty' => 1,
	'value' => ''
));		

	/**********************************************************************************************************************
	 * Testimonials
	 **********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Testimonials",'newfashion'),
	    "base" => "wpo_testimonials",
	    'description'=> __('Play Testimonials In Carousel', 'newfashion'),
	    "class" => "",
	    "category" => __('Opal Elements', 'newfashion'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'newfashion'),
				"param_name" => "title",
				"admin_label" => true,
				"value" => '',
					"admin_label" => true
			),
			
			array(
				"type" => "textfield",
				"heading" => __("Sub Title", 'newfashion'),
				"param_name" => "subtitle",
				"value" => '',
					"admin_label" => true
			),

	    	array(
                'type' => 'dropdown',
                'heading' => __( 'Title Alignment', 'newfashion' ),
                'param_name' => 'alignment',
                'value' => array(
                    __( 'Align left', 'newfashion' ) => 'separator_align_left',
                    __( 'Align center', 'newfashion' ) => 'separator_align_center',
                    __( 'Align right', 'newfashion' ) => 'separator_align_right'
                )
            ),
            array(
				"type" => "textfield",
				"heading" => __("Number", 'newfashion'),
				"param_name" => "number",
				"value" => '6',
			),
			array(
				"type" => "dropdown",
				"heading" => __("Skin", 'newfashion'),
				"param_name" => "skin",
				"value" => array('Version Style left'=>'left','Version Style 2'=>'v2','Version Style Slide'=>'slide','Version Style 4'=>'v4','Version Style 5'=>'v5','Version Style 6'=>'v6'),
				"admin_label" => true,
				"description" => __("Select Skin layout.", 'newfashion')
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'newfashion'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'newfashion')
			)
	   	)
	));
	add_shortcode( 'wpo_testimonials', ('newfashion_wpo_vc_shortcode_render') );


	/**
	 *
	 */

	vc_map( array(
		'name'        => __( 'WPO Block Heading','newfashion'),
		'base'        => 'wpo_block_heading',
		"class"       => "",
		"category"    => __('Opal Elements', 'newfashion'),
		'description' => __( 'Create Block Heading with info + icon', 'newfashion' ),
		"params"      => array(
			
			array(
				'type' => 'textfield',
				'heading' => __( 'Block Heading Title', 'newfashion' ),
				'param_name' => 'title',
				'value'       => __( '', 'newfashion' ),
				'description' => __( 'Enter heading title.', 'newfashion' ),
				"admin_label" => true
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Sub Heading Title', 'newfashion' ),
				'param_name' => 'subheading',
				'value'       => __( '', 'newfashion' ),
				'description' => __( 'Enter Sub heading title.', 'newfashion' ),
				"admin_label" => true
			),
			array(
					'type' => 'dropdown',
					'heading' => __( 'Title Alignment', 'newfashion' ),
					'param_name' => 'alignment',
					'value' => array(
						__( 'Align left', 'newfashion' ) => 'separator_align_left',
						__( 'Align center', 'newfashion' ) => 'separator_align_center',
						__( 'Align right', 'newfashion' ) => 'separator_align_right'
					)
				),
		 	array(
                'type' => 'dropdown',
                'heading' => __( 'Heading Style', 'newfashion' ),
                'param_name' => 'heading_style',
                'value' => array(
                    __( '', 'newfashion' ) => '',
                    __( 'Version 1', 'newfashion' ) => 'v1',
                    __( 'Version 2', 'newfashion' ) => 'v2',
                    __( 'Version 3', 'newfashion' ) => 'v3'
            
                )
            ),
			array(
				"type" => "textarea",
				'heading' => __( 'Description', 'newfashion' ),
				"param_name" => "descript",
				"value" => '',
				'description' => __( 'Enter description for title.', 'newfashion' )
		    ),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'newfashion' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'newfashion' )
			)
		),
	));
	add_shortcode( 'wpo_block_heading', ('newfashion_wpo_vc_shortcode_render') );

	/**
	 *
	 */
		/*********************************************************************************************************************
	 *  Our Service
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("Opal Featured Box",'newfashion'),
	    "base" => "wpo_featuredbox",
	    "description"=> __('Decreale Service Info', 'newfashion'),
	    "class" => "",
	    "category" => __('Opal Elements', 'newfashion'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'newfashion'),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),

	    	array(
				"type" => "textfield",
				"heading" => __("Sub Title", 'newfashion'),
				"param_name" => "subtitle",
				"value" => '',
					"admin_label" => true
			),
			

			array(
				"type" => "dropdown",
				"heading" => __("Style", 'newfashion'),
				"param_name" => "style",
				'value' 	=> array(
					__('Default', 'newfashion') => '', 
					__('Version 1', 'newfashion') => 'v1', 
					__('Version 2', 'newfashion') => 'v2', 
					__('Version 3', 'newfashion' )=> 'v3',
					__('Version 4', 'newfashion') => 'v4' ,
					__('Version 5', 'newfashion') => 'v5' 
				),
			),	
			array(
				'type' => 'dropdown',
				'heading' => __( 'Background Block', 'newfashion' ),
				'param_name' => 'Background',
				'value' => array(
					__( 'None', 'newfashion' ) => '',
					__( 'Success', 'newfashion' ) => 'bg-success',
					__( 'Info', 'newfashion' ) => 'bg-info',
					__( 'Danger', 'newfashion' ) => 'bg-danger',
					__( 'Warning', 'newfashion' ) => 'bg-warning',
					__( 'Light', 'newfashion' ) => 'bg-default',
				)
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'newfashion' ),
				'param_name'                     => 'title_align',
				'value'                          => array(
				__( 'Align left', 'newfashion' )   => 'separator_align_left',
				__( 'Align center', 'newfashion' ) => 'separator_align_center',
				__( 'Align right', 'newfashion' )  => 'separator_align_right'
				)
			),

		 	array(
				"type" => "textfield",
				"heading" => __("FontAwsome Icon", 'newfashion'),
				"param_name" => "icon",
				"value" => '',
				'description'	=> __( 'This support display icon from FontAwsome, Please click', 'newfashion' )
								. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank">'
								. __( 'here to see the list', 'newfashion' ) . '</a>'
			),

			array(
				"type" => "attach_image",
				"heading" => __("Photo", 'newfashion'),
				"param_name" => "photo",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textarea",
				"heading" => __("information", 'newfashion'),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags', 'newfashion' )
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'newfashion'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'newfashion')
			)
	   	)
	));
	add_shortcode( 'wpo_featuredbox', ('newfashion_wpo_vc_shortcode_render') );
	
	/*********************************************************************************************************************
	*  Newsletter
	*********************************************************************************************************************/
	vc_map( array(
	 "name" => __("WPO Newsletter",'newfashion'),
	 "base" => "wpo_newsletter",
	 "class" => "",
	 "description"=> __('Show form newsletter', 'newfashion'),
	 "category" => __('Opal Widgets', 'newfashion'),
	 "params" => array(
	  array(
	"type" => "textfield",
	"heading" => __("Title", 'newfashion'),
	"param_name" => "title",
	"value" => 'Newsletter',
	"admin_label" => true
	),
	
	array(
		'type' => 'dropdown',
		'heading' => __( 'Heading Style', 'newfashion' ),
		'param_name' => 'heading_style',
		'value' => array(
			__( 'Version 1', 'newfashion' ) => 'v1',
			__( 'Version 2', 'newfashion' ) => 'v2',
			__( 'Version 3', 'newfashion' ) => 'v3'
	
		)
	),

	array(
	"type" => "textarea",
	"heading" => __("Description", 'newfashion'),
	"param_name" => "description",
	"value" => '',
	),

	array(
	'type' => 'dropdown',
	"heading" => __("Layout Style", 'newfashion'),
	'param_name' => 'el_class',
	'value' => array(
	 __( '', 'newfashion' ) => '',
	 __( 'Style 1', 'newfashion' ) => 'style-1',
	 __( 'Style 2', 'newfashion' ) => 'style-2',
	 __( 'Style 3', 'newfashion' ) => 'style-3'
	),
	"description" => __("Changing layout style.", 'newfashion')
	),
	array(
	"type" => "textfield",
	"heading" => __("Extra class name", 'newfashion'),
	"param_name" => "class",
	"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'newfashion')
	),
	 )
	));
	add_shortcode( 'wpo_newsletter', ('newfashion_wpo_vc_shortcode_render') );

	/*********************************************************************************************************************
	 *  WPO Counter
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Counter",'newfashion'),
	    "base" => "wpo_counter",
	    "class" => "",
	    "description"=> __('Counting number with your term', 'newfashion'),
	    "category" => __('Opal Elements', 'newfashion'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'newfashion'),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),

			array(
				"type" => "textfield",
				"heading" => __("Number", 'newfashion'),
				"param_name" => "number",
				"value" => ''
			),

		 	array(
				"type" => "textfield",
				"heading" => __("FontAwsome Icon", 'newfashion'),
				"param_name" => "icon",
				"value" => 'fa-desktop',
				'description'	=> __( 'This support display icon from FontAwsome, Please click', 'newfashion' )
								. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank">'
								. __( 'here to see the list', 'newfashion' ) . '</a>'
			),


			array(
				"type" => "attach_image",
				"description" => __("If you upload an image, icon will not show.", 'newfashion'),
				"param_name" => "image",
				"value" => '',
				'heading'	=> __('Image', 'newfashion' )
			),

	 

			array(
				"type" => "dropdown",
				"heading" => __("Text Color", 'newfashion'),
				"param_name" => "text_color",
				'value' 	=> array( __('None', 'newfashion') =>  'text-default', __('Primary', 'newfashion') =>'text-primary' , __('Info', 'newfashion') => 'text-info',  __('Danger', 'newfashion') => 'text-danger',  __('Warning', 'newfashion') => 'text-warning'  ),
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'newfashion'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'newfashion')
			)
	   	)
	));
	 



	/*********************************************************************************************************************
	 *  Info Box
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Info Box",'newfashion'),
	    "base" => "wpo_inforbox",
	    "class" => "",
	    "description"=> __( 'Show header, text in special style', 'newfashion'),
	    "category" => __('Opal Elements', 'newfashion'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'newfashion'),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),
			array(
				"type" => "textfield",
				"heading" => __("Sub Title", 'newfashion'),
				"param_name" => "sub_title",
				"value" => '',
					"admin_label" => true
			),

			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Title font size', 'newfashion' ),
				'param_name' => 'size',
				'value'      => array(
					__( 'Large', 'newfashion' )       => 'font-size-lg',
					__( 'Medium', 'newfashion' )      => 'font-size-md',
					__( 'Small', 'newfashion' )       => 'font-size-sm',
					__( 'Extra small', 'newfashion' ) => 'font-size-xs'
				)
			),

			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Title Alignment', 'newfashion' ),
				'param_name' => 'title_align',
				'value'      => array(
				__( 'Align left', 'newfashion' )   => 'separator_align_left',
				__( 'Align center', 'newfashion' ) => 'separator_align_center',
				__( 'Align right', 'newfashion' )  => 'separator_align_right'
				)
			),

			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Info Box Content Style', 'newfashion' ),
				'param_name' => 'inforbox_style',
				'value'      => array(
				__( 'Light', 'newfashion' )   => '',
				__( 'Dark', 'newfashion' ) => 'inforbox-dark',
				)
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Info Box Align Mode', 'newfashion' ),
				'param_name' => 'inforbox_alight',
				'value'      => array(
				__( 'Left Style', 'newfashion' )   => '',
				__( 'Right Style', 'newfashion' ) => 'inforbox-align-right',
				)
			),

			array(
				"type" => "textarea",
				"heading" => __("information", 'newfashion'),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags', 'newfashion')
			),
			array(
				"type" => "attach_image",
				"heading" => __("Backgroup Image", 'newfashion'),
				"param_name" => "imagebg",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "colorpicker",
				"heading" => __("Background Color", 'newfashion'),
				"param_name" => "colorbg",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'newfashion'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'newfashion')
			)
	   	)
	));
	add_shortcode( 'wpo_inforbox', ('newfashion_wpo_vc_shortcode_render') );


 
	/*********************************************************************************************************************
	 *  Info Box
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Banner",'newfashion'),
	    "base" => "wpo_banner",
	    "class" => "",
	    "description"=> __( 'Show Banner in special style', 'newfashion'),
	    "category" => __('Opal Elements', 'newfashion'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'newfashion'),
				"param_name" => "title",
				"value" => '',
					"admin_label" => true
			),
	    	array(
				"type" => "textfield",
				"heading" => __("Sub title", 'newfashion'),
				"param_name" => "subheading",
				"value" => '',
					"admin_label" => true
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Title font size', 'newfashion' ),
				'param_name' => 'size',
				'value'      => array(
					__( ' ', 'newfashion' )       => ' ',
					__( 'Large', 'newfashion' )       => 'font-size-lg',
					__( 'Medium', 'newfashion' )      => 'font-size-md',
					__( 'Small', 'newfashion' )       => 'font-size-sm',
					__( 'Extra small', 'newfashion' ) => 'font-size-xs'
				)
			),
			array(
				'type'       => 'dropdown',
				'heading'    => __( 'Content Position', 'newfashion' ),
				'param_name' => 'content_position',
				'value'      => array(
				__( 'Left', 'newfashion' )   => 'content_position_left',
				__( 'Center', 'newfashion' ) => 'content_position_center',
				__( 'Right', 'newfashion' )  => 'content_position_right'
				)
			),
			
			array(
				'type' => 'dropdown',
				'heading' => __( 'Effect', 'newfashion' ),
				'param_name' => 'img_effect',
				'prioryty' => 1,
				'value' => array(					
					__( 'No effect', 'newfashion' ) => 'no-effect',
				 	__( 'Effect 1', 'newfashion' ) => 'effect-1',
				 	__( 'Effect 2', 'newfashion' ) => 'effect-2',
				 	__( 'Effect 3', 'newfashion' ) => 'effect-3'
				)
			),
			
			array(
				'type'       => 'textfield',
				'heading'    => __( 'Padding', 'newfashion' ),
				'param_name' => 'padding',
				'value'      => ''
			),
			array(
				"type" => "textarea",
				"heading" => __("information", 'newfashion'),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags', 'newfashion')
			),
			array(
				"type" => "attach_image",
				"heading" => __("Backgroup Image", 'newfashion'),
				"param_name" => "imagebg",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Link Button", 'newfashion'),
				"param_name" => "link",
				"value" => '',
			),
			array(
				"type" => "textfield",
				"heading" => __("Text Button", 'newfashion'),
				"param_name" => "link_text",
				"value" => '',
			),
			
			array(
				'type' => 'dropdown',
				'heading' => __( 'Button Radius Style', 'newfashion' ),
				'param_name' => 'btn_style',
				'prioryty' => 1,
				'value' => array(
					__( 'None', 'newfashion' ) => '',
					__( 'Radius 50%', 'newfashion' ) => 'radius-x',
				 	__( 'Radius 1x', 'newfashion' ) => 'radius-1x',
				 	__( 'Radius 2x', 'newfashion' ) => 'radius-2x',
				 	__( 'Radius 3x', 'newfashion' ) => 'radius-3x',
				 	__( 'Radius 4x', 'newfashion' ) => 'radius-4x',
					__( 'Radius 5x', 'newfashion' ) => 'radius-5x',
					__( 'Radius 6x', 'newfashion' ) => 'radius-6x',
				
				)
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'newfashion'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'newfashion')
			)
	   )
	));
	add_shortcode( 'wpo_banner', ('newfashion_wpo_vc_shortcode_render') );

vc_update_shortcode_param( 'vc_gmaps', array(
		'type' => 'dropdown',
		'heading' => __( 'Display Style', 'newfashion' ),
		'param_name' => 'display_style',
		 'value' => array(
		 		'Default' => '',
		 		'Popup' => 'popup'
		)
));
vc_update_shortcode_param( 'vc_gmaps', array(
		'type' => 'attach_image',
		'heading' => __( 'Image (use display style popup)', 'newfashion' ),
		'param_name' => 'image',
		 'value' => array(
		 		'Default' => '',
		 		'Popup' => 'popup'
		) 		
));

