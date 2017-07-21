<?php  
	$newssupported = true; 

if( $newssupported ) {
	/**********************************************************************************
	 * Front Page Posts
	 **********************************************************************************/


	/// Front Page 1
	vc_map( array(
		'name' => __( 'WPO FrontPage 1', 'newfashion' ),
		'base' => 'wpo_frontpageposts',
		'icon' => 'icon-wpb-news-1',
		"category" => __('Opal News', 'newfashion'),
		'description' => __( 'Create Post having blog styles', 'newfashion' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'newfashion' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', 'newfashion' )   => 'separator_align_left',
				__( 'Align center', 'newfashion' ) => 'separator_align_center',
				__( 'Align right', 'newfashion' )  => 'separator_align_right'
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
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),
			array(
				"type" => "dropdown",
				"heading" => __("Number Main Posts", 'js_composer'),
				"param_name" => "num_mainpost",
				"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
				"std" => 1
			),

			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );
	// front page 2
	vc_map( array(
		'name' => __( 'WPO FrontPage 2', 'newfashion' ),
		'base' => 'wpo_frontpageposts2',
		'icon' => 'icon-wpb-news-8',
		"category" => __('Opal News', 'newfashion'),
		'description' => __( 'Create Post having blog styles', 'newfashion' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'newfashion' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', 'newfashion' )   => 'separator_align_left',
				__( 'Align center', 'newfashion' ) => 'separator_align_center',
				__( 'Align right', 'newfashion' )  => 'separator_align_right'
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
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),
			array(
				"type" => "dropdown",
				"heading" => __("Number Main Posts", 'js_composer'),
				"param_name" => "num_mainpost",
				"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
				"std" => 1
			),

			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );
	// front page 3
	vc_map( array(
		'name' => __( 'WPO FrontPage 3', 'newfashion' ),
		'base' => 'wpo_frontpageposts3',
		'icon' => 'icon-wpb-news-3',
		"category" => __('Opal News', 'newfashion'),
		'description' => __( 'Create Post having blog styles', 'newfashion' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'newfashion' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', 'newfashion' )   => 'separator_align_left',
				__( 'Align center', 'newfashion' ) => 'separator_align_center',
				__( 'Align right', 'newfashion' )  => 'separator_align_right'
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
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),
			array(
				"type" => "dropdown",
				"heading" => __("Number Main Posts", 'js_composer'),
				"param_name" => "num_mainpost",
				"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
				"std" => 1
			),

			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );
	// front page 2
	vc_map( array(
		'name' => __( 'WPO FrontPage 4', 'newfashion' ),
		'base' => 'wpo_frontpageposts4',
		'icon' => 'icon-wpb-news-4',
		"category" => __('Opal News', 'newfashion'),
		'description' => __( 'Create Post having blog styles', 'newfashion' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'newfashion' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', 'newfashion' )   => 'separator_align_left',
				__( 'Align center', 'newfashion' ) => 'separator_align_center',
				__( 'Align right', 'newfashion' )  => 'separator_align_right'
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
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),
			 

			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );
	
		// front page 12
	vc_map( array(
		'name' => __( 'WPO FrontPage 12', 'newfashion' ),
		'base' => 'wpo_frontpageposts12',
		'icon' => 'icon-wpb-news-12',
		"category" => __('Opal News', 'newfashion'),
		'description' => __( 'Create Post having blog styles', 'newfashion' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'newfashion' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', 'newfashion' )   => 'separator_align_left',
				__( 'Align center', 'newfashion' ) => 'separator_align_center',
				__( 'Align right', 'newfashion' )  => 'separator_align_right'
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
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),
			 

			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );
// frontpage 13
	vc_map( array(
		'name' => __( 'WPO FontPage News 13', 'newfashion' ),
		'base' => 'wpo_frontpageposts13',
		'icon' => 'icon-wpb-news-13',
		"category" => __('Opal News', 'newfashion'),
		'description' => __( 'Create Categories Tab Hovering to show post', 'newfashion' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'newfashion' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', 'newfashion' )   => 'separator_align_left',
				__( 'Align center', 'newfashion' ) => 'separator_align_center',
				__( 'Align right', 'newfashion' )  => 'separator_align_right'
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
				),
				'default' => 'font-size-md'
			),

			array(
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),
			 

			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );	

		/**********************************************************************************
	 * FontPage News 14
	 **********************************************************************************/
	vc_map( array(
		'name' => __( 'WPO FrontPage 14', 'newfashion' ),
		'base' => 'wpo_frontpageposts14',
		'icon' => 'icon-wpb-news-1',
		"category" => __('Opal News', 'newfashion'),
		'description' => __( 'Create Post having blog styles', 'newfashion' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'newfashion' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', 'newfashion' )   => 'separator_align_left',
				__( 'Align center', 'newfashion' ) => 'separator_align_center',
				__( 'Align right', 'newfashion' )  => 'separator_align_right'
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
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),
			array(
				"type" => "dropdown",
				"heading" => __("Number Main Posts", 'js_composer'),
				"param_name" => "num_mainpost",
				"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
				"std" => 1
			),

			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );
	
vc_map( array(
		'name' => __( 'WPO Categories Post', 'newfashion' ),
		'base' => 'wpo_categoriespost',
		'icon' => 'icon-wpb-news-3',
		"category" => __('Opal News', 'newfashion'),
		'description' => __( 'Create Post having blog styles', 'newfashion' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'newfashion' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', 'newfashion' )   => 'separator_align_left',
				__( 'Align center', 'newfashion' ) => 'separator_align_center',
				__( 'Align right', 'newfashion' )  => 'separator_align_right'
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
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),
			 

			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );	

// front page 9
	vc_map( array(
		'name' => __( 'WPO FrontPage 9', 'newfashion' ),
		'base' => 'wpo_frontpageposts9',
		'icon' => 'icon-wpb-news-9',
		"category" => __('Opal News', 'newfashion'),
		'description' => __( 'Create Post having blog styles', 'newfashion' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'newfashion' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', 'newfashion' )   => 'separator_align_left',
				__( 'Align center', 'newfashion' ) => 'separator_align_center',
				__( 'Align right', 'newfashion' )  => 'separator_align_right'
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
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),
			array(
				"type" => "dropdown",
				"heading" => __("Grid Columns", 'js_composer'),
				"param_name" => "grid_columns",
				"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
				"std" => 1
			),

			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );

	// front page 3
	vc_map( array(
		'name' => __( 'WPO TimeLine Post', 'newfashion' ),
		'base' => 'wpo_timelinepost',
		'icon' => 'icon-wpb-news-10',
		"category" => __('Opal News', 'newfashion'),
		'description' => __( 'Create Post having blog styles', 'newfashion' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'newfashion' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', 'newfashion' )   => 'separator_align_left',
				__( 'Align center', 'newfashion' ) => 'separator_align_center',
				__( 'Align right', 'newfashion' )  => 'separator_align_right'
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
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),
			 

			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );

	/****/
	vc_map( array(
		'name' => __( 'WPO Categories Tab Post', 'newfashion' ),
		'base' => 'wpo_categorytabpost',
		'icon' => 'icon-wpb-application-icon-large',
		"category" => __('Opal News', 'newfashion'),
		'description' => __( 'Create Post having blog styles', 'newfashion' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'newfashion' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', 'newfashion' )   => 'separator_align_left',
				__( 'Align center', 'newfashion' ) => 'separator_align_center',
				__( 'Align right', 'newfashion' )  => 'separator_align_right'
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
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),

		 

			array(
				"type" => "dropdown",
				"heading" => __("Number Main Posts", 'js_composer'),
				"param_name" => "num_mainpost",
				"value" => array( 1 , 2 , 3 , 4 , 5 , 6),
				"std" => 1
			),

			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );
	

	$layout_image = array(
		__('Grid', 'newfashion')             => 'grid-1',
		__('List', 'newfashion')             => 'list-1',
		__('List not image', 'newfashion')   => 'list-2',
	);
	vc_map( array(
		'name' => __( 'WPO Grid Posts', 'newfashion' ),
		'base' => 'wpo_gridposts',
		'icon' => 'icon-wpb-news-2',
		"category" => __('Opal News', 'newfashion'),
		'description' => __( 'Post having news,managzine style', 'newfashion' ),
	 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'newfashion' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', 'newfashion' )   => 'separator_align_left',
				__( 'Align center', 'newfashion' ) => 'separator_align_center',
				__( 'Align right', 'newfashion' )  => 'separator_align_right'
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
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),
			array(
				"type" => "dropdown",
				"heading" => __("Layout Type", 'js_composer'),
				"param_name" => "layout",
				"layout_images" => $layout_image,
				"value" => $layout_image,
				"admin_label" => true,
				"description" => __("Select Skin layout.", 'js_composer')
			),
			array(
				"type" => "dropdown",
				"heading" => __("Grid Columns", 'js_composer'),
				"param_name" => "grid_columns",
				"value" => array( 1 , 2 , 3 , 4 , 6),
				"std" => 3
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );


	
	/**********************************************************************************
	 * Mega Blogs
	 **********************************************************************************/
	vc_map( array(
		'name' => __( 'WPO Grids Blogs', 'newfashion' ),
		'base' => 'wpo_megablogs',
		'icon' => 'icon-wpb-news-2',
		"category" => __('Opal News', 'newfashion'),
		'description' => __( 'Create Post having blog styles', 'newfashion' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
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
				'type' => 'textarea',
				'heading' => __( 'Description', 'newfashion' ),
				'param_name' => 'descript',
				"value" => ''
			),

			array(
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 10 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),

			array(
				"type" => "dropdown",
				"heading" => __("Layout", 'newfashion' ),
				"param_name" => "layout",
				"value" => array( __('Default Style', 'newfashion' ) => 'blog'  ,  __('Special Style 1', 'newfashion' ) => 'special-1' ),
				"std" => 3
			),

			array(
				"type" => "dropdown",
				"heading" => __("Grid Columns", 'js_composer'),
				"param_name" => "grid_columns",
				"value" => array( 1 , 2 , 3 , 4 , 6),
				"std" => 3
			),


			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );
 

	/**********************************************************************************
	 * Slideshow Post Widget Gets
	 **********************************************************************************/
		vc_map( array(
			'name' => __( 'WPO Slideshow Post', 'newfashion' ),
			'base' => 'wpo_slideshowpost',
			'icon' => 'icon-wpb-news-slideshow',
			"category" => __('Opal News', 'newfashion'),
			'description' => __( 'Play Posts In slideshow', 'newfashion' ),
			 
			'params' => array(
				array(
					'type' => 'textfield',
					'heading' => __( 'Widget title', 'js_composer' ),
					'param_name' => 'title',
					'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
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
					'type' => 'textarea',
					'heading' => __( 'Heading Description', 'newfashion' ),
					'param_name' => 'descript',
					"value" => ''
				),

				array(
					'type' => 'loop',
					'heading' => __( 'Grids content', 'js_composer' ),
					'param_name' => 'loop',
					'settings' => array(
						'size' => array( 'hidden' => false, 'value' => 10 ),
						'order_by' => array( 'value' => 'date' ),
					),
					'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
				),

				array(
					"type" => "dropdown",
					"heading" => __("Layout", 'newfashion' ),
					"param_name" => "layout",
					"value" => array( __('Default Style', 'newfashion' ) => 'blog'),
					"std" => 3
				),

				array(
					"type" => "dropdown",
					"heading" => __("Grid Columns", 'js_composer'),
					"param_name" => "grid_columns",
					"value" => array( 1 , 2 , 3 , 4 , 6),
					"std" => 3
				),


				array(
					'type' => 'textfield',
					'heading' => __( 'Thumbnail size', 'js_composer' ),
					'param_name' => 'grid_thumb_size',
					'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
				),
				array(
					'type' => 'textfield',
					'heading' => __( 'Extra class name', 'js_composer' ),
					'param_name' => 'el_class',
					'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
				)
			)
		) );
	
	// List
	vc_map( array(
		'name' => __( 'WPO List Post', 'newfashion' ),
		'base' => 'wpo_listpost',
		'icon' => 'icon-wpb-news-10',
		"category" => __('Opal News', 'newfashion'),
		'description' => __( 'Create Post having blog styles', 'newfashion' ),
		 
		'params' => array(
			array(
				'type' => 'textfield',
				'heading' => __( 'Widget title', 'js_composer' ),
				'param_name' => 'title',
				'description' => __( 'Enter text which will be used as widget title. Leave blank if no title is needed.', 'js_composer' ),
				"admin_label" => true
			),

			array(
				'type'                           => 'dropdown',
				'heading'                        => __( 'Title Alignment', 'newfashion' ),
				'param_name'                     => 'alignment',
				'value'                          => array(
				__( 'Align left', 'newfashion' )   => 'separator_align_left',
				__( 'Align center', 'newfashion' ) => 'separator_align_center',
				__( 'Align right', 'newfashion' )  => 'separator_align_right'
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
				'type' => 'loop',
				'heading' => __( 'Grids content', 'js_composer' ),
				'param_name' => 'loop',
				'settings' => array(
					'size' => array( 'hidden' => false, 'value' => 4 ),
					'order_by' => array( 'value' => 'date' ),
				),
				'description' => __( 'Create WordPress loop, to populate content from your site.', 'js_composer' )
			),
			 

			array(
				'type' => 'textfield',
				'heading' => __( 'Thumbnail size', 'js_composer' ),
				'param_name' => 'grid_thumb_size',
				'description' => __( 'Enter thumbnail size. Example: thumbnail, medium, large, full or other sizes defined by current theme. Alternatively enter image size in pixels: 200x100 (Width x Height) . ', 'js_composer' )
			),
			array(
				'type' => 'textfield',
				'heading' => __( 'Extra class name', 'js_composer' ),
				'param_name' => 'el_class',
				'description' => __( 'If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.', 'js_composer' )
			)
		)
	) );


}
