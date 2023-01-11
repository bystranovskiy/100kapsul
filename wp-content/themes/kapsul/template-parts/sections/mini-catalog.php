<section class="section-mini-catalog py-5"<?php $anchor = get_sub_field("anchor");
if ($anchor) {
    echo " data-anchor='" . $anchor . "'";
} ?>>
    <?php
    $content = get_sub_field('content');
    if ($content):?>
        <div class="container narrow mb-5">
            <?php echo $content; ?>
        </div>
    <?php endif; ?>
    <div class="container">
        <?php $posts = get_sub_field('posts');
        if ($posts):?>
            <div class="row featured-posts posts-carousel px-4">
                <?php foreach ($posts as $postID):
                    $permalink = get_permalink($postID);
                    $title = get_the_title($postID);
                    $price = get_field('price', $postID);
                    ?>
                    <div class="col-auto post-item pb-2">
                        <div class="post-thumbnail-wrap square-block rounded-block">
                            <a href="<?php echo esc_url($permalink); ?>">
                            <?php echo get_the_post_thumbnail($postID, 'large', array('class' => 'post-thumbnail')); ?>
                            </a>
                            <?php get_template_part('/template-parts/general/post-sharing', null, array());?>
                        </div>
                        <div class="post-room-title-catalog"><a
                                    href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a></div>
                        <div class="post-room-price"><?php echo $price; ?></div>
                    </div>
                <?php endforeach; ?>
            </div>
            <?php
            $link = get_sub_field('link');
            $btn_type = get_sub_field('btn-type');
            if ($link):
                $link_url = $link['url'];
                $link_title = $link['title'];
                $link_target = $link['target'] ?: '_self';
                ?>
                <div class="text-center mt-4">
                    <a href="<?php echo esc_url($link_url); ?>"
                       target="<?php echo esc_attr($link_target); ?>"
                       class="btn btn-<?php echo $btn_type; ?>"><?php echo esc_html($link_title); ?></a>
                </div>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</section>