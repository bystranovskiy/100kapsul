<?php
$posts = $args['posts'];
foreach ($posts as $postID):
    $permalink = get_permalink($postID);
    $title = get_the_title($postID);
    $terms = get_the_terms($postID, 'category');
    $excerpt = get_the_excerpt($postID);
    ?>
    <div class="col-md-6 col-lg-4 col-xl-3 post-item mb-3">
        <div class="inner-wrap">
            <div class="terms-list">
                <strong class="m-2"><?php the_field('title', $terms[0]->taxonomy . '_' . $terms[0]->term_id); ?></strong>
            </div>
            <div class="post-thumbnail-wrap">
                <a href="<?php echo esc_url($permalink); ?>">
                    <?php echo get_the_post_thumbnail($postID, 'large', array('class' => 'post-thumbnail')); ?>
                </a>
                <?php get_template_part('/template-parts/general/post-sharing', null, array()); ?>
            </div>
            <div class="post-title">
                <h3 class="h5"><a href="<?php echo esc_url($permalink); ?>"><?php echo esc_html($title); ?></a></h3>
            </div>
            <div class="post-excerpt">
                <p><?php echo esc_html($excerpt); ?></p>
            </div>
        </div>
        <a href="<?php echo esc_url($permalink); ?>"
           class="read-more font-weight-bolder"><?php echo __("Читати далі", "kapsul"); ?></a>
    </div>
<?php endforeach; ?>