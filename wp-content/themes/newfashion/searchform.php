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
<form role="search" method="get" class="searchform wpo-search" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	
			<input name="s" maxlength="40" class="form-control input-large input-search" type="text" size="20" placeholder="<?php _e( 'Search...','newfashion'); ?>">		
				<button type="submit" class="btn-search">
				<i class="fa fa-search"></i>
			</button> 	   

			<?php if( NEWFASHION_WPO_WOOCOMMERCE_ACTIVED ) { ?>
			<input type="hidden" name="post_type" value="product" />
			<?php } ?>
	
</form>


