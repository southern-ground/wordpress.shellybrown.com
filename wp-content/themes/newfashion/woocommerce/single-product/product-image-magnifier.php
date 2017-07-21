<?php
/**
 * Single Product Image
 *
 * @author 		YIThemes
 * @package 	YITH_Magnifier/Templates
 * @version     1.1.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


$skin = 'fashion';

$enable_slider = get_option('yith_wcmg_enableslider') == 'yes' ? true : false;

wc_get_template_part( 'skin/'.$skin.'/product', 'image-magnifier' );
?>
   
<script type="text/javascript" charset="utf-8">
	enableSlider: <?php echo ($enable_slider ? 'true' : 'false'); ?>, 
	<?php if( $enable_slider ): ?>
	jQuery(function($){
		$(document).ready(function() {
		 
			$("#carousel-thumbnails").owlCarousel({
 
				// Most important owl features
			
				
				items : 4,
				itemsCustom : false,
				itemsDesktop : [1199,4],
				itemsDesktopSmall : [980,3],
				itemsTablet: [768,3],
				itemsTabletSmall: false,
				itemsMobile : [479,3],
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
	<?php endif ?>
    var yith_magnifier_options = {    
       
        showTitle: false,
        zoomWidth: '<?php echo get_option('yith_wcmg_zoom_width') ?>',
        zoomHeight: '<?php echo get_option('yith_wcmg_zoom_height') ?>',
        position: '<?php echo get_option('yith_wcmg_zoom_position') ?>',
        //tint: <?php //echo get_option('yith_wcmg_tint') == '' ? 'false' : "'".get_option('yith_wcmg_tint')."'" ?>,
        //tintOpacity: <?php //echo get_option('yith_wcmg_tint_opacity') ?>,
        lensOpacity: <?php echo get_option('yith_wcmg_lens_opacity') ?>,
        softFocus: <?php echo get_option('yith_wcmg_softfocus') == 'yes' ? 'true' : 'false' ?>,
        //smoothMove: <?php //echo get_option('yith_wcmg_smooth') ?>,
        adjustY: 0,
        disableRightClick: false,
        phoneBehavior: '<?php echo get_option('yith_wcmg_zoom_mobile_position') ?>',
        loadingLabel: '<?php echo stripslashes(get_option('yith_wcmg_loading_label')) ?>'
    };
</script>
