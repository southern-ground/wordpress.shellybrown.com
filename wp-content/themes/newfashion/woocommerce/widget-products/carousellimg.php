<?php

$_total = $loop->post_count;
$_count = 1;
$_id = newshopping_makeid();
?>

<div class="widget-products-carousel" >
   
		<div id="productcarouse-<?php echo esc_attr($_id); ?>" class="owl-carousel">
			<?php while ( $loop->have_posts() ) : $loop->the_post(); global $product; ?>				 
				
				<!-- Product Item -->
				<div class="product-wrapper">
					<?php wc_get_template_part( 'content', 'product-inner' ); ?>
				</div>
				<!-- End Product Item -->
				
				<?php $_count++; ?>
			<?php endwhile; ?>
			<?php wp_reset_postdata(); ?>
		</div>
    </div>
</div>

<script type="text/javascript">
    jQuery(function($){
		$(document).ready(function() {
		 
			$("#productcarouse-<?php echo esc_attr($_id); ?>").owlCarousel({
 
				// Most important owl features
				items : 4,
				itemsCustom : false,
				itemsDesktop : [1199,4],
				itemsDesktopSmall : [980,3],
				itemsTablet: [768,2],
				itemsTabletSmall: false,
				itemsMobile : [479,1],
				singleItem : false,
				itemsScaleUp : false,
			 
				//Basic Speeds
				slideSpeed : 200,
				paginationSpeed : 800,
				rewindSpeed : 1000,
			 
				//Autoplay
				autoPlay : false,
				stopOnHover : false,
			 
				// Navigation
				navigation : false,
				navigationText : ["prev","next"],
				rewindNav : true,
				scrollPerPage : false,
			 
				//Pagination
				pagination : false, 
				paginationNumbers: false,
			 
				// Responsive 
				responsive: true,
				responsiveRefreshRate : 200,
				responsiveBaseWidth: window		
			 
			});
		 
		});
	});
</script>

