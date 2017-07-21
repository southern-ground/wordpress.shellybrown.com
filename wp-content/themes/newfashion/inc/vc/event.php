<?php
if( NEWFASHION_WPO_EVENT_ACTIVED ){
		/*********************************************************************************************************************
		 * Campaigns Frontend
		 *********************************************************************************************************************/
		vc_map( array(
		    "name" => __("WPO Event Frontend",'newfashion'),
		    "base" => "wpo_event_frontend",
		    'icon' => 'icon-wpb-application-icon-large',
		    'description'=>'Display Event Frontend',
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
					"type" => "dropdown",
					'heading' => __( 'Mode', 'newfashion' ),
					"param_name" => "mode",
					"value" => array(
						__('Featured Events', 'newfashion') => 'featured',
						__('Lastest Events', 'newfashion') => 'most_recent',
						__('Randown Events', 'newfashion') => 'random'
					)
			    ),
				 array(
				 	"type" => "dropdown",
					'heading' => __( 'Order by', 'newfashion' ),
					"param_name" => "order",
					"value" => array(
						__('Date', 'newfashion') => 'date',
						__('Name', 'newfashion') => 'name',
					)
				),
				 array(
				 	"type" => "dropdown",
					'heading' => __( 'Order', 'newfashion' ),
					"param_name" => "order",
					"value" => array(
						__('ESC', 'newfashion') => 'ESC',
						__('DESC', 'newfashion') => 'DESC'
					)
				),
				array(
					"type" => "textfield",
					'heading' => __( 'Number', 'newfashion' ),
					"param_name" => "number",
					"value" => ''
			    ),
			    array(
					"type" => "dropdown",
					'heading' => __( 'Column', 'newfashion' ),
					"param_name" => "column",
					"value" => array(
						'2' => '2',
						'3' => '3',
						'4' => '4'
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
		add_shortcode( 'wpo_event_frontend', ('newfashion_wpo_vc_shortcode_render') );


		/*********************************************************************************************************************
		 * Event List Accordion
		 *********************************************************************************************************************/
		vc_map( array(
		    "name" => __("WPO Event Accordion",'newfashion'),
		    "base" => "wpo_event_accordion",
		    'icon' => 'icon-wpb-application-icon-large',
		    'description'=>'Display Event Accordion',
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
					"type" => "dropdown",
					'heading' => __( 'Mode', 'newfashion' ),
					"param_name" => "mode",
					"value" => array(
						__('Featured Events', 'newfashion') => 'featured',
						__('Lastest Events', 'newfashion') => 'most_recent',
						__('Randown Events', 'newfashion') => 'random'
					)
			    ),
				 array(
				 	"type" => "dropdown",
					'heading' => __( 'Order by', 'newfashion' ),
					"param_name" => "order",
					"value" => array(
						__('Date', 'newfashion') => 'date',
						__('Name', 'newfashion') => 'name',
					)
				),
				 array(
				 	"type" => "dropdown",
					'heading' => __( 'Order', 'newfashion' ),
					"param_name" => "order",
					"value" => array(
						__('ESC', 'newfashion') => 'ESC',
						__('DESC', 'newfashion') => 'DESC'
					)
				),
				array(
					"type" => "textfield",
					'heading' => __( 'Number', 'newfashion' ),
					"param_name" => "number",
					"value" => ''
			    ),
			    array(
					"type" => "textfield",
					"heading" => __("Extra class name", 'newfashion'),
					"param_name" => "el_class",
					"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'newfashion')
				)
		   	)
		));
		add_shortcode( 'wpo_event_accordion', ('newfashion_wpo_vc_shortcode_render') );
}
