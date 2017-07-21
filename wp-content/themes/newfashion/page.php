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
$newfashion_config = $newfashionEngine->getPageConfig();   
?>
<?php

  get_header( $newfashionEngine->getHeaderLayout() );

?>
<?php if( isset( $newfashion_config['breadcrumb']) && !$newfashion_config['breadcrumb']): ?>
<?php do_action( 'newfashion_wpo_layout_breadcrumbs_render' ); ?>
<?php endif; ?>
  
  <?php do_action( 'newfashion_wpo_layout_template_before' ) ; ?>
    <?php /* The loop */ ?>
    <?php while ( have_posts() ) : the_post(); ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class('clearfix'); ?>>
        <?php the_content(); ?>
      </article><!-- #post -->
      <?php  
          if ( comments_open() ) {
              echo '<div class="container">';
                comments_template();
              echo '</div>';  
          }
      ?>
    <?php endwhile; ?>
  <?php do_action( 'newfashion_wpo_layout_template_after' ) ; ?>

<?php get_footer(); ?>
