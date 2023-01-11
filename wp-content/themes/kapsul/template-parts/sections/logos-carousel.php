<section class="section-logos-carousel py-5"<?php $anchor = get_sub_field("anchor");
if ($anchor) {
    echo " data-anchor='" . $anchor . "'";
} ?>>
    <div class="container">
        <?php if (get_sub_field('title')) { ?>
            <h2 class="text-center"><?php the_sub_field('title'); ?></h2>
        <?php } ?>
        <?php
        $logos = get_sub_field('logos');
        $size = 'medium'; // (thumbnail, medium, large, full or custom size)
        if ($logos): ?>
            <div class="row logos-carousel px-4">
                <?php foreach ($logos as $logo_id): ?>
                    <div class="col-auto logos-carousel-item p-4">
                        <?php echo wp_get_attachment_image($logo_id, $size); ?>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>