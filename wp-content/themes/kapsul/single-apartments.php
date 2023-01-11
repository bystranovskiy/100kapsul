<?php get_header(); ?>

    <main>
        <section class="section-services pb-5">
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

        <?php
        get_template_part('/template-parts/general/room-description', null, array('post_ID' => get_the_ID(), 'parent' => true)); ?>
        <section class="section-apartment-components blue-bg py-5">
            <?php
            $rooms = get_field('rooms');
            if ($rooms): ?>

                <?php foreach ($rooms as $room): ?>
                    <?php
                    get_template_part('/template-parts/general/apartment-components-item', null, array('post_ID' => $room)); ?>
                <?php endforeach; ?>

            <?php endif; ?>

            <div class="text-center pt-4 add-another-room">
                <h3 class="mb-0"><?php echo __('Додати ще кімнату', 'kapsul') ?> <i class="ico-plus"></i></h3>
            </div>
            <div class="container">
                <?php $terms = get_terms(array(
                    'taxonomy' => 'rooms_type',
                    'hide_empty' => true,
                ));
                if (!empty($terms)) { ?>
                    <div class="row featured-posts posts-carousel px-4 py-4">
                        <?php foreach ($terms as $term) {
                            $post = get_posts(array(
                                'post_type' => 'rooms',
                                'numberposts' => 1,
                                'tax_query' => array(
                                    array(
                                        'taxonomy' => $term->taxonomy,
                                        'field' => 'id',
                                        'terms' => $term->term_id
                                    )
                                )
                            ));
                            $postID = $post[0]->ID;
                            $permalink = get_permalink($postID);
                            $title = get_the_title($postID);
                            $price = get_field('price', $postID);
                            ?>
                            <div class="col-md-6 col-lg-4 col-xl-3 post-item mb-3">
                                <a data-post-id="<?php echo esc_html($postID); ?>" class="inner-wrap"
                                   href="<?php echo esc_url($permalink); ?>">
                                    <div class="post-room-title">
                                        <?php echo esc_html($term->name); ?>
                                    </div>
                                    <div class="post-thumbnail-wrap rectangular-block">
                                        <?php echo get_the_post_thumbnail($postID, 'large', array('class' => 'post-thumbnail')); ?>
                                    </div>
                                    <div class="post-room-price">
                                        <?php echo esc_html($price); ?>
                                    </div>
                                </a>
                            </div>
                        <?php } ?>
                    </div>
                <?php } ?>
            </div>

        </section>

        <?php wp_reset_query();
        $terms = get_field('terms', 'option');
        if ($terms):
            $image = $terms['image'];
            $bg = $image ? ' style="background-image:url(' . wp_get_attachment_image_src($image, 'full')[0] . ')"' : '';
            $content = $terms['content'];
            $buttons = $terms['buttons'];
            ?>

            <section class="section-universal-content py-5"<?php echo $bg; ?>>
                <div class="container">
                    <?php echo $content; ?>
                    <?php if ($buttons): ?>
                        <div class="row justify-content-center">
                            <?php foreach ($buttons as $button):
                                $link = $button['link'];
                                $btnType = $button['btn-type'];
                                ?>
                                <div class="col-auto">
                                    <a href="<?php echo $link['url'] ?>"
                                       target="<?php echo $link['target'] ?: '_self'; ?>"
                                       class="btn btn-<?php echo $btnType; ?> my-2"><?php echo $link['title'] ?></a>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </section>
        <?php endif; ?>

    </main>


<?php $popup = get_field('popup-get-project', 'option'); ?>
    <div class="popup" id="popup-get-project" style="display: none;">
        <div class="container popup-wrapper" style="max-width:560px;">
                <div class="container popup-inner pt-5 pb-4">
                    <?php echo $popup["form"]; ?>
                    <div class="popup-close"></div>
                </div>
        </div>
    </div>

<?php $popup = get_field('popup-calculate-interior', 'option'); ?>
    <div class="popup" id="popup-calculate-interior" style="display: none;">
        <div class="container popup-wrapper" style="max-width:560px;">
            <div class="container popup-inner pt-5 pb-4">
                <?php echo $popup["form"]; ?>
                <div class="popup-close"></div>
            </div>
        </div>
    </div>


<?php
$layouts = ['room-description', 'featured-posts', 'universal-content', 'services-and-benefits'];

wp_enqueue_style('post-item', THEME_URI . '/build/post-item.min.css', array());

wp_enqueue_style('slick', THEME_URI . '/src/vendors/slick/slick.css', array());
wp_enqueue_script('slick', THEME_URI . '/src/vendors/slick/slick.min.js', array('jquery'));

wp_enqueue_style('lightGallery', THEME_URI . '/build/lightGallery.min.css', array());
wp_enqueue_script('lightGallery', THEME_URI . '/src/vendors/lightGallery/lightgallery.js', array('jquery'));
wp_enqueue_script('lg-thumbnail', THEME_URI . '/src/vendors/lightGallery/lg-thumbnail.js', array('jquery'));
wp_enqueue_script('lg-autoplay', THEME_URI . '/src/vendors/lightGallery/lg-autoplay.js', array('jquery'));
wp_enqueue_script('mousewheel', THEME_URI . '/src/vendors/lightGallery/jquery.mousewheel.min.js', array('jquery'));

// enqueue sections css and js
enqueue_sections_build($layouts); ?>

<?php get_footer(); ?>