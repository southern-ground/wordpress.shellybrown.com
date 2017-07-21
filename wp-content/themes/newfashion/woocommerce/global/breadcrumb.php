<?php
/**
 * Shop breadcrumb
 *
 * @author 		WooThemes
 * @package 	WooCommerce/Templates
 * @version     2.3.0
 * @see         woocommerce_breadcrumb()
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}
?>

<?php if ( $breadcrumb ) : ?>

	<?php echo trim( $wrap_before ); ?>
	<?php $html = ''; ?>
	<?php foreach ( $breadcrumb as $key => $crumb ) : ?>
		

		<?php $html .= $before; ?>
		
		<?php if (sizeof( $breadcrumb ) == $key + 1 || empty($crumb[1]) ) : ?>
			<?php $heading = '<h2 class="breadcrumb-heading">'.$crumb[0].'</h2>'; ?>
		<?php endif ?>

		<?php if( $key==0): ?>
			<?php $html .= '<ol class="list-unstyled breadcrumb-links">';?>
		<?php endif; ?>

		<?php if (sizeof( $breadcrumb ) == $key + 1 || empty($crumb[1]) ) : ?>
			
		<?php else : ?>
			<?php $html .= '<a href="' . esc_url( $crumb[1] ) . '">' . esc_html( $crumb[0] ) . '</a>'; ?>
		<?php endif; ?>

		<?php if( sizeof( $breadcrumb ) == $key + 2): ?>
			<?php $html .= '</ol>';?>
		<?php endif; ?>

		<?php $html .= $after; ?>

		<?php if ( $key + 2 < sizeof( $breadcrumb ) ) : ?>
			<?php $html .= $delimiter; ?>
		<?php endif; ?>

	<?php endforeach; ?>
	<?php echo trim( $heading ); ?>
	<?php echo trim( $html ); ?>

	<?php echo trim( $wrap_after ); ?>

<?php endif; ?>