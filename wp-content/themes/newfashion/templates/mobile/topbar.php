<div class="topbar-mobile  hidden-lg hidden-md">
    <nav class="navbar navbar-offcanvas">
            <div class="offcanvas-inner">
                <ul class="list-action nav nav-pills bg-success">
                    <li class="hidden-lg hidden-md hidden-sm"><?php newfashion_wpo_renderButtonToggle(); ?></li>
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                           <span class="fa fa-search"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                            <div class="active-content">
                                <?php get_search_form(); ?>
                            </div>
                          </li>
                        </ul>
                    </li>
                    <li role="presentation" class="dropdown">
                        <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-expanded="false">
                          <span class="fa fa-user"></span>
                        </a>
                        <ul class="dropdown-menu" role="menu">
                          <li>
                            <div class="active-content">
                               <?php if(has_nav_menu( 'topmenu' )){ ?>
                                    <div class="pull-left">
                                        <?php
                                            $args = array(
                                                'theme_location'  => 'topmenu',
                                                'container_class' => '',
                                                'menu_class'      => 'menu-topbar'
                                            );
                                            wp_nav_menu($args);
                                        ?>
                                    </div>
                                <?php } ?>
                            </div>
                          </li>
                        </ul>
                    </li>
                    <li role="presentation" class="dropdown mini-cart">
                          <div id="" class="minibasket mini-basket-v2 dropdown">
                            <a class="dropdown-toggle mini-cart-button" data-toggle="dropdown" aria-expanded="true" role="button" aria-haspopup="true" data-delay="0" href="#" title="<?php _e('View your shopping cart', 'woothemes'); ?>">
                                <span class="text-skin cart-icon">
                                    <i class="fa fa-shopping-cart"></i>
                                </span>
                            </a>
                            <div class="dropdown-menu">
                                <?php woocommerce_mini_cart(); ?>
                            </div>
                        </div>
                    </li>
                </ul>  
            </div>
    </nav>        
</div>