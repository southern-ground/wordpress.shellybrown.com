<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     Opal  Team <opalwordpressl@gmail.com >
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */

if(class_exists('Featured_Post_Widget')){

    class Newfashion_Featured_Post_Widget extends Newfashion_Widget {
        public function __construct() {
            parent::__construct(
                // Base ID of your widget
                'newfashion_featured_post_widget',
                // Widget name will appear in UI
                __('WPO Featured Post Widget', 'newfashion')
            );
            $this->widgetName = 'featured_post';
        }

        public function widget( $args, $instance ) {
            global $post;
            extract( $args );
            extract( $instance );

             echo ($before_widget);

            require($this->renderLayout($layout));

            echo ($after_widget);
        }
        
        // Widget Backend
        public function form( $instance ) {
            $defaults = array(  'title' => 'Featured Post',
                                'layout' => 'default' ,
                                'num' => '5',
                                'post_type' =>  'post');
            $instance = wp_parse_args((array) $instance, $defaults);
            
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>">Title:</label>
                <br>
                <input id="<?php echo esc_attr($this->get_field_id('title')); ?>" name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text" value="<?php echo esc_attr($instance['title']); ?>" />
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id( 'layout' )); ?>">Template Style:</label>
                <br>
                <select name="<?php echo esc_attr($this->get_field_name( 'layout' )); ?>" id="<?php echo esc_attr($this->get_field_id( 'layout' )); ?>">
                    <?php foreach ($this->selectLayout() as $key => $value): ?>
                        <option value="<?php echo esc_attr( $value ); ?>" <?php selected( $instance['layout'], $value ); ?>><?php echo esc_html( $value ); ?></option>
                    <?php endforeach; ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('post_type')); ?>">
                    <?php echo __('Type:', 'newfashion' ); ?>
                </label>
                <br>
                <select id="<?php echo esc_attr($this->get_field_id('post_type')); ?>" name="<?php echo esc_attr($this->get_field_name('post_type')); ?>">
                    <?php foreach (get_post_types(array('public' => true)) as $key => $value) { ?>
                        <?php if($key!='attachment'){ ?>
                        <option value="<?php echo esc_attr( $key ); ?>" <?php selected($instance['post_type'],$key); ?> ><?php echo esc_html( $value ); ?></option>
                        <?php } ?>
                    <?php } ?>
                </select>
            </p>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('num')); ?>"><?php __('Limit:', 'newfashion'); ?></label>
                <br>
                <input id="<?php echo esc_attr($this->get_field_id('num')); ?>" name="<?php echo esc_attr($this->get_field_name('num')); ?>" type="text" value="<?php echo esc_attr( $instance['num'] ); ?>" />
            </p>

    <?php
        }

        public function update( $new_instance, $old_instance ) {
            $instance = $old_instance;

            $instance['title'] = $new_instance['title'];
            $instance['num'] = $new_instance['num'];
            $instance['post_type'] = $new_instance['post_type'];
            $instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? $new_instance['layout'] : 'default';
            return $instance;

        }
    }

    register_widget( 'Newfashion_Featured_Post_Widget' );
}