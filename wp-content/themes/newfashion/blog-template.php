<?php
/*
*Template Name: Blog
*
*/
global $newfashion_config;
// Get Page Config
$newfashion_config = $newfashionEngine->getPageConfig();

?>

<?php get_header( $newfashionEngine->getHeaderLayout() );  ?>

 <?php do_action( 'newfashion_wpo_layout_breadcrumbs_render' ); ?>  
    
 <?php do_action( 'newfashion_wpo_layout_template_before' ) ; ?>

        <div class="post-area blog-page-<?php echo (esc_attr($newfashion_config['blog_style']) ?  esc_attr($newfashion_config['blog_style']) : 'default'); ?> <?php echo ($newfashion_config['blog_style']=='masonry')? 'blog-masonry ': ''; ?>" id="container">
            <?php get_template_part('contents-post');?>
        </div>

 <?php do_action( 'newfashion_wpo_layout_template_after' ) ; ?>

<?php get_footer(); ?>