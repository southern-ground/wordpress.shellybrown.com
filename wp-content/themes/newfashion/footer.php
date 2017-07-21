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
global $newfashion_footer_builder, $newfashion_config;
$footer = newfashion_wpo_theme_options('footer-style','default');
if('page' == get_post_type()){
	if($newfashion_config['footer_skin'] && $newfashion_config['footer_skin']!='global'){
		$footer = $newfashion_config['footer_skin'];
	}
}

?>
	<?php if(is_active_sidebar('social')) dynamic_sidebar('social'); ?>

	<?php if( $footer !='default' ){
        ?>
        	<footer id="wpo-footer" class="wpo-footer clearfix">
        		<div class="<?php if( isset($newfashion_config['layout']) && $newfashion_config['layout']=='fullwidth') { ?>fuild<?php } ?>">
	            <?php 
	           	 	newfashion_wpo_render_post_content( $footer );
	            ?>
				</div>
          	</footer>
	<?php }else{ ?>

	<footer id="wpo-footer" class="wpo-footer clearfix">
		<div class="container">
			<section class="container-inner">
				<div class="row">
					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<?php if ( is_active_sidebar( 'footer-1' ) ) : ?>
						<div class="inner wow fadeInUp">
							<?php dynamic_sidebar('footer-1'); ?>
						</div>
						<?php endif; ?>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<?php if ( is_active_sidebar( 'footer-2' ) ) : ?>
						<div class="inner wow fadeInUp">
							<?php dynamic_sidebar('footer-2'); ?>
						</div>
						<?php endif; ?>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<?php if ( is_active_sidebar( 'footer-3' ) ) : ?>
						<div class="inner wow fadeInUp">
							<?php dynamic_sidebar('footer-3'); ?>
						</div>
						<?php endif; ?>
					</div>

					<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
						<?php if ( is_active_sidebar( 'footer-4' ) ) : ?>
						<div class="inner wow fadeInUp">
							<?php dynamic_sidebar('footer-4'); ?>
						</div>
						<?php endif; ?>
					</div>
				</div>
			</section>
		</div>
	</footer>
	
	
	<div class="wpo-copyright" id="copyright>
		<div class="container">
			<div class="copyright">
				<address>
                    &copy;<?= date('Y') ?> Shelly Brown
				</address>
			</div>

			<div class="footer-links">
				<a href="https://store.shellybrown.com/jewelrycare.html">Jewelry Care</a>
				<a href="https://store.shellybrown.com/shipping.html">Shipping</a>
				<a href="https://store.shellybrown.com/returns.html">Return&nbsp;Policy</a>
				<a href="http://www.shellybrown.com/media">Media</a>
				<a href="https://store.shellybrown.com/video.html">Video</a>
				<a href="https://store.shellybrown.com/about.html">About Us</a>
				<a href="https://store.shellybrown.com/stocklist.html">Stocklist</a>
				<a href="http://lookbook.shellybrown.com/?y=2016&s=spring" target="_blank">Look Book</a>
				<a href="http://www.shellybrown.com/contact-form/">Contact</a>
			</div>

		</div>
	</div>

	<?php } ?>	

</section>
<!-- END Wrapper -->

</section>
</div>
</div>
<?php wp_footer(); ?>
</body>
</html>