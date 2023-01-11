<?php
$blue_bg = get_sub_field('blue-bg');
$content_right = get_sub_field('content-right');
?>
<section
        class="section-two-columns-content py-5<?php echo $blue_bg ? ' ' . $blue_bg[0] : ''; ?>"<?php $anchor = get_sub_field("anchor");
if ($anchor) {
    echo " data-anchor='" . $anchor . "'";
} ?>>
    <div class="container">
        <?php if (get_sub_field('title')) { ?>
            <h2 class="text-center"><?php the_sub_field('title'); ?></h2>
        <?php } ?>
        <div class="row">
            <div class="<?php echo $content_right ? 'col-lg-7' : 'col-12'; ?>">
                <?php the_sub_field('content-left'); ?>
            </div>
            <?php if ($content_right) { ?>
                <div class="col-lg-5"><?php the_sub_field('content-right'); ?></div>
            <?php } ?>
        </div>
    </div>
</section>