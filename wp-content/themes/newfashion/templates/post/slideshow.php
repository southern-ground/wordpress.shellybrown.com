<?php $thumbsize = isset($thumbsize)? $thumbsize : 'thumbnail';?>

<article class="post">
    <?php
    if ( has_post_thumbnail() ) {
        ?>
            <figure class="entry-thumb">
                <a href="<?php the_permalink(); ?>" title="" class="entry-image zoom-2">
                    <?php the_post_thumbnail( 'newfashion-thumbnails-post' );?>
                </a>
                <!-- vote    -->
                <?php do_action('newfashion_wpo_rating') ?>
				<h4 class="entry-name"><?php the_title(); ?> </h4>
				<span class="entry-date">
					<span class="day"><?php the_time( 'd' ); ?></span>
					<span class="month"><?php the_time( 'M' ); ?></span>
				</span>    
				
            </figure>
        <?php
    }
    ?>
	
    <div class="entry-content">
        <div class="entry-content-inner clearfix">
			        
            <p class="entry-description"><?php echo newfashion_excerpt(40,'...'); ?></p>
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
                    
                </div>
            </div>
        </div>
    </div>

</article>