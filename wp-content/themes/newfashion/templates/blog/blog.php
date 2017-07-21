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
$postformat = get_post_format();

$icon = '';
switch ($postformat) {
	case 'link':
		$icon = 'fa-link';
		break;
	case 'gallery':
		$icon = 'fa-th-large';
		break;
	case 'audio':
		$icon = 'fa-music';
		break;
	case 'video':
		$icon = 'fa-film';
		break;
	default:
		$icon = 'fa-picture-o';
		break;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-default'); ?>>
        <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
          
        <?php endif; ?>
        <div class="post-container clearfix">
            <div class="blog-post-detail">
                <figure class="entry-thumb">
                    <?php 
                        if( has_post_format($postformat)){ 
                            get_template_part( 'templates/content/content', $postformat );
                        }
                    ?>                  
                </figure>
                <div class="information-post">
                    <h3 class="entry-title">
                        <a href="<?php the_permalink(); ?>">
                            <?php the_title(); ?>
                        </a>
                    </h3>

                    <div class="entry-meta">
                        <span class="author-link"><?php _e('By ', 'newfashion') ?><?php the_author_posts_link(); ?></span>
                        <!--
                        <span class="meta-sep"> | </span>
						<span class="time"><?php the_time( 'M' ); ?> <?php the_time('d'); ?>, <?php the_time('y'); ?></span>
						-->
						<span class="meta-sep"> | </span>
                        <span class="comment-count">
                            <?php comments_popup_link(__(' 0 comment', 'newfashion'), __(' 1 comment', 'newfashion'), __(' % comments', 'newfashion')); ?>
                        </span>
                    </div>

                    <p class="entry-content">
                        <?php echo newfashion_excerpt(100); ?>
                    </p>

                    <div class="entry-link">
                        <a href="<?php the_permalink(); ?>" class="btn btn-outline"><?php echo __( 'read more','newfashion' ); ?></a>
                    </div>
                </div>
            </div>
        </div>
    </article>