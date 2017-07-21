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
global $newfashion_config;
$newfashion_config = $newfashionEngine->getPortfolioConfig();
$config = get_post_meta(get_the_ID(),'wpo_portfolio',true);
$newfashion_portfolio_format = (isset( $config['portfolio_format'] ) && !empty( $config['portfolio_format'] )) ? $config['portfolio_format']: 'default';
if($newfashion_portfolio_format == 'video' || $newfashion_portfolio_format == 'fullscreen'){
   $newfashion_config['layout'] = 'fullwidth';
}
get_header( newfashion_wpo_theme_options('headerlayout', '') ); ?>

<?php do_action( 'newfashion_wpo_layout_breadcrumbs_render' ); ?>	

<?php do_action( 'newfashion_wpo_layout_template_before' ) ; ?>

	<?php while(have_posts()):the_post(); ?>
		<div class="format-<?php echo esc_attr($newfashion_portfolio_format); ?>">
			<?php get_template_part('templates/portfolio/single'); ?>
		</div>
	<?php endwhile; ?>
	<?php wp_reset_postdata(); ?>

 <?php do_action( 'newfashion_wpo_layout_template_after' ) ; ?>

<?php get_footer(); ?>