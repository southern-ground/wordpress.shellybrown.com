<?php
/**
 * Single Product Up-Sells
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
if( !(newfashion_wpo_theme_options('wc_show_upsells', false)) ){
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

	global $product, $woocommerce_loop;

	$upsells = $product->get_upsells();
	$posts_per_page = newfashion_wpo_theme_options('woo-number-product-single',6);
	if ( sizeof( $upsells ) == 0 ) return;

	$meta_query = WC()->query->get_meta_query();

	$args = array(
		'post_type'           => 'product',
		'ignore_sticky_posts' => 1,
		'no_found_rows'       => 1,
		'posts_per_page'      => $posts_per_page,
		'orderby'             => $orderby,
		'post__in'            => $upsells,
		'post__not_in'        => array( $product->id ),
		'meta_query'          => $meta_query
	);
	$_count =1;
	$products = new WP_Query( $args );

	$columns_count = newfashion_wpo_theme_options('product-number-columns',3);
	$class_column = 'col-sm-' . floor( 12/$columns_count );
	$woocommerce_loop['columns'] = $columns;

	if ( $products->have_posts() ) : ?>

		<div class="widget widget-products upsells products product-single heading-v1">
			<h3 class="widget-title visual-title a-center">
		        <span><?php _e( 'You may also like&hellip;', 'woocommerce' ) ?></span>
			</h3>
			<div class="woocommerce">
				<div class="widget-content a-center <?php echo isset($style)? esc_attr($style): ''; ?>">
					<?php wc_get_template( 'widget-products/default.php' , array( 'loop'=>$products,'columns_count'=>$columns_count,'class_column'=>$class_column,'posts_per_page'=>$posts_per_page ) ); ?>
				</div>
			</div>
		</div>

	<?php wp_reset_postdata();
	endif;
}