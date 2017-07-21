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



$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

global $wp_query, $post, $woocommerce;
$children_cat = array();
$_total = 0;
$parent_cat = get_terms( 'product_cat', array( 'fields' => 'ids', 'parent' => 0, 'hierarchical' => false, 'hide_empty' => false ) );
$i =0;
?>

<div class="widget-highlighted wpo-category-list <?php echo (($el_class!='')?' '.$el_class:''); ?>">
    <div class="widget-content media">
        <?php if( !empty($title)): ?>
            <h3 class="widget-title">
                <span><?php echo trim($title); ?></span>
            </h3>
        <?php endif; ?>
        <div class="media-body category-filter-content" id="wpo-accordion-categories" role="tablist" aria-multiselectable="true">
        <?php foreach( $parent_cat as $cat_id ):
            $i++;
                $term = get_term( $cat_id, 'product_cat' );
                $args = array(
                  'taxonomy'     => 'product_cat',
                  'child_of'     => 0,
                  'parent'       => $cat_id
                );
                $sub_cats = get_categories( $args );
                $_total = $term->count;
                if( $sub_cats && !empty($sub_cats)) {
                    foreach($sub_cats as $sub){
                        $_total += $sub->count;
                    }
                }
                if($_total > 0):
                    $category_link = get_term_link( $term->term_id, 'product_cat' );
                ?>
                <!-- <div class="panel panel-default"> -->
                    <div class="category-title" role="tab" id="category-<?php echo esc_attr($cat_id); ?>">
                        <a href="<?php echo esc_url($category_link); ?>"><?php echo esc_html($term->name); ?>
                            <?php if($show_count){ ?>
                                <span class="total-product"><?php echo '( '.$_total.' )';?></span>
                            <?php } ?>
                        </a>
                        <?php if($show_dropdown && $show_children && !empty($sub_cats) ){ ?>
                            <a class="collapsed dropdown" data-toggle="collapse" data-parent="#wpo-accordion-categories" href="#collapse-<?php echo esc_attr($cat_id); ?>" aria-expanded="true" aria-controls="collapse-<?php echo esc_attr($cat_id); ?>">
                                <i class="fa fa-plus-square"></i>
                            </a>
                        <?php } ?>
                        <?php if($show_children){
                            if( $sub_cats && !empty($sub_cats)){ ?>
                            <div id="collapse-<?php echo esc_attr($cat_id); ?>" class="panel-collapse collapse <?php echo ($i==1?'in':''); ?> " role="tabpanel" aria-labelledby="category-<?php echo esc_attr($cat_id); ?>">
                            <?php
                                foreach($sub_cats as $cat):
                                    $cat_link = get_term_link( $cat->slug, 'product_cat' );
                                    if( $cat->count > 0 ): ?>
                                          <h4 class="category-title">
                                            <a href="<?php echo esc_url($cat_link); ?>"><?php echo trim($cat->name); ?>
                                            <?php if($show_count){ ?>
                                                <span class="total-product"><?php echo '( '.$cat->count.' )';?></span>
                                            <?php } ?>
                                            </a>
                                        </h4>
                                <?php
                                    endif;
                                endforeach; ?>
                            </div>
                            <?php
                                }
                            }
                        ?>
                    </div>
                    
                <!-- </div> -->
            <?php
                endif;
            endforeach; 
            ?>
        </div>
    </div>
</div>