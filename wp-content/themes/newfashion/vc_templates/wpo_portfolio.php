<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2014 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */
wp_enqueue_style( 'isotope-css' );
wp_enqueue_script( 'isotope' );

$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );


$col = floor(12/$columns_count);
$smcol = ($col > 4)? 6: $col;
$class_column= 'col-lg-'.$col.' col-md-'.$col.' col-sm-'.$smcol;

if( $nopadding ){
   $class_column .=' nopadding';
}
$newfashion_portfolio_skills = get_terms('portfolio_categories',array('orderby'=>'id'));
$args = array(
  'post_type' => 'portfolio',
  'posts_per_page'=>$number
  );
$loop = new WP_Query($args);
?>
   <!-- end filters -->
      <?php $_id = newshopping_makeid();

      ?>
<div class="widget wpb_grid wpo-portfolio <?php echo (($el_class!='')?' '.esc_attr( $el_class ):''); ?>">
  <div class="teaser_grid_container">
    <div class="wpb_filtered_grid teaser_grid_container <?php echo (($nopadding) ? '' : 'row') ?>">
        <?php if( $title ) { ?>
            <h3 class="widget-title visual-title <?php echo esc_attr( $size ).' '.esc_attr( $alignment ); ?>">
               
                <?php if(trim($descript)!=''){ ?>
                <span class="widget-desc">
                <?php echo trim( $descript ); ?>
                </span>
                <?php } ?>
                 <span><?php echo esc_html( $title ); ?></span>
            </h3>
        <?php } ?>

      <?php if( $loop->have_posts()): ?>
      <!-- filters category -->
      <div id="filters"  class="tab-v8 space-50">
        <div class="nav-inner">
          <ul class="nav nav-tabs isotope-filter categories_filter" data-related-grid="isotope-<?php echo esc_attr( $_id ); ?>">
            <?php
            $terms = $newfashion_portfolio_skills;
            $count = count($terms);
            echo '<li class="active"><a href="javascript:void(0)" title="" data-option-value=".all">'.__('All', 'newfashion').'</a></li>';

            if ( $count > 0 ){
              foreach ( $terms as $term ) {
                if(  $term && is_object($term)){
                  echo '<li><a href="javascript:void(0)" title="" data-option-value=".'.esc_attr( $term->slug ).'">'.esc_html($term->name).'</a></li>';
                }
              }
            }
            ?>
          </ul>
        </div>
      </div>

    <div class="isotope-masonry portfolio-entries clearfix masonry-spaced" data-isotope-duration="400" id="isotope-<?php echo esc_attr( $_id ); ?>">
    <?php while($loop->have_posts()): $loop->the_post();

       $item_classes = 'all ';
       $item_cats = get_the_terms( $loop->post->ID, 'portfolio_categories' );
       if($masonry==0) $thumb = 'thumbnails-large'; else $thumb = '';
       foreach( $item_cats as $item_cat){
         if( $item_cat && is_object($item_cat)){
           $item_classes .= $item_cat->slug . ' ';
         }
       }
       $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'full' );
       ?>
      <div class="portfolio-masonry-entry masonry-item <?php echo esc_attr( $class_column ); ?> <?php echo esc_attr( $item_classes ); ?>">
        <div class="wpo-portfolio-content text-center">
          <div class="ih-item square colored <?php echo esc_attr( $style ); ?>">
            <a href="<?php the_permalink(); ?>">
              <div class="img">
                  <?php if ( has_post_thumbnail()) {
                    the_post_thumbnail($thumb);
                  }?>
              </div>
              <div class="info">
                <div class="info-inner">
                    <h3><?php the_title(); ?></h3>
                    <p class="description"><?php echo newfashion_excerpt(20,'...'); ?></p>
                    <p class="created hidden"><?php echo get_the_date(); ?></p>
                    <?php if($style=='effect16'){ ?>
                    <a class="hidden zoom" href="<?php echo esc_url( $image_attributes[0] ); ?>" rel="prettyPhoto[pp_gal]"> <i class="fa fa-search bg-success radius-x space-padding-10"></i> </a>
                    <?php } ?>
                </div>    
              </div>
            </a>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
    </div>
    <?php 
    if($pagination == 1){
      newfashion_wpo_pagination_nav( $number, $loop->found_posts, $loop->max_num_pages );
    }
    ?>
    <?php wp_reset_postdata(); ?>

    <?php endif; ?>
    </div>
  </div>  
</div>    