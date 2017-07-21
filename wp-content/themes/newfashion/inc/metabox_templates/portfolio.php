<?php 
global $wp_registered_sidebars;
 
    $meta_tabs = array(
        array(
            'id'    => 'wpo-config',
            'icon'  => 'fa-wrench',
            'title' => 'General'
        ),
        array(
            'id'    => 'wpo-format',
            'icon'  => 'fa-folder',
            'title' => 'Portfolio format'
        )
    );

?>
<div id="wpo-post" class="wpo-metabox">
    <!-- Nav tabs -->
    <?php $mb->getTabsConfig($meta_tabs); ?>

    <!--Genaral config -->
    <div class="wpo-meta-content active" id="wpo-config">

        <!--show title config -->
            <p class="wpo_section config_layout">
            <?php 
                $_enabal_config = array('id'=>'config_layout','title'=> __('Enable config layout','newfashion'), 'text' => __('Enable', 'newfashion') );
                $mb->getCheckboxElement( $_enabal_config ); ?>
            </p>

        <!--Select page layout-->
        <div class="wpo_section config_layout enabal-config">
        <?php
            $layout = array('id' => 'page_layout', 'title' => __('Select page layout','newfashion') );
            $mb->selectLayout($layout);
        ?>
        </div>

       <div style="clear:both;"></div>
        <!--Select left sidebar-->
        <p class="wpo_section left-sidebar config_layout enabal-config">
            <?php $mb->the_field('left_sidebar'); ?>
        <?php 
            $left_sidebars = array('id'=> 'left_sidebar','title'=> __('Left Sidebar','newfashion'),'data'=>$wp_registered_sidebars,'default'=>'sidebar-left');
            $mb->getSelectElement($left_sidebars);
        ?>
        </p>
        <!--Select right sidebar-->
        <p class="wpo_section right-sidebar config_layout enabal-config" style="display: none;">
    <?php 
        $right_sidebars = array('id'=> 'right_sidebar','title'=> __('Right Sidebar', 'newfashion'),'data'=>$wp_registered_sidebars,'default'=>'sidebar-right');
        $mb->getSelectElement($right_sidebars); 
    ?>
        </p>

    </div>

    <!--Pofolio format-->
    <div class="wpo-meta-content" id="wpo-format">
        <!--Select portfolio Format-->
        <p class="wpo_section" data-group="portfolio_format" data-id="default:slideshow:video:gallery:infomation:fullscreen">
            <?php
            $data_format = array(
                array('id'=>'default', 'name' => __('Default', 'newfashion') ),
                array('id'=>'slideshow', 'name' => __('Slideshow', 'newfashion' ) ),
                array('id'=>'video', 'name' => __('Video', 'newfashion') ),
                array('id'=>'gallery', 'name' => __('Gallery', 'newfashion') ),
                array('id'=>'infomation', 'name'=> __('Infomation', 'newfashion') ),
                array('id'=>'fullscreen', 'name'=>__('Fullscreen', 'newfashion'))
            );
                $format = array(
                    'id'=> 'portfolio_format',
                    'title'=> __('Portfolio format', 'newfashion'),
                    'data'=>$data_format,
                    'default'=>'default'
                );
                $mb->getSelectElement($format); 
            ?>
        </p>

        <!-- Gallery-->
        <p class="wpo_section portfolio_format slideshow gallery fullscreen">
            <label><b><?php _e( 'Gallery image', 'newfashion')?></b></label>
            <?php
                wp_enqueue_media();
                wp_enqueue_style( 'newfashion-admin_metabox_css', WPO_FRAMEWORK_ADMIN_STYLE_URI.'css/metabox.css');
                wp_enqueue_script('newfashion-gallery_upload', WPO_FRAMEWORK_ADMIN_STYLE_URI.'js/gallery_upload.js');
            ?>
            <span class="add_product_images hide-if-no-js">
                <a href="#" class="button" data-choose="<?php _e( 'Add Images to Gallery', 'newfashion' ); ?>" data-update="<?php _e( 'Add to gallery', 'newfashion' ); ?>" data-delete="<?php _e( 'Delete image', 'newfashion'); ?>" data-text="<?php _e( 'Delete', 'newfashion'); ?>"><i class="fa fa-upload"></i><?php _e(' Add gallery', 'newfashion'); ?></a>
            </span> 
            <div id="product_images_container" class="portfolio_format gallery slideshow fullscreen">

                <ul class="product_images">
                <?php
                    $mb->the_field( 'portfolio_gallery');
                    $galleries = $mb->get_the_value();
                    $attachments = array_filter( explode( ',', $galleries ) );

                    if ( $attachments ) {
                        foreach ( $attachments as $attachment_id ) {
                            echo '<li class="image" data-attachment_id="' . esc_attr( $attachment_id ) . '">
                                ' . wp_get_attachment_image( $attachment_id, 'lookbook-slide' ) . '
                                <ul class="actions">
                                    <li><a href="#" class="delete tips" data-tip="' . __( 'Delete image', 'newfashion' ) . '"><i class="fa fa-times"></i></a></li>
                                </ul>
                            </li>'; 
                        }
                    }
                ?>
                </ul>

                <input type="hidden" id="product_image_gallery" name="<?php $mb->the_name(); ?>" value="<?php echo esc_attr( $mb->get_the_value() ); ?>" />

            </div>
        </p>

        <p class="wpo_section portfolio_format video">
            <?php
                $video_link = array(
                    'id'    => 'portfolio_video',
                    'title' => 'Video link',
                    'des'   => '(Support <a href="'.( is_ssl()  ? 'https' : 'http') .'://www.youtube.com/" target="_bank" >Youtube</a> and <a href="'.( is_ssl()  ? 'https' : 'http') .'://vimeo.com/" target="_bank">Vimeo</a> video)'
                );
                $mb->addTextElement( $video_link );
            ?>
            <div class="newfashion_wpo_embed_view portfolio_format video">
                <span class="spinner" style="float:none;"></span>
                <div class="result"></div>
            </div>
        </p>
        
        <!-- Infomation -->
        <p class="wpo_section portfolio_format infomation">
            <?php
                $author = array(
                    'id'    => 'author',
                    'title' => 'Author',
                    'des' => '');
                $mb->addTextElement( $author );
            ?>
           <br>
            <?php
                $demo = array(
                    'id'    => 'link_demo',
                    'title' => 'Link demo',
                    'des' => '');
                $mb->addTextElement( $demo );
            ?>
          <br>
            <?php
                $date = array(
                    'id'    => 'date_created',
                    'title' => 'Date created',
                    'des'=> '');
                $mb->wpo_datepicker( $date );
            ?>
           <br><br>
            <?php
                $client = array(
                    'id'    => 'client',
                    'title' => 'Client',
                    'des'=> '');
                $mb->addTextElement( $client );
            ?>
        </p>
    </div>
</div>