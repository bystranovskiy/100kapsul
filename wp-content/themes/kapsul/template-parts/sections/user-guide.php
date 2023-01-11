<section class="section-user-guide d-none d-md-block py-5"<?php $anchor = get_sub_field("anchor");
if ($anchor) {
    echo " data-anchor='" . $anchor . "'";
} ?>>
    <div class="container">
        <?php if (get_sub_field('title')) { ?>
            <h2 class="text-center"><?php the_sub_field('title'); ?></h2>
        <?php } ?>

        <?php
        $image = get_sub_field('image');
        $size = 'full'; // (thumbnail, medium, large, full or custom size)
        if ($image) { ?>
            <div class="user-guide-wrap text-center py-4">
                <div class="user-guide">
                    <?php echo wp_get_attachment_image($image, $size); ?>
                    <?php
                    if (have_rows('hints')) { ?>
                        <div class="hints-list">
                            <?php while (have_rows('hints')) {
                                the_row();
                                $width_area = get_sub_field('width-area');
                                $height_area = get_sub_field('height-area');
                                $x_area = get_sub_field('x-area');
                                $y_area = get_sub_field('y-area');
                                $x_position = get_sub_field('x-position');
                                $y_position = get_sub_field('y-position');
                                $description = get_sub_field('description');
                                ?>
                                <div class="hint-item"
                                     style="left:<?php echo $x_position; ?>%; top:<?php echo $y_position; ?>%;">
                                    <div class="hint-toggle"></div>
                                    <div class="description">
                                        <?php echo $description; ?>
                                    </div>
                                </div>
                                <div class="backlight-area"
                                     style="width:<?php echo $width_area; ?>%; height:<?php echo $height_area; ?>%; left:<?php echo $x_area; ?>%; top:<?php echo $y_area; ?>%;"></div>
                            <?php } ?>
                        </div>
                    <?php } ?>

                </div>
            </div>
        <?php } ?>
    </div>
</section>