<?php
$post_ID = $args['post_ID'];
$parent = $args['parent'] || false;
?>

<section
        class="section-room-description blue-bg py-2"
        data-permalink="<?php echo get_the_permalink($post_ID); ?>"
        <?php if ($parent){?>
        id="parent-object"
        data-type="<?php echo get_post_type_object(get_post_type($post_ID))->labels->singular_name; ?>"
        <?php }?>
>
    <div class="container">
        <div class="inner-wrapper">
            <div class="row">
                <div class="col-lg-7 order-lg-1 col-content">
                    <<?php echo $parent? 'h1' : 'h2';?> class="h3 object-title"><?php echo get_the_title($post_ID); ?></<?php echo $parent? 'h1' : 'h2';?>>
                    <?php echo get_field('content', $post_ID); ?>
                </div>
                <div class="col-lg-5 order-lg-0 col-post-gallery">
                    <?php if (has_post_thumbnail($post_ID)) {
                        $thumbnail_id  = get_post_thumbnail_id( $post_ID );?>
                        <div class="post-gallery-featured">
                            <a class="post-gallery-image"
                               href="<?php echo wp_get_attachment_image_src($thumbnail_id, 'full')[0]; ?>">
                                <?php echo wp_get_attachment_image($thumbnail_id, array('500', '500'), "", array("class" => "img-responsive")); ?>
                            </a>
                            <div class="price-sticker">
                                <?php the_field('price', $post_ID) ?>
                            </div>
                        </div>
                    <?php } ?>
                    <?php
                    $images = get_field('gallery', $post_ID);
                    if ($images): ?>
                        <div class="post-gallery-additional">
                            <?php foreach ($images as $image): ?>
                                <a class="post-gallery-image" href="<?php echo esc_url($image['url']); ?>">
                                    <img src="<?php echo esc_url($image['sizes']['medium']); ?>"
                                         alt="<?php echo esc_attr($image['alt']); ?>"/>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>