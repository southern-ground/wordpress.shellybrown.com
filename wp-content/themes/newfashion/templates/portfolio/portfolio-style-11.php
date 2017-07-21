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
wp_enqueue_script( 'newfashion_isotope_js', NEWFASHION_WPO_THEME_URI.'/js/isotope.pkgd.min.js', array( 'jquery' ) );
wp_enqueue_script( 'newfashion_prettyPhoto_js', NEWFASHION_WPO_THEME_URI.'/js/jquery.prettyPhoto.js', array( 'jquery' ) );
wp_enqueue_style( 'newfashion_prettyPhoto_css', NEWFASHION_WPO_THEME_URI.'/css/prettyPhoto.css');

$terms = get_terms('portfolio_categories',array('orderby'=>'id'));
global $column, $newfashion_portfolio;

$col = floor(12/$column);
$smcol = ($col > 4)? 6: $col;
$class_column='col-lg-'.$col.' col-md-'.$col.' col-sm-'.$smcol;
$_count =0;

$_id = newshopping_makeid();

?>

<div class="wpo-portfolio">
<?php if( $newfashion_portfolio->have_posts()): ?>
    <!-- filters category -->
    <div class="col-xs-12">
      <div id="filters" class="isotope-filter">
        <ul class="nav nav-tabs wpo-portfolio-filters">
          <li>
            <a href="javascript:void(0)" title="" data-filter=".all" class="active">
              <?php _e('All', 'newfashion'); ?>
            </a>
          </li>
      <?php if ( count($terms) > 0 ){
            foreach ( $terms as $term ): ?>
              <li><a href="javascript:void(0)" title="" data-filter=".<?php echo esc_attr($term->slug); ?>">
              <?php echo esc_html($term->name); ?>
              </a></li>
        <?php endforeach;
            }
        ?>
        </ul>
      </div>
    </div>
    <div class="clearfix"></div>
  <div class="isotope row" data-isotope-duration="400" id="isotope-<?php echo esc_attr($_id); ?>">
  <?php while($newfashion_portfolio->have_posts()): $newfashion_portfolio->the_post();
     $item_classes = 'all ';
     $item_cats = get_the_terms( $newfashion_portfolio->post->ID, 'portfolio_categories' );
     foreach((array)$item_cats as $item_cat){
       if(count($item_cat)>0){
         $item_classes .= $item_cat->slug . ' ';
        }
      } 
$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $newfashion_portfolio->post->ID ) );
?>
<div class="col-sm-<?php echo esc_attr($class_column); ?> item col-md-<?php echo esc_attr($class_column); ?> col-lg-<?php echo esc_attr($class_column); ?> <?php echo esc_attr($item_classes); ?>">
    <div class="wpo-portfolio-content thumbnail text-center">
      <div class="ih-item square effect15 left_to_right">
        <a href="<?php the_permalink(); ?>">
          <div class="img">
              <?php if ( has_post_thumbnail()) {
                the_post_thumbnail( 'newfashion-blog-thumbnails' );
              }?>
          </div>
          <div class="info">
            <h3><?php the_title(); ?></h3>
            <p class="created"><?php echo get_the_date(); ?></p>
            <p><a href="<?php echo esc_attr($image_attributes); ?>" rel="prettyPhoto[pp_gal]"> zoom </a></p>
          </div>
        </a>
      </div>              
    </div>  
</div>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
</div>


<?php endif; ?>
</div>