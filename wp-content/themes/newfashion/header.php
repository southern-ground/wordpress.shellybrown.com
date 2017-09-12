<?php
/**
 * $Desc
 *
 * @version    $Id$
 * @package    wpbase
 * @author     WPOpal  Team <wpopal@gmail.com, support@wpopal.com>
 * @copyright  Copyright (C) 2015 wpopal.com. All Rights Reserved.
 * @license    GNU/GPL v2 or later http://www.gnu.org/licenses/gpl-2.0.html
 *
 * @website  http://www.wpopal.com
 * @support  http://www.wpopal.com/support/forum.html
 */
?>
<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width">
    <link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="pingback" href="<?php bloginfo('pingback_url'); ?>">
    <?php wp_head(); ?>
    <link rel="stylesheet" href="<?= get_stylesheet_directory_uri() ?>/css/allied.css"/>
    <script>
        var fix = {
            init:function(){
                jQuery(window).resize(function(){
                    fix.setResize();
                });
                jQuery('#header-bottom-container button.menu-icon').click(
                    function(){
                        fix.menuClick();
                    }
                );
                fix.resize();
            },
            isSmall: null,
            large: function(){
                jQuery('[data-hide-for="medium"]').css({
                    display: 'none'
                });
                jQuery('#main-menu').css({
                    display: 'block'
                });
            },
            menuClick: function(){
                if(fix.isSmall){
                    jQuery('#main-menu').toggle();
                }
            },
            resize: function(){
                var w = window.innerWidth;
                fix.isSmall = w <= 640;
                fix.isSmall ? fix.small() : fix.large();
            },
            resizeTimeout: null,
            RESIZE_TIMEOUT: 100,
            setResize: function(){
                clearTimeout(fix.resizeTimeout);
                setTimeout(fix.resize, fix.RESIZE_TIMEOUT);
            },
            small:function(){
                jQuery('[data-hide-for="medium"]').css({
                    display: 'block'
                });
                jQuery('#main-menu').css({
                    display: 'none'
                });
            }
        };

        (function($){
            $(document).ready(function(){
                fix.init();
            });
        })(jQuery);
    </script>

</head>


<body class="cms-index-index cms-home">
<div>
    <div>
        <!-- START Wrapper -->
        <section>

            <!-- HEADER -->
            <div id="header">
                <div id="header-top-container">
                    <div class="row">
                        <div class="medium-6 columns header-value-props text-center medium-text-left">
                            <a href="https://www.shellybrown.com/shipping/">Free Same-Day Shipping Over $150</a>
                            <a class="show-for-medium" href="https://www.shellybrown.com/returns/">Hassle-Free
                                Returns</a>
                            <a class="show-for-medium customer-service-link"
                               href="https://www.shellybrown.com/contacts/">Customer Service</a>
                        </div>
                        <div class="medium-6 columns header-secondary-nav">
                            <form id="search_mini_form" action="https://www.shellybrown.com/catalogsearch/result/"
                                  method="get">
                                <div class="form-search">
                                    <input id="search" type="text" name="q" value="" class="input-text" maxlength="128"
                                           placeholder="search...">
                                    <button type="submit" title="Search" class="button"><i class="fa fa-search"></i>
                                    </button>
                                </div>
                            </form>
                            <a id="cart-widget" class="float-right" href="https://www.shellybrown.com/checkout/cart/">
                                <img id="cart-icon"
                                     src="https://www.shellybrown.com/skin/frontend/ally/shellybrown/img/cart-icon.png">
                                <span id="cart-count">0</span>
                            </a>
                            <!-- LOG IN / LOG OUT LINKS -->
                            <ul>
                                <li><a class="wishlist-link" href="https://www.shellybrown.com/wishlist/">Wishlist</a>
                                </li>
                                <li><a href="https://www.shellybrown.com/customer/account/login/">Log In</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div id="header-main-container">
                    <div class="row">
                        <div class="show-for-medium medium-12 columns header-main-left-column logo-container">
                            <div class="header-main-left">
                                <div id="logo">
                                    <a href="https://www.shellybrown.com/" title="Shelly Brown" class="logo">
                                        <img src="https://www.shellybrown.com/skin/frontend/ally/shellybrown/img/logo.png"
                                             alt="Shelly Brown">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="text-center medium-text-right medium-6 columns header-main-right-column">
                            <div class="header-main-right">
                                <a id="cart-widget" class="float-right"
                                   href="https://www.shellybrown.com/checkout/cart/">
                                    <img id="cart-icon"
                                         src="https://www.shellybrown.com/skin/frontend/ally/shellybrown/img/cart-icon.png">
                                    <span id="cart-count">0</span>
                                </a>

                                <form id="search_mini_form" action="https://www.shellybrown.com/catalogsearch/result/"
                                      method="get">
                                    <div class="form-search">
                                        <input id="search" type="text" name="q" value="" class="input-text"
                                               maxlength="128" placeholder="search...">
                                        <button type="submit" title="Search" class="button"><i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="header-bottom-container">
                    <div class="row collapse">
                        <div class="medium-12 columns">
                            <div class="header-bottom">
                                <div class="title-bar text-center row collapse" data-responsive-toggle="main-menu"
                                     data-hide-for="medium" style="display: none;">
                                    <div class="small-3 columns">
                                        <button class="menu-icon float-left" type="button" data-toggle=""></button>
                                    </div>
                                    <div class="small-6 columns text-center">
                                        <a href="/"><img class="logo-mobile"
                                                         src="https://www.shellybrown.com/skin/frontend/ally/shellybrown/img/logo.png"></a>
                                    </div>
                                    <div class="small-3 columns">
                                        <a id="cart-link" class="float-right"
                                           href="https://www.shellybrown.com/checkout/cart/">
                                            <img id="cart-icon"
                                                 src="https://www.shellybrown.com/skin/frontend/ally/shellybrown/img/cart-icon-dark.png">
                                            <span id="cart-count">0</span>
                                        </a>
                                    </div>
                                </div>
                                <div id="main-menu" class="medium-12 columns">
                                    <ul class="vertical medium-horizontal menu dropdown"
                                        data-responsive-menu="accordion medium-dropdown" role="menubar"
                                        data-dropdown-menu="shsyu9-dropdown-menu">
                                        <li role="menuitem"><a href="https://www.shellybrown.com/bracelets.html"
                                                               tabindex="0">Bracelets</a></li>
                                        <li role="menuitem"><a
                                                    href="https://www.shellybrown.com/earrings.html">Earrings</a></li>
                                        <li role="menuitem"><a href="https://www.shellybrown.com/necklaces.html">Necklaces</a>
                                        </li>
                                        <li role="menuitem"><a href="https://www.shellybrown.com/rings.html">Rings</a>
                                        </li>
                                        <li role="menuitem"><a
                                                    href="https://www.shellybrown.com/leather.html">Leather</a></li>
                                        <li role="menuitem"><a href="https://www.shellybrown.com/people">People</a></li>
                                        <li class="show-for-small-only" role="menuitem"><a
                                                    href="https://www.shellybrown.com/customer/account/login/">Log In /
                                                Create Account</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="checkout-progress-details">
                        <div class="row">
                            <div class="medium-12 columns">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- //HEADER -->
		