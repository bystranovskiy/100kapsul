<div class="row featured-posts <?php echo $args['carousel'] ? ' posts-carousel px-4 ' : ''; ?>">
    <?php foreach ($posts as $postID):
        $permalink = get_permalink($postID);
        $title = get_the_title($postID);
        $price = get_field('price', $postID);
        ?>
        <div class="col-md-6 col-lg-4 col-xl-3 post-item mb-4">
            <a data-post-id="<?php echo esc_html($postID->ID); ?>" class="inner-wrap" href="<?php echo esc_url($permalink); ?>">
                <div class="post-room-title">
                    <?php echo esc_html($title); ?>
                </div>
                <div class="post-thumbnail-wrap rectangular-block">
                    <?php echo get_the_post_thumbnail($postID, 'large', array('class' => 'post-thumbnail')); ?>
                </div>
                <div class="post-room-price">
                    <?php echo esc_html($price); ?>
                </div>
            </a>
        </div>
    <?php endforeach; ?>
</div>