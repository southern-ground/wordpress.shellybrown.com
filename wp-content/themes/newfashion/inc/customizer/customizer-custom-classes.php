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
 * WPOPAL Category Drop Down List Class
 * modified dropdown-pages from wp-includes/class-wp-customize-control.php
 *
 * @since WPOPAL v1.0
 */
if(  class_exists("WP_Customize_Control") ){


    class Newfashion_CustomizeProfile_DropDown extends WP_Customize_Control{
         public function render_content(){
            
                    
            $profiles = newfashion_wpo_cst_css_profiles();

         
            $output = array();
            
            foreach( $profiles as $profile ){ 
                $selected = ($this->value() == $profile)?' selected="selected" ': '';
                $output[] = '<option value="'.$profile.'" '.$selected.'>'.$profile.'</option>';
            }

            $dropdown = '<select>'.implode( " ", $output ).'</select>';
            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown );

            $sub = '<div class="alert alert-info">
                   '.__('Click Live Customizing Theme to create custom-theme-profiles and they will be listed in above dropdown box. You select one profile theme to apply for your site
!important: All theme profiles are stored in folder YOURTHEME/css/customze, it need permission 0755 to put files inside','newfashion').'
            </div>' .'<div><a href="'.admin_url('themes.php?page=wpo_livethemeedit', 'newfashion').'">'.__('Create Profile Now', 'newfashion').'</a></div>';
            printf( 
                 '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>'.$sub,
                $this->label,
                $dropdown
            );
     
        }
    }

    class Newfashion_Sidebar_DropDown extends WP_Customize_Control{
     
        public function render_content(){
            
            global $wp_registered_sidebars;
            
            $output = array();
            
            foreach( $wp_registered_sidebars as $sidebar ){ 
                $selected = ($this->value() == $sidebar['id'])?' selected="selected" ': '';
                $output[] = '<option value="'.$sidebar['id'].'" '.$selected.'>'.$sidebar['name'].'</option>';
            }

            $dropdown = '<select>'.implode( " ", $output ).'</select>';
            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown );

            printf( 
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
     
        }
    }

    ///
    
    class Newfashion_Layout_DropDown extends WP_Customize_Control{
        public $type="WPO_Layout";
        public function render_content(){
            
            $layouts = array(
                'fullwidth' => __('Fullwidth', 'newfashion'),
                'leftmain' => __('Left - Main Sidebar', 'newfashion'),
                'mainright' => __('Main - Right Sidebar', 'newfashion'),
                'leftmainright' => __('Left - Main - Right Sidebar', 'newfashion'),
        
            );
             printf( 
                '<label class="customize-control-select"><span class="customize-control-title">%s</span>',
                 $this->label
               
            );
            ?>
            <div class="page-layout">
                <img  src="<?php echo WPO_FRAMEWORK_ADMIN_IMAGE_URI.'1col.png'; ?>" class="layout" data-value="fullwidth" alt="<?php _e( "Layout Main Content Column Only", 'newfashion');?>">
                <img src="<?php echo WPO_FRAMEWORK_ADMIN_IMAGE_URI.'2cl.png'; ?>" class="layout"data-value="leftmain" alt="<?php _e( "Layout Left  + Main Content Column", 'newfashion');?>">
                <img src="<?php echo WPO_FRAMEWORK_ADMIN_IMAGE_URI.'2cr.png'; ?>" class="layout" data-value="mainright" alt="<?php _e( "Layout Main Content and Right Column", 'newfashion');?>">
                <img src="<?php echo WPO_FRAMEWORK_ADMIN_IMAGE_URI.'3c.png'; ?>" class="layout" data-value="leftmainright" alt="<?php _e( "Layout Left  + Main Content and Right Column", 'newfashion');?>">

            <?php
            $output = array();
            
            foreach( $layouts as $key => $layout ){ 
                $v = $this->value() ? $this->value() : 'fullwidth' ;   
                $selected = ( $v == $key)?' selected="selected" ': '';
                $output[] = '<option value="'.$key.'" '.$selected.'>'.$layout.'</option>';
            }

            $dropdown = '<select>'.implode( " ", $output ).'</select>';
            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown );

            printf( 
                '%s</label>',
                
                $dropdown
            ).'</div>';
        }
    }

}
if ( class_exists( 'WP_Customize_Control' ) ) {
    class WP_Customize_Dropdown_Categories_Control extends WP_Customize_Control {
        public $type = 'dropdown-categories';	

        public function render_content() {
            $dropdown = wp_dropdown_categories( 
                array( 
                    'name'             => '_customize-dropdown-categories-' . $this->id,
                    'echo'             => 0,
                    'hide_empty'       => false,
                    'show_option_none' => '&mdash; ' . __('Select', 'reactor') . ' &mdash;',
                    'hide_if_empty'    => false,
                    'selected'         => $this->value(),
                )
            );

            $dropdown = str_replace('<select', '<select ' . $this->get_link(), $dropdown );

            printf( 
                '<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
                $this->label,
                $dropdown
            );
        }
    }
}

/**
 * WPOPAL TextArea Control Class
 * create custom textarea input field
 *
 * @since WPOPAL v0.5
 **/

if ( class_exists( 'WP_Customize_Control' ) ) {
    # Adds textarea support to the theme customizer
    class WPOpalTextAreaControl extends WP_Customize_Control {
        public $type = 'textarea'; # can change to 'number' for input[type=number] field
        public function __construct( $manager, $id, $args = array() ) {
            $this->statuses = array( '' => __( 'Default', 'newfashion' ) );
            parent::__construct( $manager, $id, $args );
        }

        public function render_content() {
            echo '<label>
                <span class="customize-control-title">' . esc_html( $this->label ) . '</span>
                <textarea rows="5" style="width:100%;" ';
            $this->link();
            echo '>' . esc_textarea( $this->value() ) . '</textarea>
                </label>';
        }
    }

}

if (  class_exists( 'WP_Customize_Control' ) ) {
     

    /**
     * Class to create a custom tags control
     */
    class Text_Editor_Custom_Control extends WP_Customize_Control
    {
          /**
           * Render the content on the theme customizer page
           */
          public function render_content()
           {
                ?>
                    <label>
                      <span class="customize-text_editor"><?php echo esc_html( $this->label ); ?></span>
                      <?php
                        $settings = array(
                          'textarea_name' => $this->id
                          );

                        wp_editor($this->value(), $this->id, $settings );
                      ?>
                    </label>
                <?php
           }
    }

}

/**
 * WPOPAL Google Front Control Class
 *
 * @since WPOPAL v2.1
 **/
if ( class_exists( 'WP_Customize_Control' ) ) {
    # Adds textarea support to the theme customizer
    class WPOpalGoogleFontControl extends WP_Customize_Control {
    
        private $fonts = false;

        public function __construct($manager, $id, $args = array(), $options = array()){
            $this->fonts = get_transient( 'google_font_names_');

            if ( ! is_array( $this->fonts ) )
                $this->fonts = $this->get_font_names();

            if ( ! $this->fonts ) return;
            
            parent::__construct( $manager, $id, $args );

        }
    
        public function render_content() {
            if(!empty($this->fonts)) { ?>
                <label>
                    <span class="customize-category-select-control"><?php echo esc_html( $this->label ); ?></span>
                    <select <?php $this->link(); ?>>
                <?php
                foreach ( $this->fonts as $key => $value ) {
                    printf('<option value="%s">%s</option>',
                        $key,
                        $value);
                }
                ?>
                    </select>
                </label>
            <?php
            }
        }

        public function get_font_names() {
            
            $font_name_list = get_transient( 'google_font_names_');

            if ( $font_name_list )
                return $font_name_list;

            $json_name_list = @wp_remote_get( 'https://www.googleapis.com/webfonts/v1/webfonts?sort=popularity&key=AIzaSyBWVfrVgpz5SYM-inIZL4SpzCzTPi4Dhrg' );

            if ( !isset( $json_name_list ) )
                return;

            $decoded_name_list = @json_decode( $json_name_list[ 'body'] );

            $font_name_list[ 'none' ] = 'none';

            if ( is_object( $decoded_name_list ) )
                foreach ( $decoded_name_list->items as $font_name )
                    $font_name_list[ str_replace( ' ', '+', $font_name->family ) ] = $font_name->family;

            set_transient( 'google_font_names_', $font_name_list, 60 * 60 *24 );
            return $font_name_list;
        }
    }
}
?>