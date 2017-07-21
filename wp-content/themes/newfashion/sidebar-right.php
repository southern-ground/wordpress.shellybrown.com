<?php  
	global $newfashion_config;
?>
<?php if($newfashion_config['right-sidebar']['show']){ 
	$pos = empty($newfashion_config['right-sidebar']) ?newfashion_wpo_theme_options('right-sidebar'): $newfashion_config['right-sidebar']['widget'];
?>
	<div class="<?php echo esc_attr($newfashion_config['right-sidebar']['class']); ?>">
		<div class="wpo-sidebar wpo-sidebar-right">
			<div class="sidebar-inner">
				<?php dynamic_sidebar( $pos ); ?>
			</div>
		</div>
	</div>
<?php } ?>