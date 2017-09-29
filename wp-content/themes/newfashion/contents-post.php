<?php 
   
    global $wp_query, $newfashion_config;

if( !empty($wp_query)){
    if(is_category()){

        $style = newfashion_wpo_theme_options('archive-style');
        $columns_count = (int)newfashion_wpo_theme_options('archive-column', 4);
        $col = floor(12/$columns_count);
        $smcol = ($col > 4)? 6: $col;
        $class_column='col-lg-'.$col.' col-md-'.$col.' col-sm-'.$smcol;
        $post_per_page = get_option('posts_per_page');
    }elseif( is_page()) {

        $options = array(
            'blog_number' => 10,
            'blog_style' => '',
            'blog_columns' => 2,
        );

        $newfashion_config     = array_merge( $options, $newfashion_config );       
        $style          = $newfashion_config['blog_style'] ;
        $post_per_page  = $newfashion_config['blog_number'];

        $col = floor(12/$newfashion_config['blog_columns']);

        $smcol = ($col > 4)? 6: $col;
        $class_column='col-lg-'.$col.' col-md-'.$col.' col-sm-'.$smcol;
        
        if(is_front_page())
            $paged = (get_query_var('page')) ? get_query_var('page') : 1;
        else
            $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

        $args = array(
            'post_type' => 'post',
            'paged' => $paged,
            'posts_per_page'=> $post_per_page
        );

        $wp_query = new WP_Query($args);
    }else{
        $style = '';
        $post_per_page = get_option('posts_per_page');
    }
}else
    get_template_part( 'templates/elements/none' );
?>
<!-- Contents-Post -->
<?php if ( have_posts() ) : ?>
<div class="post-area row <?php echo ($style=='masonry')? 'blog-masonry isotope-masonry': ''; ?> posts-<?php echo ($style) ? esc_attr($style) : 'default' ?>">
<?php while ( have_posts() ) : the_post(); ?>
<?php if($style=='masonry'){ ?>
    <div class="<?php echo esc_attr($class_column); ?> masonry-item">
        <?php get_template_part( 'templates/blog/blog', $style); ?>
    </div>
<?php }else{ ?>
    <div class="col-xs-12">
        <?php get_template_part( 'templates/blog/blog', $style); ?>
    </div>    
<?php } ?>
<?php endwhile; ?>
</div>
<?php newfashion_wpo_pagination_nav( $post_per_page,$wp_query->found_posts,$wp_query->max_num_pages ); ?>
<?php wp_reset_postdata(); ?>
<?php else : ?>
<?php get_template_part( 'templates/elements/none' );
endif;