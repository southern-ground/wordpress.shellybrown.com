<!-- OFF-CANVAS MENU SIDEBAR -->
<div class="offcanvas-menu">  

    <h3><?php _e('Menu','newfashion'); ?></h3>
    <nav class="navbar navbar-offcanvas navbar-static" role="navigation">
        <?php
        $args = array(
            'theme_location'  => 'mainmenu',
            'container_class' => '',
            'menu_class'      => 'wpo-menu-top nav navbar-nav',
            'fallback_cb'     => '',
            'menu_id'         => 'main-menu-offcanvas',
            'walker'          => new Newfashion_Megamenu_Offcanvas()
        );
        wp_nav_menu($args);
        ?>
    </nav>
</div>

<!-- //OFF-CANVAS MENU SIDEBAR -->