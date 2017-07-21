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
    case 'image':
        $icon = 'fa-picture-o';
        break;
    case 'chat':
        $icon = 'fa-weixin';
        break;
    case 'quote':
        $icon = 'fa-quote-left';
        break;
}
?>
<article id="post-<?php the_ID(); ?>" <?php post_class('post-style-list post-default'); ?>>
        <?php if ( is_sticky() && is_home() && ! is_paged() ) : ?>
            
        <?php endif; ?>
        <div class="post-container">
            <div class="blog-post-detail row">
                <div class="col-md-4 col-sm-4">
                    <figure class="entry-thumb">
                        <?php 
                            if(has_post_format($postformat)){
                                get_template_part( 'templates/content/content', $postformat );
                            }
                         ?>
                        <div class="post-meta-top">
                            <div class="entry-created ">
                                <span class="month"><?php the_time( 'M' ); ?></span>
                                <span class="date"><?php the_time('d'); ?></span>
                            </div>
                            
                        </div>  
                    </figure>
                </div>
                <div class="col-md-8 col-sm-8">
                    <div class="information-post">
                        <h3 class="entry-title">
                            <a href="<?php the_permalink(); ?>">
                                <?php the_title(); ?>
                            </a>
                        </h3>

                        <div class="entry-meta">
                            <span class="author-link"><?php _e('By ', 'newfashion') ?><?php the_author_posts_link(); ?></span>
                            <span class="meta-sep space-padding-lr-5"> . </span>
                            <span class="comment-count">
                                <?php comments_popup_link(__(' 0 comment', 'newfashion'), __(' 1 comment', 'newfashion'), __(' % comments', 'newfashion')); ?>
                            </span>
                        </div>
                        <p class="entry-content">
                            <?php echo newfashion_excerpt(40); ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </article>