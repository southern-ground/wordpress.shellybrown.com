<?php
$output = $title = $link_facebook = $image_facebook = $link_youtube = $image_youtube = $link_pinterest = $image_pinterest
		= $link_twitter = $image_twitter
		= $link_google_plus = $image_google_plus = $link_linkedIn = $image_linkedIn 
		= $class_youtube = $class_pinterest = $class_google_plus = $class_linkedIn = $class_facebook = $class_twitter = $show_facebook 
		= $show_youtube = $show_pinterest = $show_google_plus = $show_linkedIn = $show_twitter  = $image_size =  '';
$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );
	$size = explode("x",$image_size);

?>
<div class="widget wrapper-social-link <?php echo esc_attr( $el_class ); ?>">
<?php if($title){ ?>
	<h3 class="widget-title heading-<?php echo esc_attr($heading_style); ?>">
		<?php echo trim($title) ?>	
	</h3>
<?php } ?>
<?php if($show_facebook || $show_google_plus || $show_youtube || $show_pinterest || $show_linkedIn || $show_twitter ): ?>

	<ul class="social-link list-unstyled bo-social bo-social-icons scolor-sicolor">
	<?php if($show_facebook): ?>
		<li>
			<a class="bo-social color-social-facebook" href="<?php echo esc_url($link_facebook);?>"  target="_blank" >
					<?php if($class_facebook): ?>
						<i class="<?php echo esc_attr($class_facebook ); ?>">&nbsp;</i>
					<?php endif; ?>			
				<?php echo wp_get_attachment_image( $image_facebook,$size); ?>
			</a>
		</li>
	<?php endif; ?>	
	<?php if($show_twitter): ?>
		<li>
			<a class="bo-social color-social-twitter" href="<?php echo esc_url($link_twitter);?>"  target="_blank">
				<?php if($class_twitter): ?> 
					<i class="<?php echo esc_attr( $class_twitter ); ?>">&nbsp;</i>
				<?php endif; ?> 
				<?php echo wp_get_attachment_image( $image_twitter,$size); ?>
			</a>
		</li>
	<?php endif; ?>	
	<?php if($show_youtube): ?>
		<li>
			<a class="bo-social color-social-youtube" href="<?php echo esc_url($link_youtube);?>"  target="_blank">
				<?php if($class_youtube): ?> 
					<i class="<?php echo esc_attr( $class_youtube ); ?>">&nbsp;</i>
				<?php endif; ?>		
				<?php echo wp_get_attachment_image( $image_youtube,$size); ?>
			</a>
		</li>
	<?php endif; ?>		
	<?php if($show_google_plus): ?>
		<li>
			<a class="bo-social color-social-google" href="<?php echo esc_url($link_google_plus);?>"  target="_blank">
				<?php if($class_google_plus): ?> 
					<i class="<?php echo esc_attr( $class_google_plus ); ?>">&nbsp;</i>
				<?php endif; ?>	 
				<?php echo wp_get_attachment_image( $image_google_plus,$size); ?>
			</a>
		</li>
	<?php endif; ?>	
	
	<?php if($show_pinterest): ?>
		<li>
			<a class="bo-social color-social-pinterest" href="<?php echo esc_url($link_pinterest);?>"  target="_blank" >
				<?php if($class_pinterest): ?>
					<i class="<?php echo esc_attr( $class_pinterest ); ?>">&nbsp;</i>
				<?php endif; ?>	
				<?php echo wp_get_attachment_image( $image_pinterest,$size); ?>
			</a>
		</li>
	<?php endif; ?>	
	<?php if($show_linkedIn): ?>
		<li>
			<a class="bo-social color-social-linkedin" href="<?php echo esc_url($link_linkedIn);?>"  target="_blank">
				<?php if($class_linkedIn): ?> 
					<i class="<?php echo esc_attr( $class_linkedIn ); ?>">&nbsp;</i>
				<?php endif; ?>		
				<?php echo wp_get_attachment_image( $image_linkedIn,$size); ?>
			</a>
		</li>
	<?php endif; ?>	
	</ul>
<?php endif; ?>
</div>