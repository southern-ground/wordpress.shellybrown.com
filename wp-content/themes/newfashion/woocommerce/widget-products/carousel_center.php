<?php

$_total = $loop->post_count;
$_columns_count = $loop->columns_count;
$_count = 1;
$_id = newshopping_makeid();

?>

<div class="widget-products-carousel" >   
	 	
    	
    	<div id="carousel-<?php echo esc_attr($_id); ?>" class="text-center owl-carousel-play" data-ride="owlcarousel">         
    
              <?php if( $_total>$columns_count){ ?>
            <div class="carousel-controls carousel-controls-v4">
                <a class="left carousel-control" href="#post-slide-<?php the_ID(); ?>" data-slide="prev">
                        <i class="fa fa-angle-left"></i>
                </a>
                <a class="right carousel-control" href="#post-slide-<?php the_ID(); ?>" data-slide="next">
                        <i class="fa fa-angle-right"></i>
                </a>
            </div>    
        <?php } ?>
         <div class="owl-carousel row-products" data-slide="<?php echo esc_attr($columns_count); ?>" data-pagination="false" data-navigation="true">
            <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                    <div class="product-wrapper">
                        <?php wc_get_template_part( 'content', 'product-inner-center' ); ?>
                    </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
 
</div> 


</div>
 