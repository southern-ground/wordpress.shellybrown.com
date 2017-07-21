<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * Override this template by copying it to yourtheme/woocommerce/content-single-product.php
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.6.1
 */

 global $product; ?>

<?php
	$class=$attrs='';
	if(isset($animate) && $animate){
		$class= 'wow fadeInUp';
		//$attrs = 'data-wow-duration="0.6s" data-wow-delay="'.$delay.'ms"';
	}
?>

<div class="media product-list product-block widget-product <?php echo esc_attr($class); ?> <?php echo (isset($item_order) && ($item_order%2)) ?'first':'last'; ?>" <?php echo trim($attrs); ?>>
	<?php if((isset($item_order) && $item_order==1) || !isset($item_order)) : ?>
		<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>" title="<?php echo esc_attr( $product->get_title() ); ?>" class="image pull-left">
			<?php echo  trim($product->get_image()); ?>
			<?php if(isset($item_order) && $item_order==1) { ?> 
				<span class="first-order"><?php echo esc_html($item_order); ?></span>
			<?php } ?>
		</a>
	<?php endif; ?>
	<?php if(isset($item_order) && $item_order > 1){ ?>
		<div class="order"><span><?php echo esc_html($item_order); ?></span></div>
	<?php }?>
	<div class="media-body">

		<h3 class="name">
			<a href="<?php echo esc_url( get_permalink( $product->id ) ); ?>"><?php echo esc_html(get_the_title()); ?></a>
		</h3>
		<?php echo trim( $product->get_categories( ' ', '<h5 class="category">', '</h5>' ) ); ?>
		

		<div class="price"><?php echo newfashion_wpo_price($product->get_price_html()); ?></div>
	</div>
</div>


