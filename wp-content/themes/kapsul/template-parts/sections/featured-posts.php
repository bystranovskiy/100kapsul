<section class="section-featured-posts blue-bg py-5"<?php $anchor = get_sub_field("anchor");
    if ($anchor) {
        echo " data-anchor='" . $anchor . "'";
    } ?>>
    <div class="container">
        <?php if (get_sub_field('title')) { ?>
            <h2><?php the_sub_field('title'); ?></h2>
        <?php } ?>
        <?php
        $posts = get_sub_field('posts')?:get_posts(array('numberposts' => 6, 'post_type' => 'post'));
        if ($posts):?>
            <div class="row featured-posts posts-carousel px-4">
                <?php get_template_part('/template-parts/general/post-items', null, array('posts' => $posts)); ?>
            </div>
            <div class="text-center mt-4">
                <a href="<?php echo get_permalink(get_option('page_for_posts'));?>" class="btn btn-secondary-outline"><?php echo __('Дивитись всі', 'kapsul'); ?></a>
            </div>
        <?php endif; ?>
    </div>
</section>