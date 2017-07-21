<?php
$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

?>

<div class="widget widget-text-heading <?php echo esc_attr($el_class); ?>">
	<?php if($title!=''): ?>
		
        <h3 class="widget-title visual-title <?php echo esc_attr($title_align); ?>">           
			<?php if($subtitle!=''): ?><span class="sub-title"><?php echo trim($subtitle); ?></span><br/><?php endif; ?>
			<span><?php echo trim($title); ?></span>
			<?php if(trim($descript)!=''){ ?>
                <span class="widget-desc">
                    <?php echo trim($descript); ?>
                </span>
            <?php } ?>
        </h3>
    <?php endif; ?>
</div>