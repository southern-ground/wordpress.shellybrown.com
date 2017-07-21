<?php  
global $newfashion_config;

if($newfashion_config['right-sidebar']['show'])
	$pos = $newfashion_config['right-sidebar']['widget'];
else
	$pos = newfashion_wpo_theme_options('woocommerce-archive-right-sidebar');

?>

<?php if($newfashion_config['right-sidebar']['show']){ ?>
	<div class="<?php echo esc_attr($newfashion_config['right-sidebar']['class']); ?>">
		<div class="wpo-sidebar wpo-sidebar-right">
			<div class="sidebar-inner">
				<?php dynamic_sidebar( $pos ); ?>
			</div>
		</div>
	</div>
<?php } ?>
