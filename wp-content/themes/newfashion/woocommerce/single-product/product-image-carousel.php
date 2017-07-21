<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */

global $post, $product, $woocommerce;

$attachment_ids = $product->get_gallery_attachment_ids();
$_images =array();
if(has_post_thumbnail()){
	$_images[] = get_the_post_thumbnail( $post->ID, apply_filters( 'single_product_large_thumbnail_size', 'shop_single' ));
}else{
	$_images[] = '<img src="'.wc_placeholder_img_src().'" alt="Placeholder" />';
}
foreach ($attachment_ids as $attachment_id) {
	$_images[]       = wp_get_attachment_image( $attachment_id, 'shop_single' );
}
?>
<div id="quickview-carousel" class="owl-carousel">
	<?php foreach ($_images as $key => $image) { ?>
	<div class="item<?php echo (($key==0)?' active':'') ?>">
		<?php echo trim( $image ); ?>
	</div>
	<?php } ?>
</div>

<script type="text/javascript" charset="utf-8">
	jQuery(function($){
		$(document).ready(function() {
		 
			$("#quickview-carousel").owlCarousel({
 
				// Most important owl features			
				items : 1,
				itemsCustom : false,
				itemsDesktop : [1199,1],
				itemsDesktopSmall : [980,1],
				itemsTablet: [768,1],
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
				navigationText : ['<span class="fa fa-angle-left"> </span>','<span class="fa fa-angle-right"> </span>'],
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