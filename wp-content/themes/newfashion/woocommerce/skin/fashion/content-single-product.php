<section class="col-md-12">
		<div itemscope itemtype="<?php echo woocommerce_get_product_schema(); ?>" id="product-<?php the_ID(); ?>" <?php post_class(); ?>>
			<div id="single-product" class="product-info">
				<div class="row">
					<div class="col-lg-6 col-md-6 col-sm-6">
						<?php
							/**
							* woocommerce_before_single_product_summary hook
							*
							* @hooked woocommerce_show_product_sale_flash - 10
							* @hooked woocommerce_show_product_images - 20
							*/
							do_action( 'woocommerce_before_single_product_summary' );
						?>
					</div>
					<div class="col-lg-6 col-md-6 col-sm-6">
						<div class="summary entry-summary">
							<?php
								/** 
								* woocommerce_single_product_summary hook
								*
								* @hooked woocommerce_template_single_title - 5
								* @hooked woocommerce_template_single_rating - 10
								* @hooked woocommerce_template_single_price - 10
								* @hooked woocommerce_template_single_excerpt - 20
								* @hooked woocommerce_template_single_add_to_cart - 30
								* @hooked woocommerce_template_single_meta - 40
								* @hooked woocommerce_template_single_sharing - 50
								*/
			
								do_action( 'woocommerce_single_product_summary' );
							?>
							<?php if( newfashion_wpo_theme_options('show-share-post', true) ){ ?>
                                    <h4 class="pull-left"><?php echo __( 'Share this Post!','newfashion' ); ?></h4>
                                    <div class="post-share pull-right"><?php newfashion_wpo_share_box(); ?></div>
                                <?php } ?>
						</div><!-- .summary -->
					</div>
				</div>
			</div>
			
	<?php
		/**
		 * woocommerce_after_single_product_summary hook
		 *
		 * @hooked woocommerce_output_product_data_tabs - 10
		 * @hooked woocommerce_upsell_display - 15
		 * @hooked woocommerce_output_related_products - 20
		 */
		
		remove_action('woocommerce_after_single_product_summary', 'woocommerce_output_related_products', 20);
		remove_action('woocommerce_after_single_product_summary', 'woocommerce_upsell_display', 15);
		do_action( 'woocommerce_after_single_product_summary' );
	?>

	<meta itemprop="url" content="<?php the_permalink(); ?>" />

</div><!-- #product-<?php the_ID(); ?> -->

<?php do_action( 'woocommerce_after_single_product' ); ?>

</section>

<!-- <aside class="wpo-sidebar col-md-3">
	<?php
	/**
	* woocommerce_sidebar hook
	*
	* @hooked woocommerce_get_sidebar - 10
	*/
    //do_action( 'woocommerce_sidebar' );
    ?>
</aside> -->
