<?php if (have_rows('services', 'option')): ?>
    <div class="row services-list px-4">
        <?php while (have_rows('services', 'option')) :
            the_row(); ?>
            <div class="col">
                <?php
                $link = get_sub_field('link');
                if ($link):
                    $link_url = $link['url'];
                    $link_title = $link['title'];
                    $link_target = $link['target'] ?: '_self';
                    ?>
                    <a class="services-list-item" href="<?php echo esc_url($link_url); ?>"
                       target="<?php echo esc_attr($link_target); ?>">
                        <?php $image = get_sub_field('image');
                        if ($image) {
                            echo wp_get_attachment_image($image, array('75', '75'), "", array("class" => "img-responsive"));
                        } ?>
                        <h3 class="h5"><?php echo esc_html($link_title); ?></h3>
                    </a>
                <?php endif; ?>
            </div>
        <?php endwhile; ?>
    </div>
<?php endif; ?>