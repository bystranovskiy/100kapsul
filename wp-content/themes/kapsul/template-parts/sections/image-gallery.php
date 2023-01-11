<section class="section-image-gallery blue-bg py-5"<?php $anchor = get_sub_field("anchor");
if ($anchor) {
    echo " data-anchor='" . $anchor . "'";
} ?>>
    <div class="container">
        <?php if (get_sub_field('title')) { ?>
            <h2 class="text-center"><?php the_sub_field('title'); ?></h2>
        <?php } ?>
        <?php
        $images = get_sub_field('gallery');
        $size = 'large'; // (thumbnail, medium, large, full or custom size)
        if ($images): ?>
            <div class="row image-galley">
                <?php foreach ($images as $image_id): ?>
                    <a href="<?php echo wp_get_attachment_image_src($image_id, 'full')[0]; ?>"
                       class="col-auto image-gallery-item">
                        <?php echo wp_get_attachment_image($image_id, $size); ?>
                    </a>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>