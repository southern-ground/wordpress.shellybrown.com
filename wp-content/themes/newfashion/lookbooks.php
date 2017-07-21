<?php
/*
*Template Name: Look Books
*
*/

global $newfashion_config;

// Get Page Config
$newfashion_config = $newfashionEngine->getPageConfig();

?>

<?php get_header($newfashionEngine->getHeaderLayout()); ?>

    <section id="wpo-mainbody" class="wpo-mainbody clearfix main-page main-page-default">
        <div class="wrapper-content">
            <div class="container">
                <div class="container-inner">
                    <div id="LookBooks">

                        <h2><?= the_field('page_title') ?></h2>

                        <?php

                        // check if the repeater field has rows of data
                        if (have_rows('look_books')):

                            ?>

                            <div id="Books">

                                <?PHP while (have_rows('look_books')) : the_row(); ?>

                                    <div class="lookbook">
                                        <a
                                                href="<?= the_sub_field('look_book_page') ?>"
                                                target="_blank"
                                                class="lookbook__link"
                                        >
                                            <img src="<?= get_stylesheet_directory_uri() ?>/images/lookbooks/<?= the_sub_field('look_book_image') ?>"
                                                 class="lookbook__image" />
                                            <div class="lookbook__overlay">
                                                <div class="lookbook__overlay__content">

                                                    <?php if (get_sub_field('look_book_rollover_title')): ?>
                                                        <?= the_sub_field('look_book_rollover_title') ?>
                                                    <?php else: ?>
                                                        <?= get_sub_field('look_book_title') ?>
                                                    <?PHP endif; ?>

                                                </div>
                                            </div>
                                        </a>
                                    </div>

                                <?PHP endwhile; ?>

                            </div>

                            <?php

                        endif;

                        ?>

                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Include Scripts HERE -->

<?php get_footer(); ?>