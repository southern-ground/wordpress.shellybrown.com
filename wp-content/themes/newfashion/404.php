<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     Opal  Team <opalwordpressl@gmail.com >
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http:/wpopal.com
 * @support  http://wpopal.com
 */

/*
*Template Name: 404 Page
*/

?>

<?php get_header( $newfashionEngine->getHeaderLayout() ); ?>

<section class="wpo-mainbody clearfix notfound-page">
	<section class="container">
		<div class="page_not_found text-center clearfix space-padding-tb-100">
			<div class="col-sm-12 space-padding-tb-50">
				<div class="clearfix"></div>
				<div class="title">
					<span>404</span>
					<span class="sub"><?php _e('Page not found', 'newfashion') ?></span>
				</div>
				<div class="error-description"><?php _e('We\'re sorry, but we can\'t find the page you were looking for. It\'s probably some thing we\'ve done wrong but now we know about it and we\'ll try to fix it. In the meantime, try one of these options.', 'newfashion') ?> </div>
				<div class="page-action">
					<a class="btn btn-lg btn-inverse-light" href="javascript: history.go(-1)"><?php _e('Go back to previous page', 'newfashion'); ?></a>
					<a class="btn btn-lg btn-inverse-light" href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php _e('Return to homepage', 'newfashion'); ?></a>
				</div>
			</div>
		</div>
	</section>
</section>

<?php get_footer(); ?>