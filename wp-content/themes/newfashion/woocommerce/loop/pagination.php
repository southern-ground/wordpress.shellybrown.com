<?php
/**
 * Pagination - Show numbered pagination for catalog pages.
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.2.2
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

global $wp_query;

if ( $wp_query->max_num_pages <= 1 ) {
	return;
}
?>
<nav class="woocommerce-pagination wpo-pagination paging pull-left">
	<?php
		echo str_replace( "current", "active", str_replace("<ul class='page-numbers'", '<ul class="pagination pagination-sm"', paginate_links( apply_filters( 'woocommerce_pagination_args', array(
			'base'         => ( str_replace( 999999999, '%#%', remove_query_arg( 'add-to-cart', htmlspecialchars_decode( get_pagenum_link( 999999999, false ) ) ) ) ),
			'format'       => '',
			'current'      => max( 1, get_query_var( 'paged' ) ),
			'total'        => $wp_query->max_num_pages,
			'prev_text'    => 'Prev',
			'next_text'    => 'Next',
			'type'         => 'list',
			'end_size'     => 3,
			'mid_size'     => 3
		) ) )));
	?>
</nav>