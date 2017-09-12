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
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
    <?php wp_head(); ?>
</head>
	

<body <?php body_class(); ?>>
	<div id="st-container" class="st-container">
		<div class="st-pusher">
			<div class="st-menu st-effect-1">			
				<?php if( NEWFASHION_WPO_WOOCOMMERCE_ACTIVED ) { ?>										
					<?php if( newfashion_wpo_theme_options('woo-show-minicart', true) ) : ?>
						<div class="cartwrapper">
							<?php get_template_part( 'woocommerce/cart/mini-cart-button-v3' ); ?>       
						</div>
					<?php endif; ?>										  
				<?php } ?>
			</div>
			
			<div class="st-menu st-effect-2">			
				<?php get_template_part('templates/mobile/offcanvas_menu');?>
			</div>
					
			<section class="wpo-page row-offcanvas row-offcanvas-left">
			<?php $meta_template = get_post_meta(get_the_ID(),'wpo_template',true); ?>

			<!-- START Wrapper -->
			<section class="wpo-wrapper <?php echo isset($meta_template['el_class']) ? esc_attr( $meta_template['el_class'] ) : '' ; ?>">

				<!-- HEADER -->
				<header id="wpo-header" class="wpo-header header-v8">     
				
					<div class="st-menu st-search st-effect-3">
						<div class="top-search d-table">
							<div class="d-table-cell">		
								<div class="container">			
									<?php get_search_form(); ?>									
								</div>
							</div>
						</div>
					</div>
					
					<div id="wpo-topbar" class="wpo-topbar v-dark2">	
						<div class="container">
							<div class="row">
								<div class="col-lg-7 col-md-6 col-sm-6 col-xs-12">
									<ul class="links pull-left nob-l">
										<?php if( !is_user_logged_in() ){ ?>
											<li><?php do_action('wpo-login-button'); ?></li>
											<li><a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>" title="<?php echo __('Register','woothemes'); ?>"><?php echo __('Register','woothemes'); ?></a></li>
										<?php }else{ ?>
											<?php $current_user = wp_get_current_user(); ?>
											<li><?php echo __('Welcome ','newfashion'); ?><?php echo trim($current_user->display_name); ?> !</li>
											<li><a href="<?php echo wp_logout_url(); ?>"><?php echo __('Log Out', 'newfashion'); ?></a></li>
										<?php } ?>
									</ul>										
								</div>
								
								<div class="col-lg-5 col-md-6 col-sm-6 col-xs-12">	
									<ul class="links links-v1 pull-right nob-l">
										<?php if( class_exists( 'YITH_WCWL' ) ) { ?>
										<?php
											$wishlist_url = YITH_WCWL()->get_wishlist_url();
										?>
										<li class="i-wishlist">											
											<?php echo get_option('chosen_select_nostd'); ?>
											<a href="<?php echo esc_url( $wishlist_url ) ?>" title="wishlist">&nbsp;</a>
										</li>
										<?php }?>
										
										<?php if( NEWFASHION_WPO_WOOCOMMERCE_ACTIVED ) { ?>	
											<?php if( newfashion_wpo_theme_options('woo-show-minicart', true) ) : ?>
												<li class="i-cart cart-top">						
													<div class="st-content">
														<div class="st-trigger-effects cartwrapper">						
															<button data-effect="st-effect-1">						
																<?php get_template_part( 'woocommerce/cart/mini-cart-count' ); ?>  																
															</button>					
														</div>			
													</div>							
												</li>
											<?php endif; ?>	
										<?php } ?>	
															
										<li class="i-search">
											<div class="st-content">
												<div class="st-trigger-effects">						
													<button data-effect="st-effect-3">&nbsp;</button>					
												</div>			
											</div>	
										</li>
										
										<li class="i-menu hidden-md hidden-lg">
											<div class="st-content">
												<div class="st-trigger-effects">						
													<button data-effect="st-effect-2">&nbsp;</button>					
												</div>			
											</div>	
										</li>
															
									</ul>
								</div>				
							</div>	
						</div>			
					</div>
					
					<div id="wpo-headMain" class="wpo-headMain v-dark space-padding-tb-20">
						<div class="container">
							<div class="logo-in-theme a-center">
								<?php if( newfashion_wpo_theme_options('logo') ) { ?>						
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
										<img src="<?php echo esc_url_raw( newfashion_wpo_theme_options('logo') ); ?>" alt="<?php bloginfo( 'name' ); ?>">
									</a>						
								<?php } else { ?>							
									<a href="<?php echo esc_url( home_url( '/' ) ); ?>">
										 <img src="<?php echo esc_url_raw( get_template_directory_uri() . '/images/logo-white.png' ); ?>" alt="<?php bloginfo( 'name' ); ?>" />
									</a>							
								<?php } ?>
							</div>
						</div>
					</div>
					
					<div id="wpo-headBottom" class="wpo-headBottom v-dark hidden-sm hidden-xs">
						<div class="container">				
							<div class="mainmenu a-center">
								<nav id="wpo-mainnav" data-style='light' data-duration="<?php echo newfashion_wpo_theme_options('megamenu-duration',400); ?>" class="wpo-megamenu <?php echo newfashion_wpo_theme_options('magemenu-animation','slide'); ?> animate navbar navbar-mega" role="navigation">
				   
									 <?php
										$args = array(  'theme_location' => 'mainmenu',
														'container_class' => 'collapse navbar-collapse navbar-ex1-collapse no-padding',
														'menu_class' => 'nav navbar-nav megamenu',
														'fallback_cb' => '',
														'menu_id' => 'main-menu',
														'walker' => class_exists("Wpo_Megamenu") ? new Wpo_Megamenu() : new Wpo_bootstrap_navwalker );
										wp_nav_menu($args);
									?>
								</nav>
							</div>			   
						</div>				
					</div>    
				</header>
				<!-- //HEADER -->
		