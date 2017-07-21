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
             	<div class="posts-list post-area">
				<?php $i = 0;
				    while($loop->have_posts()){
				    $loop->the_post();
				?>
				    <article <?php post_class('entry-list') ?>>
			   			<div class="left">
                            <a href="<?php the_permalink() ?>">
                                <?php the_post_thumbnail('thumbnails-medium'); ?>
                            </a>                  
                        </div>
                        <div class="right">
                            <a class="entry-title" href="<?php the_permalink() ?>"><?php the_title() ?></a>
                            <p class="entry-date"><?php the_time( 'M d, Y' ); ?></p>
                        </div>
				    </article>
				<?php  } ?>
                <?php wp_reset_postdata(); ?>
				</div>
            <?php  } ?>
    </div>
</section>
