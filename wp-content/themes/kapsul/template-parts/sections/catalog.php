<section class="section-catalog py-5"<?php $anchor = get_sub_field("anchor");
if ($anchor) {
    echo " data-anchor='" . $anchor . "'";
} ?>>
    <div class="container">
        <div class="row">
            <div class="offset-xl-3 col-lg-12 col-xl-9">
                <div class="row align-items-center pb-4">
                    <div class="pb-3 pb-lg-0 col-12 col-lg-auto mr-auto">
                        <h2 class="current-rooms-type mb-0"><?php echo __('Готові квартири', 'kapsul'); ?></h2>
                    </div>

                    <?php
                    $filter_tax = ['texture', 'color', 'accent'];
                    foreach ($filter_tax as $tax) {
                        $tax_label = get_taxonomy($tax)->label;
                        $terms = get_terms(array(
                            'taxonomy' => $tax,
                            'hide_empty' => true,
                        ));
                        if (!empty($terms)) { ?>
                            <div class="pb-3 pb-lg-0 col-auto">
                                <select style="width:100%;" class="filter-select js-select2"
                                        data-filter="<?php echo $tax; ?>"
                                        data-placeholder="<?php echo $tax_label; ?>">
                                    <option value="" selected><?php echo $tax_label; ?></option>
                                    <?php foreach ($terms as $term) { ?>
                                        <option value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        <?php }
                    } ?>
                </div>

            </div>
            <div class="col-md-5 col-lg-4 col-xl-3">
                <div class="catalog-menu">
                    <ul class="catalog-menu-group">
                        <li class="catalog-menu-item active" data-rooms_type="apartments">
                            <span class="title"><?php echo __('Готові квартири', 'kapsul'); ?></span>
                            <?php
                            $latest_app = get_posts("post_type=apartments&numberposts=1");
                            $image = get_post_thumbnail_id($latest_app[0]->ID);
                            if ($image) {
                                echo wp_get_attachment_image($image, array('70', '70'), "", array("class" => "thumbnail"));
                            } ?>
                        </li>
                    </ul>

                    <?php $terms = get_terms(array(
                        'taxonomy' => 'rooms_type',
                        'hide_empty' => true,
                    ));
                    if (!empty($terms)) { ?>
                        <ul class="catalog-menu-group">
                            <?php foreach ($terms as $term) {
                                $image = get_field('image', $term->taxonomy . '_' . $term->term_id); ?>
                                <li class="catalog-menu-item" data-rooms_type="<?php echo $term->slug; ?>">
                                    <span class="title"><?php echo $term->name; ?></span>
                                    <?php if ($image) {
                                        echo wp_get_attachment_image($image, array('70', '70'), "", array("class" => "thumbnail"));
                                    } ?>
                                </li>
                            <?php } ?>
                        </ul>
                    <?php } ?>
                </div>
            </div>
            <div class="col-md-7 col-lg-8 col-xl-9">
                <?php $args = array(
                    'numberposts' => -1,
                    'post_type' => array('apartments', 'rooms')
                );
                $posts = get_posts($args);
                if ($posts):?>
                    <div class="row posts-list">
                        <?php foreach ($posts as $postID):
                            $permalink = get_permalink($postID);
                            $title = get_the_title($postID);
                            $price = get_field('price', $postID);
                            $post_type = get_post_type($postID);
                            ?>
                            <div class="col-lg-6 col-xl-4 mb-4 post-item"
                                <?php
                                if ($post_type == 'apartments') {
                                    echo ' data-rooms_type="apartments"';
                                } else {
                                    echo ' style="display:none;"';
                                }
                                foreach (['rooms_type', 'texture', 'color', 'accent'] as $taxonomy) {
                                    $terms = get_the_terms($postID, $taxonomy);
                                    if ($terms) {
                                        $data_filter = [];
                                        foreach ($terms as $term) {
                                            $data_filter[] = $term->slug;
                                        } ?>
                                        data-<?php echo $taxonomy; ?>="<?php echo implode(", ", $data_filter); ?>"
                                    <?php }
                                } ?>>
                                <div class="post-thumbnail-wrap square-block rounded-block">
                                    <a href="<?php echo esc_url($permalink); ?>">
                                    <?php echo get_the_post_thumbnail($postID, 'large', array('class' => 'post-thumbnail')); ?>
                                    </a>
                                    <?php get_template_part('/template-parts/general/post-sharing', null, array());?>
                                </div>
                                <div class="post-room-title-catalog"><a
                                            href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a>
                                </div>
                                <div class="post-room-price"><?php echo $price; ?></div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <div class="text-center">
                        <div class="btn btn-secondary-outline load-more-posts mt-4" id="showMore"
                             style="display: none;"><?php echo __('Дивитись ще', 'kapsul'); ?></div>
                    </div>
                <?php endif; ?>

            </div>
        </div>
    </div>
</section>