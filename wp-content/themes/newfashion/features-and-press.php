<?php
/*
*Template Name: Features and Press
*
*/

global $newfashion_config;

// Get Page Config
$newfashion_config = $newfashionEngine->getPageConfig();

function print_row($instagrams = [], $article = [], $instagramFirst = true)
{
    ?>
    <div class="item--row">
        <?php
        print_instagrams($instagrams, $instagramFirst);
        print_article($article, $instagramFirst);
        ?>
    </div>
    <?php

}

function print_article($article, $notFirst)
{
    if ($article != []) {
        ?>
        <div class="post article--container <?= $notFirst ? "order--two" : "order--one" ?>">
            <!-- Article -->
            <a class="postLink" href="<?= $article['link'] ?>" target="_blank">
                <img class="article--image" src="<?= $article['image'] ?>"/>
                <div class="overlay article--overlay">
                    <div class="overlayWrapper">
                        <img class="overlayIcon"
                             src="<?= get_stylesheet_directory_uri() ?>/images/icons/article_logo.png"/>
                        <?= $article['overlayText'] ?>
                    </div>
                </div>
            </a>
            <!-- END Article -->
        </div>
        <?php
    }
}

function print_instagrams($instagrams, $first)
{
    ?>
    <div class="instagram--container <?= count($instagrams) > 2 ? "instagram--heighted" : "" ?> <?= $first ? "order--one" : "order--two" ?>">
        <!-- Instagram -->
        <?php
        forEach ($instagrams as $instagram) {
            ?>
            <div class="post instagram--post">
                <a class="postLink" href="<?= $instagram['link'] ?>" target="_blank">
                    <img class="instagram--image" src="<?= $instagram['image']['url'] ?>"/>
                    <div class="overlay instagram--overlay">
                        <div class="overlayWrapper">
                            <img class="overlayIcon"
                                 src="<?= get_stylesheet_directory_uri() ?>/images/icons/<?= $instagram['type'] === "Instagram" ? "instagram_logo.png" : "facebook_logo.png" ?>"/>
                            <?= $instagram['credit'] ?>
                        </div>
                    </div>
                </a>
            </div>
            <?
        }
        ?>
        <!-- END Instagram -->
    </div>
    <?php
}

?>

<?php get_header($newfashionEngine->getHeaderLayout()); ?>
    <section id="wpo-mainbody" class="wpo-mainbody clearfix main-page main-page-default">
        <div class="wrapper-content">
            <div class="container">
                <div class="container-inner">
                    <div id="FeaturesAndPress">

                        <h2>Features &amp; Press</h2>

                        <?php

                        // check if the repeater field has rows of data
                        if (have_rows('instagram_items') || have_rows('article_items')):

                            ?>

                            <div id="Items">

                                <?PHP

                                $instagramItems = [];
                                $articleItems = [];

                                while (have_rows('instagram_items')) : the_row();

                                    $instagramItems[] = ['image' => get_sub_field('image'), 'link' => get_sub_field('link'), 'type' => get_sub_field('post_type'), 'credit' => get_sub_field('overlay_text')];

                                endwhile;

                                while (have_rows('article_items')) : the_row();

                                    $articleItems[] = ['image' => get_sub_field('image'), 'link' => get_sub_field('article_link'), 'overlayText' => get_sub_field('overlay_text')];

                                endwhile;

                                $instagramFirst = true;

                                while (count($instagramItems) > 0 || count($articleItems) > 0) {

                                    $instagrams = [];

                                    for ($i = 0; $i < 4; $i++) {
                                        if (count($instagramItems) > 0) {
                                            $instagrams[] = array_shift($instagramItems);
                                        }
                                    }

                                    if (count($articleItems) > 0) {
                                        $article = array_shift($articleItems);
                                    } else {
                                        $article = [];
                                    }

                                    print_row($instagrams, $article, $instagramFirst);

                                    $instagramFirst = !$instagramFirst;

                                }

                                ?>
                            </div>

                            <?php

                        endif;

                        ?>

                        <div class="ctaContact">

                            <div class="ctaBox outerBox">
                                <div class="innerBox">
                                    <h2>Sign Up for Updates from Shelly Brown</h2>
                                    <div>
                                        <form target="_new" method="post" id="e2ma_signup"
                                              onsubmit="return signupFormObj.checkForm(this)"
                                              action="https://app.e2ma.net/app2/audience/signup/1761406/1737074/?v=a">

                                            <input type="hidden" name="prev_member_email"
                                                   id="id_prev_member_email">

                                            <input type="hidden" name="source" id="id_source">

                                            <input type="hidden" name="group_1701234" value="1701234"
                                                   id="id_group_1701234">

                                            <input type="hidden" name="private_set"
                                                   value="{num_private}">

                                            <div style="margin: 0 auto;display: inline">
                                                <input type="text"
                                                       name="email"
                                                       id="id_email"
                                                       placeholder=" EMAIL ADDRESS">
                                                <input
                                                        id="e2ma_signup_submit_button"
                                                        class="e2ma_signup_form_button"
                                                        type="submit" name="Submit" value="SUBMIT"
                                                        {disabled}="">
                                            </div>

                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="ctaBox ctaBox--black outerBox">
                                <div class="innerBox">
                                    <h2>LET'S GET SOCIAL:</h2>
                                    <ul>
                                        <li>
                                            <a target="_blank"
                                               href="https://www.facebook.com/pages/Shelly-Brown/547060992096835"
                                               class="social_link fb">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="http://instagram.com/shellybrown"
                                               class="social_link ig">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://twitter.com/shellybrown"
                                               class="social_link tw">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li>
                                            <a target="_blank" href="https://www.pinterest.com/shellybrownUSA/"
                                               class="social_link pt">
                                                <i class="fa fa-pinterest"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--<script src="<? /*= get_stylesheet_directory_uri() */ ?>/js/masonry.pkgd.min.js"></script>
    <script>
        (function ($) {
            $('#Items').masonry({
                itemSelector: '.item',
                gutter: 20
            });
        })(jQuery);
    </script>-->
<?php get_footer(); ?>