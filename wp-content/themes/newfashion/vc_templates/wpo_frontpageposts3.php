<?php
$grid_link = $grid_layout_mode = $title = $filter= '';
$posts = array();
$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );
if(empty($loop)) return;
$this->getLoop($loop);
$args = $this->loop_args;
 
$loop = new WP_Query($args);
?>

<section class="widget frontpage-posts frontpage-3 section-blog layout-<?php echo esc_attr($layout); ?>  <?php echo (($el_class!='')?' '.$el_class:''); ?>">
    <?php
        if($title!=''){ ?>
            <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.$alignment; ?>">
                <span><?php echo trim($title); ?></span>
            </h3>
        <?php }
    ?>
    <div class="widget-content"> 
       <?php
        $_count =1;
        $colums = '3';
        $bscol = floor( 12/$colums );
        $end = $loop->post_count;
        ?>

        <div class="frontpage-wrapper">
        <div class="row">
        <?php

            $i = 0;
            $main = $num_mainpost;

            while($loop->have_posts()){
                $loop->the_post();
         ?>
                <?php if( $i<=$main-1) { ?>
                    <?php if( $i == 0 ) {  ?>
                        <div  class="col-sm-12 main-posts large">
                    <?php } ?>
                    <?php get_template_part( 'templates/post/_single' ) ?>

                    <?php if( $i == $main-1 || $i == $end -1 ) { ?>
                        </div>
                    <?php } ?>
                <?php } else { ?>
                        <?php if( $i == $main  ) { ?>
                        <div class="col-sm-12 secondary-posts">
                        <?php }  ?>
                             <?php get_template_part( 'templates/post/_single-v2' ) ?>
                        <?php if( $i == $end-1 ) {   ?>
                            </div>
                        <?php } ?>
                    <?php } ?>
        <?php  $i++; } ?>
        <?php wp_reset_postdata(); ?>
        </div>
        </div>
    </div>
</section>