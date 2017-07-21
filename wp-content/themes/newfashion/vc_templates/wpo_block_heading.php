<?php
$atts = ( vc_map_get_attributes(  str_replace('.php','',basename(__FILE__)) , $atts ) );
extract( $atts );

?>

<div class="<?php echo esc_attr( $alignment ); ?> <?php echo esc_attr($el_class); ?>">
    <?php if( $subheading ){ ?>
      <small class="subheading"> <?php echo trim($subheading); ?></small>
    <?php } ?>
    <h3 class="heading-<?php echo esc_attr($heading_style); ?>"><?php echo trim($title); ?></h3>
    <?php if( trim($descript) ){ ?>
    <small class="des"> <?php echo trim($descript); ?></small>
    <?php } ?>
</div>