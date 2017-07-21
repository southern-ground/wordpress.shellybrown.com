<?php $thumbsize = isset($thumbsize)? $thumbsize : 'thumbnail';?>
<article class="post col-sm-6 space-20"><div class="row">
<?php
if ( has_post_thumbnail() ) {
    ?>
    <div class="col-sm-6">
        <figure class="entry-thumb">
            <a href="<?php the_permalink(); ?>" title="" class="entry-image zoom-2">
                <?php the_post_thumbnail( $thumbsize );?>
            </a>
            <!-- vote    -->
            <?php do_action('newfashion_wpo_rating') ?>
        </figure>
    </div>    
    <?php
}
?>
<div class="entry-content col-sm-6">
    <?php if (get_the_title()) { ?>
        <h4 class="entry-title">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h4>
    <?php } ?>
    <div class="entry-content-inner clearfix">
        <div class="entry-meta">
            <div class="entry-category">
                <?php the_category(); ?>
            </div>
        
            <ul class="entry-comment list-inline">
                <li class="comment-count">
                    <?php comments_popup_link(__(' 0 ', 'newfashion'), __(' 1 ', 'newfashion'), __(' % ', 'newfashion')); ?>
                </li>
            </ul>

             <div class="entry-create">
                <span class="author"><?php echo _e('By ', 'newfashion'); the_author_posts_link(); ?></span>
                <span class="entry-date"><?php the_time( 'M d, Y' ); ?></span>
            </div>
        </div>
    </div>
   
</div>
</div></article>