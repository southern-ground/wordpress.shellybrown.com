<?php

class Newfashion_Contact_Info_Widget extends Newfashion_Widget {

    
    private $params;
    public function __construct() {
        parent::__construct(
            // Base ID of your widget
            'newfashion_contact_info',
            // Widget name will appear in UI
            __('WPO Contact Info Widget', 'newfashion'),
            // Widget description
            array( 'description' => __( 'Add contact information. ', 'newfashion' ), )
        );
        $this->widgetName = 'contact-info';
        
        $this->params = array(
            'title' => __('Title', 'wpo'), 
            'description' => __('Description', 'wpo'), 
            'company' => __('Company', 'wpo'), 
            'country' => __('Country', 'wpo'), 
            'locality' => __('Locality', 'wpo'),
            'region' => __('Region', 'wpo'),
            'street' => __('Street', 'wpo'),
            'working-days' => __('Working Days', 'wpo'),
            'working-hours' => __('Working Hours', 'wpo'),
            'phone' => __('Phone', 'wpo'),
            'mobile' => __('Mobile', 'wpo'),
            'fax' => __('Fax', 'wpo'),
            'skype' => __('Skype', 'wpo'),
            'email-address' => __('Email Address', 'wpo'),
            'email' => __('Email', 'wpo'),
            'website-url' => __('Website URL', 'wpo'),
            'website' => __('Website', 'wpo')
        );
    }


    function widget($args, $instance) {
        extract($args);     
        $title  = apply_filters('widget_title', esc_attr($instance['title']));

         echo ($before_widget);

        if ($title) {
            echo ($before_title)  . trim( $title ) . $after_title;
        }
        ?>
        <ul class="contact-info list-unstyled">
        <?php
        foreach ($this->params as $key => $value) :
            if ($instance[$key]) : 
                switch ($key) { 
                    case 'working-days':
                    case 'working-hours':
                    case 'phone':
                        if(isset($instance[$key.'_class']) && !empty($instance[$key.'_class'])): ?>
                            <li class="<?php echo esc_attr( $key ) ?>"><div class="contact-icon"><i class="<?php echo esc_attr( $instance[$key.'_class'] ); ?>" ></i></div><?php echo esc_html( $value ); ?>: <?php echo esc_html( $instance[$key] ); ?></li>
                    <?php else: ?>
                        <li class="<?php echo esc_attr( $key ) ?>"><?php echo esc_html( $value ) ?>: <?php echo esc_html( $instance[$key] ); ?></li>
                        <?php endif;
                    break;
                    case 'mobile':
                        if(isset($instance[$key.'_class']) && !empty($instance[$key.'_class'])): ?>
                                <li class="<?php echo esc_attr( $key ) ?>"><div class="contact-icon"><i class="<?php echo esc_attr( $instance[$key.'_class'] ); ?>" ></i></div><?php echo esc_html( $value ) ?>: <?php echo esc_html( $instance[$key] ); ?></li>
                        <?php else: ?>
                        <li class="<?php echo esc_attr( $key ) ?>"><?php echo esc_html( $value ); ?>: <?php echo esc_html( $instance[$key] ); ?></li>
                        <?php endif;
                        break;
                    case 'skype':
                        if(isset($instance[$key.'_class']) && !empty($instance[$key.'_class'])): ?>
                                <li class="<?php echo esc_attr( $key ) ?>"><div class="contact-icon"><i class="<?php echo esc_attr( $instance[$key.'_class'] ); ?>" ></i></div><?php echo esc_html( $value ) ?>: <?php echo esc_html( $instance[$key] ); ?></li>
                        <?php else: ?>
                        <li class="<?php echo esc_attr( $key ) ?>"><?php echo esc_html( $value ) ?>: <?php echo esc_html( $instance[$key] ); ?></li>
                        <?php endif;
                        break;
                    case 'title':
                    case 'email-address':
                    case 'website-url':
                        break;
                    case 'email':
                        if(isset($instance[$key.'_class']) && !empty($instance[$key.'_class'])): ?>
                            <li class="<?php echo esc_attr( $key ) ?>"><div class="contact-icon"><i class="<?php echo esc_attr( $instance[$key.'_class'] ); ?>" ></i></div><?php echo esc_html( $value )?>: <a href="mailto:<?php echo sanitize_email( $instance['email-address'] ); ?>"><?php if($instance[$key]) { echo esc_html( $instance[$key] ); } ?></a></li>
                        <?php else: ?>
                            <li class="<?php echo esc_attr( $key ) ?>"><?php echo esc_html( $value ) ?>: <a href="mailto:<?php echo sanitize_email( $instance['email-address'] ); ?>"><?php if($instance[$key]) { echo esc_html( $instance[$key] ); } else { echo esc_html( $instance[$key] ); } ?></a></li>
                        <?php endif;
                        break;
                    case 'website':
                        if(isset($instance[$key.'_class']) && !empty($instance[$key.'_class'])): ?>
                            <li class="<?php echo esc_attr( $key ) ?>"><div class="contact-icon"><i class="<?php echo esc_attr( $instance[$key.'_class'] ); ?>" ></i></div><?php echo esc_html( $value ) ?>: <a href="<?php echo esc_url($instance['website-url']); ?>"><?php if($instance[$key]) { echo esc_html( $instance[$key] ); } else { echo esc_html( $instance[$key] ); } ?></a></li>
                        <?php else: ?>
                            <li class="<?php echo esc_attr( $key ) ?>"><?php echo esc_html( $value ) ?> <a href="<?php echo esc_url($instance['website-url']); ?>"><?php if($instance[$key]) { echo esc_html( $instance[$key] ); } else { echo esc_html( $instance[$key] ); } ?></a></li>
                        <?php endif;
                    break;
                    default: ?>
                        <li class="<?php echo esc_attr( $key ) ?>"><?php echo esc_html( $instance[$key] ); ?></li>
            <?php }
            endif;
        endforeach; ?>
        </ul>
        <?php
        echo ($after_widget);
    }

    function update($new_instance, $old_instance) {
        $instance = $old_instance;
        
        
        foreach ($this->params as $key => $value){
            $instance[$key] = $new_instance[$key];
            $instance[$key.'_class'] = $new_instance[$key.'_class'];
        }
        return $instance;
    }

    function form($instance) {
        $defaults = array('title' => __('Contact Info', 'wpo'));
        $instance = wp_parse_args((array) $instance, $defaults);
        $array_class = array('phone', 'mobile', 'fax', 'skype', 'email', 'website' );
        foreach ($this->params as $key => $value) :
        ?>
            <p>
                <label for="<?php echo esc_attr( $this->get_field_id($key) ); ?>"><?php echo trim($value); ?>:</label>
                <?php if(in_array($key, $array_class)):?>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id($key)); ?>" name="<?php echo esc_attr($this->get_field_name($key)); ?>" type="text" value="<?php if (isset($instance[$key])) echo esc_attr( $instance[$key] ); ?>" />
                    <label for="<?php echo esc_attr($this->get_field_id($key.'_class')); ?>"><?php echo 'Icon class '.$value ?>:</label>
                <input class="widefat" id="<?php echo esc_attr($this->get_field_id($key.'_class')); ?>" name="<?php echo esc_attr($this->get_field_name($key.'_class')); ?>" type="text" value="<?php if (isset($instance[$key.'_class'])) echo esc_attr( $instance[$key.'_class'] ); ?>" />
                <?php else: ?>
                    <input class="widefat" id="<?php echo esc_attr($this->get_field_id($key)); ?>" name="<?php echo esc_attr($this->get_field_name($key)); ?>" type="text" value="<?php if (isset($instance[$key])) echo esc_attr( $instance[$key] ); ?>" />
                <?php endif; ?>
            </p>
        <?php endforeach; ?>
        <script type="application/javascript">
        jQuery('.checkbox').on('click',function(){
            jQuery('.'+this.id).toggle();
        });
    </script>
    <?php
    }
}

register_widget( 'Newfashion_Contact_Info_Widget' );