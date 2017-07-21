<?php $thumbsize = isset($thumbsize)? $thumbsize : 'thumbnails-post';?>
<?php
  $post_category = "";
  $categories = get_the_category();
  $separator = ' | ';
  $output = '';
  if($categories){
    foreach($categories as $category) {
      $output .= '<a href="'.get_category_link( $category->term_id ).'" title="' . esc_attr( sprintf( __( "View all posts in %s", 'newfashion' ), $category->name ) ) . '">'.$category->cat_name.'</a>'.$separator;
    }
  $post_category = trim($output, $separator);
  }      
?>
<article class="post">
    <?php
    if ( has_post_thumbnail() ) {
        ?>
            <figure class="entry-thumb">
                <a href="<?php the_permalink(); ?>" title="" class="entry-image zoom-2">
                    <?php the_post_thumbnail( $thumbsize );?>
                </a>
                <!-- vote    -->
                <?php do_action('newfashion_wpo_rating') ?>
                 <div class="category-highlight hidden">
                    <?php echo trim($post_category); ?>
                </div>
            </figure>
        <?php
    }
    ?>
    <div class="entry-content">
        <?php
            if (get_the_title()) {
            ?>
                <h4 class="entry-title">
                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                </h4>
            <?php
        }
        ?>
        <div class="entry-content-inner clearfix">
            <div class="entry-meta">
                <div class="entry-category hidden">
                    <?php the_category(); ?>
                </div>
            
                <ul class="entry-comment list-inline hidden">
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

        <?php
            if (! has_excerpt()) {
                echo "";
            } else {
                ?>
                    <p class="entry-description"><?php echo newfashion_excerpt(35,'...'); ?></p>
                <?php
            }
        ?>

    </div>
</article>