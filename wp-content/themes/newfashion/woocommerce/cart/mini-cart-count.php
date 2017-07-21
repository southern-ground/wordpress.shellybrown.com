 <?php 
    global $woocommerce; 
    $style = '';
 ?>
<span id="xcart">
<?php 
	echo sprintf(_n(' <span class="mini-cart-items"> %d item </span> ', $woocommerce->cart->cart_contents_count, '', 'woothemes'));
	
?>
</span>  