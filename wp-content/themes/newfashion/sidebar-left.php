<?php 
global $newfashion_config;  
?> 
<?php 
if($newfashion_config['left-sidebar']['show']){ 
	$pos = empty($newfashion_config['left-sidebar']) ?newfashion_wpo_theme_options('left-sidebar'): $newfashion_config['left-sidebar']['widget'];
?>
	<div class="<?php echo esc_attr($newfashion_config['left-sidebar']['class']); ?>">
		<div class="wpo-sidebar wpo-sidebar-left">
			<div class="sidebar-inner">
				<?php dynamic_sidebar( $pos ); ?>
			</div>
 
		</div>
	</div>
<?php } ?>
 