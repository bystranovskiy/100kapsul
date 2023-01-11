<section class="section-intro blue-bg py-5"<?php $anchor = get_sub_field("anchor");
if ($anchor) {
    echo " data-anchor='" . $anchor . "'";
} ?>>
    <div class="container">
        <div class="row justify-content-between align-items-end">
            <div class="col-auto col-content d-flex align-items-center justify-content-center">
                <?php
                if (have_rows('tabs')) : ?>
                    <div class="tabs-block">
                        <nav class="tabs-nav">
                            <?php $i = 1;
                            while (have_rows('tabs')) : the_row(); ?>
                                <div class="nav-item">
                                    <span class="h5 toggle<?php if ($i === 1) {
                                        echo ' active';
                                    } ?>"><?php the_sub_field('title'); ?></span>
                                </div>
                                <?php $i++; endwhile; ?>
                        </nav>
                        <div class="tabs-content">
                            <?php $i = 1;
                            while (have_rows('tabs')) : the_row(); ?>
                                <div class="content"<?php if ($i > 1) { ?> style="display: none;"<?php } ?>><?php the_sub_field('content'); ?></div>
                                <?php $i++;
                            endwhile; ?>

                            <?php
                            if (have_rows('buttons')) : ?>
                                <div class="row flex-column flex-xl-row justify-content-between align-items-center">
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
                                                   class="btn btn-<?php echo $btn_type; ?> mb-3 mb-xl-0"><?php echo esc_html($link_title); ?></a>
                                            <?php endif; ?>
                                        </div>
                                    <?php endwhile; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                    </div>
                <?php endif; ?>
            </div>
            <div class="col-auto col-image">
                <?php
                $image = get_sub_field('image');
                $size = 'full'; // (thumbnail, medium, large, full or custom size)
                if ($image) {
                    echo wp_get_attachment_image($image, $size);
                } ?>
            </div>
        </div>
    </div>
</section>