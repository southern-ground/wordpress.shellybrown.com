<?php
/**
 * Single Product Image
 *
 * @author 		YIThemes
 * @package 	YITH_Magnifier/Templates
 * @version     1.1.2
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

global $post, $product, $woocommerce;

$enable_slider = get_option('yith_wcmg_enableslider') == 'yes' ? true : false;

$attachment_ids = $product->get_gallery_attachment_ids();
if ( ! empty( $attachment_ids ) ) array_unshift( $attachment_ids, get_post_thumbnail_id() );

if ( $attachment_ids ) {
    ?>
  
        <div id="carousel-thumbnails" class="yith_magnifier_gallery owl-carousel">
        <?php
      

        foreach ( $attachment_ids as $attachment_id ) {
            $classes = array( 'yith_magnifier_thumbnail' );

          
            $image       = wp_get_attachment_image( $attachment_id, apply_filters( 'single_product_small_thumbnail_size', 'shop_thumbnail' ) );
            $image_class = esc_attr( implode( ' ', $classes ) );
            $image_title = esc_attr( get_the_title( $attachment_id ) );
	
			

            list( $thumbnail_url, $thumbnail_width, $thumbnail_height ) = wp_get_attachment_image_src( $attachment_id, "shop_single" );
            list( $magnifier_url, $magnifier_width, $magnifier_height ) = wp_get_attachment_image_src( $attachment_id, "shop_magnifier" );

            echo apply_filters( 'woocommerce_single_product_image_thumbnail_html', sprintf( '<ol><li class="%s"><a href="%s" class="%s" title="%s" data-small="%s">%s</a></li></ol>', $image_class, $magnifier_url, $image_class, $image_title, $thumbnail_url, $image ), $attachment_id, $post->ID, $image_class );

          
        }
        ?>
        </div>


 
<?php
}
?>
