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
if( NEWFASHION_WPO_WOOCOMMERCE_ACTIVED ) {
				$product_columns_deal = array(1, 2, 3, 4);
			    vc_map( array(
			        "name" => __("WPO Product Deals",'newfashion'),
			        "base" => "wpo_product_deals",
			        "class" => "",
			        "category" => __('Opal Woocommce','newfashion'),
			        "params" => array(
			            array(
			                "type" => "textfield",
			                "class" => "",
			                "heading" => __('Title', 'newfashion'),
			                "param_name" => "title",
			                "admin_label" => true
			            ),
						array(
			                "type" => "textfield",
			                "class" => "",
			                "heading" => __('SubTitle', 'newfashion'),
			                "param_name" => "subtitle",
			                "admin_label" => true
			            ),
			            array(
			                "type" => "textfield",
			                "heading" => __("Extra class name", 'newfashion'),
			                "param_name" => "el_class",
			                "description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.", 'newfashion')
			            ),
			            array(
			                "type" => "dropdown",
			                "heading" => __("Columns count",'newfashion'),
			                "param_name" => "columns_count",
			                "value" => $product_columns_deal,
			                "admin_label" => true,
			                "description" => __("Select columns count.",'newfashion')
			            ),
			            array(
			                "type" => "dropdown",
			                "heading" => __("Layout",'newfashion'),
			                "param_name" => "layout",
			                "value" => array(__('Carousel', 'newfashion') => 'carousel', __('Grid', 'newfashion') =>'grid' ),
			                "admin_label" => true,
			                "description" => __("Select columns count.",'newfashion')
			            )
			        )
			    ));
			    add_shortcode( 'wpo_product_deals', ('newfashion_wpo_vc_shortcode_render') );

				/**
				 * wpo_productcategory
				 */
				
				$value = array();
				if( is_admin() ){
					global $wpdb;
					$sql = "SELECT a.name,a.slug,a.term_id FROM $wpdb->terms a JOIN  $wpdb->term_taxonomy b ON (a.term_id= b.term_id ) where b.count>0 and b.taxonomy = 'product_cat'";
					$results = $wpdb->get_results($sql);
					foreach ($results as $vl) {
						$value[$vl->name] = $vl->slug;
					}
				}
					
				$product_layout = array(''=>'','Grid'=>'grid','List'=>'list','Carousel - Holizontal Meta'=>'carousel_meta', 'Carousel - Center'=>'carousel_center', 'Special'=>'special');
				$box_layout = array('Default'=>'default','Banner Left'=>'banner_left');
				$product_style = array('Style 1'=>'p_style1','Style 2'=>'p_style2','Style 3'=>'p_style3');
				$product_type = array('Best Selling'=>'best_selling','Featured Products'=>'featured_product','Top Rate'=>'top_rate','Recent Products'=>'recent_product','On Sale'=>'on_sale','Recent Review' => 'recent_review' );
				$product_columns = array(6, 5, 4, 3, 2, 1);
				$show_tab = array(
				                array('recent', __('Latest Products', 'newfashion')),
				                array( 'featured_product', __('Featured Products', 'newfashion' )),
				                array('best_selling', __('BestSeller Products', 'newfashion' )),
				                array('top_rate', __('TopRated Products', 'newfashion' )),
				                array('on_sale', __('Special Products', 'newfashion' ))
				            );

				vc_map( array(
				    "name" => __("WPO Product Category",'newfashion'),
				    "base" => "wpo_productcategory",
				    "class" => "",
				    "category" =>__("Opal Woocommce",'newfashion'),
				    "params" => array(
				    	array(
							"type" => "textfield",
							"class" => "",
							"heading" => __('Title', 'newfashion'),
							"param_name" => "title",
							"value" =>''
						),
						
						array(
							"type" => "textfield",
							"class" => "",
							"heading" => __('SubTitle', 'newfashion'),
							"param_name" => "subtitle",
							"value" =>''
						),
				    	array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __('Category', 'newfashion'),
							"param_name" => "category",
							"value" =>$value,
							"admin_label" => true
						),
						array(
							"type" => "dropdown",
							"heading" => __("Style",'newfashion'),
							"param_name" => "style",
							"value" => $product_layout
						),
						
						array(
							"type" => "dropdown",
							"heading" => __("Box Style",'newfashion'),
							"param_name" => "box_layout",
							"value" => $box_layout
						),
						
						array(
							"type" => "dropdown",
							"heading" => __("Product Style",'newfashion'),
							"param_name" => "product_style",
							"value" => $product_style
						),
						
						array(
							"type"        => "attach_image",
							"description" => __("Upload an image for categories", 'newfashion'),
							"param_name"  => "image_cat",
							"value"       => '',
							'heading'     => __('Image', 'newfashion' )
						),
						array(
							"type" => "textfield",
							"heading" => __("Number of products to show",'newfashion'),
							"param_name" => "number",
							"value" => '4'
						),
						array(
							"type" => "dropdown",
							"heading" => __("Columns count",'newfashion'),
							"param_name" => "columns_count",
							"value" => $product_columns,
							"admin_label" => true,
							"description" => __("Select columns count.",'newfashion')
						),
						array(
							"type" => "textfield",
							"heading" => __("Icon",'newfashion'),
							"param_name" => "icon"
						),
						array(
							"type" => "textfield",
							"heading" => __("Extra class name",'newfashion'),
							"param_name" => "el_class",
							"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'newfashion')
						)
				   	)
				));
				add_shortcode( 'wpo_productcategory', ('newfashion_wpo_vc_shortcode_render') );



				/**
				* wpo_category_filter
				*/
				$cats = array();

				if( is_admin() ){
					$query = "SELECT a.name,a.slug,a.term_id FROM $wpdb->terms a JOIN  $wpdb->term_taxonomy b ON (a.term_id= b.term_id ) where b.count>0 and b.taxonomy = 'product_cat' and b.parent = 0";
					$categories = $wpdb->get_results($query);
					foreach ($categories as $category) {
						$cats[$category->name] = $category->term_id;
					}
				}
				vc_map( array(
						"name"     => __("WPO Product Categories Filter",'newfashion'),
						"base"     => "wpo_category_filter",
						"class"    => "",
						"category" => __('Opal Woocommce', 'newfashion'),
						"params"   => array(

						array(
							"type" => "dropdown",
							"class" => "",
							"heading" => __('Category', 'newfashion'),
							"param_name" => "term_id",
							"value" =>$cats,
							"admin_label" => true
						),

						array(
							"type"        => "attach_image",
							"description" => __("Upload an image for categories (190px x 190px)", 'newfashion'),
							"param_name"  => "image_cat",
							"value"       => '',
							'heading'     => __('Image', 'newfashion' )
						),

						array(
							"type"       => "textfield",
							"heading"    => __("Number of categories to show",'newfashion'),
							"param_name" => "number",
							"value"      => '5'
						),

						array(
							"type"        => "textfield",
							"heading"     => __("Extra class name",'newfashion'),
							"param_name"  => "el_class",
							"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'newfashion')
						)
				   	)
				));
				add_shortcode( 'wpo_category_filter', ('newfashion_wpo_vc_shortcode_render')  );



				/**
				 * wpo_products
				 */
				vc_map( array(
				    "name" => __("WPO Products",'newfashion'),
				    "base" => "wpo_products",
				    "class" => "",
				    "category" => __('Opal Woocommce', 'newfashion'),
				    "params" => array(
				    	array(
							"type" => "textfield",
							"heading" => __("Title",'newfashion'),
							"param_name" => "title",
							"admin_label" => true,
							"value" => ''
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
							'param_name' => 'title_align',
							'value' => array(
								__( 'Align left', 'newfashion' ) => 'separator_align_left',
								__( 'Align center', 'newfashion' ) => 'separator_align_center',
								__( 'Align right', 'newfashion' ) => 'separator_align_right'
							)
						),
				    	array(
							"type" => "dropdown",
							"heading" => __("Type",'newfashion'),
							"param_name" => "type",
							"value" => $product_type,
							"admin_label" => true,
							"description" => __("Select columns count.",'newfashion')
						),
						array(
							"type" => "dropdown",
							"heading" => __("Style",'newfashion'),
							"param_name" => "style",
							"value" => $product_layout
						),
						array(
							"type" => "dropdown",
							"heading" => __("Columns count",'newfashion'),
							"param_name" => "columns_count",
							"value" => $product_columns,
							"admin_label" => true,
							"description" => __("Select columns count.",'newfashion')
						),
						array(
							"type" => "textfield",
							"heading" => __("Number of products to show",'newfashion'),
							"param_name" => "number",
							"value" => '4'
						),
						array(
							"type" => "textfield",
							"heading" => __("Extra class name",'newfashion'),
							"param_name" => "el_class",
							"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'newfashion')
						)
				   	)
				));
				add_shortcode( 'wpo_products', ('newfashion_wpo_vc_shortcode_render')  );

				/**
				 * wpo_all_products
				 */
				vc_map( array(
				    "name" => __("WPO Products Tabs",'newfashion'),
				    "base" => "wpo_all_products",
				    "class" => "",
				    "category" => __('Opal Woocommce', 'newfashion'),
				    "params" => array(
				    	array(
							"type" => "textfield",
							"heading" => __("Title",'newfashion'),
							"param_name" => "title",
							"admin_label" => true,
							"value" => ''
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
							'param_name' => 'title_align',
							'value' => array(
								__( 'Align left', 'newfashion' ) => 'separator_align_left',
								__( 'Align center', 'newfashion' ) => 'separator_align_center',
								__( 'Align right', 'newfashion' ) => 'separator_align_right'
							)
						),
						array(
				            "type" => "sorted_list",
				            "heading" => __("Show Tab", "js_composer"),
				            "param_name" => "show_tab",
				            "description" => __("Control teasers look. Enable blocks and place them in desired order.", 'newfashion'),
				            "value" => "recent,featured_product,best_selling",
				            "options" => $show_tab
				        ),
				        array(
							"type" => "dropdown",
							"heading" => __("Style",'newfashion'),
							"param_name" => "style",
							"value" => $product_layout
						),
						array(
							"type" => "textfield",
							"heading" => __("Number of products to show",'newfashion'),
							"param_name" => "number",
							"value" => '4'
						),
						array(
							"type" => "dropdown",
							"heading" => __("Columns count",'newfashion'),
							"param_name" => "columns_count",
							"value" => $product_columns,
							"admin_label" => true,
							"description" => __("Select columns count.",'newfashion')
						),
						array(
							"type" => "textfield",
							"heading" => __("Extra class name",'newfashion'),
							"param_name" => "el_class",
							"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'newfashion')
						)
				   	)
				));

				 

				vc_map( array(
					"name"     => __("WPO Product Categories List",'newfashion'),
					"base"     => "wpo_category_list",
					"class"    => "",
					"category" => __('Opal Woocommce', 'newfashion'),
					"params"   => array(
					array(
						"type" => "textfield",
						"class" => "",
						"heading" => __('Title', 'newfashion'),
						"param_name" => "title",
						"value"      => '',
					),
					array(
						'type' => 'checkbox',
						'heading' => __( 'Show post counts', 'newfashion' ),
						'param_name' => 'show_count',
						'description' => __( 'Enables show count total product of category.', 'newfashion' ),
						'value' => array( __( 'Yes, please', 'newfashion' ) => 'yes' )
					),
					array(
						"type"       => "checkbox",
						"heading"    => __("show children of the current category",'newfashion'),
						"param_name" => "show_children",
						'description' => __( 'Enables show children of the current category.', 'newfashion' ),
						'value' => array( __( 'Yes, please', 'newfashion' ) => 'yes' )
					),
					array(
						"type"       => "checkbox",
						"heading"    => __("Show dropdown children of the current category ",'newfashion'),
						"param_name" => "show_dropdown",
						'description' => __( 'Enables show dropdown children of the current category.', 'newfashion' ),
						'value' => array( __( 'Yes, please', 'newfashion' ) => 'yes' )
					),

					array(
						"type"        => "textfield",
						"heading"     => __("Extra class name",'newfashion'),
						"param_name"  => "el_class",
						"description" => __("If you wish to style particular content element differently, then use this field to add a class name and then refer to it in your css file.",'newfashion')
					)
			   	)
			));
			add_shortcode( 'wpo_category_list', ('newfashion_wpo_vc_shortcode_render')  );
}
?>