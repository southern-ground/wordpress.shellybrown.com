<?php
$color = '';
$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );
$class = "";  
$class .= ( $color != '' ) ? $color : '';
$class .= ( $btn_style != '' ) ? ' ' . $btn_style : '';


if (strpos($link, 'http') !== false){
	
} 
else{
	$link = get_site_url().'/'.$link;
}
    

?>
<?php $img = wp_get_attachment_image_src($imagebg,'full'); ?>

<div class="widget wpo-banner <?php echo esc_attr( $img_effect ); ?> <?php echo esc_attr($el_class);?> clearfix <?php echo esc_attr($content_position); ?>">
   <div class="banner-inner">
      <div class="banner-image">
         <?php if(isset($img[0]) && $img[0]) { ?>
            <img src="<?php echo esc_url($img[0]); ?>" alt=""/>
         <?php } ?>  
      </div>
      <div class="banner-body" style="<?php echo ($padding ? ('padding: '. $padding) : '') ?>">			
				<?php if( $subheading ){ ?>
				   <small class="subheading"> <?php echo trim($subheading); ?></small>
				 <?php } ?>
				<h2 class="<?php echo esc_attr($size); ?>"><?php echo trim($title); ?></h2>					
			<div class="info">
				<?php if( trim($information) ){ ?>
				   <small class="des"> <?php echo trim($information); ?></small>
				<?php } ?>			
				
				<?php if($link) { ?>
					<br>
				   <a class="link btn btn-md clearfix <?php echo esc_attr($class ); ?>" href="<?php echo esc_url($link); ?>"><?php echo esc_attr($link_text); ?></a>
				<?php } ?>         
			</div>
      </div>
    </div> 
</div>   
