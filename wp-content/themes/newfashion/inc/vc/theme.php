<?php

	/*********************************************************************************************************************
	 *  Portfolio
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Portfolio",'newfashion'),
	    "base" => "wpo_portfolio",
	    'icon' => 'icon-wpb-news-15',
	    'description'=>'Portfolio',
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
                "type" => "checkbox",
                "heading" => __("Item No Padding", 'newfashion'),
                "param_name" => "nopadding",
                "value" => array(
                    'Yes, It is Ok' => true
                ),
                'std' => true
			),	
	    	array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', 'newfashion' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', 'newfashion' ) => 'font-size-lg',
					__( 'Medium', 'newfashion' ) => 'font-size-md',
					__( 'Small', 'newfashion' ) => 'font-size-sm',
					__( 'Extra small', 'newfashion' ) => 'font-size-xs'
				)
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
				"type" => "textarea",
				'heading' => __( 'Description', 'newfashion' ),
				"param_name" => "descript",
				"value" => ''
		    ),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Display Masonry', 'newfashion' ),
				'param_name' => 'masonry',
				'value' => array(
					__( 'No', 'newfashion' ) => '0',
					__( 'Yes', 'newfashion' ) => '1',
				)
			),

			array(
				"type" => "textfield",
				"heading" => __("Number of portfolio to show", 'newfashion'),
				"param_name" => "number",
				"value" => '6'
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Columns count', 'newfashion' ),
				'param_name' => 'columns_count',
				'value' => array( 6, 4, 3, 2, 1 ),
				'std' => 3,
				'admin_label' => true,
				'description' => __( 'Select columns count.', 'newfashion' )
			),

			array(
				'type' => 'dropdown',
				'heading' => __( 'Hover Style display', 'newfashion' ),
				'param_name' => 'style',
				'value' => array( 'Style 1'=>'square effect2', 'Style 2'=>'effect3 bottom_to_top', 'Style 3'=>'effect5 left_to_right', 'Style 4'=>'effect6 bottom_to_top', 'Style 5'=>'effect7', 'Style 6'=>'effect8 scale_up', 'Style 7'=>'effect10 left_to_right', 'Style 8'=>'effect12 left_to_right', 'Style 9'=>'effect14 left_to_right', 'Style 10'=>'effect15 left_to_right', 'Style 11'=>'effect16'),
				'std' => 'style-1',
				'admin_label' => true,
				'description' => __( 'Select style display.', 'newfashion' )
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Enable Pagination', 'newfashion' ),
				'param_name' => 'pagination',
				'value' => array( 'No'=>'0', 'Yes'=>'1'),
				'std' => 'style-1',
				'admin_label' => true,
				'description' => __( 'Select style display.', 'newfashion' )
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'newfashion'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'newfashion')
			)
	   	)
	));
	add_shortcode( 'wpo_portfolio', ('newfashion_wpo_vc_shortcode_render') );



	/*********************************************************************************************************************
	 *  Brands Carousel
	 *********************************************************************************************************************/
	if( post_type_exists('brands') ){
		vc_map( array(
		    "name" => __("WPO Brands Carousel",'newfashion'),
		    "base" => "wpo_brands",
		    'description'=>'Show Brand Logos, Manufacture Logos',
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
					"type" => "textarea",
					"heading" => __('Description', 'newfashion'),
					"param_name" => "descript",
					"value" => ''
				),
				
				array(
					'type' => 'dropdown',
					'heading' => __( 'Item Style', 'newfashion' ),
					'param_name' => 'brand_style',
					'value' => array(
						__( 'Default', 'newfashion' ) => 'brand-default',
						__( 'Border', 'newfashion' ) => 'brand-border'
					)
				),

					

				array(
					"type" => "textfield",
					"heading" => __("Number of brands to show", 'newfashion'),
					"param_name" => "number",
					"value" => '6'
				),
				
				
				
				array(
					'type' => 'dropdown',
					'heading' => __( 'Item / Row', 'newfashion' ),
					'param_name' => 'item_row',
					'value' => array(
						__( '1', 'newfashion' ) => '1',
						__( '2', 'newfashion' ) => '2',						
						__( '3', 'newfashion' ) => '3',						
						__( '4', 'newfashion' ) => '4',						
						__( '5', 'newfashion' ) => '5',						
						__( '6', 'newfashion' ) => '6',						
						__( '7', 'newfashion' ) => '7',						
						__( '8', 'newfashion' ) => '8'						
					)
				),
				
				
				array(
					"type" => "textfield",
					"heading" => __("Icon", 'newfashion'),
					"param_name" => "icon"
				),
				array(
					"type" => "textfield",
					"heading" => __("Extra class name", 'newfashion'),
					"param_name" => "el_class",
					"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'newfashion')
				)
		   	)
		));
		add_shortcode( 'wpo_brands', ('newfashion_wpo_vc_shortcode_render') );

	}	
	/*********************************************************************************************************************
	 * Pricing Table
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Pricing",'newfashion'),
	    "base" => "wpo_pricing",
	    "description" => __('Make Plan for membership', 'newfashion' ),
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
				"heading" => __("Price", 'newfashion'),
				"param_name" => "price",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Currency", 'newfashion'),
				"param_name" => "currency",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Period", 'newfashion'),
				"param_name" => "period",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Subtitle", 'newfashion'),
				"param_name" => "subtitle",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "dropdown",
				"heading" => __("Is Featured", 'newfashion'),
				"param_name" => "featured",
				'value' 	=> array(  __('No', 'newfashion') => 0,  __('Yes', 'newfashion') => 1 ),
			),
			array(
				"type" => "dropdown",
				"heading" => __("Skin", 'newfashion'),
				"param_name" => "skin",
				'value' 	=> array(  __('Skin 1', 'newfashion') => 'v1',  __('Skin 2', 'newfashion') => 'v2', __('Skin 3', 'newfashion') => 'v3' ),
			),
			array(
				"type" => "dropdown",
				"heading" => __("Box Style", 'newfashion'),
				"param_name" => "style",
				'value' 	=> array( 'boxed' => __('Boxed', 'newfashion'), 'label' => __('Label', 'newfashion') , 'table' => __('Table', 'newfashion') ),
			),

			array(
				"type" => "textarea_html",
				"heading" => __("Content", 'newfashion'),
				"param_name" => "content",
				"value" => '',
				'description'	=> __('Allow  put html tags', 'newfashion')
			),

			array(
				"type" => "textfield",
				"heading" => __("Link Title", 'newfashion'),
				"param_name" => "linktitle",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Link", 'newfashion'),
				"param_name" => "link",
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
	add_shortcode( 'wpo_pricing', ('newfashion_wpo_vc_shortcode_render') );

	/******************************
	 * Our Team
	 ******************************/
	vc_map( array(
	    "name" => __("WPO Our Team Grid Style",'newfashion'),
	    "base" => "wpo_team",
	    "class" => "",
	    "description" => 'Show Personal Profile Info',
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
				"type" => "attach_image",
				"heading" => __("Photo", 'newfashion'),
				"param_name" => "photo",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Job", 'newfashion'),
				"param_name" => "job",
				"value" => 'CEO',
				'description'	=>  ''
			),

			array(
				"type" => "textarea",
				"heading" => __("information", 'newfashion'),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags', 'newfashion')
			),
			array(
				"type" => "textfield",
				"heading" => __("Phone", 'newfashion'),
				"param_name" => "phone",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Google Plus", 'newfashion'),
				"param_name" => "google",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Facebook", 'newfashion'),
				"param_name" => "facebook",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Twitter", 'newfashion'),
				"param_name" => "twitter",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Pinterest", 'newfashion'),
				"param_name" => "pinterest",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Linked In", 'newfashion'),
				"param_name" => "linkedin",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "dropdown",
				"heading" => __("Style", 'newfashion'),
				"param_name" => "style",
				'value' 	=> array(  __('circle', 'newfashion') => 'circle',  __('vertical', 'newfashion') => 'vertical',  __('horizontal', 'newfashion') => 'horizontal' , __('special', 'newfashion')  => 'special'  ),
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'newfashion'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'newfashion')
			)
	   	)
	));
	add_shortcode( 'wpo_team', ('newfashion_wpo_vc_shortcode_render') );

	/******************************
	 * Our Team
	 ******************************/
	vc_map( array(
		"name" => __("WPO Our Team List Style",'newfashion'),
		"base" => "wpo_team_list",
		"class" => "",
		"description" => __('Show Info In List Style', 'newfashion'),
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
				"type" => "attach_image",
				"heading" => __("Photo", 'newfashion'),
				"param_name" => "photo",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Phone", 'newfashion'),
				"param_name" => "phone",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textarea",
				"heading" => __("information", 'newfashion'),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags', 'newfashion')
			),
			array(
				"type" => "textarea",
				"heading" => __("blockquote", 'newfashion'),
				"param_name" => "blockquote",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Email", 'newfashion'),
				"param_name" => "email",
				"value" => '',
				'description'	=> ''
			),
			array(
				"type" => "textfield",
				"heading" => __("Facebook", 'newfashion'),
				"param_name" => "facebook",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Twitter", 'newfashion'),
				"param_name" => "twitter",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "textfield",
				"heading" => __("Linked In", 'newfashion'),
				"param_name" => "linkedin",
				"value" => '',
				'description'	=> ''
			),

			array(
				"type" => "dropdown",
				"heading" => __("Style", 'newfashion'),
				"param_name" => "style",
				'value' 	=> array( 'circle' => __('circle', 'newfashion'), 'vertical' => __('vertical', 'newfashion') , 'horizontal' => __('horizontal', 'newfashion') ),
			),
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'newfashion'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'newfashion')
			)

	   	)
	));
	add_shortcode( 'wpo_team_list', ('newfashion_wpo_vc_shortcode_render') );



 


	/*********************************************************************************************************************
	 *  Mega Posts
	 *********************************************************************************************************************/

	function parramMegaLayout($settings,$value){
		$dependency = vc_generate_dependencies_attributes($settings);
		ob_start();
		?>
			<div class="layout_images">
				<?php foreach ($settings['layout_images'] as $key => $image) {
					echo '<img src="'.$image.'" data-layout="'.$key.'" class="'.$key.' '.(($key==$value)?'active':'').'">';
				} ?>
			</div>
			<input 	type="hidden"
					name="<?php echo esc_attr($settings['param_name']); ?>"
					class="layout_image_field wpb_vc_param_value wpb-textinput <?php echo esc_attr($settings['param_name']).' '.esc_attr($settings['type']).'_field'; ?>"
					value="<?php echo esc_attr($value); ?>" <?php echo trim($dependency); ?>>
		<?php
		return ob_get_clean();
	}
	 

 




	/* Heading Text Block
	---------------------------------------------------------- */
	vc_map( array(
		'name'        => __( 'WPO Widget Heading','newfashion'),
		'base'        => 'wpo_title_heading',
		"class"       => "",
		"category"    => __('Opal Elements', 'newfashion'),
		'description' => __( 'Create title for one Widget', 'newfashion' ),
		"params"      => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'newfashion' ),
				'param_name' => 'title',
				'value'       => __( 'Title', 'newfashion' ),
				'description' => __( 'Enter heading title.', 'newfashion' ),
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
				'heading' => __( 'Title Align', 'newfashion' ),
				'param_name' => 'title_align',
				'value' => array(
					__( 'Align center', 'newfashion' ) => 'separator_align_center',
					__( 'Align left', 'newfashion' ) => 'separator_align_left',
					__( 'Align right', 'newfashion' ) => "separator_align_right"
				),
				'description' => __( 'Select title align.', 'newfashion' )
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
	add_shortcode( 'wpo_title_heading', ('newfashion_wpo_vc_shortcode_render') );


	/*********************************************************************************************************************
	*  Reassuarence
	*********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Reassuarence",'newfashion'),
	    "base" => "wpo_reassuarence",
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
				'heading' => __( 'Title font size', 'newfashion' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', 'newfashion' ) => 'font-size-lg',
					__( 'Medium', 'newfashion' ) => 'font-size-md',
					__( 'Small', 'newfashion' ) => 'font-size-sm',
					__( 'Extra small', 'newfashion' ) => 'font-size-xs'
				)
			),


		 	array(
				"type" => "textfield",
				"heading" => __("FontAwsome Icon", 'newfashion'),
				"param_name" => "icon",
				"value" => '',
				'description'	=> __( 'This support display icon from FontAwsome, Please click', 'newfashion' )
								. '<a href="' . ( is_ssl()  ? 'https' : 'http') . '://fortawesome.github.io/Font-Awesome/" target="_blank"> '
								. __( 'here to see the list', 'newfashion' ) . '</a>'
			),

			array(
				"type" => "textfield",
				"heading" => __("Icon Color", 'newfashion'),
				"param_name" => "color",
				"value" => 'black'
			),


			array(
				"type" => "attach_image",
				"description" => __("If you upload an image, icon will not show.", 'newfashion'),
				"param_name" => "image",
				"value" => '',
				'heading'	=> __('Image', 'newfashion' )
			),

		 	array(
				"type" => "textarea",
				"heading" => __("Short Information", 'newfashion'),
				"param_name" => "description",
				"value" => '',
				'description'	=> __('Allow  put html tags', 'newfashion')
			),


		 	array(
				"type" => "textarea_html",
				"heading" => __("Detail Information", 'newfashion'),
				"param_name" => "information",
				"value" => '',
				'description'	=> __('Allow  put html tags', 'newfashion')
			),


			array(
				"type" => "dropdown",
				"heading" => __("Style", 'newfashion'),
				"param_name" => "style",
				'value' 	=> array( 'circle' => __('circle', 'newfashion'), 'vertical' => __('vertical', 'newfashion') , 'horizontal' => __('horizontal', 'newfashion') ),
			),

			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'newfashion'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'newfashion')
			)
	   	)
	));
	add_shortcode( 'wpo_reassuarence', ('newfashion_wpo_vc_shortcode_render') );
	


	/*********************************************************************************************************************
	 *  Facebook Like Box
	 *********************************************************************************************************************/
	vc_map( array(
		'name'        => __( 'WPO Facebook Like Box','newfashion'),
		'base'        => 'wpo_facebook_like_box',
		"class"       => "",
		"category"    => __('Opal Elements', 'newfashion'),
		'description' => __( 'Create title for one block', 'newfashion' ),
		"params"      => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget', 'newfashion' ),
				'param_name' => 'title',
				'value'       => __( 'Find us on Facebook', 'newfashion' ),
				'description' => __( 'Enter heading title.', 'newfashion' ),
				"admin_label" => true
			),
			array(
				'type' => 'dropdown',
				'heading' => __( 'Title font size', 'newfashion' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', 'newfashion' ) => 'font-size-lg',
					__( 'Medium', 'newfashion' ) => 'font-size-md',
					__( 'Small', 'newfashion' ) => 'font-size-sm',
					__( 'Extra small', 'newfashion' ) => 'font-size-xs'
				)
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
				"heading" => __("Facebook Page URL", 'newfashion'),
				"param_name" => "page_url",
				"value" => "#"
			),
			array(
				"type" => "textfield",
				"heading" => __("Width", 'newfashion'),
				"param_name" => "width",
				"value" => 268
			),		
			array(
				'type' => 'dropdown',
				'heading' => __( 'Color Scheme', 'newfashion' ),
				'param_name' => 'color_scheme',
				'value' => array(
					__( 'Light', 'newfashion' ) => 'light',
					__( 'Dark', 'newfashion' ) => 'dark'
				),
				'description' => __( 'Select Color Scheme.', 'newfashion' )
			),
			array(
                "type" => "checkbox",
                "heading" => __("Show faces", 'newfashion'),
                "param_name" => "show_faces",
                "value" => array(
                    'Yes, please' => true
                )
			),
			array(
                "type" => "checkbox",
                "heading" => __("Show stream", 'newfashion'),
                "param_name" => "show_stream",
                "value" => array(
                    'Yes, please' => true
                )
			),
			array(
                "type" => "checkbox",
                "heading" => __("Show facebook header", 'newfashion'),
                "param_name" => "show_header",
                "value" => array(
                    'Yes, please' => true
                )
			),	
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'newfashion'),
				"param_name" => "el_class",
				"value" => ''
			),									
		),
	));
	
	add_shortcode( 'wpo_facebook_like_box', ('newfashion_wpo_vc_shortcode_render') );	

	/*********************************************************************************************************************
	 *  Gallery grid
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Gallery Grid",'newfashion'),
	    "base" => "newfashion_newfashion_wpo_gallery_grid",
	    'icon' => 'icon-wpb-application-icon-large',
	    'description'=>'Display Gallery Grid',
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
				'type' => 'dropdown',
				'heading' => __( 'Title font size', 'newfashion' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', 'newfashion' ) => 'font-size-lg',
					__( 'Medium', 'newfashion' ) => 'font-size-md',
					__( 'Small', 'newfashion' ) => 'font-size-sm',
					__( 'Extra small', 'newfashion' ) => 'font-size-xs'
				)
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
				'heading' => __( 'Number gallery', 'newfashion' ),
				"param_name" => "number",
				"value" => '6'
		    ),
		    array(
				"type" => "dropdown",
				'heading' => __( 'Columns', 'newfashion' ),
				"param_name" => "column",
				"value" => array('2'=>'2', '3'=>'3', '4'=>'4')
		    ),
		    array(
				"type" => "dropdown",
				'heading' => __( 'Remove Padding', 'newfashion' ),
				"param_name" => "padding",
				"value" => array(__('No', 'newfashion') => '', __('Yes', 'newfashion') => '1')
		    ),
		    array(
				"type" => "textfield",
				'heading' => __( 'Extra class name', 'newfashion' ),
				"param_name" => "class",
				"value" => ''
		    )
	   	)
	));
	add_shortcode( 'newfashion_newfashion_wpo_gallery_grid', ('newfashion_wpo_vc_shortcode_render') );

	/*********************************************************************************************************************
	 *  Gallery portfolio
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Gallery Filter",'newfashion'),
	    "base" => "newfashion_newfashion_wpo_gallery_filter",
	    'icon' => 'icon-wpb-news-15',
	    'description'=>'Show Gallery with gallery post type',
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
				'type' => 'dropdown',
				'heading' => __( 'Title font size', 'newfashion' ),
				'param_name' => 'size',
				'value' => array(
					__( 'Large', 'newfashion' ) => 'font-size-lg',
					__( 'Medium', 'newfashion' ) => 'font-size-md',
					__( 'Small', 'newfashion' ) => 'font-size-sm',
					__( 'Extra small', 'newfashion' ) => 'font-size-xs'
				)
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
				'type' => 'textfield',
				'heading' => __( 'Number gallery', 'newfashion' ),
				'param_name' => 'number',
				'value' => '9'
		    ),
		    array(
				"type" => "dropdown",
				'heading' => __( 'Columns', 'newfashion' ),
				'param_name' => 'column',
				"value" => array('2' => '2', '3' => '3', '4' => '4'),
		    ),
		    array(
		    	'type' => 'dropdown',
		    	'heading' => __('Show Pagination', 'newfashion'),
		    	'param_name' => 'pagination',
		    	'value' => array(__('Yes', 'newfashion') => '1', __('No', 'newfashion') => '0' )
		    )
	   	)
	));
	add_shortcode( 'newfashion_newfashion_wpo_gallery_filter', ('newfashion_wpo_vc_shortcode_render') );

	
	/*********************************************************************************************************************
	 *  Social counter
	 *********************************************************************************************************************/
	vc_map( array(
	    "name" => __("WPO Social Counter",'newfashion'),
	    "base" => "wpo_social_counter",
	    'icon' => 'icon-wpb-application-icon-large',
	    'description'=>'Display Social Counter',
	    "class" => "",
	    "category" => __('Opal Elements', 'newfashion'),
	    "params" => array(
	    	array(
				"type" => "textfield",
				"heading" => __("Title", 'newfashion'),
				"param_name" => "title",
				"value" => '',
				"admin_label" => true,
				"std" => 'Social Counter'
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
                "type" => "checkbox",
                "heading" => __("Display Twitter counter", 'newfashion'),
                "param_name" => "twitter_show",
                "value" => array(
                    'Yes, please' => true
                ),
                'std' => true
			),	
		     array(
		    	"type" => "textfield",
		    	"heading" => __('Twitter Username', 'newfashion'),
		    	"param_name" => 'twitter_user',
		    	"value" => '',
		    	'std' => 'opalwordpress',
		    	'description'	=> __('Insert the Twitter username. Example: https://twitter.com/opalwordpress', 'newfashion')
		    ),
		    array(
		    	"type" => "checkbox",
		    	"heading" => __('Display Facebook counter', 'newfashion'),
		    	"param_name" => 'show_facebook',
		    	"value" => array(
                    'Yes, please' => true
                ),
                'std' => true
		    ), 
		    array(
		    	"type" => "textfield",
		    	"heading" => __('Facebook Page Url', 'newfashion'),
		    	"param_name" => 'facebook_id',
		    	"value" => '',
		    	'std' => 'opalwordpress',
		    	'description' => __('Facebook page url. Example: https://www.facebook.com/opalwordpress', 'newfashion')
		    ),
		    array(
		    	"type" => "checkbox",
		    	"heading" => __('Display YouTube counter', 'newfashion'),
		    	"param_name" => 'show_youtube',
		    	"value" => array(
                    'Yes, please' => true
                ),
                'std' => true
		    ),
		    array(
		    	"type" => "textfield",
		    	"heading" => __('YouTube username', 'newfashion'),
		    	"param_name" => 'youtube_usename',
		    	"value" => '',
		    	'std' => 'WPOpalTheme',
		    	'description' => __('Insert the YouTube username. Example: https://www.youtube.com/user/WPOpalTheme', 'newfashion')
		    ),
		    array(
		    	"type" => "checkbox",
		    	"heading" => __('Display Google+ counter', 'newfashion'),
		    	"param_name" => 'show_google',
		    	"value" => array(
                    'Yes, please' => true
                ),
                'std' => true
		    ),
		    array(
		    	"type" => "textfield",
		    	"heading" => __('Google+ ID', 'newfashion'),
		    	"param_name" => 'google_id',
		    	"value" => '',
		    	'std' => '118034858850902691620',
		    	'description' => __('Google+ page or profile ID. Example:
					https://plus.google.com/118034858850902691620', 'newfashion')
		    ),
		     array(
		    	"type" => "textfield",
		    	"heading" => __('Google API Key', 'newfashion'),
		    	"param_name" => 'google_key',
		    	"value" => '',
		    	'std' => 'AIzaSyBON-9t7IclDRgQZfW0Umnkj6dLnkELTFM',
		    	'description' => __('Get your API key creating a project/app in https://console.developers.google.com/project, 
		    					then inside your project go to "APIs & auth > APIs" and turn on the "Google+ API", 
		    					finally go to "APIs & auth > APIs > Credentials > Public API access" and click in the "CREATE A NEW KEY" button, 
		    					select the "Browser key" option and click in the "CREATE" button, now just copy your API key and paste here.', 'newfashion')
		    ),
		    array(
				"type" => "textfield",
				'heading' => __( 'Extra class name', 'newfashion' ),
				"param_name" => "class",
				"value" => ''
		    )		    
	   	)
	));
	//add_shortcode( 'wpo_social_counter', ('newfashion_wpo_vc_shortcode_render') );

	//Element Coming soon
	vc_map( array(
		'name'        => __( 'WPO Coming soon','newfashion'),
		'base'        => 'wpo_coming_soon',
		"class"       => "",
		"style" 	  => "",
		"category"    => __('Opal Elements', 'newfashion'),
		'description' => __( 'Create Element Coming soon', 'newfashion' ),
		"params"      => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Title', 'newfashion' ),
				'param_name' => 'title',
				'value'       => __( '', 'newfashion' ),
				'description' => __( 'Enter heading title.', 'newfashion' ),
				"admin_label" => true
			),
			array(
			    'type' => 'wpo_datepicker',
			    'heading' => __( 'Date coming soon', 'newfashion' ),
			    'param_name' => 'date_comingsoon',
			    'description' => __( 'Enter Date Coming soon', 'newfashion' )
			),
			array(
				"type" => "textarea",
				'heading' => __( 'Description', 'newfashion' ),
				"param_name" => "description",
				"value" => '',
				'description' => __( 'Enter description for title.', 'newfashion' )
		    ),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'newfashion' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'newfashion' )
			),
			array(
				"type" => "dropdown",
				"heading" => __("Style", 'newfashion'),
				"param_name" => "style",
				'value' 	=> array( 
					'style 1' => __('countdown-v1', 'newfashion'), 
					'style 2' => __('countdown-v2', 'newfashion') , 
					'style 3' => __('countdown-v3', 'newfashion'), 
					'style 4' => __('countdown-v4', 'newfashion') ),
			)
		),
	));
	add_shortcode( 'wpo_coming_soon', ('newfashion_wpo_vc_shortcode_render') );

	/* WPO Social Links
	---------------------------------------------------------- */
	vc_map( array(
		'name'        => __( 'WPO Social Links','newfashion'),
		'base'        => 'wpo_social_links',
		"class"       => "",
		"category"    => __('Opal Elements', 'newfashion'),
		'description' => __( 'Create title for one block', 'newfashion' ),
		"params"      => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Title', 'newfashion' ),
				'param_name' => 'title',
				'value'       => __( 'Find us on social networks', 'newfashion' ),
				'description' => __( 'Enter heading title.', 'newfashion' ),
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
				"type" => "textfield",
				"heading" => __("Link Facebook", 'newfashion'),
				"param_name" => "link_facebook",
				"value" => "#"
			),
			array(
				"type" => "textfield",
				"heading" => __("Class Facebook", 'newfashion'),
				"param_name" => "class_facebook",
				"value" => ""
			),
			array(
				'type' => 'attach_image',
				'heading' => __( 'Image Facebook', 'js_composer' ),
				'param_name' => 'image_facebook',
				'value' => '',
				'description' => __( 'Select images from media library.', 'js_composer' )
			),		
			array(
				"type" => "textfield",
				"heading" => __("Link Twitter", 'newfashion'),
				"param_name" => "link_twitter",
				"value" => "#"
			),
			array(
				"type" => "textfield",
				"heading" => __("Class Twitter", 'newfashion'),
				"param_name" => "class_twitter",
				"value" => ""
			),
			array(
				'type' => 'attach_image',
				'heading' => __( 'Image Twitter', 'js_composer' ),
				'param_name' => 'image_twitter',
				'value' => '',
				'description' => __( 'Select images from media library.', 'js_composer' )
			),				
			array(
				"type" => "textfield",
				"heading" => __("Link Youtube ", 'newfashion'),
				"param_name" => "link_youtube",
				"value" => "#"
			),
			array(
				"type" => "textfield",
				"heading" => __("Class Youtube", 'newfashion'),
				"param_name" => "class_youtube",
				"value" => ""
			),			
			array(
				'type' => 'attach_image',
				'heading' => __( 'Image Youtube', 'js_composer' ),
				'param_name' => 'image_youtube',
				'value' => '',
				'description' => __( 'Select images from media library.', 'js_composer' )
			),	
			array(
				"type" => "textfield",
				"heading" => __("Link Pinterest ", 'newfashion'),
				"param_name" => "link_pinterest",
				"value" => "#"
			),
			array(
				"type" => "textfield",
				"heading" => __("Class Pinterest", 'newfashion'),
				"param_name" => "class_pinterest",
				"value" => ""
			),
			array(
				'type' => 'attach_image',
				'heading' => __( 'Image Pinterest ', 'js_composer' ),
				'param_name' => 'image_pinterest',
				'value' => '',
				'description' => __( 'Select images from media library.', 'js_composer' )
			),	
			array(
				"type" => "textfield",
				"heading" => __("Link Google plus", 'newfashion'),
				"param_name" => "link_google_plus",
				"value" => "#"
			),
			array(
				"type" => "textfield",
				"heading" => __("Class Google plus", 'newfashion'),
				"param_name" => "class_google_plus",
				"value" => ""
			),
			array(
				'type' => 'attach_image',
				'heading' => __( 'Image Google plus', 'js_composer' ),
				'param_name' => 'image_google_plus',
				'value' => '',
				'description' => __( 'Select images from media library.', 'js_composer' )
			),	
			array(
				"type" => "textfield",
				"heading" => __("Link LinkedIn", 'newfashion'),
				"param_name" => "link_linkedIn",
				"value" => "#",
				"admin_label" => true
			),		
			array(
				"type" => "textfield",
				"heading" => __("Class LinkedIn", 'newfashion'),
				"param_name" => "class_linkedIn",
				"value" => ""
			),			
			array(
				'type' => 'attach_image',
				'heading' => __( 'Image LinkedIn', 'js_composer' ),
				'param_name' => 'image_linkedIn',
				'value' => '',
				'description' => __( 'Select images from media library.', 'js_composer' )
			),		
			array(
                "type" => "checkbox",
                "heading" => __("Show Facebook", 'newfashion'),
                "param_name" => "show_facebook",
                "value" => array(
                    'Yes, please' => true
                )
			),
			array(
                "type" => "checkbox",
                "heading" => __("Show Twitter", 'newfashion'),
                "param_name" => "show_twitter",
                "value" => array(
                    'Yes, please' => true
                )
			),			
			array(
                "type" => "checkbox",
                "heading" => __("Show Youtube", 'newfashion'),
                "param_name" => "show_youtube",
                "value" => array(
                    'Yes, please' => true
                )
			),
			array(
                "type" => "checkbox",
                "heading" => __("Show Pinterest", 'newfashion'),
                "param_name" => "show_pinterest",
                "value" => array(
                    'Yes, please' => true
                )
			),
			array(
                "type" => "checkbox",
                "heading" => __("Show Google plus", 'newfashion'),
                "param_name" => "show_google_plus",
                "value" => array(
                    'Yes, please' => true
                )
			),
			array(
                "type" => "checkbox",
                "heading" => __("Show LinkedIn", 'newfashion'),
                "param_name" => "show_linkedIn",
                "value" => array(
                    'Yes, please' => true
                )
			),		
			array(
				"type" => "textfield",
				"heading" => __("Image size", 'newfashion'),
				"param_name" => "image_size",
				"value" => "20x20"
			)
			,			
			array(
				"type" => "textfield",
				"heading" => __("Extra class name", 'newfashion'),
				"param_name" => "el_class",
				"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'newfashion')
			)				
		),
	));
	
	add_shortcode( 'wpo_social_links', ('newfashion_wpo_vc_shortcode_render') );
	