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
<?php get_header( newfashion_wpo_theme_options('headerlayout') ); ?>
  
<?php do_action( 'newfashion_wpo_layout_breadcrumbs_render' ); ?>   
  
<?php do_action( 'newfashion_wpo_layout_template_before' ) ; ?>
        <?php  if ( have_posts() ) : ?>
         
                <?php get_template_part( 'contents' ); ?>
 
        <?php else : ?>
            <?php get_template_part( 'templates/elements/none' ); ?>
        <?php endif; ?>
<?php do_action( 'newfashion_wpo_layout_template_after' ) ; ?>

<?php get_footer(); ?>