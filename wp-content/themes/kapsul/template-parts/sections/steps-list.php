<?php
$image = get_sub_field('image');
$bg = $image ? ' style="background-image:url(' . wp_get_attachment_image_src($image, 'full')[0] . ')"' : '';
?>

<section class="section-steps-list py-5"<?php echo $bg; ?><?php $anchor = get_sub_field("anchor");
if ($anchor) {
    echo " data-anchor='" . $anchor . "'";
} ?>>
    <div class="container">
        <?php if (get_sub_field('title')) { ?>
            <h2 class="text-center"><?php the_sub_field('title'); ?></h2>
        <?php } ?>

        <?php
        if (have_rows('steps-list')) { ?>
            <div class="row steps-list px-4 mt-5">
                <?php $i = 1;
                while (have_rows('steps-list')) {
                    the_row(); ?>
                    <div class="col-lg-6 col-xl-4 mb-2 mb-lg-5 step-item">
                        <div class="inner-wrapper">
                            <div class="step-item-header">
                                <div class="num"><?php echo $i; ?>.</div>
                                <div class="title"><span><?php the_sub_field('title'); ?></span></div>
                                <div class="ico"></div>
                            </div>
                            <div class="step-item-content">
                                <?php the_sub_field('content'); ?>
                            </div>
                        </div>
                    </div>
                    <?php $i++;
                } ?>
            </div>
        <?php } ?>

        <?php
        $link = get_sub_field('link');
        $btn_type = get_sub_field('btn-type');
        if ($link):
            $link_url = $link['url'];
            $link_title = $link['title'];
            $link_target = $link['target'] ?: '_self';
            ?>
            <div class="text-center mt-4 mt-lg-0">
                <a href="<?php echo esc_url($link_url); ?>"
                   target="<?php echo esc_attr($link_target); ?>"
                   class="btn btn-<?php echo $btn_type; ?>"><?php echo esc_html($link_title); ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>