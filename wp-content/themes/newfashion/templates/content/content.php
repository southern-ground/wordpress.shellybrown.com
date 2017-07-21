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
<div class="entry-thumb">
    <?php newfashion_wpo_post_thumbnail(); ?>
</div>
<?php if( is_single() ) : ?>
	<div class="post-container">
 
        <div class="information-post">
            <div class="entry-name">
                <?php if(newfashion_wpo_theme_options('post-title')){ ?>
                    <h1 class="entry-title">
                        <?php the_title(); ?>
                    </h1>
                <?php } ?>
                <p class="entry-meta">
                    <span class="entry-date"><?php the_time( 'M d, Y' ); ?></span>
                    <span class="meta-sep"> / </span>
				<span class="comment-count">
					<?php comments_popup_link(__(' 0 comment', 'newfashion'), __(' 1 comment', 'newfashion'), __(' % comments', 'newfashion')); ?>
				</span>
                    <span class="meta-sep"> / </span>
                    <span class="entry-author"><?php the_author_posts_link(); ?></span>
                     
                </p>
            </div>
           

        </div>
	</div><!--  End .post-container -->
 
<?php else : ?>
   <?php get_template_part( 'templates/blog/blog'); ?>
<?php endif; ?>