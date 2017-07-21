<?php
/**
 * Product Search Widget
 *
 * @author 		WooThemes
 * @category 	Widgets
 * @package 	WooCommerce/Widgets
 * @version 	2.1.0
 * @extends 	WC_Widget
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Newfashion_Widget_Product_Search extends WC_Widget_Product_Search {

	/**
	 * widget function.
	 *
	 * @see WP_Widget
	 * @access public
	 * @param array $args
	 * @param array $instance
	 * @return void
	 */
	function widget( $args, $instance ) {
		extract( $args );

		$title = $instance['title'];
		$title = apply_filters('widget_title', $title, $instance, $this->id_base);

		echo trim( $before_widget );

		if ( $title )
			echo trim( $before_title ) . $title . $after_title;

		$form = '<form role="search" method="get" id="searchform" action="' . esc_url( home_url( '/'  ) ) . '">
			<div class="form-group">
				<label class="control-label screen-reader-text" for="s">' . __( 'Search for:', 'woocommerce' ) . '</label>
				<div class="wpo-search input-group">
					<input id="s" type="text" value="' . get_search_query() . '" name="s" placeholder="' . __( 'Search for products', 'woocommerce' ) . '" class="form-control input-large input-search" />
					<span class="input-group-addon input-large btn-search">
						<input type="submit" id="searchsubmit" class="fa" value="&#xf002;" />
						<input type="hidden" name="post_type" value="product" />
					</span>
				</div>
			</div>
		</form>';
		echo trim( $form );

		echo trim( $after_widget );
	}
}

register_widget( 'Newfashion_Widget_Product_Search' );