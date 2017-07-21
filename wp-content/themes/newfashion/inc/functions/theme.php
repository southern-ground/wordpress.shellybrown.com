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
 
function newfashion_wpo_header_style(){
    $text_color = get_header_textcolor();
    return ;
}

// This theme allows users to set a custom background.
add_theme_support( 'custom-background', apply_filters( 'wpo_custom_background_args', array(
    'default-color' => 'f5f5f5',
  ) ) );

function newfashion_wpo_custom_header_setup() {
  add_theme_support( 'custom-header', apply_filters( 'wpo_custom_header_args', array(
    'default-text-color'     => 'fff',
    'width'                  => 1900,
    'height'                 => 320,
    'flex-height'            => true,
    'wp-head-callback'       => 'newfashion_wpo_header_style',
    'admin-head-callback'    => 'wpo_admin_header_style',
    'admin-preview-callback' => 'wpo_admin_header_image',
  ) ) );
}

add_action( 'after_setup_theme', 'newfashion_wpo_custom_header_setup' );


/**
 * Render content by id 
 */
function newfashion_wpo_render_post_content( $footer ){
   $post = get_post($footer);
   echo do_shortcode( $post->post_content ); 

}

/**
 * Display an optional post thumbnail.
 *
 * Wraps the post thumbnail in an anchor element on index
 * views, or a div element when on single views.
 *
 * @since Twenty Fourteen 1.0
 */
function newfashion_wpo_post_thumbnail() {
  
  if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
    return;
  }

  if ( is_singular() ) :
  ?>
  <div class="post-thumbnail">
  <?php
    if ( ( ! is_active_sidebar( 'sidebar-2' ) || is_page_template( 'template-fullwidth.php' ) ) ) {
      the_post_thumbnail( 'newfashion-fullwidth' );
    } else {
      the_post_thumbnail();
    }
  ?>
  </div>
  <?php else : ?>
  <a class="post-thumbnail" href="<?php the_permalink(); ?>">
  <?php
    if ( ( ! is_active_sidebar( 'sidebar-2' ) || is_page_template( 'template-fullwidth.php' ) ) ) {
      the_post_thumbnail( 'newfashion-fullwidth' );
    } else {
      the_post_thumbnail();
    }
  ?>
  </a>

  <?php endif; // End is_singular()
}


/**
 * Print HTML with meta information for the current post-date/time and author.
 *
 * @since Twenty Fourteen 1.0
 */
function newfashion_wpo_posted_on() {
  if ( is_sticky() && is_home() && ! is_paged() ) {
    echo '<span class="featured-post">' . __( 'Sticky', 'newfashion' ) . '</span>';
  }

  // Set up and print post meta information.
  printf( '<span class="entry-date"><a href="%1$s" rel="bookmark"><time class="" datetime="%2$s">%3$s</time></a></span><span class="meta-sep"> / </span><span class="byline"><span class="author vcard"><a class="url fn n" href="%4$s" rel="author">%5$s</a></span></span>',
    esc_url( get_permalink() ),
    esc_attr( get_the_date( 'c' ) ),
    esc_html( get_the_date() ),
    esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
    get_the_author()
  );
}
 

/**
 * Find out if blog has more than one category.
 *
 * @since Twenty Fourteen 1.0
 *
 * @return boolean true if blog has more than 1 category
 */
function newfashion_wpo_categorized_blog() {
  if ( false === ( $all_the_cool_cats = get_transient( 'wpo_category_count' ) ) ) {
    // Create an array of all the categories that are attached to posts
    $all_the_cool_cats = get_categories( array(
      'hide_empty' => 1,
    ) );

    // Count the number of categories that are attached to the posts
    $all_the_cool_cats = count( $all_the_cool_cats );

    set_transient( 'wpo_category_count', $all_the_cool_cats );
  }

  if ( 1 !== (int) $all_the_cool_cats ) {
    // This blog has more than 1 category so newfashion_wpo_categorized_blog should return true
    return true;
  } else {
    // This blog has only 1 category so newfashion_wpo_categorized_blog should return false
    return false;
  }
}

/**
 * Get template part (for templates like the shop-loop).
 *
 * @access public
 * @param mixed $slug
 * @param string $name (default: '')
 * @return void
 */
function newfashion_get_template_part( $slug, $name = '' ) {
	$template = '';

	// Look in yourtheme/slug-name.php and yourtheme/woocommerce/slug-name.php
	if ( $name ) {
		$template = get_template_part( array( "{$slug}-{$name}.php", WC()->template_path() . "{$slug}-{$name}.php" ) );
	}

	// Get default slug-name.php
	if ( ! $template && $name && file_exists( WC()->plugin_path() . "/templates/{$slug}-{$name}.php" ) ) {
		$template = WC()->plugin_path() . "/templates/{$slug}-{$name}.php";
	}

	// If template file doesn't exist, look in yourtheme/slug.php and yourtheme/woocommerce/slug.php
	if ( ! $template ) {
		$template = get_template_part( array( "{$slug}.php", WC()->template_path() . "{$slug}.php" ) );
	}

	// Allow 3rd party plugin filter template file from their plugin
	$template = apply_filters( 'wc_get_template_part', $template, $slug, $name );

	if ( $template ) {
		load_template( $template, false );
	}
}

/**
 *
 */
function newfashion_wpo_get_categories( $category ) {
	$categories = get_categories( array( 'taxonomy' => $category ));

	$output = array( '' => __( 'All', 'newfashion' ) );
	foreach( $categories as $cat ){
		if( is_object($cat) ) $output[$cat->slug] = $cat->name;
	}
	return $output;
}

///// Define  list of function processing theme logics.
function newfashion_wpo_vc_shortcode_render( $atts, $content='' , $tag='' ){
	$output = '';
	if(is_file( WPO_FRAMEWORK_TEMPLATES_PAGEBUILDER. $tag.'.php')){
		ob_start();
		require( WPO_FRAMEWORK_TEMPLATES_PAGEBUILDER.$tag.'.php' );
		$output .= ob_get_clean();
	}
	return $output;
}

function newfashion_wpo_vc_elements_render( $atts, $content='' , $tag='' ){
  $output = '';
  if(is_file( WPO_FRAMEWORK_TEMPLATES_PAGEBUILDER.'elements/'. $tag.'.php')){
    ob_start();
    require( WPO_FRAMEWORK_TEMPLATES_PAGEBUILDER.'elements/'.$tag.'.php' );
    $output .= ob_get_clean();
  }
  return $output;
}

/// //
if(newfashion_wpo_theme_options('is-effect-scroll','1')=='1'){
    add_filter('body_class', 'newfashion_wpo_animate_scroll');
    function newfashion_wpo_animate_scroll($classes){
    $classes[] = 'wpo-animate-scroll';
        return $classes;
    }
}


add_filter('body_class', 'newfashion_wpo_body_class');
function newfashion_wpo_body_class( $classes ){
  foreach ( $classes as $key => $value ) {
      if ( $value == 'boxed' || $value == 'default' ) 
        unset( $classes[$key] );
  }
  $classes[] = newfashion_wpo_theme_options('configlayout');
  return $classes;
}


if(function_exists('PostRatings')){
  add_action( 'newfashion_wpo_rating', 'newfashion_wpo_vote_count' );
  function newfashion_wpo_vote_count(){
    $options = PostRatings()->getRating(get_the_ID());
    $classRating = "vote-default";
    if(isset($options['bayesian_rating']) && $options['bayesian_rating']>0 ){
      if(85<$options['bayesian_rating'] && $options['bayesian_rating'] <=100){
        $classRating = "vote-perfect";
      }
      if(75<$options['bayesian_rating'] && $options['bayesian_rating'] <=85){
        $classRating = "vote-good";
      }
      if(65<$options['bayesian_rating'] && $options['bayesian_rating'] <=75){
        $classRating = "vote-average";
      }
      if(55<$options['bayesian_rating'] && $options['bayesian_rating'] <=65){
        $classRating = "vote-bad";
      }
      if(0<$options['bayesian_rating'] && $options['bayesian_rating'] <=55){
        $classRating = "vote-poor";
      }
  ?>
  <?php
    $result_ratings = number_format((float)$options['bayesian_rating']/10,1,'.','');

  ?>
      <div class="entry-vote <?php echo esc_attr($classRating); ?>"><span class="entry-vote-inner"><?php echo trim( $result_ratings ); ?></span></div>
  <?php
    }
  }
}


/*
** Search With Category
*/

if(!function_exists('newfashion_wpo_categories_searchform')){
    function newfashion_wpo_categories_searchform(){
        if(class_exists('WooCommerce')){
        	global $wpdb;
			$dropdown_args = array(
                'show_counts'        => false,
                'hierarchical'       => true,
                'show_uncategorized' => 0
            );
        ?>
		<form role="search" method="get" class="input-group search-category" action="<?php echo esc_url( home_url('/') ); ?>">
            <div class="input-group-addon search-category-container">
            	<label class="select">
            		<?php wc_product_dropdown_categories( $dropdown_args ); ?>
            	</label>
            </div>
            <input name="s" id="s" maxlength="60" class="form-control search-category-input" type="text" size="20" placeholder="<?php echo __('Enter search...', 'newfashion'); ?>">
            <div class="input-group-btn">
                <label class="btn btn-link btn-search">
                  <span id="wpo-title-search" class="title-search hidden"><?php _e('Search', 'newfashion') ?></span>
                  <input type="submit" id="searchsubmit" class="fa searchsubmit" value="&#xf002;"/>
                </label>
                <input type="hidden" name="post_type" value="product"/>
            </div>
        </form>
        <?php
        }else{
        	get_search_form();
        }
    }
}

/*
** Pagination Navigation
*/

if(!function_exists('newfashion_wpo_pagination_nav')){
    function newfashion_wpo_pagination_nav($per_page,$total,$max_num_pages=''){
        ?>
        <section class="wpo-pagination">
            <?php global  $wp_query; ?>
            <?php newfashion_wpo_pagination($prev = __('Previous','newfashion'), $next = __('Next','newfashion'), $pages=$max_num_pages ,array('class'=>'pull-left')); ?>
            <div class="result-count pull-right">
                <?php
                $paged    = max( 1, $wp_query->get( 'paged' ) );
                $first    = ( $per_page * $paged ) - $per_page + 1;
                $last     = min( $total, $wp_query->get( 'posts_per_page' ) * $paged );

                if ( 1 == $total ) {
                    _e( 'Showing the single result', 'newfashion' );
                } elseif ( $total <= $per_page || -1 == $per_page ) {
                    printf( __( 'Showing all %d results', 'newfashion' ), $total );
                } else {
                    printf( _x( 'Showing %1$d to %2$d of %3$d results', '%1$d = first, %2$d = last, %3$d = total', 'newfashion' ), $first, $last, $total );
                }
                ?>
            </div>
        </section>
    <?php
    }
}

/*
** Load More Portfolio
*/
add_action( 'wp_ajax_newfashion_wpo_load_more_portfolio', 'newfashion_wpo_load_more_portfolio' );
add_action( 'wp_ajax_nopriv_newfashion_wpo_load_more_portfolio', 'newfashion_wpo_load_more_portfolio' );

if( !function_exists ('newfashion_wpo_load_more_portfolio')) {
    function newfashion_wpo_load_more_portfolio() {
        $number = $_POST['number'];
        $paged = $_POST['paged'];
        $class_column = $_POST['column'];
        $args = array(
            'post_type' => 'portfolio',
            'posts_per_page'=>$number,
            'paged' => $paged
        );
        $loop = new WP_Query($args);
        $result = $posts = array();

        if($loop->have_posts()){
            while($loop->have_posts()) : $loop->the_post();

                $item_classes = 'all ';
                $item_cats = get_the_terms($loop->post->ID, 'portfolio_categories');

             foreach((array)$item_cats as $item_cat){
                 if(count($item_cat)>0){
                   $item_classes .= $item_cat->slug . ' ';
                }
             }
             $image_attributes = wp_get_attachment_image_src( get_post_thumbnail_id( $loop->post->ID ), 'blog-thumbnails' );
                ob_start();
            ?>
             <div class="col-sm-<?php echo esc_attr( $class_column ); ?> item col-md-<?php echo esc_attr( $class_column ); ?> col-lg-<?php echo esc_attr( $class_column ); ?> <?php echo esc_attr( $item_classes ); ?>">
                 <div class="wpo-portfolio-content thumbnail text-center">
                      <?php if ( has_post_thumbnail()) : ?>
                          <figure class="wpo-portfolio-thumbnail">
                              <a href="<?php the_permalink(); ?>" title="<?php the_title_attribute(); ?>">
                                  <?php the_post_thumbnail( 'newfashion-blog-thumbnails' ); ?>
                              </a>
                          </figure>
                      <?php endif; ?>
                      <div class="wpo-portfolio-title caption">
                          <h4 class="entry-title">
                              <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                          </h4>
                          <?php if( $image_attributes ) : ?>
                              <a href="<?php echo esc_url( $image_attributes[0] ); ?>" rel="prettyPhoto[<?php echo esc_attr($item_classes); ?>]" title="<?php the_title_attribute(); ?>" class="btn btn-outline-inverse">
                                <i class="fa fa-plus"></i>
                              </a>
                        <?php endif; ?>
                          <p class="entry-description"><?php echo newfashion_excerpt(20,'...'); ?></p>
                      </div>
                 </div>
             </div>

            <?php
                $posts[] = ob_get_clean();
            endwhile;
            wp_reset_postdata();
        }
        if($paged >= $loop->max_num_pages)
            $result['check'] = false;
        else
            $result['check'] = true;

        $result['posts'] = $posts;
        print_r(json_encode($result));
        exit();
    }
}
 

if(!function_exists('newfashion_wpo_comment_form')){
    function newfashion_wpo_comment_form($arg,$class='btn-primary'){
      ob_start();
      comment_form($arg);
      $form = ob_get_clean();
      echo str_replace('id="submit"','id="submit" class="btn '.$class.'"', $form);
    }
}

if(!function_exists('newfashion_wpo_comment_reply_link')){
    function newfashion_wpo_comment_reply_link($arg,$class='btn btn-default btn-xs'){
      ob_start();
      comment_reply_link($arg);
      $reply = ob_get_clean();
      echo str_replace('comment-reply-link','comment-reply-link '.$class, $reply);
    }
}

 
if(!function_exists('newfashion_wpo_renderButtonToggle')){
    function newfashion_wpo_renderButtonToggle($class='btn-inverse-danger', $toggle='offcanvas'){
    ?>
        <button data-toggle="<?php echo esc_attr($toggle); ?>" class="btn btn-offcanvas btn-toggle-canvas <?php echo esc_attr( $class ); ?>" type="button">
           <i class="fa fa-bars"></i>
        </button>
    <?php
    }
}

 
if ( !function_exists( 'newfashion_wpo_theme_options' ) ) {
  function newfashion_wpo_theme_options( $name, $default = false ) {
    $config = get_option( 'newfashion_wpo_theme_options' );

    if ( ! isset( $config['id'] ) ) {
      return $default;
    }

    $options = get_option( $config['id'] );

    if ( isset( $options[$name] ) ) {
      return $options[$name];
    }

    return $default;
  }
}

if ( !function_exists( 'newfashion_wpo_print_style_footer' ) ) {
  function newfashion_wpo_print_style_footer(){
    $footer = newfashion_wpo_theme_options('footer-style','default');
    global $newfashion_config;
    if('page' == get_post_type()){
      if($newfashion_config['footer_skin'] && $newfashion_config['footer_skin']!='global'){
        $footer = $newfashion_config['footer_skin'];
      }
    }
    if($footer!='default'){
    $shortcodes_custom_css = get_post_meta( $footer, '_wpb_shortcodes_custom_css', true );
      if ( ! empty( $shortcodes_custom_css ) ) {
        echo '<style>
              '.$shortcodes_custom_css.'
            </style>
          ';
      }
    }
  }
  add_action('wp_head','newfashion_wpo_print_style_footer', 18);
}


if(!function_exists('newfashion_wpo_price')){
    function newfashion_wpo_price($html){
      $tmp = '';
      if ( $html ) {
        $newfashionEngine_price = preg_split("/<ins>/", $html);
        if(count($newfashionEngine_price) > 1) { 
          $tmp .= '<div class="price old-price"> ';
          if(isset($newfashionEngine_price[1])) $tmp .= '<ins>' . $newfashionEngine_price[1]; 
          if(isset($newfashionEngine_price[0])) $tmp .= $newfashionEngine_price[0];
          $tmp .= '</div>';
        }else{ 
          $tmp = '<div class="price">'. $html .'</div>';
        }
      }
      return $tmp;
    }
}
 


if(  !function_exists("newfashion_wpo_render_breadcrumbs") ){
  function newfashion_wpo_render_breadcrumbs( $showheading=false, $tag='h2' ){
      
      global $pagenow; 

      $delimiter = '';
      $home = __('Home', 'newfashion');
      $before = '<span class="active">';
      $after = '</span>';

      $html = '';
      $heading = get_the_title();
      if (!is_home() && !is_front_page() || is_paged()) {

       $html .= '<ol class="list-unstyled breadcrumb-links">';

        global $post;
        $homeLink = home_url();
         $html .=  '<li><a href="' . esc_url( $homeLink ) . '">' . $home . '</a> ' . $delimiter . '</li> ';

        if (is_category()) {
          global $wp_query;
          $cat_obj = $wp_query->get_queried_object();
          $thisCat = $cat_obj->term_id;
          $thisCat = get_category($thisCat);
          $parentCat = get_category($thisCat->parent);
          if ($thisCat->parent != 0) 
            $html .= (get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
           //$html .=  $before . single_cat_title('', false) . $after;
           $heading = $before . single_cat_title('', false) . $after;
        } elseif (is_day()) {
           $html .=  '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
           $html .=  '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
         //  $html .=  $before . get_the_time('d') . $after;
           $heading = $before . get_the_time('d') . $after;
        } elseif (is_month()) {
           $html .=  '<a href="' . get_year_link(get_the_time('Y')) . '" title="'.$post_type->labels->singular_name .'">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
         //  $html .=  $before . get_the_time('F') . $after;
           $heading = $before . get_the_time('F') . $after;
        } elseif (is_year()) {
         //  $html .=  $before . get_the_time('Y') . $after;
           $heading = $before . get_the_time('Y') . $after;
        } elseif ( is_search() ) {
            //$html .= $before . 'Search results for "' . get_search_query() . '"' . $after;
           $heading = __('Search results for "', 'newfashion') . get_search_query() . '"';
        }elseif (is_single() && !is_attachment()) { 
          if ( get_post_type() != 'post' ) {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
             $html .=  '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li> ' . $delimiter . ' ';
          //   $html .=  $before . get_the_title() . $after;
             $heading =  $before . get_the_title() . $after;
          } else {
            $cat = get_the_category(); $cat = $cat[0];
            $html .=  get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
          //  $html .=  $before . get_the_title() . $after;
            $heading =  $before . get_the_title() . $after;
          }

        } elseif ( is_tag() ) {
        //  $html .= $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
          $heading = $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
        }elseif (!is_single() && !is_page() && get_post_type() != 'post' && !is_404()) {
          $post_type = get_post_type_object(get_post_type());

          // $html .=  $before . $post_type->labels->singular_name . $after;
           $heading =  $before . $post_type->labels->singular_name . $after;
        } elseif (is_attachment()) {
          $parent = get_post($post->post_parent);
          $cat = get_the_category($parent->ID); $cat = $cat[0];
           $html .=  get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
           $html .=  '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li> ' . $delimiter . ' ';
          // $html .=  $before . get_the_title() . $after;

           $heading =  $before . get_the_title() . $after;

        } elseif ( is_page() && !$post->post_parent ) {
         //   $html .=  $before . get_the_title() . $after;
           $heading = $before . get_the_title() . $after;
        } elseif ( is_page() && $post->post_parent ) { 
          $parent_id  = $post->post_parent;
          $breadcrumbs = array();
          while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
            $parent_id  = $page->post_parent;
          }
          $breadcrumbs = array_reverse($breadcrumbs);
          foreach ($breadcrumbs as $crumb) $html .= $crumb . ' ' . $delimiter . ' ';
        //  $html .= $before . get_the_title() . $after;
          $heading = $before . get_the_title() . $after;

        } elseif ( is_author() ) {
          global $author;
          $userdata = get_userdata($author);
         // $html .= $before . 'Articles posted by ' . $userdata->display_name . $after;
           $heading = $before . 'Articles posted by ' . $userdata->display_name . $after;
        } elseif ( is_404() ) {
          //$html .= $before . 'Error 404' . $after;
          $heading = $before . 'Error 404' . $after;
        }

        if ( get_query_var('paged') ) {
          if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
         // echo ': ' . __('Page') . ' ' . get_query_var('paged');
          if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
        }

        $html .= '</ol>';
    
          echo '<'.$tag.' class="breadcrumb-heading">'.$heading.'</'.$tag.'>';
       
        echo trim($html); 
      }
  }
}  

function newshopping_wpo_modify_class_submit_form( $defaults){

    $defaults['class_submit'] =  $defaults['class_submit'].' btn btn-primary btn-inverse'; 
   return $defaults ; 
}

add_filter( 'comment_form_defaults', 'newshopping_wpo_modify_class_submit_form' );

//gallery customize

// Custom filter function to modify default gallery shortcode output
function newfashion_wpo_post_gallery( $output, $attr ) {

  // Initialize
  global $post, $wp_locale;

  // Gallery instance counter
  static $instance = 0;
  $instance++;

  // Validate the author's orderby attribute
  if ( isset( $attr['orderby'] ) ) {
    $attr['orderby'] = sanitize_sql_orderby( $attr['orderby'] );
    if ( ! $attr['orderby'] ) unset( $attr['orderby'] );
  }

  // Get attributes from shortcode
  extract( shortcode_atts( array(
    'order'      => 'ASC',
    'orderby'    => 'menu_order ID',
    'id'         => $post->ID,
    'itemtag'    => 'div',
    'icontag'    => 'div',
    'captiontag' => 'div',
    'columns'    => 3,
    'size'       => 'fullwidth',
    'include'    => '',
    'exclude'    => ''
  ), $attr ) );

  // Initialize
  $id = intval( $id );
  $attachments = array();
  if ( $order == 'RAND' ) $orderby = 'none';

  if ( ! empty( $include ) ) {

    // Include attribute is present
    $include = preg_replace( '/[^0-9,]+/', '', $include );
    $_attachments = get_posts( array( 'include' => $include, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );

    // Setup attachments array
    foreach ( $_attachments as $key => $val ) {
      $attachments[ $val->ID ] = $_attachments[ $key ];
    }

  } else if ( ! empty( $exclude ) ) {

    // Exclude attribute is present 
    $exclude = preg_replace( '/[^0-9,]+/', '', $exclude );

    // Setup attachments array
    $attachments = get_children( array( 'post_parent' => $id, 'exclude' => $exclude, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
  } else {
    // Setup attachments array
    $attachments = get_children( array( 'post_parent' => $id, 'post_status' => 'inherit', 'post_type' => 'attachment', 'post_mime_type' => 'image', 'order' => $order, 'orderby' => $orderby ) );
  }

  if ( empty( $attachments ) ) return '';

  // Filter gallery differently for feeds
  if ( is_feed() ) {
    $output = "\n";
    foreach ( $attachments as $att_id => $attachment ) $output .= wp_get_attachment_link( $att_id, $size, true ) . "\n";
    return $output;
  }

  // Filter tags and attributes
  $itemtag = tag_escape( $itemtag );
  $captiontag = tag_escape( $captiontag );
  $columns = intval( $columns );
  $itemwidth = $columns > 0 ? floor( 100 / $columns ) : 100;
  $float = is_rtl() ? 'right' : 'left';
  $selector = "gallery-{$instance}";

  // Filter gallery CSS
  $output = apply_filters( 'gallery_style', "
    <div id='carousel-$selector' class='gallery galleryid-{$id} carousel slide' data-ride='carousel'>
    <div class='carousel-inner' role='listbox'>"
  );

  // Iterate through the attachments in this gallery instance
  $i = 0;
  foreach ( $attachments as $id => $attachment ) {

    // Attachment link
    $link = isset( $attr['link'] ) && 'file' == $attr['link'] ? wp_get_attachment_link( $id, $size, false, false ) : wp_get_attachment_link( $id, $size, true, false ); 

    // Start itemtag
    $class_active = ($i==0)? ' active': '';
    $output .= "<{$itemtag} class='item ".$class_active."'>";

    // icontag
    $output .= "
    <{$icontag} class='gallery-icon'>
      $link
    </{$icontag}>";

    if ( $captiontag && trim( $attachment->post_excerpt ) ) {

      // captiontag
      $output .= "
      <{$captiontag} class='gallery-caption'>
        " . wptexturize($attachment->post_excerpt) . "
      </{$captiontag}>";

    }

    // End itemtag
    $output .= "</{$itemtag}>";
    $i++;

  }

  // End gallery output
  $output .= '
  </div>
      <a class="left carousel-control" href="#carousel-'.$selector.'" role="button" data-slide="prev">
        <span class="fa fa-angle-left"></span>
      </a>
      <a class="right carousel-control" href="#carousel-'.$selector.'" role="button" data-slide="next">
        <span class="fa fa-angle-right"></span>
      </a>
  </div>';

  return $output;

}

// Apply filter to default gallery shortcode
add_filter( 'post_gallery', 'newfashion_wpo_post_gallery', 10, 2 );  
