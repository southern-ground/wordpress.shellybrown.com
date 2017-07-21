 <?php 
    global $woocommerce; 
    $style = '';
 ?>
 <div id="xcart" class="minibasket dropdown light">
    <span class="text-skin cart-icon bg-none">
        <i class="fa fa-shopping-cart bg-none"></i>
    </span>
    <a class="dropdown-toggle mini-cart-button" data-toggle="dropdown" aria-expanded="true" role="button" aria-haspopup="true" data-delay="0" href="#" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
        <span class="cart-title"><?php _e('Cart ','newfashion'); ?>:</span>
        <?php echo sprintf(_n(' <span class="mini-cart-items"> %d item </span> ', ' <span class="mini-cart-items"> %d items - </span> ', $woocommerce->cart->cart_contents_count, 'woothemes'), $woocommerce->cart->cart_contents_count);?> <?php echo trim($woocommerce->cart->get_cart_total()); ?>
    </a>
    <div class="dropdown-menu">
        <?php woocommerce_mini_cart(); ?>
    </div>
</div>