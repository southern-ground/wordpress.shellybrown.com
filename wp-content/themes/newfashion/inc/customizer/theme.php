<?php
 
add_action( 'customize_register', 'newfashion_wpo_cst_customizer' );

function newfashion_wpo_cst_customizer($wp_customize){

  

    # General Settings
    // Panel Header
    $wp_customize->add_section('wpo_cst_general_settings', array(
        'title'      => __('General Settings', 'newfashion'),
        'description'    => __('Website General Settings', 'newfashion'),
        'transport'  => 'postMessage',
        'priority'   => 10,
    ));

    // Parameter Options
    $wp_customize->add_setting('blogname', array( 
        'default'    => get_option('blogname'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('blogname', array( 
        'label'    => __('Site Title', 'newfashion'),
        'section'  => 'wpo_cst_general_settings',
        'priority' => 1,
    ) );
    
    //
    $wp_customize->add_setting('blogdescription', array( 
        'default'    => get_option('blogdescription'),
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
    
    $wp_customize->add_control('blogdescription', array( 
        'label'    => __('Tagline', 'newfashion'),
        'section'  => 'wpo_cst_general_settings',
        'priority' => 2,
    ) );


    // 
    $wp_customize->add_setting('display_header_text', array( 
        'default'    => 1,
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );    
    $wp_customize->add_control( 'display_header_text', array(
        'settings' => 'header_textcolor',
        'label'    => __( 'Show Title & Tagline', 'newfashion' ),
        'section'  => 'wpo_cst_general_settings',
        'type'     => 'checkbox',
        'priority' => 4,
    ) );


    /* 
     * Custom Logo 
     */
     $wp_customize->add_setting('newfashion_wpo_theme_options[logo]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'newfashion_wpo_theme_options[logo]', array(
        'label'    => __('Logo', 'newfashion'),
        'section'  => 'wpo_cst_general_settings',
        'settings' => 'newfashion_wpo_theme_options[logo]',
        'priority' => 10,
    ) ) );
    
     /* 
     * Custom payment 
     */
     $wp_customize->add_setting('newfashion_wpo_theme_options[image-payment]', array(
        'default'    => '',
        'type'       => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'esc_url_raw',
    ) );


    $wp_customize->add_setting('newfashion_wpo_theme_options[copyright_text]', array(
        'default'    => 'Copyright 2015 - opaltheme - All Rights Reserved.',
        'type'       => 'option',
        'transport'=>'refresh',
         'sanitize_callback' => 'newfashion_wpo_sanitize_textarea',
    ) );

    $wp_customize->add_control( new WPOpalTextAreaControl( $wp_customize, 'newfashion_wpo_theme_options[copyright_text]', array(
        'label'    => __('Copyright text', 'newfashion'),
        'section'  => 'wpo_cst_general_settings',
        'settings' => 'newfashion_wpo_theme_options[copyright_text]',
        'priority' => 12,
    ) ) );


    function newfashion_wpo_sanitize_textarea( $content ){
        return wp_kses_post( force_balance_tags( $content ) );
    }
   /***************************************************************************
    * Theme Settings 
    ***************************************************************************/

  
   /**
     * General Setting
     */
    $wp_customize->add_section( 'ts_general_settings', array(
        'priority' => 12,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Themes And Layouts Setting', 'newfashion' ),
        'description' => '',
    ) );

    
     $wp_customize->add_setting( 'newfashion_wpo_theme_options[headerlayout]', array(
        'type'       => 'option',
        'capability' => 'manage_options',
        'default'  => '',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'newfashion_wpo_theme_options[headerlayout]', array(
        'label'      => __( 'Header Layout Style', 'newfashion' ),
        'section'    => 'ts_general_settings',
        'type'    => 'select',
      //  'choices' => array(''=>'Default'), 
         'choices'    => newfashion_wpo_cst_headerlayouts(),
    ) );

    $wp_customize->add_setting( 'newfashion_wpo_theme_options[footer-style]', array(
        'type'           => 'option',
        'capability'     => 'manage_options',
        'default'        => 'default'   ,
        'sanitize_callback' => 'sanitize_text_field'
        //  'theme_supports' => 'static-front-page',
    ) );
    
     $wp_customize->add_control( 'newfashion_wpo_theme_options[footer-style]', array(
        'label'      => __( 'Footer Styles Builder', 'newfashion' ),
        'section'    => 'ts_general_settings',
        'type'       => 'select',
        'choices'    => newfashion_wpo_get_footerbuilder_profiles()
    ) );

     /******************************************************************
     * Social share
     ******************************************************************/
    $wp_customize->add_section( 'social_share_settings', array(
        'priority' => 50,
        'capability' => 'edit_theme_options',
        'theme_supports' => '',
        'title' => __( 'Social Share setting', 'newfashion' ),
        'description' => '',
    ) );

    // Share facebook
    newfashion_wpo_social_config( $wp_customize, 'facebook_share_blog', __('Share facebook ', 'newfashion'), 'social_share_settings');
    //share twitter
    newfashion_wpo_social_config( $wp_customize, 'twitter_share_blog', __('Share twitter ', 'newfashion'), 'social_share_settings');
    //share linkedin
    newfashion_wpo_social_config( $wp_customize, 'linkedin_share_blog', __('Share linkedin ', 'newfashion'), 'social_share_settings');
    //share tumblr
    newfashion_wpo_social_config( $wp_customize, 'tumblr_share_blog', __('Share tumblr ', 'newfashion'), 'social_share_settings');
    //share google plus
    newfashion_wpo_social_config( $wp_customize, 'google_share_blog', __('Share google plus ', 'newfashion'), 'social_share_settings');
    //share pinterest
    newfashion_wpo_social_config( $wp_customize, 'pinterest_share_blog', __('Share pinterest ', 'newfashion'), 'social_share_settings');
    //share mail
    newfashion_wpo_social_config( $wp_customize, 'mail_share_blog', __('Share mail ', 'newfashion'), 'social_share_settings');


    /******************************************************************
     * Navigation
     ******************************************************************/

     # Sticky Top Bar Option
    $wp_customize->add_setting('newfashion_wpo_theme_options[verticalmenu]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

  


    # Sticky Top Bar Option
    $wp_customize->add_setting('newfashion_wpo_theme_options[megamenu-is-sticky]', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('newfashion_wpo_theme_options[megamenu-is-sticky]', array(
        'settings'  => 'newfashion_wpo_theme_options[megamenu-is-sticky]',
        'label'     => __('Sticky Top Bar', 'newfashion'),
        'section'   => 'nav',
        'type'      => 'checkbox',
        'transport' => 4,
    ) );
    
    


    /*****************************************************************
     * Front Page Settings Panel
     *****************************************************************/   
    $wp_customize->add_section( 'static_front_page', array(
        'title'          => __( 'Front Page Settings', 'newfashion' ),
        'priority'       => 120,
        'description'    => __( 'Your theme supports a static front page.', 'newfashion'),
    ) );

    $wp_customize->add_setting( 'newfashion_wpo_theme_options[sidebar_position]', array(
        'default' => 'left',
        'capability'     => 'edit_theme_options',
        'type'           => 'option',
        'sanitize_callback' => 'sanitize_text_field'
    ) );
 
    $wp_customize->add_control( 'newfashion_wpo_theme_options[sidebar_position]', array(
        'type' => 'radio',
        'label' => 'Sidebar Position',
        'section' => 'static_front_page',
        'priority' => 1,
        'choices' => array(
            'left' => 'Left',
            'right' => 'Right',
        ),
    ) );

    $wp_customize->add_setting( 'show_on_front', array(
        'default'        => get_option( 'show_on_front' ),
        'capability'     => 'manage_options',
        'type'           => 'option',
        //  'theme_supports' => 'static-front-page',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'show_on_front', array(
        'label'   => __( 'Front page displays', 'newfashion' ),
        'section' => 'static_front_page',
        'type'    => 'radio',
        'choices' => array(
            'posts' => __( 'Your latest posts', 'newfashion' ),
            'page'  => __( 'A static page', 'newfashion' ),
        ),
    ) );
    
    $wp_customize->add_setting( 'page_on_front', array(
        'type'       => 'option',
        'capability' => 'manage_options',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'page_on_front', array(
        'label'      => __( 'Front page', 'newfashion' ),
        'section'    => 'static_front_page',
        'type'       => 'dropdown-pages',
    ) );

    $wp_customize->add_setting( 'page_for_posts', array(
        'type'           => 'option',
        'capability'     => 'manage_options',
        //  'theme_supports' => 'static-front-page',
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control( 'page_for_posts', array(
        'label'      => __( 'Posts page', 'newfashion' ),
        'section'    => 'static_front_page',
        'type'       => 'dropdown-pages',
    ) );


    /* 
     /*****************************************************************
     * Front Page Settings Panel
     *****************************************************************/   
    $wp_customize->add_section( 'pages_setting', array(
        'title'          => __( 'Pages Settings', 'newfashion' ),
        'priority'       => 120,
        'description'    => __( 'Your theme supports a static front page.', 'newfashion'),
    ) );

     
    $wp_customize->add_setting( 'newfashion_wpo_theme_options[404_post]', array(
        'type'           => 'option',
        'capability'     => 'manage_options',
        'default'        => ''   ,
        'sanitize_callback' => 'sanitize_text_field'
        //  'theme_supports' => 'static-front-page',
    ) );
    
     $wp_customize->add_control( 'newfashion_wpo_theme_options[404_post]', array(
        'label'      => __( '404 Page', 'newfashion' ),
        'section'    => 'pages_setting',
        'type'       => 'dropdown-pages',
    ) );


      // 
    $wp_customize->add_setting('newfashion_wpo_theme_options[showpagecomment]', array( 
        'default'    => 1,
        'type'       => 'option',
        'capability' => 'manage_options',
        'transport'  => 'postMessage',
        'sanitize_callback' => 'sanitize_text_field'
    ) );    
    $wp_customize->add_control( 'newfashion_wpo_theme_options[showpagecomment]', array(
        'settings' => 'newfashion_wpo_theme_options[showpagecomment]',
        'label'    => __( 'Show Page Comment Form', 'newfashion' ),
        'section'  => 'pages_setting',
        'type'     => 'checkbox',
        'priority' => 10,
    ) );

     // 
}

function newfashion_wpo_social_config( $wp_customize, $id, $name_social, $section){
    $wp_customize->add_setting('newfashion_wpo_theme_options['.$id.']', array(
        'capability' => 'edit_theme_options',
        'type'       => 'option',
        'default'   => 1,
        'checked' => 1,
        'sanitize_callback' => 'sanitize_text_field'
    ) );

    $wp_customize->add_control('newfashion_wpo_theme_options['.$id.']', array(
        'settings'  => 'newfashion_wpo_theme_options['.$id.']',
        'label'     => $name_social,
        'section'   => $section,
        'type'      => 'checkbox',
        'transport' => 4,
    ) );
}
