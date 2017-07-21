<?php
/**
 * Loop Price
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $product;
?>

<?php if ( $price_html = $product->get_price_html() ) {
	$newfashionEngine_price = preg_split("/<ins>/", $price_html);
?>
<?php if(count($newfashionEngine_price) > 1) { ?>
	<div class="price old-price">
		<?php if(isset($newfashionEngine_price[1])) echo ('<ins>' . $newfashionEngine_price[1]); ?>
		<?php if(isset($newfashionEngine_price[0])) echo ($newfashionEngine_price[0]); ?>
	</div>
	<?php }else{ ?>
	<div class="price"><?php echo trim($price_html); ?></div>
	<?php } ?>

<?php }else{ 
	echo '<div class="price empty"><span class="amount"></span></div>';
}?>

