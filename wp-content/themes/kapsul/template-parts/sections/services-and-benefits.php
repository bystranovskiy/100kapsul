<section class="section-services-and-benefits blue-bg py-5"<?php $anchor = get_sub_field("anchor");
if ($anchor) {
    echo " data-anchor='" . $anchor . "'";
} ?>>
    <div class="container">
        <?php if (get_sub_field('title')) { ?>
            <h2 class="text-center"><?php the_sub_field('title'); ?></h2>
        <?php } ?>
        <?php $list_type = get_sub_field('list-type');
        if ($list_type === 'global') {
            get_template_part('/template-parts/general/services-list');
        } else {
            if (have_rows('list')) { ?>
                <div class="row services-list">
                    <?php while (have_rows('list')) : the_row(); ?>
                        <div class="col">
                            <div class="services-list-item">
                                <?php
                                $image = get_sub_field('image');
                                $title = get_sub_field('title');
                                $subtitle = get_sub_field('subtitle');
                                if ($image) {
                                    echo wp_get_attachment_image($image, array('164', '164'), "", array("class" => "img-responsive"));
                                } ?>
                                <h3 class="h5"><?php echo esc_html($title); ?><?php if ($subtitle) { ?>
                                        <span><?php echo esc_html($subtitle); ?></span><?php } ?></h3>
                            </div>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php }
        }
        ?>
        <?php
        if (have_rows('buttons')) : ?>
            <div class="row flex-column flex-md-row justify-content-center align-items-center mt-4">
                <?php while (have_rows('buttons')) : the_row(); ?>
                    <div class="col-auto">
                        <?php
                        $link = get_sub_field('link');
                        $btn_type = get_sub_field('btn-type');
                        if ($link):
                            $link_url = $link['url'];
                            $link_title = $link['title'];
                            $link_target = $link['target'] ?: '_self';
                            ?>
                            <a href="<?php echo esc_url($link_url); ?>"
                               target="<?php echo esc_attr($link_target); ?>"
                               class="btn btn-<?php echo $btn_type; ?> mb-3 mb-md-0"><?php echo esc_html($link_title); ?></a>
                        <?php endif; ?>
                    </div>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
    </div>
</section>