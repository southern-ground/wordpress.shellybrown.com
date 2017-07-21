<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */

if(NEWFASHION_WPO_WOOCOMMERCE_ACTIVED){
    add_theme_support( 'woocommerce');
    /////
    // Wishlist
    add_filter( 'yith_wcwl_button_label',		   'newfashion_woocomerce_icon_wishlist'  );
    add_filter( 'yith-wcwl-browse-wishlist-label', 'newfashion_woocomerce_icon_wishlist_add' );


    add_filter('add_to_cart_fragments',				'newfashion_woocommerce_header_add_to_cart_fragment' );
    add_filter( 'woocommerce_breadcrumb_defaults',  'newfashion_woocommerce_breadcrumbs' );

    // Out of stock
    add_filter('woocommerce_sale_flash', 'newfashion_woocommerce_sale_flashmessage', 10, 2);


    /////
    //remove_action( 'woocommerce_before_main_content', 'woocommerce_breadcrumb', 20, 0);					// breadcrumbs
    remove_action( 'woocommerce_sidebar', 			  'woocommerce_get_sidebar', 10);								// sidebar

    remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);		// content wrapper begin
    remove_action( 'woocommerce_after_main_content',  'woocommerce_output_content_wrapper_end', 10);		// content wrapper end

    add_action( 'woocommerce_before_main_content',    'newfashion_woocommerce_output_content_wrapper', 10);		// content wrapper begin
    add_action( 'woocommerce_after_main_content', 	  'newfashion_woocommerce_output_content_wrapper_end', 10);	// content wrapper end

    //remove link open and close before button add to cart
    remove_action( 'woocommerce_before_shop_loop_item', 'woocommerce_template_loop_product_link_open', 10 );
    remove_action( 'woocommerce_after_shop_loop_item', 'woocommerce_template_loop_product_link_close', 5 );

    /// Remove Style Woocommerce
    add_filter( 'woocommerce_enqueue_styles', '__return_false' );

    function newfashion_woocommerce_output_content_wrapper(){ ?>
        <!-- #Content -->
        <section id="wpo-mainbody" class="wpo-mainbody clearfix woocommerce-page">

    <?php }


    function newfashion_woocommerce_output_content_wrapper_end(){
    ?>
        </section>
        <?php
    }
    /* ---------------------------------------------------------------------------
     * WooCommerce - Styles
     * --------------------------------------------------------------------------- */
    function newfashion_wpo_woo_styles() {
        $current = newfashion_wpo_theme_options('skin','default');
        if($current == 'default'){
            $path = NEWFASHION_WPO_THEME_URI .'/css/woocommerce.css';
        }else{
            $path = NEWFASHION_WPO_THEME_URI .'/css/skins/'.$current.'/woocommerce.css';
        }
    	wp_enqueue_style( 'newfashion-wpo-woocommerce', $path , 'woocommerce_frontend_styles-css' , NEWFASHION_WPO_THEME_VERSION, 'all' );
        
    }
    add_action( 'wp_enqueue_scripts', 'newfashion_wpo_woo_styles', 5 );



    function newfashion_woocomerce_icon_wishlist( $value='' ){
    	return '<i class="fa fa-heart-o"></i><span>'.__('Wishlist','newfashion').'</span>';
    }

    function newfashion_woocomerce_icon_wishlist_add(){
    	return '<i class="fa fa-heart-o"></i><span>'.__('Wishlist','newfashion').'</span>';
    }


    /*Customise the WooCommerce breadcrumb*/
    function newfashion_woocommerce_breadcrumbs($array) {

        $customize_image = get_header_image();
        if( isset( $customize_image) && !empty( $customize_image)){
            $style = "background: url('".esc_url_raw( $customize_image )."') no-repeat center center #f9f9f9";
        }else{
            $style= "background: url('".get_template_directory_uri()."/images/bg-cart.jpg') no-repeat center center #f9f9f9";
        }

    	return array(
            'delimiter'   => '',
            'wrap_before' => '<section id="breadcrumb" class="wpo-breadcrumbs" style="'.$style.'"><div class="wpo-breadcrumbs-inner breadcrumbs"><nav class="container" itemprop="breadcrumb">',
            'wrap_after'  => '</nav></div></section>',
            'before'      => '',
            'after'       => '',
            'home'        => _x( 'Home', 'breadcrumb', 'newfashion' )
    	);
    }

    /**
    *
    */
    function newfashion_woocommerce_header_add_to_cart_fragment( $fragments ) {
    	global $woocommerce;
        ob_start();
        echo  get_template_part( 'woocommerce/cart/mini-cart-count' );
        $fragments['#xcart'] = ob_get_clean();
        return $fragments;
    }

    /*
    * Re-markup html for cart content with bootstrap dropdown
    */

    if(!function_exists('newfashion_wpo_cartdropdown')){
        function newfashion_wpo_cartdropdown( $style='' ){ 
            $template =  apply_filters( 'newfashion_wpo_minibasket_template', 'mini-cart-button'  );
            return get_template_part( 'woocommerce/cart/'.$template ); 
        }
    }


    /*
     *  Display list of navigations info with list of listin + total, info for woocommerce
     */
    function newfashion_woocommerce_pagination( $per_page,$total ){
        ?>
        <div class="clearfix">
            <?php newfashion_wpo_pagination($prev = __('Previous','newfashion'), $next = __('Next','newfashion'), $pages='',array('class'=>'pull-left pagination-sm')); ?>
            <?php global  $wp_query; ?>
            <div class="result-count pull-right">
                <?php
                $paged    = max( 1, $wp_query->get( 'paged' ) );
                $first    = ( $per_page * $paged ) - $per_page + 1;
                $last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

                if ( 1 == $total ) {
                    _e( 'Showing the single result', 'newfashion' );
                } elseif ( $total <= $per_page || -1 == $per_page ) {
                    printf( __( 'Showing all %d results', 'newfashion' ), $total );
                } else {
                    printf( _x( 'Showing %1$d &ndash; %2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'newfashion' ), $first, $last, $total );
                }
                ?>
            </div>
        </div>
    <?php
    }

    /*
     *  Display list of navigations info with list of listin + total, info for woocommerce
     */
    function newfashion_woocommerce_custom_usermenutop() { ?>
        <ul class="setting-menu">
            <li>
                <a href="<?php echo esc_url( get_permalink(get_option('woocommerce_myaccount_page_id')) ); ?>">
                    <?php _e('My Account','newfashion'); ?>
                </a>
            </li>

            <li>
                <a href="<?php echo esc_url( get_permalink(get_option('woocommerce_checkout_page_id')) ); ?>">
                    <?php _e('Checkout','newfashion'); ?>
                </a>
            </li>

            <li>
                <a href="<?php echo esc_url( get_permalink(get_option('woocommerce_cart_page_id')) ); ?>">
                    <?php _e('Cart','newfashion'); ?>
                </a>
            </li>
        </ul>
    <?php }

    /* ---------------------------------------------------------------------------
     * WooCommerce - Define image sizes
     * --------------------------------------------------------------------------- */
    global $pagenow;
    if ( is_admin() && isset( $_GET['activated'] ) && $pagenow == 'themes.php' ) add_action( 'init', 'newfashion_woocommerce_image_dimensions', 1 );

    function newfashion_woocommerce_image_dimensions() {
    	$catalog = array(
    		'width' 	=> '500',	// px
    		'height'	=> '645',	// px
    		'crop'		=> 1 		// true
    	);

    	$single = array(
    		'width' 	=> '680',	// px
    		'height'	=> '878',	// px
    		'crop'		=> 1 		// true
    	);

    	$thumbnail = array(
    		'width' 	=> '200',	// px
    		'height'	=> '258',	// px
    		'crop'		=> 1 		// true
    	);

    	// Image sizes
    	update_option( 'shop_catalog_image_size', $catalog );		// Product category thumbs
    	update_option( 'shop_single_image_size', $single ); 		// Single product image
    	update_option( 'shop_thumbnail_image_size', $thumbnail ); 	// Image gallery thumbs
    }

    /* ---------------------------------------------------------------------------
     * WooCommerce - Function get Query
     * --------------------------------------------------------------------------- */
    function newfashion_woocommerce_query($type,$post_per_page=-1,$cat=''){
        global $woocommerce;
        $args = array(
            'post_type' => 'product',
            'posts_per_page' => $post_per_page,
            'post_status' => 'publish'
        );
        switch ($type) {
            case 'best_selling':
                $args['meta_key']='total_sales';
                $args['orderby']='meta_value_num';
                $args['ignore_sticky_posts']   = 1;
                $args['meta_query'] = array();
                $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
                $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
                break;
            case 'featured_product':
                $args['ignore_sticky_posts']=1;
                $args['meta_query'] = array();
                $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
                $args['meta_query'][] = array(
                             'key' => '_featured',
                             'value' => 'yes'
                         );
                $query_args['meta_query'][] = $woocommerce->query->visibility_meta_query();
                break;
            case 'top_rate':
                add_filter( 'posts_clauses',  array( $woocommerce->query, 'order_by_rating_post_clauses' ) );
                $args['meta_query'] = array();
                $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
                $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
                break;
            case 'recent_product':
                $args['meta_query'] = array();
                $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
                break;
            case 'on_sale':
                $args['meta_query'] = array();
                $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
                $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
                $args['post__in'] = wc_get_product_ids_on_sale();
                break;
            case 'recent_review':
                if($post_per_page == -1) $_limit = 4;
                else $_limit = $post_per_page;
                global $wpdb;
                $query = "SELECT c.comment_post_ID FROM {$wpdb->prefix}posts p, {$wpdb->prefix}comments c WHERE p.ID = c.comment_post_ID AND c.comment_approved > 0 AND p.post_type = 'product' AND p.post_status = 'publish' AND p.comment_count > 0 ORDER BY c.comment_date ASC";
                $results = $wpdb->get_results($query, OBJECT);
                $_pids = array();
                foreach ($results as $re) {
                    if(!in_array($re->comment_post_ID, $_pids))
                        $_pids[] = $re->comment_post_ID;
                    if(count($_pids) == $_limit)
                        break;
                }

                $args['meta_query'] = array();
                $args['meta_query'][] = $woocommerce->query->stock_status_meta_query();
                $args['meta_query'][] = $woocommerce->query->visibility_meta_query();
                $args['post__in'] = $_pids;

                break;
        }

        if($cat!=''){
            $args['product_cat']= $cat;
        }
        return new WP_Query($args);
    }

    /* Out of stock label*/
    if ( !function_exists('newfashion_woocommerce_sale_flashmessage') ) {
        function newfashion_woocommerce_sale_flashmessage($flash){
            global $product;
            $availability = $product->get_availability();

            if ($availability['availability'] == 'Out of stock') :
                $flash = '<span class="out-of-stock-badge onsale">'.__( 'Out of stock', 'newfashion' ).'</span>';
            endif;
            return $flash;
        }
    }

    function newfashion_wpo_print_title(){
        echo ' <h3 class="name"><a href="'; the_permalink(); echo '">'; the_title(); echo'</a></h3>';
    }
	
	function newfashion_wpo_print_category(){
		global $product;
        echo trim( $product->get_categories( ' ', '<h5 class="category">', '</h5>' ) );
    }


   
	

    if ( ! function_exists( 'newfashion_woocommerce_output_product_data_accordions' ) ) {

        /**
         * Output the product tabs.
         *
         * @subpackage  Product/Tabs
         */
        function newfashion_woocommerce_output_product_data_accordions() {
            wc_get_template( 'single-product/tabs/accordions.php' );
        }
    }
}