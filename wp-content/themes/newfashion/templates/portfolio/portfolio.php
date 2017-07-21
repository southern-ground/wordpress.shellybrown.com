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

global $column, $newfashion_portfolio;

$col = floor(12/$column);
$smcol = ($col > 4)? 6: $col;
$class_column='col-lg-'.$col.' col-md-'.$col.' col-sm-'.$smcol;
$_count =0;

$terms = get_terms('portfolio_categories',array('orderby'=>'id'));

$_id = newshopping_makeid();

?>

<div class="wpo-portfolio">
<?php if( $newfashion_portfolio->have_posts()): ?>
    <!-- filters category -->
    <div id="filters" class="isotope-filter">
      <ul class="nav nav-tabs wpo-portfolio-filters">
        <li>
          <a href="javascript:void(0)" title="" data-filter=".all" class="active">
            <?php _e('All', 'newfashion'); ?>
          </a>
        </li>
    <?php if ( count($terms) > 0 ){
          foreach ( $terms as $term ): ?>
            <li><a href="javascript:void(0)" title="" data-filter=".<?php echo esc_attr( $term->slug ); ?>">
            <?php echo esc_html($term->name); ?>
            </a></li>
      <?php endforeach;
          }
      ?>
      </ul>
    </div>
  <div class="isotope row" data-isotope-duration="400" id="isotope-<?php echo esc_attr( $_id ); ?>">
  <?php while($newfashion_portfolio->have_posts()): $newfashion_portfolio->the_post();
     $item_classes = 'all ';
     $item_cats = get_the_terms( $newfashion_portfolio->post->ID, 'portfolio_categories' );
     foreach((array)$item_cats as $item_cat){
       if(count($item_cat)>0){
         $item_classes .= $item_cat->slug . ' ';
        }
      }
$image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $newfashion_portfolio->post->ID ), 'blog-thumbnails' );
$_video = array('type' => 'wpo_portfolio', 'format' =>'video_link');
?>
<div class="col-sm-<?php echo esc_attr( $class_column ); ?> item col-md-<?php echo esc_attr( $class_column ); ?> col-lg-<?php echo esc_attr( $class_column ); ?> <?php echo esc_attr( $item_classes ); ?>">
  <div class="wpo-portfolio-content thumbnail text-center">
  <div class="wpo-portfolio-content-inner">
  <?php if( newfashion_wpo_embed( $_video) ){ ?>
    <div class="entry-thumb post-type-video">
      <div class="video-thumb video-responsive">
      <?php echo newfashion_wpo_embed( $_video); ?>
      </div>
      <div class="wpo-show-video">
        <a class="video-popup" href="javascript:void(0)" data-title="<?php the_title(); ?>" data-id="<?php the_ID(); ?>" data-toggle="modal" data-target="#videoModal">
          <i class="fa fa-youtube-play"></i>
          <?php the_title(); ?>
        </a>
      </div>
    </div>
<?php }elseif ( has_post_thumbnail() ){ ?>
      <figure class="wpo-portfolio-thumbnail">
        <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
          <?php the_post_thumbnail( 'newfashion-blog-thumbnails' ); ?>
        </a>
      </figure>
      <div class="wpo-prettyPhoto">
      <?php
      if( $image_attributes ) : ?>
      <a href="<?php echo esc_url($image_attributes[0]); ?>" rel="prettyPhoto[all]" title="<?php the_title_attribute(); ?>" class="btn btn-outline-inverse">
          <i class="fa fa-plus"></i>
      </a>
      <?php endif; ?>
    </div>
    <?php } ?>
<div class="wpo-portfolio-title caption">
  <h4 class="entry-title">
    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
</h4>

<?php if($class_column !=3) { ?>
  <p class="entry-description"><?php echo newfashion_excerpt(20,'...'); ?></p>
<?php } ?>
</div>

</div>
</div>
</div>
<?php endwhile; ?>
<?php wp_reset_postdata(); ?>
</div>


<?php endif; ?>
</div>

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            </div>
            <div class="modal-body"><span class="spinner"></span></div>
        </div>
    </div>
</div>
