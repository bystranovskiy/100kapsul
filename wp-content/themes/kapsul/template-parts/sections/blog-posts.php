<?php
$post_type = 'post';
$count_posts = wp_count_posts($post_type)->publish;
$numberposts = 8;
$count_next = 4;
?>

<section class="section-blog-posts py-5">
    <div class="container py-5">
        <?php $args = array(
            'numberposts' => $numberposts,
            'post_type' => $post_type
        );
        $posts = get_posts($args);
        if ($posts) { ?>
            <div class="row featured-posts">
                <?php get_template_part('/template-parts/general/post-items', null, array('posts' => $posts));?>
            </div>
            <?php if ($count_posts > $numberposts) { ?>
                <div class="text-center">
                    <div data-count-next="<?php echo $count_next; ?>"
                         data-count-posts="<?php echo $count_posts; ?>"
                         class="btn btn-secondary-outline mt-4 load-more-posts"><?php echo __('Завантажити ще', 'kapsul'); ?></div>
                </div>
            <?php } ?>
        <?php } ?>
    </div>
</section>