<?php
/**
 * Product quantity inputs
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/global/quantity-input.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you (the theme developer).
 * will need to copy the new files to your theme to maintain compatibility. We try to do this.
 * as little as possible, but it does happen. When this occurs the version of the template file will.
 * be bumped and the readme will list any important changes.
 *
 * @see 	    http://docs.woothemes.com/document/template-structure/
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

$find = array("]","[");
$name = esc_attr( $input_name );
$class = esc_attr(str_replace($find,'',$input_name));
?>

<div class="qty quantity-adder quantity <?php echo esc_attr($class); ?>">
		
			<label for="qty">Qty</label>
			<div class="quantity-number">
				
				<input type="text" name="<?php echo esc_attr( $name );?>" maxlength="12" value="<?php echo esc_attr( $input_value ); ?>" alt="<?php echo esc_attr($class); ?>" title="<?php _ex( 'Qty', 'Product quantity input tooltip', 'woocommerce' ) ?>" class="input-text qty" />
			</div>

			<div class="quantity-wrapper">
				<span class="add-up add-action">+</span> 	
				<span class="add-down add-action">-</span> 
			</div>
		
</div>


<script type="text/javascript" charset="utf-8">	
	jQuery(function($){
		$(document).ready(function() {
			$(".quantity-adder.<?php echo esc_attr($class); ?> .add-action").click( function(){
				if( $(this).hasClass('add-up') ) {  
					$("[alt=<?php echo esc_attr($class); ?>]",'.quantity-adder').val( parseInt($("[alt=<?php echo esc_attr($class); ?>]",'.quantity-adder').val()) + 1 );
			
				}else {
					if( parseInt($("[alt=<?php echo esc_attr($class); ?>]",'.quantity-adder').val())  > 1 ) {
						$("[alt=<?php echo esc_attr($class); ?>]",'.quantity-adder').val( parseInt($("[alt=<?php echo esc_attr($class); ?>]",'.quantity-adder').val()) - 1 );
					} 
				}
			});			
		});
	});
	
</script>

