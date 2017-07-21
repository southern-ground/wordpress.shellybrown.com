<?php
$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

 $style = array();
?>

<?php $img = wp_get_attachment_image_src($imagebg,'full'); ?>
<?php
	if( isset($img[0]) )  {
		 $style[] = "background-image:url('".$img[0]."')";
	}
	if( $colorbg ){
		$style[] = "background-color:".$colorbg;
	}
?>

<div class="widget widget-vc nopadding">
		<div class="wpo-inforbox <?php echo esc_attr($el_class);?> clearfix <?php echo esc_attr($inforbox_style); ?> <?php echo esc_attr($inforbox_alight); ?>" >
			<div class="inforbox-left ">
				<div class="inforbox-inner">
					<div class="heading heading-v10 <?php echo esc_attr($title_align); ?>">
						<?php if($sub_title!=''){ ?>
							<small class="subheading"><?php echo esc_attr($sub_title); ?></small>
						<?php } ?>	
						<?php if($title!=''): ?>
					    	<h2 class="<?php echo esc_attr($title_align); ?>">
								<span><?php echo trim($title); ?></span>
							</h2>
				    <?php endif; ?>
					</div>
				    <?php if( $information ){ ?>
				    	<p><?php echo trim($information); ?></p>
				    <?php } ?>
				</div>
			</div>		
			<div class="inforbox-inner inforbox-right"  style="<?php echo  implode(';', $style); ?>">
				
			</div>	
		</div>	
</div>