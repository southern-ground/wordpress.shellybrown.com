<?php
/**
 * Related Products
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     1.6.4
 */
 

if( !(newfashion_wpo_theme_options('wc_show_related', false)) ){
	if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

		global $product, $woocommerce_loop;
		$posts_per_page = newfashion_wpo_theme_options('woo-number-product-single',6);

		if ( empty( $product ) || ! $product->exists() ) {
			return;
		}

		$related = $product->get_related( $posts_per_page );
		if ( sizeof( $related ) == 0 ) return;
		
		$args = apply_filters( 'woocommerce_related_products_args', array(
			'post_type'            => 'product',
			'ignore_sticky_posts'  => 1,
			'no_found_rows'        => 1,
			'posts_per_page'       => $posts_per_page,
			'orderby'              => $orderby,
			'post__in'             => $related,
			'post__not_in'         => array( $product->id )
		) );
		$_id = newshopping_makeid();
		$_count =1;
		$products = new WP_Query( $args );

		$columns_count = newfashion_wpo_theme_options('product-number-columns',3);
		$class_column = 'col-md-' . floor( 12/$columns_count );

		if ( $products->have_posts() ) : ?>

			<div class="widget widget-related-products widget-products products product-single heading-v1">
				
				<h3 class="widget-title visual-title a-center">
			        <span><?php _e( 'Related Products', 'woocommerce' ); ?></span>
				</h3>
				<div class="woocommerce">
					<div class="widget-content a-center <?php echo isset($style) ? esc_attr( $style ): ''; ?>">
						<?php wc_get_template( 'widget-products/default.php' , array( 'loop'=>$products,'columns_count'=>$columns_count,'class_column'=>$class_column,'posts_per_page'=>$posts_per_page ) ); ?>
					</div>
				</div>
			</div>

		<?php wp_reset_postdata();
		endif;
	}
