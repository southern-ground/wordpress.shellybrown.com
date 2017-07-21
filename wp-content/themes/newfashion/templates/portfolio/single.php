<?php
   $config = get_post_meta(get_the_ID(),'wpo_portfolio',true);
   $newfashion_portfolio_format = (isset( $config['portfolio_format'] ) && !empty( $config['portfolio_format'] )) ? $config['portfolio_format']: 'default';
?>
<?php if($newfashion_portfolio_format == 'video' || $newfashion_portfolio_format=='fullscreen') echo '<div class="container">'; ?>
<div class="wpo-post-next">
	<?php 
		previous_post_link('<p class="btn btn-inverse btn-success text-white">%link</p>', 'Pre.', FALSE); 
	   next_post_link('<p class="btn btn-inverse btn-success radius-6x border-2 text-white">%link</p>', 'Next', FALSE); 
	?>
</div>
<?php if($newfashion_portfolio_format == 'video' || $newfashion_portfolio_format=='fullscreen') echo '</div>'; ?>
<div class="clearfix"></div>
<?php 
	get_template_part('templates/portfolio/content', $newfashion_portfolio_format);
?>
  <?php
   if(newfashion_wpo_theme_options('show-related-portfolio')){
      $relate_count = newfashion_wpo_theme_options('portfolio-items-show', 4);
      newfashion_related_post($relate_count, 'portfolio', 'portfolio_categories');
   }
?>