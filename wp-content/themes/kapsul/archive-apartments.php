<?php get_header(); ?>

    <main>
        <section class="section-services py-5">
            <div class="container">
                <?php get_template_part('/template-parts/general/services-list'); ?>
            </div>
        </section>

        <?php if (function_exists('yoast_breadcrumb')) { ?>
            <section class="section-breadcrumb blue-bg py-2">
                <div class="container">
                    <?php yoast_breadcrumb('<p id="breadcrumbs">', '</p>'); ?>
                </div>
            </section>
        <?php } ?>

        <section class="section-page-content blue-bg text-center pb-4">
            <div class="container narrow">
                <h1><?php echo get_queried_object()->label; ?></h1>
            </div>
        </section>

        <section class="section-blog-posts blue-bg pb-5">
            <div class="container py-5">
                <?php $args = array(
                    'numberposts' => -1,
                    'post_type' => 'apartments',
                    // 'category__in' => $term_id
                );
                $posts = get_posts($args);
                if ($posts):
                    get_template_part('/template-parts/general/rooms-list'); ?>

                <?php else: ?>
                    <p class="text-center"><?php echo __('В даній категорії немає записів', 'kapsul'); ?></p>
                <?php endif; ?>
            </div>
        </section>
    </main>

<?php
$layouts = ['services-and-benefits'];

wp_enqueue_style('post-item', THEME_URI . '/build/post-item.min.css', array());
wp_enqueue_style('slick', THEME_URI . '/src/vendors/slick/slick.css', array());
wp_enqueue_script('slick', THEME_URI . '/src/vendors/slick/slick.min.js', array('jquery'));

// enqueue sections css and js
enqueue_sections_build($layouts); ?>

<?php get_footer(); ?>