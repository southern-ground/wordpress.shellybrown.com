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
$newfashion_config = $newfashionEngine->getPostConfig();

?>

<?php get_header( newfashion_wpo_theme_options('headerlayout', '') );  ?>
      
<?php do_action( 'newfashion_wpo_layout_breadcrumbs_render' ); ?>  

<?php do_action( 'newfashion_wpo_layout_template_before' ) ; ?>
        <?php if( get_post_type() && get_post_type() != 'post' ) :   ?>
        <div class="post-<?php echo get_post_type(); ?>">
             <?php get_template_part( 'templates/'.get_post_type().'/single' ); ?>  
        </div>
        <?php else : ?>
        <div class="post-area single-blog">
            <?php  while(have_posts()): the_post(); ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <div class="entry-thumb">
                    <?php get_template_part( 'templates/content/content', get_post_format() ); ?> 
                </div>    

                <?php if(is_single() ) { ?>
                    <div class="post-container">

                        <div class="entry-content">
                            <h1><?=get_the_title()?></h1>
                            <?php
                                the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', 'newfashion' ) );
                                wp_link_pages( array(
                                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'newfashion' ) . '</span>',
                                    'after'       => '</div>',
                                    'link_before' => '<span>',
                                    'link_after'  => '</span>',
                                ) );
                            ?>
                        </div><!-- .entry-content -->
                        
                     </div>
                    <?php } ?>

                <?php the_tags( '<footer class="entry-meta"><span class="tag-links"><span>Tags: </span>', ', ', '</span></footer>' ); ?>
                <?php if( newfashion_wpo_theme_options('show-share-post', true) ){ ?>
                    <div class="post-share">
                        <div class="row">
                            <div class="col-sm-4">
                                <h6><?php echo __( 'Share this Post!','newfashion' ); ?></h6>
                            </div>
                            <div class="col-sm-8">
                                <?php newfashion_wpo_share_box(); ?>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                    <hr>
                    <div class="author-about">
                        <?php get_template_part('templates/elements/author-bio'); ?>
                    </div>
                    <hr>
                <?php comments_template(); ?>
                <div> <?php if( newfashion_wpo_theme_options('show-related-post', true) ){
                    $relate_count = newfashion_wpo_theme_options('blog-items-show', 4);

                    newfashion_related_post($relate_count, 'post', 'category');
                } ?>
                </div>
            </article>    
           <?php endwhile; ?>
            <?php wp_reset_postdata(); ?>

        </div>
        <?php endif; ?>
             
<?php do_action( 'newfashion_wpo_layout_template_after' ) ; ?>

<?php get_footer(); ?>