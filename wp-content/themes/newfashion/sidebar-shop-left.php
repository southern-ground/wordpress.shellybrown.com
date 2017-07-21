<?php 
global $newfashion_config;

if($newfashion_config['left-sidebar']['show'])
	$pos = $newfashion_config['left-sidebar']['widget'];
else
	$pos = newfashion_wpo_theme_options('woocommerce-archive-left-sidebar');

?> 
<?php if($newfashion_config['left-sidebar']['show']){ ?>
	<div class="<?php echo esc_attr($newfashion_config['left-sidebar']['class']); ?>">
		<div class="wpo-sidebar wpo-sidebar-left">
			<div class="sidebar-inner">
				<?php dynamic_sidebar( $pos ); ?>
			</div>
 
		</div>
	</div>
<?php } ?>
 