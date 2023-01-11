<?php
$image = get_sub_field('image');
$bg = $image ? ' style="background-image:url(' . wp_get_attachment_image_src($image, 'full')[0] . ')"' : '';
?>

<section class="section-universal-content py-5"<?php echo $bg; ?>>
    <div class="container py-5">
        <?php the_sub_field('content'); ?>
        <?php the_sub_field('form'); ?>
    </div>
</section>