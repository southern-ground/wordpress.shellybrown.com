<?php

$_total = $loop->post_count;
$_count = 1;
$_id = newshopping_makeid();
?>
<div id="carousel-<?php echo esc_attr($_id); ?>" class="text-center owl-carousel-play" data-ride="owlcarousel">         
    
       
         <div class="owl-carousel row-products" data-slide="<?php echo esc_attr($columns_count); ?>" data-pagination="false" data-navigation="true">
            <?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>
                    <div class="product-wrapper">
                        <?php wc_get_template_part( 'content', 'product-inner' ); ?>
                    </div>
            <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>
        </div>
 
</div>