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

class Newfashion_Recent_Comment extends Newfashion_Widget {
    public function __construct() {
        parent::__construct(
            // Base ID of your widget
            'newfashion_recent_comment',
            // Widget name will appear in UI
            __('WPO Recent Comments Widget', 'newfashion'),
            // Widget description
            array( 'description' => __( 'Show list of recent comments', 'newfashion' ), )
        );
        $this->widgetName = 'recent_comment';
    }

    public function widget( $args, $instance ) {
        extract( $args );
        extract( $instance );
        $title = apply_filters( 'widget_title', $title );
         echo ($before_widget);
            require($this->renderLayout($layout));
        echo ($after_widget);
    }
// Widget Backend
    public function form( $instance ) {
        if ( isset( $instance[ 'title' ] ) ) {
            $title = $instance[ 'title' ];
        }else {
            $title = __( 'Latest Post', 'newfashion' );
        }

        if(isset($instance[ 'number_comment' ])){
            $number_comment = $instance[ 'number_comment' ];
        }else{
            $number_comment = 4;
        }
        // Widget admin form
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id( 'title' )); ?>"><?php _e( 'Title:', 'newfashion' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'title' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'title' )); ?>" type="text" value="<?php echo esc_attr( $title ); ?>" />
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
            <label for="<?php echo esc_attr($this->get_field_id( 'number_comment' )); ?>"><?php _e( 'Num Comments:', 'newfashion' ); ?></label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id( 'number_comment' )); ?>" name="<?php echo esc_attr($this->get_field_name( 'number_comment' )); ?>" type="text" value="<?php echo  esc_attr( $number_comment ); ?>" />
        </p>
<?php
    }

    public function update( $new_instance, $old_instance ) {
        $instance = array();
        $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
        $instance['number_comment'] = ( ! empty( $new_instance['number_comment'] ) ) ? strip_tags( $new_instance['number_comment'] ) : '';
        $instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? $new_instance['layout'] : 'default';
        return $instance;

    }
}

register_widget( 'Newfashion_Recent_Comment' );