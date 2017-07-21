<?php
	if( $relates->have_posts() ): ?>

	    <div class="heading heading-v14 separator_align_left">
            <h2 class="related-post-title space-padding-top-90">
                <?php echo __( 'You may also like', 'newfashion' ); ?>
            </h2>
        </div>
        <div class="related-posts-content space-30">
            <div class="row">
    		    <?php
                $column = newfashion_wpo_theme_options('post-number-columns', 4) ;
                $col = floor(12/$column);
                $smcol = ($col > 4)? 6: $col;
                $class_column='col-lg-'.$col.' col-md-'.$col.' col-sm-'.$smcol;

        		while ( $relates->have_posts() ) : $relates->the_post();
                    ?>
        			<div class="portfolio-masonry-entry masonry-item <?php echo esc_attr( $class_column ); ?> <?php echo esc_attr( $item_classes ); ?>">
                        <div class="wpo-portfolio-content text-center">
                          <div class="ih-item square colored effect16">
                              <div class="img">
                                <?php if ( has_post_thumbnail()):
                                    the_post_thumbnail('newfashion-thumbnails-large');
                                    $image_attributes = wp_get_attachment_url( get_post_thumbnail_id( get_the_ID()) );
                                  else: 
                                    $image_attributes = "#"; 
                                  endif; ?>
                              </div>
                              <div class="info">
                                <div class="info-inner">
                                    <h3><a class="text-success" href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                                    <p class="description"><?php echo newfashion_excerpt(20,'...'); ?></p>
                                    <p class="created hidden"><?php echo get_the_date(); ?></p>
                                    <a class="hidden zoom" href="<?php echo esc_url($image_attributes) ?>" data-rel="prettyPhoto[pp_gal]"> <i class="fa fa-search bg-success radius-x space-padding-10"></i> </a>
                                </div>    
                              </div>
                          </div>
                        </div>
                      </div>
                <?php endwhile; ?>
                <?php wp_reset_postdata(); ?>
            </div>
        </div>
<?php endif; ?>