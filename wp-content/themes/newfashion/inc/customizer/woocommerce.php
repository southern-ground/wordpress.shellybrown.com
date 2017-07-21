<?php
if( NEWFASHION_WPO_WOOCOMMERCE_ACTIVED  ) {
    
    add_action( 'customize_register', 'newfashion_wp_ct_woocommerce_setting' );
    function newfashion_wp_ct_woocommerce_setting( $wp_customize ){
        


    	$wp_customize->add_panel( 'panel_woocommerce', array(
    		'priority' => 70,
    		'capability' => 'edit_theme_options',
    		'theme_supports' => '',
    		'title' => __( 'Woocommerce', 'newfashion' ),
    		'description' =>__( 'Make default setting for page, general', 'newfashion' ),
    	) );

        /**
         * General Setting
         */
        $wp_customize->add_section( 'wc_general_settings', array(
            'priority' => 1,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'General Setting', 'newfashion' ),
            'description' => '',
            'panel' => 'panel_woocommerce',
        ) );

        //config mini cart
        $wp_customize->add_setting('newfashion_wpo_theme_options[woo-show-minicart]', array(
            'capability' => 'manage_options',
            'type'       => 'option',
            'default'   => 1,
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control('newfashion_wpo_theme_options[woo-show-minicart]', array(
            'settings'  => 'newfashion_wpo_theme_options[woo-show-minicart]',
            'label'     => __('Enable Mini Basket', 'newfashion'),
            'section'   => 'wc_general_settings',
            'type'      => 'checkbox'
        ) );

        
        $wp_customize->add_setting('newfashion_wpo_theme_options[is-quickview]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 1,
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control('newfashion_wpo_theme_options[is-quickview]', array(
            'settings'  => 'newfashion_wpo_theme_options[is-quickview]',
            'label'     => __('Enable QuickView', 'newfashion'),
            'section'   => 'wc_general_settings',
            'type'      => 'checkbox',
            'transport' => 4,
        ) );



        $wp_customize->add_setting('newfashion_wpo_theme_options[is-swap-effect]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 1,
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control('newfashion_wpo_theme_options[is-swap-effect]', array(
            'settings'  => 'newfashion_wpo_theme_options[is-swap-effect]',
            'label'     => __('Enable Swap Image', 'newfashion'),
            'section'   => 'wc_general_settings',
            'type'      => 'checkbox',
            'transport' => 4,
        ) );

        $wp_customize->add_setting('newfashion_wpo_theme_options[wc_cartnotice]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 1,
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control('newfashion_wpo_theme_options[wc_cartnotice]', array(
            'settings'  => 'newfashion_wpo_theme_options[wc_cartnotice]',
            'label'     => __('Enable Adding Cart Notification', 'newfashion'),
            'section'   => 'wc_general_settings',
            'type'      => 'checkbox',
            'transport' => 4,
        ) );
        $wp_customize->add_setting('newfashion_wpo_theme_options[wc_cartnotice_text]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'Add to cart success!',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control('newfashion_wpo_theme_options[wc_cartnotice_text]', array(
            'settings'  => 'newfashion_wpo_theme_options[wc_cartnotice_text]',
            'label'     => __('Text add cart success', 'newfashion'),
            'section'   => 'wc_general_settings',
            'type'      => 'text',
            'transport' => 5,
        ) );



        /**
         * Archive Page Setting
         */
        $wp_customize->add_section( 'wc_archive_settings', array(
            'priority' => 2,
            'capability' => 'edit_theme_options',
            'theme_supports' => '',
            'title' => __( 'Archive Page Setting', 'newfashion' ),
            'description' => 'Configure categories, search, shop page setting',
            'panel' => 'panel_woocommerce',
        ) );

         ///  Archive layout setting
        $wp_customize->add_setting( 'newfashion_wpo_theme_options[woocommerce-archive-layout]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'mainright',
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new Newfashion_Layout_DropDown( $wp_customize,  'newfashion_wpo_theme_options[woocommerce-archive-layout]', array(
            'settings'  => 'newfashion_wpo_theme_options[woocommerce-archive-layout]',
            'label'     => __('Archive Layout', 'newfashion'),
            'section'   => 'wc_archive_settings',
            'priority' => 1

        ) ) );

       //sidebar archive left
        $wp_customize->add_setting( 'newfashion_wpo_theme_options[woocommerce-archive-left-sidebar]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'sidebar-left',
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new Newfashion_Sidebar_DropDown( $wp_customize,  'newfashion_wpo_theme_options[woocommerce-archive-left-sidebar]', array(
            'settings'  => 'newfashion_wpo_theme_options[woocommerce-archive-left-sidebar]',
            'label'     => __('Archive Left Sidebar', 'newfashion'),
            'section'   => 'wc_archive_settings' ,
             'priority' => 3
        ) ) );

          //sidebar archive right
        $wp_customize->add_setting( 'newfashion_wpo_theme_options[woocommerce-archive-right-sidebar]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'sidebar-right',
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( new Newfashion_Sidebar_DropDown( $wp_customize,  'newfashion_wpo_theme_options[woocommerce-archive-right-sidebar]', array(
            'settings'  => 'newfashion_wpo_theme_options[woocommerce-archive-right-sidebar]',
            'label'     => __('Archive Right Sidebar', 'newfashion'),
            'section'   => 'wc_archive_settings',
             'priority' => 4 
        ) ) );

        //list-grid  style archive
        $wp_customize->add_setting( 'newfashion_wpo_theme_options[wc_listgrid]', array(
            'type'       => 'option',
            'default'    => 'product',
            'capability' => 'manage_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'newfashion_wpo_theme_options[wc_listgrid]', array(
            'label'      => __( 'List Grid', 'newfashion' ),
            'section'    => 'wc_archive_settings',
            'type'       => 'select',
            'choices'     => array(
                'product-list' => __('List', 'newfashion' ),
                'product' => __('Grid', 'newfashion' ),
            ),
            'description' => 'Select default layout archive product',
            'priority' => 5
        ) );

        //number product per page
        $wp_customize->add_setting( 'newfashion_wpo_theme_options[woo-number-page]', array(
            'type'       => 'option',
            'default'    => 12,
            'capability' => 'manage_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        $wp_customize->add_control( 'newfashion_wpo_theme_options[woo-number-page]', array(
            'label'      => __( 'Number of Products Per Page', 'newfashion' ),
            'section'    => 'wc_archive_settings',
            'priority' => 6
        ) );

        //number product per row
        $wp_customize->add_setting( 'newfashion_wpo_theme_options[wc_itemsrow]', array(
            'type'       => 'option',
            'default'    => 4,
            'capability' => 'manage_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'newfashion_wpo_theme_options[wc_itemsrow]', array(
            'label'      => __( 'Number of Products Per Row', 'newfashion' ),
            'section'    => 'wc_archive_settings',
            'type'       => 'select',
            'choices'     => array(
                '2' => __('2 Items', 'newfashion' ),
                '3' => __('3 Items', 'newfashion' ),
                '4' => __('4 Items', 'newfashion' ),
                '6' => __('6 Items', 'newfashion' ),
            ),
            'priority' => 7
        ) );
    	

        /**
    	 * Product Single Setting
    	 */
    	$wp_customize->add_section( 'wc_product_settings', array(
    		'priority' => 12,
    		'capability' => 'edit_theme_options',
    		'theme_supports' => '',
    		'title' => __( 'Single Product Page Setting', 'newfashion' ),
    		'description' => 'Configure single product page',
    		'panel' => 'panel_woocommerce',
    	) );
        ///  single layout setting
        $wp_customize->add_setting( 'newfashion_wpo_theme_options[woocommerce-single-layout]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'mainright',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        //Select layout
        $wp_customize->add_control( new Newfashion_Layout_DropDown( $wp_customize,  'newfashion_wpo_theme_options[woocommerce-single-layout]', array(
            'settings'  => 'newfashion_wpo_theme_options[woocommerce-single-layout]',
            'label'     => __('Product Detail Layout', 'newfashion'),
            'section'   => 'wc_product_settings',
            'priority' => 1
        ) ) );

       
        $wp_customize->add_setting( 'newfashion_wpo_theme_options[woocommerce-single-left-sidebar]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        //Sidebar left
        $wp_customize->add_control( new Newfashion_Sidebar_DropDown( $wp_customize,  'newfashion_wpo_theme_options[woocommerce-single-left-sidebar]', array(
            'settings'  => 'newfashion_wpo_theme_options[woocommerce-single-left-sidebar]',
            'label'     => __('Product Detail Left Sidebar', 'newfashion'),
            'section'   => 'wc_product_settings',
            'priority' => 2 
        ) ) );

         $wp_customize->add_setting( 'newfashion_wpo_theme_options[woocommerce-single-right-sidebar]', array(
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 'sidebar-right',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        //Sidebar right
        $wp_customize->add_control( new Newfashion_Sidebar_DropDown( $wp_customize,  'newfashion_wpo_theme_options[woocommerce-single-right-sidebar]', array(
            'settings'  => 'newfashion_wpo_theme_options[woocommerce-single-right-sidebar]',
            'label'     => __('Product Detail Right Sidebar', 'newfashion'),
            'section'   => 'wc_product_settings',
            'priority' => 3 
        ) ) );

        //Show related product
        $wp_customize->add_setting('newfashion_wpo_theme_options[wc_show_related]', array(     
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 0,
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $wp_customize->add_control('newfashion_wpo_theme_options[wc_show_related]', array(
            'settings'  => 'newfashion_wpo_theme_options[wc_show_related]',
            'label'     => __('Disable show related product', 'newfashion'),
            'section'   => 'wc_product_settings',
            'type'      => 'checkbox',
            'priority' => 4
        ) );
         //Show upsells product
        $wp_customize->add_setting('newfashion_wpo_theme_options[wc_show_upsells]', array(     
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 0,
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $wp_customize->add_control('newfashion_wpo_theme_options[wc_show_upsells]', array(
            'settings'  => 'newfashion_wpo_theme_options[wc_show_upsells]',
            'label'     => __('Disable show upsells product', 'newfashion'),
            'section'   => 'wc_product_settings',
            'type'      => 'checkbox',
            'transport' => 3,
            'priority' => 5
        ) );

        //number of product per row 
        $wp_customize->add_setting( 'newfashion_wpo_theme_options[product-number-columns]', array(
            'type'       => 'option',
            'default'    => 3,
            'capability' => 'manage_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'newfashion_wpo_theme_options[product-number-columns]', array(
            'label'      => __( 'Number of Product Per Row', 'newfashion' ),
            'section'    => 'wc_product_settings',
            'type'       => 'select',
            'choices'     => array(
                '2' => __('2 Items', 'newfashion' ),
                '3' => __('3 Items', 'newfashion' ),
                '4' => __('4 Items', 'newfashion' )
            ),
            'priority' => 6
        ) );
        
        //Number of product to show 
        $wp_customize->add_setting( 'newfashion_wpo_theme_options[woo-number-product-single]', array(
            'type'       => 'option',
            'default'	 => 6,
            'capability' => 'manage_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'newfashion_wpo_theme_options[woo-number-product-single]', array(
            'label'      => __( 'Number of Products to Show', 'newfashion' ),
            'section'    => 'wc_product_settings',
            'priority' => 7
        ) );

         //Show Social share product
        $wp_customize->add_setting('newfashion_wpo_theme_options[wc_show_share_social]', array(     
            'capability' => 'edit_theme_options',
            'type'       => 'option',
            'default'   => 1,
            'checked' => 1,
            'sanitize_callback' => 'sanitize_text_field'
        ) );
        
        $wp_customize->add_control('newfashion_wpo_theme_options[wc_show_share_social]', array(
            'settings'  => 'newfashion_wpo_theme_options[wc_show_share_social]',
            'label'     => __('Show Social share product', 'newfashion'),
            'section'   => 'wc_product_settings',
            'type'      => 'checkbox',
            'priority' => 8
        ) );

        /**
    	 * Product Listing Setting
    	 */
    	/*$wp_customize->add_section( 'wc_product_settings', array(
    		'priority' => 13,
    		'capability' => 'edit_theme_options',
    		'theme_supports' => '',
    		'title' => __( 'Product Page Setting', 'newfashion' ),
    		'description' => '',
    		'panel' => 'panel_woocommerce',
    	) );

        $wp_customize->add_setting( 'page_on_frontaas', array(
            'type'       => 'option',
            'capability' => 'manage_options',
            'sanitize_callback' => 'sanitize_text_field'
        ) );

        $wp_customize->add_control( 'page_on_frontaas', array(
            'label'      => __( 'Front page', 'newfashion' ),
            'section'    => 'wc_product_settings',
            'type'       => 'dropdown-pages',
        ) );*/

    }
}    
?>