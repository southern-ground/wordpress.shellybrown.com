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

if ( post_password_required() ){
    return;
}
?>
<div id="comments" class="comments">
    <header class="header-title">
        <h5 class="comments-title title"><?php comments_number( __('0 Comment', 'newfashion'), __('1 Comment', 'newfashion'), __('% Comments', 'newfashion') ); ?></h5>
    </header><!-- /header -->

    <?php if ( have_comments() ) { ?>
        <div class="wpo-commentlists">
    	    <ol class="commentlists">
    	        <?php wp_list_comments('callback=newfashion_wpo_theme_comment'); ?>
    	    </ol>
    	    <?php
    	    	// Are there comments to navigate through?
    	    if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) :
    	    ?>
    	    <footer class="navigation comment-navigation" role="navigation">
    	        <div class="previous"><?php previous_comments_link( __( '&larr; Older Comments', 'newfashion' ) ); ?></div>
    	        <div class="next right"><?php next_comments_link( __( 'Newer Comments &rarr;', 'newfashion' ) ); ?></div>
    	    </footer><!-- .comment-navigation -->
    	    <?php endif; // Check for comment navigation ?>

    	    <?php if ( ! comments_open() && get_comments_number() ) : ?>
    	        <p class="no-comments"><?php _e( 'Comments are closed.' , 'newfashion' ); ?></p>
    	    <?php endif; ?>
        </div>
    <?php } ?> 

	<?php
        $aria_req = ( $req ? " aria-required='true'" : '' );
        $comment_args = array(
                        'title_reply'=> '<h4 class="title">'.__('Send a Comment','newfashion').'</h4>',
                        'comment_field' => '<div class="form-group">
                                                <textarea placeholder="'.__('Your Message', 'newfashion').'" rows="8" id="comment" class="form-control"  name="comment"'.trim( $aria_req ).'></textarea>
                                            </div>',
                        'fields' => apply_filters(
                        	'comment_form_default_fields',
                    		array(
                                'author' => '<div class="row"><div class="form-group col-sm-6 col-xs-12">
                                            <input type="text" name="author" placeholder="Your Name *" class="form-control" id="author" value="' . esc_attr( $commenter['comment_author'] ) . '" ' . trim( $aria_req ) . ' />
                                            </div>',
                                'email' => ' <div class="form-group col-sm-6 col-xs-12">
                                            <input id="email" name="email" placeholder="Email *" class="form-control" type="text" value="' . esc_attr(  $commenter['comment_author_email'] ) . '" ' . trim( $aria_req ). ' />
                                            </div></div>',
                                'url' => '<div class="form-group">
                                            <input id="url" placeholder="Website" name="url" class="form-control" type="text" value="' . esc_attr( $commenter['comment_author_url'] ) . '"  />
                                            </div>',
                            )),
                        'label_submit' => __('Send', 'newfashion'),
						'comment_notes_before' => '<div class="form-group h-info">'.__('Your email address will not be published.','newfashion').'</div>',
						'comment_notes_after' => '',
                        );
    ?>
	<?php global $post; ?>
	<?php if('open' == $post->comment_status){ ?>
	<div class="commentform row reset-button-default">
    	<div class="col-sm-12">
			<?php newfashion_wpo_comment_form($comment_args); ?>
    	</div>
    </div><!-- end commentform -->
	<?php } ?>
</div><!-- end comments -->