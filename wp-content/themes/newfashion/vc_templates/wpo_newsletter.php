<?php


$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );
if( NEWFASHION_WPO_MAILCHIMP_ACTIVED){
?>
<div class="widget wpo-newsletter <?php echo esc_attr( $el_class ); ?> <?php echo esc_attr( $class ); ?>">
<div class="wpo-newsletter-inner">
	<?php if(!empty($title)){ ?>		
		<h3 class="widget-title visual-title heading-<?php echo esc_attr($heading_style); ?>">
			<?php echo esc_html( $title ); ?>
		</h3>
	<?php } ?>
	
	<?php if(!empty($description)){ ?>
		<p class="widget-description">
			<?php echo trim( $description ); ?>
		</p>
	<?php } ?>		
	
	<?php
		if( function_exists( 'mc4wp_show_form' ) ) {
		  	try {
		  	    $form = mc4wp_get_form(); 
				mc4wp_show_form( $form->ID  );
			} catch( Exception $e ) {
			 	_e( 'Please create a newsletter form from Mailchip plugins','newfashion' );	
			}
		}
	?>
</div>
</div>
<?php } ?>