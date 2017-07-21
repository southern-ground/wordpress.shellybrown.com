<?php
$grid_link = $grid_layout_mode = $title = $filter= '';
$posts = array();
$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );
if(empty($loop)) return;


$this->getLoop($loop);
$args = $this->loop_args;


?>

<section class="widget wpo-grid-posts section-blog <?php echo (($el_class!='')?' '.$el_class:''); ?>">
    <?php if( $title ) { ?>
        <h3 class="widget-title visual-title <?php echo esc_attr($size).' '.$alignment; ?>">
           <span><?php echo trim($title); ?></span>
        </h3>
    <?php } ?>

    <div class="widget-content">

        <?php

            $loop = new WP_Query($args);
            if($loop->have_posts()){  ?>
             	<ul class="posts-timeline post-area">
					<?php $i = 0;
					    while($loop->have_posts()){
					    $loop->the_post();
					?>
				   <li class="entry-timeline"><div class="hentry">
                        
                        <div class="entry-created bg-success space-padding-top-10">
                            <span><?php the_time( 'M d, Y' ); ?></span>
                        </div>
                       
				   		<div class="hentry-box">
				   			<?php get_template_part( 'templates/post/_timeline' ) ?>
				   		</div></div>
				   </li>
				<?php  } ?>
        <?php wp_reset_postdata(); ?>
				</ul>
             <?php  } ?>
    </div>
</section>
