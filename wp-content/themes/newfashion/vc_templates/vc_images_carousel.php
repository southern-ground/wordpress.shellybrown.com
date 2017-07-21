<?php
/**
 * @var $this WPBakeryShortCode_VC_images_carousel
 */
$output = $title = $onclick = $custom_links = $img_size = $custom_links_target = $images = $el_class = $partial_view = '';
$mode = $slides_per_view = $wrap = $autoplay = $hide_pagination_control = $hide_prev_next_buttons = $speed = '';
$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );
$gal_images = '';
$link_start = '';
$link_end = '';
$el_start = '';
$el_end = '';
$slides_wrap_start = '';
$slides_wrap_end = '';
$pretty_rand = $onclick == 'link_image' ? ' rel="prettyPhoto[rel-' . get_the_ID() . '-' . rand() . ']"' : '';

wp_enqueue_script( 'vc_carousel_js' );
wp_enqueue_style( 'vc_carousel_css' );
if ( $onclick == 'link_image' ) {
	wp_enqueue_script( 'prettyphoto' );
	wp_enqueue_style( 'prettyphoto' );
}

$el_class = $this->getExtraClass( $el_class );

if ( $images == '' ) {
	$images = '-1,-2,-3';
}

if ( $onclick == 'custom_link' ) {
	$custom_links = explode( ',', $custom_links );
}

$images = explode( ',', $images );
$i = - 1;
$css_class = apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, 'wpb_images_carousel wpb_content_element' . $el_class . ' vc_clearfix', $this->settings['base'], $atts );
$carousel_id = 'vc_images-carousel-' . WPBakeryShortCode_VC_images_carousel::getCarouselIndex();
$slider_width = $this->getSliderWidth( $img_size );
?>
<div class="<?php echo apply_filters( VC_SHORTCODE_CUSTOM_CSS_FILTER_TAG, $css_class, $this->settings['base'], $atts ) ?>">
	<div class="wpb_wrapper">
<?php echo wpb_widget_title( array( 'title' => $title, 'extraclass' => 'wpb_gallery_heading' ) ) ?>
 
		<div id="carousel-<?php echo esc_attr($carousel_id); ?>" class="widget-content text-center owl-carousel-play" data-ride="owlcarousel">
			<div class="owl-carousel " data-slide="<?php echo esc_attr($slides_per_view); ?>" data-pagination="false" data-navigation="true">
					<?php foreach ( $images as $attach_id ): ?>
						<?php
						$i ++;
						if ( $attach_id > 0 ) {
							$post_thumbnail = wpb_getImageBySize( array(
								'attach_id' => $attach_id,
								'thumb_size' => $img_size
							) );
						} else {
							$post_thumbnail = array();
							$post_thumbnail['thumbnail'] = '<img src="' . vc_asset_url( 'vc/no_image.png' ) . '" />';
							$post_thumbnail['p_img_large'][0] = vc_asset_url( 'vc/no_image.png' );
						}
						$thumbnail = $post_thumbnail['thumbnail'];
						?>
						
						<?php if ( $onclick == 'link_image' ): ?>
							<?php $p_img_large = $post_thumbnail['p_img_large']; ?>
							<a class="prettyphoto"
							   href="<?php echo esc_url_raw($p_img_large[0]); ?>" <?php echo trim($pretty_rand); ?>>
								<?php echo trim($thumbnail); ?>
							</a>
						<?php elseif ( $onclick == 'custom_link' && isset( $custom_links[ $i ] ) && $custom_links[ $i ] != '' ): ?>
							<a
								href="<?php echo esc_url_raw( $custom_links[ $i ] ); ?>"<?php echo( ! empty( $custom_links_target ) ? ' target="' . $custom_links_target . '"' : '' ) ?>>
								<?php echo trim($thumbnail); ?>
							</a>
						<?php else: ?>
							<?php echo trim($thumbnail); ?>
						<?php endif; ?>
				
					<?php endforeach; ?>
			</div>				
						
				 	 <?php if(count($images)>$slides_per_view){ ?>
			            <div class="carousel-controls carousel-controls-v4">
			                <a class="left carousel-control" href="#post-slide-<?php the_ID(); ?>" data-slide="prev">
			                        <i class="fa fa-angle-left"></i>
			                </a>
			                <a class="right carousel-control" href="#post-slide-<?php the_ID(); ?>" data-slide="next">
			                        <i class="fa fa-angle-right"></i>
			                </a>
			            </div>    
			        <?php } ?>
        
			        
	</div>
	</div><?php echo trim( $this->endBlockComment( '.wpb_wrapper' ) ); ?>
	</div><?php echo trim( $this->endBlockComment( '.wpb_images_carousel' ) ); ?>
 